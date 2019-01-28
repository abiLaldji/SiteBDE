<?php 
use App\Http\Controllers\Controller;
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>boutique</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <header id="header">
        <div id="logo-cesi">
            <a href="index.html"><img src="assets/style/image/cesi-logob.png"></a>
        </div>
        <div id="header-right">

            <h1 id="titre">SITE BDE DU CESI PAU</h1>
            <a id="logo-cart" href="cart.html"><img src="assets/style/image/cart.png"><p id="panier">panier</p></a>
        </div>
    </header>
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#"><i class="fas fa-home"></i> Home</a></li>     
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="#">T-shirt</a></li>
                          <li><a href="#">Pull</a></li>
                          <li><a href="#">Goodies</a></li>
                      </ul>
                   </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Evenements <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="#">A venir</a></li>
                          <li><a href="#">Historique</a></li>
                      </ul>
                   </li>
                  <li><a href="#">Boite à idées</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
            </div>
    </nav>
    <main id="main-shop">
        <aside id="aside-1-shop" class="border-raduis">
            <h1 class="titre-page">Nouveautés</h1>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
            
                  <div class="item active">
                    <img src="pictures/hoodi.png" alt="hoodi" class="top-slide" width="100%">
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">hoodi</h3>
                      
                    </div>
                  </div>
            
                  <div class="item">
                    <img src="pictures/mug.jpg" alt="mug" class="top-slide" width="100%">
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">mug</h3>
                      
                    </div>
                  </div>
                
                  <div class="item">
                    <img src="pictures/stylo.jpg" alt="Stylo" class="top-slide" width="100%">
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">Stylo</h3>
                      
                    </div>
                  </div>
              
                </div>
              </div>
              <div>
                <br>
            </div>
        </aside>
        <article id="article-shop">
            <h1 class="titre-page">Catégories d'article</h1>
            <section id="section-shop" class="border-raduis">
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/hoodi.png" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/mug.jpg" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/stylo.jpg" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/hoodi.png" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/mug.jpg" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                <article class="article-shop">
                    <a class="a-shop" href="shopCategory"><img src="pictures/stylo.jpg" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
            </section>
        </article>
        <aside id="aside-2-shop" class="border-raduis">
            <h1 class="titre-page">Top vente</h1>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
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
              </div>
              <div>
                  <br>
              </div>
        </aside>
    </main>

</body>
</html>