@include("header")
        
        <main id="main_compte">
            <article id="article_compte">
                <h1 class="titre_page">Mon compte</h1>
                <section id="section_compte" class="border-raduis">
                    <button id="key-admin"><i class="fas fa-key"></i></button>
                    <button id="download-all-pic"><i class="fas fa-file-download"></i></button>

                    <form>
                        <label id="first-label-compte"> Nom actuel: Tillet   </label><input type="text" placeholder="Nouveau nom"  class="border-raduis input-account"><br><br>
                        <label> Prenom actuel: Yoann   </label><input type="text" placeholder="Nouveau prenom"  class="border-raduis input-account"><br><br>
                        <label for="pays">Centre CESI actuel: PAU   </label>
                        <select name="pays" id="pays" class="border-raduis">
                            <option value="Aix-en-Provence">Aix-en-Provence</option>
                            <option value="Angoulême">Angoulême</option>
                            <option value="Arras">Arras</option>
                            <option value="Bordeaux">Bordeaux</option>
                            <option value="Brest">Brest</option>
                            <option value="Caen">Caen</option>
                            <option value="Dijon">Dijon</option>
                            <option value="Grenoble">Grenoble</option>
                            <option value="La Rochelle">La Rochelle</option>
                            <option value="Le mans">Le mans</option>
                            <option value="Lille">Lille</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Montpellier">Montpellier</option>
                            <option value="Nancy">Nancy</option>
                            <option value="Nantes">Nantes</option>
                            <option value="Nice">Nice</option>
                            <option value="Orléans">Orléans</option>
                            <option value="Paris Nanterre">Paris Nanterre</option>
                            <option value="Pau">Pau</option>
                            <option value="Reims">Reims</option>
                            <option value="Rouen">Rouen</option>
                            <option value="Saint-Nazaire">Saint-Nazaire</option>
                            <option value="Strasbourg">Strasbourg</option>
                            <option value="Toulouse">Toulouse</option>

                        </select><br><br>
                        <label> Adresse mail actuel: yoann.tillet@viacesi.fr   </label><input type="text" placeholder="Nouvelle adresse"  class="border-raduis input-account"><br><br>
                        <label> Changer de mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis input-account"><br><br>
                        <label> Retaper le nouveau mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis input-account"><br><br>
                        <input id="valider-les-modifications" type="button" value="Valider les modifications">
                    </form>
                   <div><br></div>
                </section>
            </article>
        </main>
</body>
</html>