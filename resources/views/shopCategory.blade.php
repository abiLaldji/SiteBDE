<?php 
use App\Http\Controllers\Controller;

$controller = new Controller();

$currentCategory = app('request')->route()->parameters['category'];

$products = $controller->getProductsByCategory($currentCategory);
 ?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
        <title>Catégorie boutique</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        
        <!-- bootstrap link-->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <!-- FontAwesome link-->
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    
    </head>


@include("headerShop")
        
    <main>
        <!-- allows us to choose a range of price -->
        <aside id="aside-category" class="border-raduis">
            
            <section id="aside-section-category" class="border-raduis">
                <h2>Tri</h2>
                <div class="gray-stripe"><br></div>
                <h3>Prix</h3>

                <form method="POST" action="{{url('sortProducts')}}">
                    @csrf
                    <input type="hidden" value="{{$currentCategory}}" name="current_category">
                    <!-- enter minimum price -->
                    <label>Min</label><input  alt="min" id="input-text-min-aside-section-category" type="text" name="min">
                    <!-- enter maximum price -->
                    <label>Max</label><input alt="max" id="input-text-max-aside-section-category" type="text" name="max">

                    <br>
                    <input alt="trier" type="submit" value="Trier" id="input-button-aside-section-category" class="border-raduis">
                    <br> 
                </form>
            </section>
            <div> <br></div>
        </aside>

        <!-- display all article in the category -->
        <article id="article-category">
            
            <section id="section-category">
            <h2 class="titre_page">Liste des articles</h2>
            <div class="blue-stripe"><br></div>
                <article class="article-category">
                    <table id="table-category">

                        @for($i=0 ; $i < sizeof($products) ; $i++)
                        <tr class="tr-category">

                            <!-- display image of product and redirection to article-->
                            <td class="td-1-category"><a href="{{$currentCategory . '/' . $products[$i]['name']}}"><img src=".{{$products[$i]['picture_url']}}" class="image-category" alt="{{$products[$i]['picture_alt']}}"></a></td>

                            <td class="td-2-category">
                                <!--redirection to article-->
                                <a href="{{$currentCategory . '/' . $products[$i]['name']}}"><h4>{{$products[$i]['name']}}</h4></a>
                                    {{$products[$i]['picture_alt']}}
                            </td>
                            <!-- display the price -->
                            <td class="td-3-category"><p>{{$products[$i]['price']}} €</p></td>
                            <td class="td-4-category"><input alt="suppr" type="image" src="../pictures/suppr.png" class="suppr-category"></td>
                        </tr>
                        @endfor

                    </table>
                </article>
                <br>
            </section>
        </article>
    </main>

    
@include("footer")


<script src="./js/autoComplete.js"></script>


</body>
</html>