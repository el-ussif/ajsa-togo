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

@extends('layouts.front.app')

@section('content')

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Bienvenue sur la plateforme officielle de l'AJSA-TOGO !</h1>
                <p class="hero-subtitle">La jeunesse africaine, cœur du développement</p>
                <div class="hero-buttons">
                    <a href="adhesion.html" class="btn btn-primary hidden">
                        <i class="fas fa-users"></i> Adhérer à l'association
                    </a>
                    @if($highlightedExists && $highlightedExists->donate_link)
                        <a href="{{$highlightedExists->donate_link}}" class="btn btn-secondary">
                            <i class="fas fa-heart"></i> Faire un don
                        </a>
                    @endif
                    <a href="{{ route('web.projects') }}" class="btn btn-secondary">
                        <i class="fas fa-target"></i> Découvrir nos projets
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <h2 class="section-title">📊 Chiffres clés</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">5 000+</div>
                    <div class="stat-label">bénéficiaires directs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">30+</div>
                    <div class="stat-label">communautés impactées</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">70%</div>
                    <div class="stat-label">de femmes autonomisées</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15</div>
                    <div class="stat-label">projets réalisés</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Projects -->
    <section class="recent-projects">
        <div class="container">
            <h2 class="section-title">Nos Projets Récents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($posts as $post)
                    <div class="project-card">
                        <h3>
                            {{ $post->title }}
                        </h3>
                        <p>
                            {{ Str::limit($post->summary, 150) }}
                        </p>
                        <a
                            href="{{ route('web.project-details', $post->id) }}"
                            class="btn btn-outline"
                        >
                            En savoir plus <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Slider -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">💬 Témoignages</h2>
            <div class="testimonials-slider">
                <div class="testimonial-slide active">
                    <div class="testimonial-avatar">A</div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p>"Grâce à AJSA-TOGO, notre coopérative produit désormais plus, et nos enfants vont à l'école."</p>
                    <div class="testimonial-author">Maman Afi</div>
                    <div class="testimonial-profession">Présidente de coopérative agricole</div>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">K</div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p>"L'appui scolaire a changé la vie de mon fils. Merci AJSA-TOGO !"</p>
                    <div class="testimonial-author">Kodjo</div>
                    <div class="testimonial-profession">Père de famille, mécanicien</div>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">E</div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p>"Le programme JFAD m'a donné confiance en moi et les outils pour réussir."</p>
                    <div class="testimonial-author">Esinam</div>
                    <div class="testimonial-profession">Jeune entrepreneure</div>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">M</div>
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p>"Grâce à la formation en agriculture durable, mes récoltes ont doublé."</p>
                    <div class="testimonial-author">Mawuli</div>
                    <div class="testimonial-profession">Agriculteur</div>
                </div>
            </div>

            <div class="slider-controls">
                <button class="slider-btn" id="prevBtn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-btn" id="nextBtn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div class="slider-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
            </div>
        </div>
    </section>

    <!-- Objectives -->
    <section class="objectives">
        <div class="container">
            <h2 class="section-title">🎯 Les objectifs de l'AJSA-TOGO</h2>
            <div class="objectives-grid">
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la réduction de la pauvreté des populations à la base</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la promotion d'une éducation et une formation de qualités</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à l'accès aux soins de santé primaires des jeunes filles mères</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la lutte contre les IST/VIH/SIDA</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la protection des ressources naturelles et la biodiversité</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la promotion de la culture et du tourisme</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Développer la culture entrepreneuriale auprès des jeunes</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Œuvrer à l'autonomisation de la jeune fille et de la femme</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer au développement du secteur agricole</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la lutte contre le travail et le trafic des enfants</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la réinsertion sociale des enfants de la rue</p>
                </div>
                <div class="objective-card">
                    <div class="objective-bullet"></div>
                    <p>Contribuer à la prise en charge des orphelins et des enfants démunis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Rejoignez notre mission</h2>
            <p>Ensemble, construisons un avenir meilleur pour la jeunesse africaine</p>
            <div class="cta-buttons">
                <a href="adhesion.html" class="btn btn-white hidden">Devenir membre</a>
                <a href="{{route('web.contact')}}" class="btn btn-outline-white">Nous contacter</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script>
        // Testimonials Slider
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentSlide = 0;

            function showSlide(index) {
                // Cacher tous les slides
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                // Afficher le slide actuel
                slides[index].classList.add('active');
                dots[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            // Dots navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

                // Auto-play
                setInterval(nextSlide, 5000);
            });
    </script>
@endsection
