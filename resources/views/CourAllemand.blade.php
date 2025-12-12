@extends('Layouts.Main')

@section("title","Cours d'Allemand")

@section('meta')
    <meta name="description" content="Cours d'Allemand en ligne et en présentiel pour tous les niveaux : A1, A2, B1, B2, C1. Méthodes interactives, enseignants certifiés, préparation Telc, Goethe, ECL et ÖSD. Flexibilité totale et accompagnement professionnel.">
    <meta name="keywords" content="cours allemand, apprendre allemand, allemand en ligne, cours présentiel allemand, niveaux A1 A2 B1 B2 C1, Telc, Goethe, ÖSD, ECL, cours d'allemand Algerie, MOAY Academy">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="Cours d'Allemand en Ligne et Présentiel – MOAY Academy">
    <meta property="og:description" content="Apprenez l'allemand avec des cours modernes, interactifs et adaptés à votre rythme. Tous niveaux, enseignement professionnel.">
    <meta property="og:image" content="{{ asset('online1.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter -->
    <meta name="twitter:title" content="Cours d'Allemand – En Ligne & Présentiel | MOAY Academy">
    <meta name="twitter:description" content="Cours flexibles, enseignants certifiés, niveaux A1 à C1, préparation aux examens officiels.">
    <meta name="twitter:image" content="{{ asset('online2.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection


@section('content')

  

    <!-- Section Hero -->
    <section class="pt-24 pb-20 bg-gradient-to-r from-primary to-accent text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Cours d'Allemand en Ligne</h1>
                <p class="text-xl text-gray-100 mb-2">Flexibilité totale pour votre apprentissage</p>
                <p class="text-lg text-gray-200 max-w-2xl mx-auto">Apprenez l'allemand depuis chez vous avec nos cours en ligne interactifs. Profitez d'une flexibilité totale tout en bénéficiant d'un encadrement professionnel.</p>
            </div>
        </div>
    </section>

    <section id="cours-allemand" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
    
                <!-- Titre Section -->
                <div class="text-center mb-16 slide-in-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">
                        Cours d’Allemand – Adaptés à Votre Rythme
                    </h2>
                    <p class="text-xl text-accent font-medium mb-2">
                        Avancez vers votre objectif d’étudier ou travailler en Allemagne
                    </p>
                    <p class="text-lg text-secondary max-w-2xl mx-auto">
                        Nos cours d’allemand sont conçus pour vous aider à maîtriser la langue rapidement, avec des méthodes modernes et interactives.
                    </p>
                </div>
    
                <!-- Bloc Présentiel -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in-right mb-12">
                    <div class="md:flex">
                        <div class="md:w-1/2 bg-cover bg-center"
                             style="background-image: url('online1.jpg'); min-height: 300px;"></div>
    
                        <div class="md:w-1/2 p-8">
                            <h3 class="text-2xl font-bold text-primary mb-4">Cours Présentiels</h3>
    
                            <ul class="text-secondary space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Apprentissage intensif en groupe</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Encadrement direct des enseignants</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Ateliers de conversation</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Exercices pratiques adaptés à votre niveau</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    Apprentissage intensif en groupe
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    Accompagnement direct par des enseignants qualifiés
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    Ateliers de conversation interactifs
                                </li>

                                <li>
                                  <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    Exercices pratiques adaptés à votre niveau
                                </li>
                                <li>
                                 <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    Préparation officielle aux examens : Telc, Goethe, ECL et ÖSD
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <!-- Bloc En Ligne -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in-left">
                    <div class="md:flex">
                        <div class="md:w-1/2 bg-cover bg-center"
                             style="background-image: url('online2.jpg'); min-height: 300px;"></div>
    
                        <div class="md:w-1/2 p-8">
                            <h3 class="text-2xl font-bold text-primary mb-4">Cours en Ligne</h3>
    
                            <ul class="text-secondary space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Cours en visioconférence avec enseignants certifiés</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Support numériques disponibles 24h/24</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Enregistrements, exercices interactifs et tests réguliers</span>
                                </li>
    
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                                    <span>Flexibilité totale pour les personnes actives</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <!-- Niveaux disponibles -->
                <div class="text-center mt-12 slide-in-right">
                    <h4 class="text-2xl font-bold text-primary">Niveaux disponibles : A1, A2, B1, B2, C1</h4>
                    <p class="text-secondary mt-2">
                        (Niveaux requis pour les formations en soins infirmiers ou emplois en Allemagne : B1/B2)
                    </p>
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