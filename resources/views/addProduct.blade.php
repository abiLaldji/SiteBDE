<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout de produit</title>
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

	<article class="article-center2">

    <h2 class="h2white"> Ajout de produit </h2>

		<section class="section-center">

				<div class="center">
			    <img src="./pictures/stylo2.png" alt="" class="picture-product">
        </div>
        <div class="center">
    				<label class="btn btn-default btn-file">
    				Parcourir <input type="file" style="display: none;">
					 </label>
        </div>

				<form method="POST" action="addProduct">
					<div class="formulaire">
  						<div class="form-group">
    						<input type="text" class="form-control" placeholder="Nom du produit" name="name">
 					 	</div>
 					 	<select class=form-control name="category">
							 <option value=un>T-shirt</option>
							 <option value=deux>Pull</option>
							 <option value=trois>Goodies</option>
						</select>
  						 <div class="form-group">
    						<input type="price" class="form-control" placeholder="Prix" name="price">
  						</div>
  						<div class="form-group">
    						<textarea class="form-control" placeholder="Description" rows="3"></textarea>
  						</div>

  					</div>

  					<div class="connecIns">
  							<button type="submit" class="btn btn-primary">Valider</button>
  					</div>
				</form>










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