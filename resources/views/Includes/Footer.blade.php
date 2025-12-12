<footer id="contact" class="bg-fot text-white py-16"> 
    <div class="container mx-auto px-4"> 
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12"> 

            <div> 
                <h3 class="text-2xl font-bold mb-4">Moay <span class="text-accent">Academy</span></h3> 
                <p class="text-gray-300 mb-4"> 
                    Formation d'excellence pour les professionnels de demain. 
                </p> 

                <div class="flex space-x-4 mt-4"> 
                    <a href="https://www.facebook.com/share/1Aq3Ty56zn/" target="blank" class="text-gray-300 hover:text-white transition-colors"> 
                        <i class="fab fa-facebook-f"></i> 
                    </a> 
                   
                </div> 
            </div> 

            <div> 
                <h4 class="text-xl font-bold mb-4">Contact</h4> 

                <div class="space-y-3 text-gray-300"> 
                    <p class="flex items-start"> 
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-accent"></i> 
                        <span>Rue Boushaba Kaddour, Oran, Algérie</span> 
                    </p> 

                    <p class="flex items-start"> 
                        <i class="fas fa-phone mt-1 mr-3 text-accent"></i> 
                        <span>(+213)-556249871</span> 
                    </p> 

                    <p class="flex items-start"> 
                        <i class="fas fa-envelope mt-1 mr-3 text-accent"></i> 
                        <span>contact@moay-academy.com</span> 
                    </p> 
                </div> 
            </div> 

            <div class="bg-gray-5 p-6" >
                <h4 class="text-xl font-bold mb-4">Formulaire d'inscription</h4>

                <form id="footerForm" class="space-y-4" action="{{ route('submitMessage') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <input value="{{old("nom")}}" type="text" placeholder="Nom" name="nom" class="w-full px-3 py-2 rounded bg-white text-gray-800" required>
                        <input value="{{old("prenom")}}" type="text" placeholder="Prénom" name="prenom" class="w-full px-3 py-2 rounded bg-white text-gray-800" required>
                    </div>

                    <input type="date" value="{{old("date_of_birth")}}"  name="date_of_birth" placeholder="Date de naissance"
                        class="w-full px-3 py-2 rounded bg-white text-gray-800" required>



                    <select id="formationSelectFooter" name="formation"
                        class="w-full px-3 py-2 rounded bg-white text-gray-800 cursor-pointer" required>
                        <option value="">Intéressé par : </option>
                      
                        <option value="Aide_immigration_en_Allemagne">Aide a l'immigration en Allemagne</option>
                        <option value="Cours_de_langue_Allemand">Cours de Langue Allemand </option>
                        
                    </select>
                    <input id="language_level" type="text" name="language_level" placeholder="Niveau de langue EX: A1, A2, B1, B2"
                        class="w-full px-3 py-2 rounded bg-white text-gray-800" >
                   

                    <input type="text" value="{{old("phone_number")}}" name="phone_number" placeholder="Numéro de téléphone"
                        class="w-full px-3 py-2 rounded bg-white text-gray-800" required>

                    <input type="email" name="email" placeholder="Email" value="{{old("email")}}"
                        class="w-full px-3 py-2 rounded bg-white text-gray-800" required>

                         <textarea  name="message" placeholder="Votre message" 
                            class="w-full px-3 py-2 rounded bg-white text-gray-800" >{{old("message")}}</textarea>

                    <button type="submit"
                        class="w-full bg-accent text-white py-3 rounded-lg font-medium hover:bg-white hover:text-primary transition">
                        Envoyer
                    </button>

                </form>
            </div>

        </div>
      
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('language_level').addEventListener('input', function () {
    if (this.value.length > 2) {
        this.value = this.value.slice(0, 2);
    }
});
});
</script>


