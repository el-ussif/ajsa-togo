@php use Carbon\Carbon; @endphp
@extends('layouts.front.app')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Nos dernières actualités</h1>
            <p class="page-subtitle">Suivez nos projets, événements et l'impact de nos actions sur le terrain</p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($posts as $post)
                    <div class="news-card">
                        <div class="news-image">
                            @if ($post->cover_image)
                                <img class="max-h-[100%]" src="{{ asset('storage/' . $post->cover_image) }}"
                                     alt="Image de l'article">
                            @else
                                <i class="fas fa-seedling" style="font-size: 2rem;"></i>
                                <p style="margin-top: 8px; font-size: 12px;">Image de l'article</p>
                            @endif
                        </div>

                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-category" style="background: #d4af37;">
                                    {{ $post->category->name ?? null }}
                                </span>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ Carbon::parse($post->published_at)->format('d/m/Y') }}</span>
                                </div>
                                <div style="display: none; align-items: center; gap: 8px;">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ Str::words(strip_tags($post->content), 80) > 400 ? '5 min' : '4 min' }}</span>
                                </div>
                            </div>
                            <h3 class="news-title">{{ $post->title }}</h3>
                            <p class="news-excerpt">{{ Str::limit($post->summary, 150) }}</p>
                            <a href="{{ route('web.blog-details', $post->id) }}" class="read-more">
                                Lire la suite <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
