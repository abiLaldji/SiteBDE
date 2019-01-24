<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon compte</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
        <header id="header">
                <div id="logo-cesi">
                    <a href="index.html"><img src="assets/style/image/cesi-logob.png"></a>
                </div>
                <div id="header-right">
        
                    <h1 id="titre">SITE BDE DU CESI PAU</h1>
                    <a href="mon_compte.html">mon compte</a>
                    <a id="logo-cart" href="cart.html"><img src="assets/style/image/cart.png"><p id="panier">panier</p></a>
                </div>
        </header>
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                       <li><a href="#">boutique</a></li>  
                       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">T-shirt</a></li>
                              <li><a href="#">Pull</a></li>
                              <li><a href="#">Goodies</a></li>
                          </ul>
                       </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Evenements <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">A venir</a></li>
                              <li><a href="#">Historique</a></li>
                          </ul>
                       </li>
                      <li><a href="#">Boite à idées</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
        </nav>
        <main id="main_compte">
            <article id="article_compte">
                <h1 class="titre_page">Mon compte</h1>
                <section id="section_compte" class="border-raduis">
                    <label id="first-label-compte"> Nom actuel: Tillet   </label><input type="text" placeholder="Nouveau nom"  class="border-raduis"><br><br>
                    <label> Prenom actuel: Yoann   </label><input type="text" placeholder="Nouveau prenom"  class="border-raduis"><br><br>
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
                    <label> Adresse mail actuel: yoann.tillet@viacesi.fr   </label><input type="text" placeholder="Nouvelle adresse"  class="border-raduis"><br><br>
                    <label> Changer de mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis"><br><br>
                    <label> Retaper le nouveau mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis"><br><br>
                    <input id="valider-les-modifications" type="button" value="Valider les modifications">
                </section>
            </article>
        </main>
</body>
</html>