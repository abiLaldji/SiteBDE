<?php 
use App\Http\Controllers\Controller;
session_start();
?>


<!DOCTYPE html>
<html>
<head>


    <title>Boutique</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  
</head>


@include("headerShop")
   
    <main id="main-shop">
        <!-- Carousel with news product -->
        <aside id="aside-1-shop" class="border-raduis">
            <h2>Nouveautés</h2>
            <div class="gray-stripe-111"><br></div>
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
                    <img src=".{{$newProducts[$i]['picture_url']}}" alt="{{$newProducts[$i]['picture_alt']}}" class="top-slide image-carousel">
                    <div class="carousel-caption">
                      <h3 class="text-black titre-carousel">{{$newProducts[$i]['name']}}</h3>
                      
                    </div>
                  </div>
                  @endfor
                </div>
              </div>
            <div>
                <br>
            </div>
        </aside>
        
        <!-- Display all categories of articles -->
        <article id="article-shop">
            <h2>Catégories d'article</h2>
            <div class="blue-stripe"><br></div>
            <section id="section-shop" class="border-raduis">

<?php 
$categories = $controller->getCategories();
 ?>
                @for($i=0 ; $i < sizeof($categories) ; $i++)
                <article class="article-shop">
                    <a class="a-shop" href="shop/{{$categories[$i]['name']}}"><img src="../pictures/defaultPicture.png" class="image-shop"><p class="p-shop">salut</p></a>
                </article>
                @endfor
                <div class="break"><br></div>
            </section>
        <!-- Carousel with top sales -->    
        </article>
        <aside id="aside-2-shop" class="border-raduis">
            <h2>Top vente</h2>
            <div class="gray-stripe-111"><br></div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
            <div class="carousel-inner">



  <?php 
  $topSales = $controller->getTopSales();
  ?>


        @for ($i = 0; $i < sizeof($topSales); $i++)
        <div class="item 


        @if ($i == 0)
          active
        @endif


        ">
          <img src=".{{ $topSales[$i]['picture_url']}}" alt="Los Angeles" class="top-slide" width="100%">
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