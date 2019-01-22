<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./fontawesome/css/all.min.css">

</head>
<body>

<header id="header">
        <div id="logo-cesi">
            <img src="./pictures/logoCesi.png">
        </div>

        <div id="header-right">

            <h1 id="titre">SITE BDE DU CESI PAU</h1>
            <a id="logo-cart" href="cart"><i class="fas fa-shopping-cart"></i></a>
            <a id="logo-profile" href="myprofile.html"><i class="fas fa-user"></i></a>
        </div>
</header>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">

      <li class="active"><a href="/"><i class="fas fa-home"></i> Accueil</a></li>

      <li><a href="#" class="categories">Boutique</a></li>
      
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pull</a></li>
                <li><a href="#">Goodies</a></li>
            </ul>
      
         </li>

         <li><a href="#" class="categories">Évènements</a></li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">A venir</a></li>
                <li><a href="#">Historique</a></li>
            </ul>
         </li>

        <li><a href="#" class="categories">Boite à idées</a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="signUp"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
      <li><a href="signIn"><span class="glyphicon glyphicon-log-in"></span> Connection</a></li>
    </ul>

  </div>
</nav>


<main>

	<article class="article-center">

		<section class="section-center">

			<h2>Inscription</h2>

			<article class="article2">

				<form>
					<div class="formulaire">

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Prenom">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom">
              </div>

  						<div class="form-group">
    						<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Adresse mail">
 					 	  </div>

  						<div class="form-group">
    						<input type="password" class="form-control" placeholder="Mot de passe">
  						</div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirmez le mot de passe">
              </div>

  				</div>

  					<div class="connecIns">
  							<button type="submit" class="btn btn-primary">S'inscrire</button>
  					</div>

				</form>

        <div class="already">Déjà inscrit ? <a href="signIn"><span>Se connecter</span></a> </div>

			</article>



		</section>

	</article>

</main>

    <footer>   

        <p class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </p>

    </footer>

</body>
</html>