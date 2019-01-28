<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Boite à idées</title>
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
				@if (isset($_SESSION['first_name']))
				<li><a href="#"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> {{$_SESSION['first_name']}} {{$_SESSION['last_name']}}</span></a></li>
				<li><a href="deconnexion"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> DECONNEXION</span></a></li>
				@else
				<li><a href="signUp"><span class="glyphicon glyphicon-user ycolor"></span><span  class="navtext"> INSCRIPTION</span></a></li>
				<li><a href="signIn"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> CONNEXION</span></a></li>
				@endif
			</ul>

		</div>
	</nav>

	<main>



		<aside class="aside-ideaBox">

			<h2 class="h2white">Création d'évènement</h2>

			<section class="section-aside-ideaBox">

				<form method="POST" action="submitIdea">
					<div class="formulaire">

						@csrf
						
						@if (isset($_GET['fieldEmpty']))
						<p class='error'>Tous les champs obligatoires doivent être remplis</p>
						@endif

						@if (isset($_GET['notConnected']))
						<p class="error">Vous devez être connecté pour ajouter une idée</p>
						@endif
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Titre" name="title">
						</div>

						<div class="form-group">
							<textarea class="form-control" placeholder="Description" rows="3" name="description"></textarea>
						</div>

						<div class="form-group">
							<input type="date" class="form-control optional" placeholder="Date (optionnel)" name="date">
							<p class="optional-text">Optionnel</p>
						</div>

						<div class="center">
							<img src="./pictures/stylo2.png" alt="" class="picture-event preview">
						</div>

						<div class="center">
							<label class="btn btn-default btn-file">
								Parcourir <input type="file" style="display: none;" onchange="readURL(this);" name="picture">
							</label>
						</div>

						<div class="connecIns">
							<button type="submit" class="btn btn-primary">Publier</button>

						</div>
					</div>
				</form>

			</section>

		</aside>

		<article class="ib-article-center">

			<h2 class="h2white">Idées d'évènements</h2>

			<section class="ib-section-center">

				<table class="table-event">


					<?php 
					$controller = new Controller();
					$ideas = $controller->getIdeas();
					?>
					@for ($i = 0; $i < sizeof($ideas); $i++)
					<tr>
						<td><img src="./pictures/defaultPicture.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<div class="desc-right">
								<i class="fas fa-check ideabox-check"></i>
								<i class="fas fa-times ideabox-cross"></i>
							</div>
							<div class="desc-left">
								<p class="bold">Titre : {{$ideas[$i]['title']}}</p>
								<p class="bold">Organisateur : {{$ideas[$i]['first_name'] . ' ' . $ideas[$i]['last_name']}}</p>
								<p class="bold">Date : {{$ideas[$i]['date']}}</p> 
								<p class="desc-event"><span class="bold">Description :</span> {{$ideas[$i]['description']}}</p>
								<div class="like">
									<a href="/"><i class="fas fa-thumbs-up ideabox-thumb"></i></a>
									<p class="like-counter">1</p>
									<i class="fas fa-flag ideabox-flag"></i>
								</div>
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



	<script type="text/javascript" src="{{ URL::asset('js/picturePreview.js') }}"></script>

</body>

</html>