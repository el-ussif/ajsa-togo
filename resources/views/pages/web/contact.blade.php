@extends('layouts.front.app')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Contactez-nous</h1>
            <p class="page-subtitle">Nous sommes là pour répondre à vos questions et échanger sur nos projets de développement</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="content-section">
        <div class="container">
            <div class="contact-layout">

                <!-- Contact Information -->
                <div class="contact-info">
                    <h2 class="contact-section-title">📫 Nos coordonnées</h2>

                    <div class="contact-cards">
                        <div class="card">
                            <div class="card-body">
                                <div class="contact-card-content">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-map-marker-alt contact-icon green"></i>
                                    </div>
                                    <div>
                                        <h3 class="contact-card-title">Adresse</h3>
                                        <p class="contact-card-text">Lomé, quartier Djidjolé<br>Préfecture du Golfe, Togo</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="contact-card-content">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-phone contact-icon blue"></i>
                                    </div>
                                    <div>
                                        <h3 class="contact-card-title">Téléphone</h3>
                                        <p class="contact-card-text">+228 92 71 46 51</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="contact-card-content">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-envelope contact-icon orange"></i>
                                    </div>
                                    <div>
                                        <h3 class="contact-card-title">Email</h3>
                                        <p class="contact-card-text">ajsatogo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="contact-card-content">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-clock contact-icon purple"></i>
                                    </div>
                                    <div>
                                        <h3 class="contact-card-title">Horaires</h3>
                                        <p class="contact-card-text">Lundi - Vendredi<br>8h00 - 17h00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map placeholder -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">📍 Notre localisation</h3>
                        </div>
                        <div class="card-body">
                            <div class="map-placeholder">
                                <div class="map-content">
                                    <i class="fas fa-map-marker-alt map-icon"></i>
                                    <p>Carte interactive</p>
                                    <p class="map-subtitle">Lomé, quartier Djidjolé, Togo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-section">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">✉️ Envoyez-nous un message</h2>
                            <p class="form-description">Remplissez ce formulaire et nous vous répondrons rapidement</p>
                        </div>
                        <div class="card-body">
                            <form id="contact-form" class="contact-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="nom">Nom complet *</label>
                                        <input class="form-input" type="text" id="nom" name="nom" required placeholder="Votre nom">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email *</label>
                                        <input class="form-input" type="email" id="email" name="email" required placeholder="votre@email.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="sujet">Sujet *</label>
                                    <select class="form-select" id="sujet" name="sujet" required>
                                        <option value="">Choisissez le sujet de votre message</option>
                                        <option value="information">Demande d'information générale</option>
                                        <option value="partenariat">Proposition de partenariat</option>
                                        <option value="benevolat">Candidature bénévolat</option>
                                        <option value="projet">Proposition de projet</option>
                                        <option value="stage">Demande de stage</option>
                                        <option value="presse">Presse et médias</option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="message">Message *</label>
                                    <textarea class="form-textarea" id="message" name="message" required placeholder="Décrivez votre demande en détail..." rows="6"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary form-submit-btn">
                                    <i class="fas fa-paper-plane"></i> Envoyer le message
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Quick Contact -->
                    <div class="card quick-contact-card">
                        <div class="card-header">
                            <h3 class="card-title quick-contact-title">🚀 Contact rapide</h3>
                        </div>
                        <div class="card-body">
                            <p class="quick-contact-text">
                                Pour une réponse plus rapide, vous pouvez aussi nous contacter directement :
                            </p>
                            <div class="quick-contact-items">
                                <div class="quick-contact-item">
                                    <i class="fas fa-phone quick-contact-icon"></i>
                                    <span>WhatsApp : +228 92 71 46 51</span>
                                </div>
                                <div class="quick-contact-item">
                                    <i class="fas fa-envelope quick-contact-icon"></i>
                                    <span>Email : ajsatogo@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Gestion du formulaire de contact
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulation d'envoi
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';

            setTimeout(() => {
                alert('Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
                this.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 2000);
        });
    </script>
@endsection
@section('styles')

    <style>
        /* Styles spécifiques à la page contact */
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: start;
        }

        .contact-section-title {
            font-size: 2rem;
            margin-bottom: 32px;
            color: #1f2937;
        }

        .contact-cards {
            display: grid;
            gap: 24px;
            margin-bottom: 32px;
        }

        .contact-card-content {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .contact-icon-wrapper {
            width: 48px;
            height: 48px;
            background: #f3f4f6;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-icon {
            font-size: 24px;
        }

        .contact-icon.green { color: #16a34a; }
        .contact-icon.blue { color: #2563eb; }
        .contact-icon.orange { color: #f97316; }
        .contact-icon.purple { color: #8b5cf6; }

        .contact-card-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .contact-card-text {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
        }

        .map-placeholder {
            width: 100%;
            height: 250px;
            background: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .map-content {
            text-align: center;
            color: #6b7280;
        }

        .map-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .map-subtitle {
            font-size: 14px;
        }

        .form-description {
            color: #6b7280;
            margin-top: 8px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-submit-btn {
            width: 100%;
            height: 48px;
        }

        .quick-contact-card {
            margin-top: 24px;
            background: #fff7ed;
        }

        .quick-contact-title {
            color: #ea580c;
        }

        .quick-contact-text {
            color: #4b5563;
            margin-bottom: 16px;
        }

        .quick-contact-items {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .quick-contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quick-contact-icon {
            color: #ea580c;
            width: 16px;
        }

        .quick-contact-item span {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .contact-layout {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
