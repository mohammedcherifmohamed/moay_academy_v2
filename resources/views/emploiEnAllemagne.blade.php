@extends("Layouts.Main")

@section("title","Trouvez un emploi en Allemagne")

@section('meta')
    <meta name="description" content="Trouvez un emploi en Allemagne avec un accompagnement personnalisé : CV allemand, préparation aux entretiens, mise en relation avec des employeurs, démarches administratives, visa, et signature du contrat.">
    <meta name="keywords" content="emploi en Allemagne, travailler en Allemagne, job Allemagne, visa travail Allemagne, CV allemand, entretien d'embauche allemand, reconnaissance diplômes Allemagne, MOAY Academy">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Trouvez un emploi en Allemagne – MOAY Academy">
    <meta property="og:description" content="Accompagnement complet pour trouver un emploi en Allemagne. CV, entretiens, partenaires en Allemagne, démarches administratives, et suivi personnalisé.">
    <meta property="og:image" content="{{ asset('emploi.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Trouvez un emploi en Allemagne – MOAY Academy">
    <meta name="twitter:description" content="Accompagnement professionnel pour réussir votre projet en Allemagne.">
    <meta name="twitter:image" content="{{ asset('emploi.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection


@section("content")
    <section class="pt-24 pb-20 bg-gradient-to-r from-primary to-accent text-white" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('emploi.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Trouvez un emploi en Allemagne</h1>
                <p class="text-xl text-gray-100 mb-2">Accompagnement personnalisé pour votre projet professionnel</p>
                <p class="text-lg text-gray-200 max-w-2xl mx-auto">Nous vous aidons à réaliser votre projet professionnel en Allemagne avec un accompagnement personnalisé à chaque étape.</p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in-left">
                    <div class="md:flex flex-row-reverse">
                        <div  class="md:w-1/2 bg-cover bg-center" style="background-image: url('study2.jpg'); min-height: 400px;"></div>
                        <div class="md:w-1/2 p-8">
                            <h2 class="text-2xl font-bold text-primary mb-4">Notre accompagnement comprend :</h2>
                            <ul class="text-secondary space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Analyse de votre profil et de vos compétences</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Traduction et adaptation du CV selon les normes allemandes</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Mise en relation avec nos partenaires en Allemagne</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Préparation aux entretiens en allemand</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Aide pour le visa et les documents nécessaires</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Suivi jusqu'à la signature du contrat</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg slide-in-left">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-file-alt text-accent mr-2"></i>
                            CV et Lettre de Motivation
                        </h3>
                        <p class="text-secondary">
                            Nous vous aidons à créer un CV et une lettre de motivation conformes aux standards allemands, mettant en valeur vos compétences et votre expérience.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg slide-in-right">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-handshake text-accent mr-2"></i>
                            Réseau de Partenaires
                        </h3>
                        <p class="text-secondary">
                            Grâce à notre réseau étendu de partenaires en Allemagne, nous vous mettons en relation avec des employeurs de confiance dans divers secteurs.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg slide-in-left">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-comments text-accent mr-2"></i>
                            Préparation aux Entretiens
                        </h3>
                        <p class="text-secondary">
                            Nous vous préparons aux entretiens d'embauche en allemand avec des simulations et des conseils personnalisés pour maximiser vos chances de succès.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg slide-in-right">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-passport text-accent mr-2"></i>
                            Démarches Administratives
                        </h3>
                        <p class="text-secondary">
                            Nous vous accompagnons dans toutes les démarches administratives : visa, permis de travail, reconnaissance de diplômes, et bien plus encore.
                        </p>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <a href="#contact" class="bg-accent text-white px-8 py-3 rounded-lg font-medium hover:bg-primary transition-colors inline-block">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.slide-in-left, .slide-in-right').forEach(el => {
                observer.observe(el);
            });
            
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileCoursBtn = document.getElementById('mobile-cours-btn');
            const mobileCoursMenu = document.getElementById('mobile-cours-menu');
            
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            
            mobileCoursBtn.addEventListener('click', () => {
                mobileCoursMenu.classList.toggle('hidden');
                const icon = mobileCoursBtn.querySelector('i');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
            
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileCoursMenu.classList.add('hidden');
                });
            });
        });
    </script>

@endsection

