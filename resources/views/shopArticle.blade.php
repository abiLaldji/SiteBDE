<!DOCTYPE html>
<html>
<head>

    <title>Article boutique</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>

@include("headerShop")

    
        <main>
            <article id="article-article">
                <!-- display one article -->
                <section id="section-article">
                    <h2 class="titre_page">Nom de l'article</h2>
                    <div class="blue-stripe"><br></div>
                    <!-- display image -->
                    <img id="image-article" src="pictures/mug.jpg">
                    <!-- display the price -->
                    <p id="price-article">6000€</p>
                    <!-- button to add to cart -->
                    <input type="button" class="border-raduis" id="button-article" value="Ajouter au panier">
                    <p id="description-article">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                        ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, 
                        semper congue, euismod non, mi.
                    </p>
                    <br>
                </section>
            </article>
        </main>

    
@include("footer")
