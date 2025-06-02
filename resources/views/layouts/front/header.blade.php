@php
    use App\Constants\PostConstants;
    use App\Models\Post;
    use Carbon\Carbon;
    $highlightedExists = Post::whereNotNull('published_at')
        ->whereDate('published_at', '<=', Carbon::today())
        ->where('content_type', PostConstants::CONTENT_TYPE_PROJECTS)
        ->where('highlighting', true)
        ->first();
@endphp

<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <div class="logo-icon">A</div>
            <div class="logo-text">
                <div class="logo-title">AJSA-TOGO</div>
                <div class="logo-subtitle">Jeunesse africaine, cœur du développement</div>
            </div>
        </div>

        <div class="nav-menu" id="nav-menu">
            <a href="{{ route('web.home') }}" class="nav-link active">Accueil</a>
            <a href="{{ route('web.about') }}" class="nav-link">À propos</a>
            <a href="{{ route('web.projects') }}" class="nav-link">
                Projects
            </a>
            <a href="{{ route('web.blog') }}" class="nav-link">
                Blog
            </a>
            <a href="{{ route('web.contact') }}" class="nav-link">Contact</a>
            @if($highlightedExists && $highlightedExists->donate_link)
                <a href="{{$highlightedExists->donate_link}}" class="btn btn-primary">
                    <i class="fas fa-heart"></i> Faire un don
                </a>
            @endif
            {{--
            <a href="index.html" class="nav-link active">Accueil</a>
            <a href="a-propos.html" class="nav-link">À propos</a>
            <a href="projets.html" class="nav-link">Projets</a>
            <a href="adhesion.html" class="nav-link hidden">Adhésion</a>
            <a href="galerie.html" class="nav-link hidden">Galerie</a>
            <a href="actualites.html" class="nav-link">Actualités</a>
            <a href="contact.html" class="nav-link">Contact</a>
            <a href="don.html" class="btn btn-primary">
                <i class="fas fa-heart"></i> Faire un don
            </a>
            --}}
        </div>

        <div class="nav-toggle" id="nav-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
