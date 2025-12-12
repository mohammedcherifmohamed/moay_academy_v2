
@extends("Layouts.Main")


@section("title","Formation en Soins Infirmiers en Allemagne")

@section('meta')
    <meta name="description" content="Rejoignez une formation en soins infirmiers en Allemagne (Pflegefachfrau/Pflegefachmann). Accompagnement complet : écoles partenaires, préparation linguistique B1/B2, entretiens, visa, dossier, et arrivée en Allemagne.">
    <meta name="keywords" content="formation soins infirmiers Allemagne, infirmier Allemagne, Pflegefachfrau, Pflegefachmann, étudier en Allemagne, formation Allemagne, visa formation Allemagne, MOAY Academy">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Formation en Soins Infirmiers en Allemagne – MOAY Academy">
    <meta property="og:description" content="Intégrez une formation complète en soins infirmiers en Allemagne. Nous vous accompagnons du niveau linguistique jusqu’à l’arrivée dans votre établissement.">
    <meta property="og:image" content="{{ asset('doctor.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:title" content="Formation en Soins Infirmiers en Allemagne – MOAY Academy">
    <meta name="twitter:description" content="Accompagnement complet pour rejoindre une formation en soins infirmiers en Allemagne.">
    <meta name="twitter:image" content="{{ asset('doctor.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection


@section("content")

    <section class="pt-24 pb-20 bg-gradient-to-r from-primary to-accent text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Formation en Soins Infirmiers en Allemagne</h1>
                <p class="text-xl text-gray-100 mb-2">Réalisez votre rêve de devenir infirmier en Allemagne</p>
                <p class="text-lg text-gray-200 max-w-2xl mx-auto">Nous accompagnons les personnes souhaitant rejoindre une formation en soins infirmiers (Pflegefachfrau/Pflegefachmann) dans les hôpitaux ou centres de soins en Allemagne.</p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in-right">
                    <div class="md:flex">
                        <div class="md:w-1/2 bg-cover bg-center" style="background-image: url('doctor.jpg'); min-height: 400px;"></div>
                        <div class="md:w-1/2 p-8">
                            <h2 class="text-2xl font-bold text-primary mb-4">Nos services comprennent :</h2>
                            <ul class="text-secondary space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Orientation vers des écoles et centres de formation partenaires en Allemagne</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Préparation linguistique jusqu'au niveau requis (B1/B2)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Préparation aux entretiens en allemand</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Aide au montage de dossier</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Assistance pour le visa et les démarches administratives</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Suivi jusqu'à votre arrivée en Allemagne</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg slide-in-left">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-graduation-cap text-accent mr-2"></i>
                            Formation Complète
                        </h3>
                        <p class="text-secondary">
                            La formation en soins infirmiers en Allemagne dure généralement 3 ans et combine théorie et pratique dans des établissements de santé partenaires.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg slide-in-right">
                        <h3 class="text-xl font-bold text-primary mb-4">
                            <i class="fas fa-language text-accent mr-2"></i>
                            Prérequis Linguistiques
                        </h3>
                        <p class="text-secondary">
                            Un niveau B1/B2 en allemand est généralement requis. Nous vous accompagnons pour atteindre ce niveau avec nos cours spécialisés.
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
            // Animation au défilement
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
            
            // Menu mobile
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

