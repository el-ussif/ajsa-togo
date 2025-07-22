
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <a href="{{ route('web.home') }}" class="footer-logo">
                    <div class="logo-icon">A</div>
                    <div>
                        <div class="footer-title">AJSA-TOGO</div>
                        <div class="footer-subtitle">Association des Jeunes aux Services de l'Afrique</div>
                    </div>
                </a>
                <p class="footer-description">La jeunesse africaine, cœur du développement</p>
            </div>

            <div class="footer-section">
                <h3>Navigation</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('web.home') }}">Accueil</a></li>
                    <li><a href="{{ route('web.about') }}">À propos</a></li>
                    {{--
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="a-propos.html">À propos</a></li>
                    <li><a href="projets.html">Projets</a></li>
                    <li><a href="adhesion.html">Adhésion</a></li>
                    --}}
                </ul>
            </div>

            <div class="footer-section">
                <h3>Nos actions</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('web.contact') }}">Contact</a></li>
                    {{--
                    <li><a href="galerie.html">Galerie</a></li>
                    <li><a href="actualites.html">Actualités</a></li>
                    <li><a href="don.html">Faire un don</a></li>
                    <li><a href="contact.html">Contact</a></li>

                    --}}
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Lomé, quartier Djidjolé, Togo</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+228 92 71 46 51</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>ajsatogo@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} AJSA-TOGO. Tous droits réservés.</p>
        </div>
    </div>
</footer>

@include('partials.front.scripts')
