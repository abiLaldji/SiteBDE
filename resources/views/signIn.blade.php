<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">

	  <link rel="stylesheet" type="text/css" href="./css/style.css">
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
	<script type="text/javascript" src="{{ URL::asset('js/checkForms.js') }}"></script>

</head>


@include("header")




	<main>

		<article class="signIn-article-center">

			<section class="signIn-section-center">

				<h2>Connexion</h2>
				<div class="blue-stripe"><br></div>

				@if (isset($_SESSION['firstName']))
				<p> Vous êtes déjà connecté </p>
				@else

				<form name="login" method="POST" onsubmit="return validateFormSignIn(this);" action="signIn">
					<div class="formulaire">

						@csrf

						<div class="form-group">
							<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Adresse mail" name="email">
							<div id ="error_email">
							 </div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mot de passe" name="password">
							<div id ="error_password">
							</div>
						</div>
					</div>

					<div class="connecIns">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="remember_me">
							<label class="form-check-label">Se souvenir de moi</label>
						</div>
						<button type="submit" class="btn btn-primary">Se connecter</button>
					</div>
				</form>

				<div class="already">Pas encore inscrit ? <a href="signUp"><span>S'inscrire</span></a> </div>

				@endif


			</section>

		</article>

	</main>


    @include("footer")
