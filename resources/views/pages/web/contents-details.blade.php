@extends('layouts.front.app')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title" id="article-title">{{ $post->title }}</h1>
            @if($post->subtitle)
                <p class="page-subtitle" id="article-subtitle">{{ $post->subtitle }}</p>
            @endif
        </div>
    </section>

    <!-- Article Detail -->
    <section class="content-section">
        <div class="container">
            <div class="articles-detail">
                <!-- Métadonnées de l'article -->
                <div class="article-meta" id="article-meta">
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span id="article-date">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-user"></i>
                        <span id="article-author">{{ $post->author->name ?? 'AJSA-TOGO' }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <span id="article-reading-time">{{ $post->reading_time ?? '3 min de lecture' }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <span id="article-category">{{ $post->category->name ?? 'Non catégorisé' }}</span>
                    </div>
                </div>

                <!-- Image de l'article -->
                <div style="margin-bottom: 32px;">
                    @if($post->cover_image)
                        <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" style="width: 100%; border-radius: 12px;" />
                    @else
                        <div style="aspect-ratio: 16/9; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #6b7280;">
                            <div style="text-align: center;">
                                <i class="fas fa-image" style="font-size: 4rem; margin-bottom: 16px;"></i>
                                <p>Image de l'article</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Contenu principal -->
                <div class="card">
                    <div class="card-body">
                        <div class="article-content" id="article-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>

                <!-- Articles similaires -->
                @if(isset($relatedPosts) && $relatedPosts->count())
                    <div style="margin-top: 48px;">
                        <h2 style="margin-bottom: 24px;">Articles similaires</h2>
                        <div style="" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                            @foreach($relatedPosts as $related)
                                <div class="card">
                                    <div class="news-image w-full" style="height: 250px;">
                                        @if($related->cover_image)
                                            <img src="{{ asset('storage/' . $related->cover_image) }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                        @else
                                            <i class="fas fa-file-alt" style="font-size: 2rem;"></i>
                                        @endif
                                    </div>
                                    <div style="padding: 16px;" class="mt-5">
                                        <h4 style="margin-bottom: 8px; color: #1f2937;">{{ $related->title }}</h4>
                                        <p style="font-size: 14px; color: #6b7280;">{{ Str::limit(strip_tags($related->content), 100) }}</p>
                                        <a href="{{ route('web.'. (strtolower($post->content_type)). '-details', $related->id) }}" class="read-more mt-3">
                                            Lire plus <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($post->donate_link)
                    <!-- Call to Action -->
                    <div style="margin-top: 48px; text-align: center;">
                        <div class="card" style="background: #f0fdf4;">
                            <div class="card-body">
                                <h3 class="text-2xl font-bold" style="color: #16a34a; margin-bottom: 16px;">Soutenez nos actions</h3>
                                <p style="margin-bottom: 24px;">Votre soutien nous permet de réaliser des projets comme <span class="font-semibold text-[#16a34a]">
                                    {{ $post->title }}
                                </span>.</p>
                                <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                                    <a href="{{$post->donate_link}}" target="_blank" class="btn btn-primary">Faire un don pour ce projet</a>
                                    <a href="{{ route('web.contact') }}" class="btn btn-outline">Nous contacter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
