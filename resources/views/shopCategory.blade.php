<!DOCTYPE html>
<html>
<head>
    <title>Catégorie boutique</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>


@include("headerShop")

        
    <main>
        <!-- allows us to choose a range of price -->
        <aside id="aside-category" class="border-raduis">
            
            <section id="aside-section-category" class="border-raduis">
                <h2>Tri</h2>
                <div class="gray-stripe"><br></div>
                <h3>Prix</h3>
                <form>
                    <!-- enter minimum price -->
                    <label>Min</label><input id="input-text-min-aside-section-category" type="text">
                    <!-- enter maximum price -->
                    <label>Max</label><input id="input-text-max-aside-section-category" type="text">
                    <br>
                    <input type="button" value="Trier" id="input-button-aside-section-category" class="border-raduis">
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
                        <tr class="tr-category">
                            <!-- display image of product and redirection to article-->
                            <td class="td-1-category"><a href="shopArticle"><img src="pictures/mug.jpg" class="image-category"></a></td>
                            <td class="td-2-category">
                                <!--redirection to article-->
                                <a href="shopArticle"><h4>Mug</h4></a>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                                    ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, 
                                    semper congue, euismod non, mi.
                            </td>
                            <!-- display the price -->
                            <td class="td-3-category"><p>6000€</p></td>
                            <td class="td-4-category"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                        </tr>
                        <tr class="tr-category">
                            <td class="td-1-category"><a href="shopArticle"><img src="pictures/mug.jpg" class="image-category"></a></td>
                            <td class="td-2-category">
                                <a href="shopArticle"><h4>Mug</h4></a>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                                    ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, 
                                    semper congue, euismod non, mi.
                            </td>
                            <td class="td-3-category"><p>6000€</p></td>
                            <td class="td-4-category"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                        </tr>
                        <tr class="tr-category">
                            <td class="td-1-category"><a href="shopArticle"><img src="pictures/mug.jpg" class="image-category"></a></td>
                            <td class="td-2-category">
                                <a href="shopArticle"><h4>Mug</h4></a>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                                    ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, 
                                    semper congue, euismod non, mi.
                            </td>
                            <td class="td-3-category"><p>6000€</p></td>
                            <td class="td-4-category"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                        </tr>

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