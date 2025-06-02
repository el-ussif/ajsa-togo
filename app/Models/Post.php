<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;


    protected $fillable = [
        'title', 'summary', 'content', 'cover_image', 'content_type',
        'category_id', 'author_id', 'donate_link', 'highlighting', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'highlighting' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function ($post) {
            if ($post->id && $post->highlighting) {
                static::where('id', '!=', $post->id)
                    ->where('content_type', $post->content_type)
                    ->update(['highlighting' => false]);
            }
        });
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
