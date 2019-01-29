<?php 
use App\Http\Controllers\Controller;
session_start();
?>


<!DOCTYPE html>
<html>
<head>

    <title>Boutique</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>

@include("headerShop")
   
    <main id="main-shop">
        <!-- Carousel with news product -->
        <aside id="aside-1-shop" class="border-raduis">
            <h2>Nouveautés</h2>
            <div class="gray-stripe-111"><br></div>
            <!--Carousel affichant les nouveaux produits de la boutique-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
<?php 
$controller = new Controller();
$newProducts = $controller->getNewProducts();
 ?>
                  @for($i=0 ; $i < sizeof($newProducts) ; $i++)
                  <div class="item 

                  @if ($i == 0)
                     active
                  @endif
                   ">
                    <img src="{{$newProducts[$i]['picture_url']}}" alt="{{$newProducts[$i]['picture_alt']}}" class="top-slide image-carousel">
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">{{$newProducts[$i]['name']}}</h3>
                      
                    </div>
                  </div>
                  @endfor
                  <div class="item">
                    <img src="pictures/mug.jpg" alt="mug" class="top-slide image-carousel" >
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">mug</h3>
                      
                    </div>
                  </div>
                
                  <div class="item">
                    <img src="pictures/stylo.jpg" alt="Stylo" class="top-slide image-carousel" >
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">Stylo</h3>  
                    </div>
                  </div>
                </div>
              </div>
        </aside>
        
        <!-- Display all categories of articles -->
        <article id="article-shop">
            <h2>Catégories d'article</h2>
            <div class="blue-stripe"><br></div>
            <section id="section-shop" class="border-raduis">
              <!--Liste des articles de la boutique-->
                <article class="article-shop">
                    <!--redirection to category-->
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
                <div class="break"><br></div>
            </section>
        <!-- Carousel with top sales -->    
        </article>
        <aside id="aside-2-shop" class="border-raduis">
            <h2>Top vente</h2>
            <div class="gray-stripe-111"><br></div>
            <!--Carousel contenant le top 3 des articles les plus vendus-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">


  <?php 
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
      <div>
        <br>
      </div>
    </aside>
        
  </main>

@include("footer")


<script src="./js/autoComplete.js"></script>


</body>
</html>