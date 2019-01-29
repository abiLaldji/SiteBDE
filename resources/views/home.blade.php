<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>

@include("header")

<main>

  <aside class="aside-right">


    <h2>Top des ventes</h2>
    <div class="gray-stripe-109"><br></div>
    <article id="article-aside-right-home">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active li-carousel"></li>
          <li data-target="#myCarousel" data-slide-to="1" class="li-carousel"></li>
          <li data-target="#myCarousel" data-slide-to="2" class="li-carousel"></li>
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
          <img src="{{ $topSales[$i]['picture_url']}}" alt="Los Angeles" class="top-slide image-carousel">
          <div class="carousel-caption">
            <h3 class="text-black titre-carousel">{{$topSales[$i]['name']}}</h3>
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
  </article>
  <div><br><br></div>
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

  



</aside>

<article class="article-home">




  <section id="section-home">
    <h2 class="titre_page"> Prochain évènement </h2>
    <div class="blue-stripe"><br></div>
    <?php 
    $nextEvent = $controller->getNextEvent();
    ?>


    <img src="./pictures/defaultPicture.png" alt="activite" class="img-accueil"/>

    <div class="description">
      <h3>{{$nextEvent['title']}}</h3>
      <p >{{ $nextEvent['description'] }}</p>
      <p> <span class="gras">Date : </span>{{ $nextEvent['date'] }}</p>
    </div>
    <div><br></div>
  </section>
  <div> <br> </div>
</article>

</main>


@include("footer")
   
</body>
</html>