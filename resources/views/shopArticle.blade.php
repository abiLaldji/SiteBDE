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

    
        <main>
            <article id="article-article">
                <H1 class="titre_page">Nom de l'article</H1>
                <section class="border-raduis" id="section-article">
                    <img id="image-article" src="pictures/mug.jpg">
                    <p id="price-article">6000€</p>
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
