<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Connexion</title>
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
      <li><a href="signUp"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> INSCRIPTION</span></a></li>
      <li><a href="signIn"><span class="glyphicon glyphicon-log-in ycolor"></span class="navtext"><span  class="navtext"> CONNEXION</span></a></li>
    </ul>

  </div>
</nav>


<main>

	<article class="article-center">

		<section class="section-center">

			<h2>Connexion</h2>


      @if (isset($_SESSION['firstName']))
        <p> Vous êtes déjà connecté </p>
      @else
  			<article class="article2">

  				<form method="POST" action="signIn">
  					<div class="formulaire">

              @csrf

    					<div class="form-group">
      						<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Adresse mail" name="email">
   					 	</div>
    						<div class="form-group">
      						<input type="password" class="form-control" placeholder="Mot de passe" name="password">
    						</div>
    					</div>

              @if(isset($_GET['notRegistered']))
                <p class="error">  Identifiants incorrect</p>
              @endif

    					<div class="connecIns">
    						<div class="form-check">
     						 	<input type="checkbox" class="form-check-input">
      						<label class="form-check-label">Se souvenir de moi</label>
    						</div>
    							<button type="submit" class="btn btn-primary">Se connecter</button>
    					</div>
  				</form>

    				<div class="already">Pas encore inscrit ? <a href="signUp"><span>S'inscrire</span></a> </div>

  			</article>
      @endif


		</section>

	</article>

</main>

    <footer> 

        <div class="reseau-logo">
          <a href=""><i class="fab fa-twitter"></i>     </a>
           <a href=""><i class="fab fa-facebook"></i></a>
        </div>
        <div class="contact">
          <i class="fas fa-phone ycolor phone-mini"></i>
           <a href="contact"><p class="navtext">CONTACT</p></a>
        </div>

        <div class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </div>

    </footer>



</body>


</html>