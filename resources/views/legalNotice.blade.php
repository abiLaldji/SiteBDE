<!DOCTYPE html>
<html>
<head>

	<title>Mentions légales</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./fontawesome/css/all.min.css">

</head>

<body>

	<header id="header">
        <div id="logo-cesi">
            <img src="./pictures/logoCesi.png">
        </div>

        <div id="header-right">

            <h1 id="titre">SITE BDE DU CESI PAU</h1>
            <a id="logo-cart" href="cart"><i class="fas fa-shopping-cart"></i></a>
            <a id="logo-profile" href="myprofile"><i class="fas fa-user"></i></a>
        </div>
	</header>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">

      <li class="active"><a href="/"><i class="fas fa-home ycolor"></i><span class="navtext"> ACCUEIL</span></a></li>

      <li><a href="#" class="categories"><span class="navtext">BOUTIQUE</span></a></li>
      
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pull</a></li>
                <li><a href="#">Goodies</a></li>
            </ul>
      
         </li>

         <li><a href="events" class="categories"><span class="navtext">ÉVÈNEMENTS</span></a></li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">A venir</a></li>
                <li><a href="pastEvents">Historique</a></li>
            </ul>
         </li>

        <li><a href="ideaBox" class="categories"><span class="navtext">BOITE À IDÉES</span></a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
    @if (isset($_SESSION['firstName']))
        <li><a href="#"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> {{$_SESSION['firstName']}} {{$_SESSION['lastName']}}</span></a></li>
        <li><a href="deconnexion"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> DECONNEXION</span></a></li>
    @else
        <li><a href="signUp"><span class="glyphicon glyphicon-user ycolor"></span><span  class="navtext"> INSCRIPTION</span></a></li>
        <li><a href="signIn"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> CONNEXION</span></a></li>
    @endif
    </ul>


  </div>
</nav>

	<main>

		<article class="ln-article-center">

			<div class="ln-header">
				<h2 class="h2white ln-h2">Mentions légales</h2>
			</div>

			<div class="ln-ystripe"><br/></div>

			<div class="ln-corp">

				<h3 class="h3-ln">Éditeur : BDE CESI PAU</h3>

				<div>

					<p>Siège social : 8 Rue des Frères Charles et Alcide d' Orbigny, 64000 Pau</p>
					<p>Tél : 0600000000</p>
					<p>e-mail : <a href="mailto:bde.pau@cesi.fr">bde.pau@cesi.fr</a></p>

				</div>


				<h3 class="h3-ln">Respect de la vie privée et collecte des Données Personnelles</h3>

				<div>

					<p>Soucieux de protéger la vie privée de ses clients, CESI s’engage dans la protection des données personnelles. Une politique sur la protection des données personnelles rappelle nos principes et nos actions visant au respect de la réglementation applicable en matière de protection des données à caractère personnel.</p>

					<p><a href="privacyPolicy">Pour lire l’intégralité de notre politique sur la Protection des données personnelles cliquez-ici</a></p>

				</div>


				<h3 class="h3-ln">Sécurité</h3>

				<div class="ln-p">

					<p>Le BDE du CESI de Pau s’engage à mettre en œuvre tous les moyens nécessaires au bon fonctionnement du site. Cependant, le CESI ne peut pas garantir la continuité absolue de l’accès aux services proposés par le site. Les adhérents sont informés que les informations et services proposés sur le site pourront être interrompus en cas de force majeure et pourront le cas échéant contenir des erreurs techniques.</p>

				</div>


				<h3 class="h3-ln">Utilisation des cookies</h3>

				<div>
					<p>	
						Nous utilisons des cookies sur notre Site pour simplifier et accélérer votre naviguation.
						<p><a href="privacyPolicy">Pour plus d’informations, vous pouvez vous référer à la Politique sur le Protection des Données Personnelles en cliquant-ici</a></p>
						Vous aurez la possiblité de sélectionner si vous souhaitez ou non l'utilisations des cookies.
						Les cookies permettent de se souvenir de vos informations personelles telles que vos identifiant et mot de passe afin de ne pas avoir à les rentrer à chaque connexion si vous cochez la case "se souvenir de moi" lors de votre connexion.
						De plus les cookies nous permettront si vous le souhaitez de sauvegarder votre panier si vous vous déconnecté en y ayant ajouter des éléments.
					</p>

					<p>
						<span class="bold">Définition de « cookie » et son utilisation :</span> Un « cookie » est un fichier texte déposé sur votre ordinateur lors de la visite de notre plateforme. Dans votre ordinateur, les cookies sont gérés par votre navigateur internet.
					</p>

					<p>
						Sur nôtre site nous utilisons des cookies "permanents" ou "traceurs" : ce type de cookie reste dans le fichier de cookies de votre navigateur pendant une période plus longue, qui dépend des paramètres de votre navigateur web. Les cookies permanents sont également appelés cookies traceurs.
					</p>

				</div>

				<h3 class="h3-ln">Données personnelles</h3>

				<div>
					Notre site récupère simplement certaines données personnelles de base lors de votre inscription tel que vos identifiants, mot de passe et le nom du centre CESI auquel vous êtes référé afin de sécuriser la connexion à votre compte, nous vous demandons également votre adresse mail afin de vérifier que vous appartenez bien à l'un des centre CESI ainsi que pour vous informez que vos commandes ont bien été envoyées.
					
				</div>

				<h3 class="h3-ln">Déclarations d'activité</h3>

				<div>

				</div>
					CESI SAS – Société par actions simplifiée au capital de 1.1M€<br>
					342 707 502<br>
					30 rue Cambronne – F-75015 Paris<br>
					tél. : +33(0) 1 44 19 23 45 – fax : +33(0) 1 42 50 25 06<br>
					Déclaration d’activité enregistrée sous le numéro 11 75 39666 75 auprès du Préfet de la région Ile-de-France.<br>
					Cet enregistrement ne vaut pas agrément de l’État.<br>
					<br>
					CESI – association loi de 1901<br>
					775 722 572<br>
					30 rue Cambronne – F-75015 Paris<br>
					tél. : +33(0) 1 44 13 23 45 – fax : +33(0) 1 42 50 25 06<br>
					Déclaration d’activité enregistrée sous le numéro 11 75 47883 75 auprès du Préfet de la région Ile-de-France.<br>
					Cet enregistrement ne vaut pas agrément de l’État.<br>
				</div>

			</div>

		</article>

	</main>

<footer> 

      <div class="footer-ln">
        <div>
          <p><a href="legalNotice" class="navtext">Mentions légales</a></p>
        </div>
        <div class="f-center">
          <p><a href="privacyPolicy" class="navtext">Politique de confidentialité</a></p>
        </div>
        <div>
          <p><a href="terms&conditions" class="navtext">Conditions générales de vente</a></p>
        </div>
      </div>

        <div class="reseau-logo">
          <a href=""><i class="fab fa-twitter"> </i></a>
          <a href=""><i class="fab fa-facebook"> </i></a>
          <a href=""><i class="fab fa-instagram"> </i></a>
          <a href=""><i class="fab fa-linkedin-in"> </i></a>
        </div>
        <div class="contact">
          <i class="fas fa-phone ycolor phone-mini"></i>
          <p><a href="contact" class="navtext">CONTACT</a></p>
        </div>

        <div class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </div>
        <div class="footer-text">
           © CESI 2019
        </div>

    </footer>

</body>
</html>