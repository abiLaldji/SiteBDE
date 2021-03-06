<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
  <html lang='fr'>
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
        <!--Carousel displaying the top 3 sales-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Slide indicator-->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active li-carousel"></li>
            <li data-target="#myCarousel" data-slide-to="1" class="li-carousel"></li>
            <li data-target="#myCarousel" data-slide-to="2" class="li-carousel"></li>
          </ol>

          <!--Carousel arrows--> 
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
          <!--Left and right arrows of the carousel -->
          <!--Left arrow-->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <!--Right arrow-->
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </article>
      <div><br><br></div>
    </aside>
    <!--Aside containing a quick presentation of the BDE-->
    <aside class="aside-left">

      <!--Presentation of the BDE-->
      <h2 class="presentation-title">Qui sommes nous ?</h2>
      <div>
        Nous somme le BDE (<span class="italic">Bureau des élèves</span>) du campus CESI de Pau, nôtre objectif est d'améliorer le cadre de vie des
        étudiants en apportant de la vie sur le campus notament grace à l'organisation d'activitées.
      </div>

      <!--List of the activities-->
      <h2 class="presentation-title">Les activités</h2>
      <div>
        Les activités proposées seront toutes gratuites (l'ensemble des frais seront pris en charge par le BDE).<br>
        Nous souhaitons une diversitée dans nos activitées, pour cela nous éviter de remettre en place une activité qui a deja eu lieu.<br>
        <span class="bold">Types d'activités proposées :</span>
        <ul>
          <li>Soirées</li>
          <li>Activités sportives</li>
          <li>Activités culturelles</li>
        </ul>
      </div>

      <!--Direction of the BDE-->
      <h2 class="presentation-title">Direction</h2>
      <div>
        Le BDE est composé d'élèves de différentes promos, des réunions sont régulièrements organisés avec les représentant de chaques promotions l'objectifs étant d'amener un maximum de personne à chaque évènements.
      </div>


    </aside>

    <!--Principal article of the home page-->
    <article class="article-home">
      <!--Central section of the home page containing an image of the next event-->
      <section id="section-home">
        <h2 class="titre_page"> Prochain évènement </h2>
        <div class="blue-stripe"><br></div>
        <?php 
        $nextEvent = $controller->getNextEvent();
        ?>
        <!--Image of the next event-->
        <img src="./pictures/defaultPicture.png" alt="activite" class="img-accueil"/>
        <!--Description of the picture (next event)-->
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