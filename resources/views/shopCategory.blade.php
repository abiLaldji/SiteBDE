<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>acceuil</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
        <header id="header">
                <div id="logo-cesi">
                    <a href="index.html"><img src="pictures/logoCesi.png"></a>
                </div>
                <div id="header-right">
        
                    <h1 id="titre">SITE BDE DU CESI PAU</h1>
                    <a href="mon_compte.html">mon compte</a>
                    <a id="logo-cart" href="cart.html"><img src="pictures/cart.png"><p id="panier">panier</p></a>
                </div>
        </header>
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                       <li><a href="#">boutique</a></li>  
                       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">T-shirt</a></li>
                              <li><a href="#">Pull</a></li>
                              <li><a href="#">Goodies</a></li>
                          </ul>
                       </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Evenements <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">A venir</a></li>
                              <li><a href="#">Historique</a></li>
                          </ul>
                       </li>
                      <li><a href="#">Boite à idées</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
        </nav>
    <main>
        <aside id="aside-category" class="border-raduis">
            <h1>Tri</h1>
            <section id="aside-section-category" class="border-raduis">
                <h3>Prix</h3>
                <label>Min</label><input id="input-text-min-aside-section-category" type="text">
                <label>Max</label><input id="input-text-max-aside-section-category" type="text">
            </section>
            <div> <br></div>
        </aside>
        <article id="article-category">
            <h1 class="titre_page">Liste des articles</h1>
            <section id="section-category">
                <article class="article-category">
                    <table>
                        <tr class="tr-category">
                            <td class="td-1-category"><a href="shopArticle"><img src="pictures/mug.jpg" class="image-category"></a></td>
                            <td class="td-2-category">
                                <a href="shop_article.html"><h4>Mug</h4></a>
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
                                <a href="shop_article.html"><h4>Mug</h4></a>
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
                                <a href="shop_article.html"><h4>Mug</h4></a>
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
            </section>
        </article>
    </main>
    

    
</body>
</html>