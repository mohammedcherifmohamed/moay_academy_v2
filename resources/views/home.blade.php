
@extends('Layouts.Main')

@section('title','Home Page')

@section('meta')
    <meta name="description" content="MOAY Academy: École spécialisée en langue allemande, formation en soins infirmiers en Allemagne, équivalence de diplômes et accompagnement professionnel.">
    <meta name="keywords" content="apprendre allemand, cours allemand, formation soins Allemagne, travail en Allemagne, MOAY Academy">
    <meta name="author" content="MOAY Academy">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="MOAY Academy - Votre passerelle vers l'Allemagne">
    <meta property="og:description" content="Cours d’allemand, orientation, formation en soins infirmiers et recherche d’emploi en Allemagne.">
    <meta property="og:image" content="{{ asset('home2.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:title" content="MOAY Academy - Votre passerelle vers l'Allemagne">
    <meta name="twitter:description" content="Cours d’allemand, formation en soins, équivalence de diplômes et accompagnement complet.">
    <meta name="twitter:image" content="{{ asset('home2.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection


@section('content')

        <section id="accueil" class="slider-container">
        <!-- Slide 1 -->
        <div class="slider-slide active" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('home2.jpg') }}');">
            <div class="container mx-auto h-full flex items-center px-4 py-8">
                <div class="text-white max-w-2xl fade-in">
                    <h1 class="text-xl sm:text-2xl md:text-4xl font-bold leading-tight mb-4">
                        Bienvenue à <span class="text-primary">Moay</span> <span class="text-accent">Academy</span> - Votre passerelle vers l'Allemagne
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8">
                    Moay Academy est une école de langue allemande spécialisée dans l'apprentissage de l'allemand et l'accompagnement des personnes souhaitant étudier ou travailler en Allemagne. Que vous choisissiez des cours en présentiel ou en ligne, nos programmes sont conçus pour vous permettre de progresser rapidement et sereinement. Nous offrons également un service complet d'orientation pour les personnes souhaitant suivre une formation en soins infirmiers en Allemagne ou démarrer une carrière professionnelle dans différents secteurs en Allemagne.                    </p>
                    <a href="#apropos" class="bg-accent text-white px-4 py-2 md:px-6 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-primary transition-colors inline-block">
                        Découvrir notre établissement
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Slide 2 -->
        <div class="slider-slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('home1.jpg') }}');">
            <div class="container mx-auto h-full flex items-center px-4 py-8">
                <div class="text-white max-w-2xl fade-in">
                    <h1 class="text-xl sm:text-2xl md:text-4xl font-bold leading-tight mb-4">
                        Bienvenue à <span class="text-primary">Moay</span> <span class="text-accent">Academy</span> - Votre passerelle vers l'Allemagne
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8">
                    Moay Academy est une école de langue allemande spécialisée dans l'apprentissage de l'allemand et l'accompagnement des personnes souhaitant étudier ou travailler en Allemagne. Que vous choisissiez des cours en présentiel ou en ligne, nos programmes sont conçus pour vous permettre de progresser rapidement et sereinement. Nous offrons également un service complet d'orientation pour les personnes souhaitant suivre une formation en soins infirmiers en Allemagne ou démarrer une carrière professionnelle dans différents secteurs en Allemagne.                    </p>
                    <a href="#apropos" class="bg-accent text-white px-4 py-2 md:px-6 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-primary transition-colors inline-block">
                        Découvrir notre établissement
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Contrôles du slider -->
        <div class="slider-controls absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50 active:opacity-100" data-slide="0"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50 active:opacity-100" data-slide="1"></button>
        </div>
    </section>

    <section id="apropos" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">

            <div class="max-w-3xl mx-auto text-center mb-16 slide-in-left">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">À propos de notre établissement</h2>
                <p class="text-lg text-secondary">Une école moderne tournée vers votre avenir</p>

                <p class="text-lg text-secondary mt-4">
                    Moay Academy combine enseignement linguistique, accompagnement administratif et orientation professionnelle.
                    Notre mission est de vous accompagner du niveau débutant jusqu'à un niveau avancé (A1 à C1), tout en vous aidant à réaliser vos projets en Allemagne :
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">

                <div class="bg-white p-6 rounded-lg shadow-md slide-in-left">
                    <div class="text-accent text-4xl mb-4">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Formation en soins infirmiers</h3>
                    <p class="text-secondary">
                        Un accompagnement complet pour rejoindre une formation en soins infirmiers en Allemagne.
                    </p>
                    <a href="{{route('FormationEnSoins')}}" class="text-accent hover:text-primary mt-4 inline-block">En savoir plus →</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md slide-in-left" style="animation-delay: .15s;">
                    <div class="text-accent text-4xl mb-4">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Équivalence de diplômes</h3>
                    <p class="text-secondary">
                        Assistance pour la reconnaissance de vos diplômes auprès des autorités allemandes.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md slide-in-left" style="animation-delay: .30s;">
                    <div class="text-accent text-4xl mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Recherche d'emploi</h3>
                    <p class="text-secondary">
                        Nous vous aidons à trouver un emploi adapté à votre profil en Allemagne.
                    </p>
                    <a href="{{route('CourAllemand')}}" class="text-accent hover:text-primary mt-4 inline-block">En savoir plus →</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md slide-in-left md:col-span-3" style="animation-delay: .45s;">
                    <div class="text-accent text-4xl mb-4">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Installation en Allemagne</h3>
                    <p class="text-secondary">
                        Un accompagnement personnalisé pour faciliter votre installation et votre nouvelle vie sur place.
                    </p>
                </div>

            </div>

        </div>
    </section>



    <script>
        document.addEventListener("DOMContentLoaded", () => {
        console.log("loaded");
        const formationSelectFooter = document.getElementById("formationSelectFooter");
        const allemandLevelsFooter = document.getElementById("allemandLevelsFooter");
        const otherFormationsFooter = document.getElementById("otherFormationsFooter");

        formationSelectFooter.addEventListener("change", () => {
            if (formationSelectFooter.value === "allemand") {
                allemandLevelsFooter.classList.remove("hidden");
                otherFormationsFooter.classList.add("hidden");
            } else if (formationSelectFooter.value !== "") {
                allemandLevelsFooter.classList.add("hidden");
                otherFormationsFooter.classList.remove("hidden");
            } else {
                allemandLevelsFooter.classList.add("hidden");
                otherFormationsFooter.classList.add("hidden");
            }
        });
                const slides = document.querySelectorAll('.slider-slide');
                const dots = document.querySelectorAll('.slider-dot');
                let currentSlide = 0;
                const slideInterval = 5000; 
                
                function showSlide(n) {
                    slides.forEach(slide => {
                        slide.classList.remove('active');
                    });
                    
                    dots.forEach(dot => {
                        dot.classList.remove('active');
                    });
                    
                    currentSlide = (n + slides.length) % slides.length;
                    slides[currentSlide].classList.add('active');
                    dots[currentSlide].classList.add('active');
                }
                
                function nextSlide() {
                    showSlide(currentSlide + 1);
                }
                
                let slideTimer = setInterval(nextSlide, slideInterval);
                
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        clearInterval(slideTimer);
                        showSlide(index);
                        slideTimer = setInterval(nextSlide, slideInterval);
                    });
                });
                
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

