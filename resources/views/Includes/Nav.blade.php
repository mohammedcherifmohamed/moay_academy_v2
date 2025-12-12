
@if ($errors->any())
    <div class="fixed top-0 left-0 w-full z-[9999] px-4 py-3">
        <div class="max-w-xl mx-auto bg-red-600 text-white font-medium p-4 rounded-lg shadow-lg flex justify-between items-center">
            <div>
                <strong class="block text-lg">Erreurs détectées :</strong>
                <ul class="list-disc ml-5 text-sm mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white">
                ✖
            </button>
        </div>
    </div>
@endif
<nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50 transition-all duration-300 ">
        <div class="container max-w-screen-xl mx-auto w-full px-4 py-3 flex justify-between items-center">
            <a href="{{route("home")}}" class="flex items-center space-x-2">
                <img src="logo.jpg" alt="logpo" class="h-10 w-auto sm:block hidden lg:block">
                <span class="text-2xl font-bold text-primary">
                    Moay <span class="text-accent">Academy</span>
                </span>
            </a>

            
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{route("home")}}" class="text-secondary hover:text-accent transition-colors  font-semibold">Accueil</a>
                <a href="{{route("home")."#apropos"}}" class="text-secondary hover:text-accent transition-colors  font-semibold">À propos</a>
                <div class="dropdown">
                    <a href="#" class="text-secondary hover:text-accent transition-colors flex items-center font-semibold">
                        Formation <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{route("CourAllemand")}}">Cours Allemagne</a>
                        <a href="{{route("FormationEnSoins")}}" class="text-secondary font-semibold  font-semibold">Formation Infirmiers</a>
                    </div>
                </div>
                <a href="{{route("emploiEnAllemagne")}}" class="text-secondary hover:text-accent transition-colors font-semibold ">Emploi en Allemagne</a>
                <a href="#contact" class="text-secondary hover:text-accent transition-colors font-semibold">Contact</a>
            </div>
            
            <div class="flex space-x-4">
                <button id="mobile-menu-btn" class="md:hidden text-secondary">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Menu mobile -->
        <div id="mobile-menu" class="md:hidden bg-white shadow-lg hidden">
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
                <a href="{{route("home")}}" class="text-secondary hover:text-accent transition-colors font-semibold">Accueil</a>
                <a href="{{route("home")."#apropos"}}" class="text-secondary hover:text-accent transition-colors font-semibold">À propos</a>
                <div class="border-t pt-2">
                    <button id="mobile-cours-btn" class="text-secondary hover:text-accent transition-colors flex items-center justify-between w-full">
                        <span class="font-semibold">Formations</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div id="mobile-cours-menu" class="hidden pl-4 mt-2 space-y-2">
                        <a href="{{route("CourAllemand")}}" class="text-secondary hover:text-accent transition-colors block font-semibold">Cours Présentiels</a>
                        <a href="{{route("FormationEnSoins")}}" class="text-secondary font-semibold">Formation Infirmiers</a>
                    </div>
                </div>
                <a href="{{route("emploiEnAllemagne")}}" class="text-secondary hover:text-accent transition-colors font-semibold">Emploi en Allemagne</a>
                <a href="{{route("home")."#contact"}}" class="text-secondary hover:text-accent transition-colors font-semibold">Contact</a>
            </div>
        </div>
    </nav>


