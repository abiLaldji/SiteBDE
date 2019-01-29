<?php 
use App\Http\Controllers\Controller;
$controller = new Controller();
$product = $controller->getProduct(app('request')->route()->parameters['product']);
 ?>


<!DOCTYPE html>
<html>
<head>

    <title>Article boutique</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  
</head>

@include("headerShop")

    
        <main>
            <article id="article-article">
                <!-- display one article -->
                <section id="section-article">
                    <h2 class="titre_page">{{$product['name']}}</h2>
                    <div class="blue-stripe"><br></div>

                    <img id="image-article" src="../.{{$product['picture_url']}}">
                    <p id="price-article">{{$product['price']}} €</p>
                    <form method="POST" action="{{url('addToCart')}}" style='display: inline;'>
                        @csrf
                        <input type="hidden" value="{{$product['id_product']}}" name="id_product">
                        <input type="submit" class="border-raduis" id="button-article" value="Ajouter au panier">
                    </form>

                    <p id="description-article">
                        {{$product['picture_alt']}}
                    </p>
                    <br>
                </section>
            </article>
        </main>

    
@include("footer")


<script src="./js/autoComplete.js"></script>


</body>
</html>