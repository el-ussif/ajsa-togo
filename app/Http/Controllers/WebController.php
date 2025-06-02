<?php

namespace App\Http\Controllers;

use App\Constants\PostConstants;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\View\View;

class WebController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function homePage(): View
    {
        $posts = Post::whereNotNull('published_at')
            ->whereDate('published_at', '<=', Carbon::today())
            ->where('content_type', PostConstants::CONTENT_TYPE_PROJECTS)
            ->orderByDesc('published_at')
            ->paginate(4);
        return view('pages.web.home', [
            'posts' => $posts,
        ]);
    }
    public function projectsPage(): View
    {
        $posts = Post::whereNotNull('published_at')
            ->whereDate('published_at', '<=', Carbon::today())
            ->where('content_type', PostConstants::CONTENT_TYPE_PROJECTS)
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('pages.web.projects', [
            'posts' => $posts,
        ]);
    }
    public function blogPage(): View
    {
        $posts = Post::whereNotNull('published_at')
            ->whereDate('published_at', '<=', Carbon::today())
            ->where('content_type', PostConstants::CONTENT_TYPE_BLOG)
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('pages.web.blog', [
            'posts' => $posts,
        ]);
    }
    public function contentDetailPage(Post $post): View
    {
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(2)
            ->get();
        return view('pages.web.contents-details', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function aboutPage(): View
    {
        return view('pages.web.about', [
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function contactPage(): View
    {
        return view('pages.web.contact', [
        ]);
    }

}
