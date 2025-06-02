<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with(['category', 'author'])->latest()->paginate(10);
        return view('pages.admin.posts.list', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        return view('pages.admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request) {
        $data = $request->validated();
        $data['author_id'] = Auth::id();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $post = Post::create($data);
        return redirect()->route('posts.show', $post)->with('success', 'Post created');
    }

    public function show(Post $post) {
        return view('pages.admin.posts.details', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('pages.admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post) {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $post->update($data);
        return redirect()->route('posts.show', $post)->with('success', 'Post updated');
    }

    public function destroy(Post $post) {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted');
    }
}
