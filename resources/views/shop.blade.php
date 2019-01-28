<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>

@include("headerShop")
   
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
    </main>

@include("footer")