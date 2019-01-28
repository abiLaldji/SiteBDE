<!DOCTYPE html>
<html>
<head>

	<title>Politique de confidentialité</title>
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
				<h2 class="h2white ln-h2">Politique de confidentialité</h2>
			</div>

			<div class="ln-ystripe">
				<br/>
			</div>

			<div class="ln-corp">

				<div class="ln-intro">

					CESI est engagé dans une démarche continue de conformité avec le Règlement général sur la protection des données du 27 avril 2016. Avec ce nouveau règlement CESI renforce sa politique de protection de données personnelles afin que les données de nos utilisateurs soient collectées et utilisées de manière transparente, confidentielle et sécurisée.

				</div>

				<p class="ln-title">Politique de protection des données personnelles à partir du 25 mai 2018</p>

				<p>Notre Politique de protection des données personnelles décrit la manière dont CESI traite les données à caractère personnel des visiteurs et des utilisateurs lors de leur navigation sur nos sites</p>

				<p>La Politique de protection des données personnelles fait partie intégrante des Mentions légales du Site.<br>
					CESI accorde en permanence une attention aux données de nos Utilisateurs.<br>
					Nous pouvons ainsi être amenés à modifier, compléter ou mettre à jour la Politique de protection des données personnelles. Nous vous invitons à consulter régulièrement la dernière version en vigueur, accessible sur notre Site.<br>
					Si des modifications majeures sont apportées, nous vous informerons par email ou par nos services pour vous permettre d’examiner ces modifications avant qu’elles ne prennent effet.<br>
				Si vous continuez à utiliser nos Services après la publication ou l’envoi d’un avis concernant les modifications apportées à la Politique de protection des données personnelles, cela signifie que vous acceptez les mises à jour.</p>

				<h3 class="h3-ln">Données personelles et finalités</h3>

				<div>

					<p>Notre site récupère simplement certaines données personnelles de base lors de votre inscription tel que vos identifiants, mot de passe et le nom du centre CESI auquel vous êtes référé afin de sécuriser la connexion à votre compte, nous vous demandons également votre adresse mail afin de vérifier que vous appartenez bien à l'un des centre CESI ainsi que pour vous informez que vos commandes ont bien été envoyées.</p>

				</div>


				<h3 class="h3-ln">Utilisation des cookies</h3>

				<div>
					<p>	
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

					<p><span class="bold">Desactivation/Activation des cookies :</span> pour désactiver l'utilisation des cookies il vous suffira de cliquez sur 	"refuser" sur le bandeau qui apparaitra lorsque vous arriverez sur le site.<br>
					Si vous acceptez l'utilisation des cookies, cliquez sur accepter.</br>
					Une fois accepter le bandeau ne réapparaîtra plus durant un mois (si jamais vous changez d'avis entre temps).
				</p>
			</div>

			<h3 class="h3-ln">Protection des données personnelles</h3>

			<div>
				Nous prenons toutes les dispositions nécessaires pour que vos données soient protégées. Nous vous demandons également de veiller à la confidentialité des données.<br>
				CESI applique les mesures de sécurité technologiques et organisationnelles généralement reconnues afin que les données à caractère personnel recueillies ne soient, ni perdues, ni détournées, ni consultées, ni modifiées, ni divulguées par des tiers non autorisés sauf si la communication de ces données est imposée par la réglementation en vigueur, notamment à la requête d’une autorité judiciaire, de police, de gendarmerie ou de toute autre autorité habilitée par la loi.<br>
				La sécurité des données personnelles dépend également des Utilisateurs. <br>
				Les Utilisateurs qui sont membres de CESI s’engagent à conserver la confidentialité de leur identifiant et de leur mot de passe. <br>
				Les membres s’engagent également à ne pas partager leur compte et à déclarer à CESI toute utilisation non autorisée dudit compte dès lors qu’ils en ont connaissance.
			</div>

			<h3 class="h3-ln">Utilisateurs extérieurs au CESI</h3>

			<div>
				Des utilisateurs extérieurs au CESI peuvent accèder au site à titre informatif mais ne peuvent réaliser aucune action.
			</div>

			<h3 class="h3-ln">Relation entre les services CESI et les réseaux sociaux</h3>

			<div>
				Nous ne sommes pas responsables de l’utilisation des données faite par les réseaux sociaux.<br>
				Vous pouvez les paramétrer sur leurs sites.<br>
				Lorsque vous utilisez des réseaux sociaux et des services ou applications de CESI en relation avec des réseaux sociaux, cela est susceptible d’entraîner une collecte et un échange de certaines données entre les réseaux sociaux et CESI.<br>
				Nous ne sommes pas responsables de l’utilisation qui est faite de vos données par les réseaux sociaux pour leur propre compte. <br>
				Vous avez la possibilité de paramétrer et contrôler directement sur les réseaux sociaux l’accès et la confidentialité de vos données.
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