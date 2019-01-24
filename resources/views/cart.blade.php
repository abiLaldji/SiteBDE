<?php session_start() ?>

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

		<h2 class="h2white">Panier</h2>

		<section class="section-center">

			<?php /*$_COOKIE['cart'] = [['pictureURL' => './pictures/stylo1.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '52', 'unitPrice' => '14'], ['pictureURL' => './pictures/stylo2.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '14', 'unitPrice' => '128'],['pictureURL' => './pictures/stylo3.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '25', 'unitPrice' => '4'],['pictureURL' => './pictures/stylo1.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '8', 'unitPrice' => '54']] */ ?>
			@if (isset($_COOKIE['cart']))
				<table class="table-cart">

						<tr>
							<th>Image</th>
							<th>Description</th>
							<th>Quantité</th>
							<th>Prix unitaire</th>
							<th>Prix total</th>
							<th>Annuler</th>
						</tr>

						<?php $total = 0; ?>
						@for ($i = 0; $i < sizeof($_COOKIE['cart']) ; $i++)
							<tr>
								<td><img src="{{$_COOKIE['cart'][$i]['pictureURL']}}" alt="" class="img-article"></td>
								<td><span class="blod">{{$_COOKIE['cart'][$i]['name']}} : </span>{{$_COOKIE['cart'][$i]['description']}}</td>
								<td>{{$_COOKIE['cart'][$i]['quantity']}}</td>
								<td>{{$_COOKIE['cart'][$i]['unitPrice']}}</td>
								<td>
									<?php 
										$subTotal = $_COOKIE['cart'][$i]['quantity'] * $_COOKIE['cart'][$i]['unitPrice'];
										$total += $subTotal;
										echo $subTotal;
									?>
								</td>
								<td><i class="fas fa-times"></i></td>
							</tr>
						@endfor

					

				</table>

					<div class="confirmation-cart">
						<p class="prix-total-cart">Prix total : <span class="right">{{$total}} €</span></p>						
						<button type="button" values="Commander" onclick="" class="order-cart">Commander</button>
					</div>
			@else
				<p>Vous n'avez pas de produits dans votre panier.</p>
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