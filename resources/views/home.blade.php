<?php 
use App\Http\Controllers\Controller;
session_start();
?>


@include("header")

  

<main>

<aside class="aside-right">


  <h2>Top des ventes</h2>
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
          <img src="{{ $topSales[$i]['picture_url']}}" alt="Los Angeles" class="top-slide" width="100%">
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

<h2 class="presentation-title">Réseaux sociaux</h2>



</aside>

<article class="article-home">


  <h2 class="titre-page"> Prochain évènement </h2>
  <section id="section-home">
  <?php 
  $nextEvent = $controller->getNextEvent();
  ?>


    <img src="{{ $nextEvent['picture_url']}}" alt="activite" class="img-accueil"/>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/autoComplete.js"></script>

</body>
</html>