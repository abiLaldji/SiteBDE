<?php
use App\Http\Controllers\Controller
?>

<!DOCTYPE html>
<html>
<head>
	<title>Évènements</title>
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



		<aside class="event-aside">

			<h2 class="h2white">Évènement du mois</h2>




			<section class="section-aside-event">

				<?php 
				$controller = new Controller();
				$monthEvent = $controller->getMonthEvent();
				?>

				<h3>{{$monthEvent['title']}}</h3>

				<div class="pic-view">
					<img src="./pictures/stylo2.png" alt="" class="event-month-pic">
				</div>

				<div class="desc-event-month">
					<p><span class="bold">Description :</span> {{$monthEvent['description']}}Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div>

				<p><span class="bold">Organisateur : {{$monthEvent['organizator']}}</span></p>
				<p><span class="bold">Date : {{$monthEvent['date']}}</span></p>

			</section>

		</aside>

		<article class="event-article-center">

			<h2 class="h2white">Évènements à venir</h2>

			<section class="event-section-center">

				<table class="table-event">

					<?php 
					$events = $controller->getNextEvents();
					?>

					@for ($i = 0; $i < sizeof($events); $i++)
					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<p class="bold">Titre : {{$events[$i]['title']}}</p>
							<p class="bold">Organisateur : {{$events[$i]['first_name'] . ' ' . $events[$i]['last_name']}}</p>
							<p class="bold">Date : {{$events[$i]['date']}}</p> 
							<p class="desc-event"><span class="bold">Description :</span> {{$events[$i]['description']}}ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
						</td>
						<td class="td-img-event">
							<div>
								<button type="submit" class="btn btn-primary">S'inscrire</button>
							</div>
						</td>
					</tr>
					@endfor
				</table>
				
				
			</section>


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