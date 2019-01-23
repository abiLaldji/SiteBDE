<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
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
            <a id="logo-profile" href="myprofile.html"><i class="fas fa-user"></i></a>
        </div>
</header>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">

      <li class="active"><a href="/"><i class="fas fa-home"></i> Accueil</a></li>

      <li><a href="#" class="categories">Boutique</a></li>
      
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pull</a></li>
                <li><a href="#">Goodies</a></li>
            </ul>
      
         </li>

         <li><a href="events" class="categories">Évènements</a></li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="pastEvents">A venir</a></li>
                <li><a href="#">Historique</a></li>
            </ul>
         </li>

        <li><a href="ideaBox" class="categories">Boite à idées</a></li>

    </ul>

    @if (isset($_SESSION['firstName']))
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{$_SESSION['firstName']}} {{$_SESSION['lastName']}}</a></li>
        <li><a href="deconnexion"><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
      </ul>
    @else
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signUp"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
        <li><a href="signIn"><span class="glyphicon glyphicon-log-in"></span> Connection</a></li>
      </ul>
    @endif

  </div>
</nav>



<main>

	<article class="article-center2">

		<h2 class="h2white">Panier</h2>

		<section class="section-center">

			

				<table class="table-cart">

					<tr>
						<th>Image</th>
						<th>Description</th>
						<th>Quantité</th>
						<th>Prix unitaire</th>
						<th>Prix total</th>
						<th>Annuler</th>
					</tr>

					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="img-article"></td>
						<td>Ce produit est très intéréssant</td>
						<td>2</td>
						<td>50</td>
						<td>100</td>
						<td><i class="fas fa-times"></i></td>
					</tr>

					<tr>

					<td><img src="./pictures/stylo1.png" alt="" class="img-article"></td>
						<td>Ce produit est très intéréssant</td>
						<td>2</td>
						<td>50</td>
						<td>100</td>
						<td><i class="fas fa-times"></i></td>
					</tr>

					<tr>
					<td><img src="./pictures/stylo3.png" alt="" class="img-article"></td>
						<td>Ce produit est très intéréssant</td>
						<td>2</td>
						<td>50</td>
						<td>100</td>
						<td><i class="fas fa-times"></i></td>
					</tr>

				</table>

					<div class="confirmation-cart">
						<p class="prix-total-cart">Prix total : <span class="right">500K €</span></p>						
						<button type="button" values="Commander" onclick="" class="order-cart">Commander</button>
					</div>

		</section>

	</article>







</main>








    <footer>      
        <p class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </p>

    </footer>

</body>



</html>