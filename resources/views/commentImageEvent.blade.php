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
                    <a href="index.html"><img src="assets/style/image/cesi-logob.png"></a>
                </div>
                <div id="header-right">
        
                    <h1 id="titre">SITE BDE DU CESI PAU</h1>
                    <a href="mon_compte.html">mon compte</a>
                    <a id="logo-cart" href="cart.html"><img src="assets/style/image/cart.png"><p id="panier">panier</p></a>
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
            <article id="article-Comment_image_event">
                <h1 class="titre_page">Commentaire</h1>
                <section id="section-image-Comment_image_event" class="border-raduis" >
                    <img id="image-Comment_image_event" class="border-raduis" src="pictures/mug.jpg">
                    <button id="button-section-image-Comment_image_event"><i class="fas fa-thumbs-up"></i></button>
                    <p id="p-section-image-Comment_image_event">10</p>
                </section>
                <section id="section-Comment_image_event" class="border-raduis">
                    <article class="article-Comment_image_event">
                            <div> <br></div>
                            <table id="table-Comment_image_event">
                                <tr class="tr-Comment_image_event">
                                    <td class="td-1-Comment_image_event"><p>Simpson Bart</p></td>
                                    <td class="td-2-Comment_image_event"><p>24/01/2019 10:42</p></td>
                                    <td class="td-3-Comment_image_event">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                                            ultricies sed, dolor.
                                    </td>
                                    <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                                </tr>
                                <tr class="tr-Comment_image_event">
                                    <td class="td-1-Comment_image_event"><p>Simpson Marge</p></td>
                                    <td class="td-2-Comment_image_event"><p>24/01/2019 10:43</p></td>
                                    <td class="td-3-Comment_image_event">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    </td>
                                    <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                                </tr>
                                <tr class="tr-Comment_image_event">
                                    <td class="td-1-Comment_image_event"><p>Simpson Homer</p></td>
                                    <td class="td-2-Comment_image_event"><p>24/01/2019 10:44</p></td>
                                    <td class="td-3-Comment_image_event">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                         Sed non risus. Suspendisse lectus tortor,
                                    </td>
                                    <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                                </tr>
                                <tr class="tr-Comment_image_event">
                                    <td class="td-1-Comment_image_event"><p>Simpson Lisa</p></td>
                                    <td class="td-2-Comment_image_event"><p>24/01/2019 10:42</p></td>
                                    <td class="td-3-Comment_image_event">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                                            ultricies sed, dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    </td>
                                    <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                                </tr>

                            </table>
                            <input type="text" id="input-text-Comment_image_event">
                            <input type="submit" id="input-submit-Comment_image_event" class="border-raduis" value="Poster commentaire">
                            <div> <br></div>
                    </article>
                </section>
            </article>
        </main>

    
</body>
</html>