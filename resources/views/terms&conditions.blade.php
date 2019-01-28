<!DOCTYPE html>
<html>
<head>

	<title>Conditions générales de vente</title>
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
				<h2 class="h2white ln-h2">Conditions générales de ventes</h2>
			</div>

			<div class="ln-ystripe">
				<br/>
			</div>

			<div class="ln-corp">

				<h3 class="h3-ln">Objet</h3>

				<div>
					L'objet de ce contrat est la vente en ligne de Produits proposés par le BDE du CESI.
				</div>


				<h3 class="h3-ln">Prix</h3>

				<div>
					Les prix sont indiqués en euros toutes taxes comprises  (TVA + autres taxes éventuelles) sur la page de commande des produits.<br>
					Seul les membres du CESI de PAU peuvent commander sur la boutique.<br>
					Le CESI s'accorde le droit de modifier ses tarifs à tout moment et facturer les marchandises commandées aux prix indiqués lors de l'enregistrement de la commande.
				</div>

				<h3 class="h3-ln">Escompte</h3>

				<div>
					Aucun escompte ne sera consenti car le paiement ne pourra pas être réalisé en avance.
				</div>

				<h3 class="h3-ln">Modalités de paiement</h3>

				<div>
					Le paiement devra être effectué au moment de la commande.<br>
					Le règlement s'effectue :<br>
					<ul>
						<li>soit par carte bancaire</li>
						<li>soit par paypal</li>
					</ul>

				</div>

				<h3 class="h3-ln">Livraison</h3>

				<div>
					Une fois commandés, les produits seront livrés sous 48h (jours ouvrés seulement) directement en main propre par un membre du BDE, si le produit n'a pas été livré sous 48h ou que le contenu de la commande est incorrect, <a href="contact">contactez nous</a>, nous règleront le problème le plus rapidement possible.
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