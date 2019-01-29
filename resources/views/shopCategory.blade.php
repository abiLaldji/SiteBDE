<?php 
use App\Http\Controllers\Controller;

$controller = new Controller();

$currentCategory = app('request')->route()->parameters['category'];

$products = $controller->getProductsByCategory($currentCategory);

 ?>

<!DOCTYPE html>
<html>
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

                    @csrf
                    <input type="hidden" value="{{$currentCategory}}" name="current_category">
                    <!-- enter minimum price -->
                    <label>Min</label><input id="input-text-min-aside-section-category" type="text" name="min">
                    <!-- enter maximum price -->
                    <label>Max</label><input id="input-text-max-aside-section-category" type="text" name="max">

                    <br>
                    <input type="submit" value="Trier" id="input-button-aside-section-category" class="border-raduis" onclick="sort({{json_encode($products)}}, '{{$currentCategory}}')">
                    <br> 
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
                        
                    </table>
                </article>
                <br>
            </section>
        </article>
    </main>

    
@include("footer")

    <script type="text/javascript" src="{{ URL::asset('js/sortPrice.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/autoComplete.js') }}"></script>

</body>
</html>