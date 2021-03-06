<?php 
use App\Http\Controllers\Controller;
session_start();

$controller = new Controller();
$product = $controller->getProduct(app('request')->route()->parameters['product']);
 ?>


<!DOCTYPE html>
<html lang='fr'>
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
                        @csrf <!-- token for Laravel-->
                        <input type="hidden" value="{{$product['id_product']}}" name="id_product">
                        <input type="hidden" value="{{$product['picture_url']}}" name="picture_url">
                        <input type="hidden" value="{{$product['price']}}" name="price">
                        <input type="hidden" value="{{$product['picture_alt']}}" name="picture_alt">
                        <input type="hidden" value="{{$product['name']}}" name="name">
                        <input type="hidden" value="{{$product['stock']}}" name="stock">
                        <input type="hidden" value="{{$product['item_sold']}}" name="item_sold">
                        <input type="hidden" value="{{$product['name_category']}}" name="name_category">
                        <input type="submit" class="border-raduis" id="button-article" value="Ajouter au panier">
                    </form>
                    <!--Description de l'article-->
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