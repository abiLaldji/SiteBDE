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
    <article id="article-image_event">
      <h1 class="titre-page">Liste des photos</h1>
      <section id="section-image_event" class="border-raduis">
        <h2 id="name-event-image_event">Festival de Cannes</h2>
        <article class="article-image_event">
          <p class="name-image_event">Johnny Depp</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/hoodi.png" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <article class="article-image_event">
          <p class="name-image_event">Michael Jackson</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/mug.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <article class="article-image_event">
          <p class="name-image_event">Barack Obama</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/stylo.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <article class="article-image_event">
          <p class="name-image_event">Nelson Mandela</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/hoodi.png" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <article class="article-image_event">
          <p class="name-image_event">Tony Stark</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/mug.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <article class="article-image_event">
          <p class="name-image_event">Sylvester Stallone</p>
          <a class="a-image_event" href="commentImageEvent"><img src="pictures/stylo.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
          <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
        </article>
        <div id="div-image_event"> <br> </div>
      </section>
      <div> <br> </div>
    </article>
  </main>
  

  
</body>
</html>