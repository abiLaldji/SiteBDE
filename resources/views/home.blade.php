<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

   
 
 
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<!--
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
-->
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <!--
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->

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
                <li><a href="#">A venir</a></li>
                <li><a href="pastEvents">Historique</a></li>
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
        <li><a href="signIn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
      </ul>
    @endif

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

      <div class="item active">
        <img src="./pictures/stylo1.png" alt="Los Angeles" class="top-slide">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="./pictures/stylo2.png" alt="Chicago" class="top-slide">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="./pictures/stylo2.png" alt="New York" class="top-slide">
        <div class="carousel-caption">
          <h3>Stylo bleu</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
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

  <div class="reseau-logo">
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-facebook"></i></a>
  </div>

</aside>

<article class="article-home">

  <h2> Prochain évènement </h2>

  <img src="./pictures/activite.jpeg" alt="activite" class="img-accueil"/>

  <div class="description">
  <h3>Description :</h3>
  <p>Voici </p>
  <p> <span class="gras">Date : </span>25/04/2019</p>

  </div>



</article>

</main>

    <footer>      
        <div class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </div>

    </footer>



</body>
</html>