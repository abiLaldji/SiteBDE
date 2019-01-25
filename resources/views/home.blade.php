<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

   
 
 
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

  <script src="./bootstrap/js/bootstrap.min.js"></script>

  <!-- FontAwesome link-->
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

<aside class="aside-right">


  <h2>Top des ventes</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

<?php 
$controller = new Controller();
$topSales = $controller->getTopSales();
?>

      @for ($i = 0; $i < sizeof($topSales); $i++)
      <div class="item 

      @if ($i == 0)
        active
      @endif

      ">
        <img src="./pictures/stylo2.png" alt="Los Angeles" class="top-slide">
        <div class="carousel-caption">
          <h3>{{$topSales[$i]['name']}}</h3>
          <p>{{$topSales[$i]['description']}}</p>
        </div>
      </div>

      @endfor
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</aside>

<aside class="aside-left">

<h2 class="presentation-title">Qui sommes nous ?</h2>


<div>
Nous somme le BDE (<span class="italique">Bureau des élèves</span>) du campus CESI de Pau, nôtre objectif est d'améliorer le cadre de vie des
étudiants en apportant de la vie sur le campus notament grace à l'organisation d'activitées.
</div>

<h2 class="presentation-title">Nos objectifs</h2>

<div>
Animation du campus : 
<br/>
  -Organisation d'évènements<br/>
  -Organisation de soirées

</div>

<h2 class="presentation-title">Direction</h2>

<div>
  Le BDE est composé d'élèves de différentes promos, des réunions sont régulièrements organisés avec les représentant de chaques promotions l'objectifs étant d'amener un maximum de personne à chaque évènements.



</div>

<h2 class="presentation-title">Réseaux sociaux</h2>



</aside>

<article class="article-home">

  <h2> Prochain évènement </h2>

<?php 
$nextEvent = $controller->getNextEvent();
?>

  <img src="./pictures/stylo2.png" alt="activite" class="img-accueil"/>

  <div class="description">
    <h3>{{$nextEvent['title']}}</h3>
    <p>{{ $nextEvent['description'] }}</p>
    <p> <span class="gras">Date : </span>{{ $nextEvent['date'] }}</p>
  </div>



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