@extends('layouts.front.app')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">
                Nos Projets
            </h1>
            <p class="page-subtitle">
                Découvrez nos initiatives pour le développement durable et l'autonomisation des communautés
            </p>
        </div>
    </section>


    <!-- Featured Article -->
    <section class="content-section hidden" style="padding-top: 40px;">
        <div class="container">
            <h2 style="font-size: 2rem; margin-bottom: 32px; color: #1f2937;">À la une</h2>
            <div class="card" style="overflow: hidden;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0; align-items: center;">
                    <div class="news-image" style="height: 300px; border-radius: 0;">
                        <i class="fas fa-newspaper" style="font-size: 3rem;"></i>
                        <p style="margin-top: 16px;">Image de l'article</p>
                    </div>
                    <div style="padding: 48px;">
                        <div style="margin-bottom: 16px;">
                            <span class="news-category" style="background: #d4af37;">Projets</span>
                            <span class="news-category" style="background: #dc2626; margin-left: 8px;">À la une</span>
                        </div>
                        <h3 style="font-size: 1.8rem; font-weight: bold; margin-bottom: 16px; color: #1f2937;">
                            Lancement du projet 'AgriFemme 2.0' à Kara
                        </h3>
                        <p style="color: #6b7280; margin-bottom: 24px; line-height: 1.6;">
                            Un nouveau programme d'autonomisation des femmes rurales par l'agriculture durable vient d'être lancé dans la région de Kara.
                        </p>
                        <div style="display: flex; align-items: center; justify-content: between; flex-wrap: wrap; gap: 16px;">
                            <div style="display: flex; align-items: center; gap: 16px; font-size: 14px; color: #6b7280;">
                                <div style="display: flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-calendar"></i>
                                    <span>08/05/2024</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-user"></i>
                                    <span>Équipe AJSA-TOGO</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-clock"></i>
                                    <span>3 min</span>
                                </div>
                            </div>
                            <a href="{{route('web.projects')}}" class="btn btn-primary">
                                Lire l'article <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid -->
    <section class="content-section">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3  xl:grid-cols-4 gap-4">
                @foreach ($posts as $post)
                    <div class="news-card">
                        <div class="news-image">
                            @if ($post->cover_image)
                                <img class="max-h-[100%]" src="{{ asset('storage/' . $post->cover_image) }}" alt="Image de l'article">
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
                                    <span>{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</span>
                                </div>
                                <div style="display: none; align-items: center; gap: 8px;">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ Str::words(strip_tags($post->content), 80) > 400 ? '5 min' : '4 min' }}</span>
                                </div>
                            </div>
                            <h3 class="news-title">{{ $post->title }}</h3>
                            <p class="news-excerpt">{{ Str::limit($post->summary, 150) }}</p>
                            <a href="{{ route('web.project-details', $post->id) }}" class="read-more">
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
