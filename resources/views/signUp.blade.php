<?php 
session_start();
use App\Http\Controllers\Controller;
?>

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
            <a id="logo-profile" href="myprofile"><i class="fas fa-user"></i></a>
        </div>
</header>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">

      <li class="active"><a href="/"><i class="fas fa-home ycolor"></i><span class="navtext"> ACCUEIL</span></a></li>

      <li><a href="#" class="categories"><span class="navtext">BOUTIQUE</span></a></li>
      
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pull</a></li>
                <li><a href="#">Goodies</a></li>
            </ul>
      
         </li>

         <li><a href="events" class="categories"><span class="navtext">ÉVÈNEMENTS</span></a></li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">A venir</a></li>
                <li><a href="pastEvents">Historique</a></li>
            </ul>
         </li>

        <li><a href="ideaBox" class="categories"><span class="navtext">BOITE À IDÉES</span></a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
    @if (isset($_SESSION['firstName']))
        <li><a href="#"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> {{$_SESSION['firstName']}} {{$_SESSION['lastName']}}</span></a></li>
        <li><a href="deconnexion"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> DECONNEXION</span></a></li>
    @else
        <li><a href="signUp"><span class="glyphicon glyphicon-user ycolor"></span><span  class="navtext"> INSCRIPTION</span></a></li>
        <li><a href="signIn"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> CONNEXION</span></a></li>
    @endif
    </ul>


  </div>
</nav>


<main>

	<article class="signUp-article-center">

		<section class="signUp-section-center">

			<h2>Inscription</h2>


      @if (isset($_SESSION['firstName']))
        <p> Vous êtes déjà connecté </p>
      @else

  				<form method="POST" action="signUp">
  					<div class="formulaire">

                @csrf

                @isset ($_GET['fieldEmpty'])
                  <p class="error">Tous les champs doivent être remplis</p>
                @endisset

                <div class="form-group">
                  <input type="text" class="form-control" name="first_name" placeholder="Prenom">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="last_name" placeholder="Nom">
                </div>

                <select class=form-control name="campus">
<?php 
  $controller = new Controller();
  $campus = $controller->getCampus();
?>
                  @for ($i = 0; $i < sizeof($campus); $i++)
                    <option value="{{$campus[$i]}}">{{$campus[$i]}}</option>
                  @endfor
                 </select>

    						<div class="form-group">
      						<input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Adresse mail">
   					 	  </div>

                @isset ($_GET['badEmail'])
                  <p class="error">L'adresse mail doit être de type @viacesi.fr ou @cesi.fr</p>
                @endisset

    						<div class="form-group">
      						<input type="password" class="form-control" name="password" placeholder="Mot de passe">
    						</div>

                <div class="form-group">
                  <input type="password" class="form-control" name="password_conf" placeholder="Confirmez le mot de passe">
                </div>

                @isset ($_GET['differentPasswords'])
                  <p class="error">Les mots de passe doivent être identiques</p>
                @endisset

                <input type="hidden" name="status" value="etudiant">

    				</div>

    					<div class="connecIns">
    							<button type="submit" class="btn btn-primary">S'inscrire</button>
    					</div>

  				</form>

          <div class="already">Déjà inscrit ? <a href="signIn"><span>Se connecter</span></a> </div>

      @endif


		</section>

	</article>

</main>

    <footer> 

      <div class="footer-ln">
        <div>
          <p><a href="legalNotice" class="navtext">Mentions légales</a></p>
        </div>
        <div class="f-center">
          <p><a href="privacyPolicy" class="navtext">Politique de confidentialité</a></p>
        </div>
        <div>
          <p><a href="terms&conditions" class="navtext">Conditions générales de vente</a></p>
        </div>
      </div>

        <div class="reseau-logo">
          <a href=""><i class="fab fa-twitter"> </i></a>
          <a href=""><i class="fab fa-facebook"> </i></a>
          <a href=""><i class="fab fa-instagram"> </i></a>
          <a href=""><i class="fab fa-linkedin-in"> </i></a>
        </div>
        <div class="contact">
          <i class="fas fa-phone ycolor phone-mini"></i>
          <p><a href="contact" class="navtext">CONTACT</a></p>
        </div>

        <div class="footer-text">
            Site officiel du BDE du centre CESI de Pau. Nous proposons régulièrement des activités afin d'animer la vie au campus, nous vous permettont également de proposer des idées d'activités et de voter pour celles qui sont proposés. Une boutique est également à votre disposition afin d'acquérir différents goudies en rapport avec le CESI, ce qui vous permettra de garder un souvenir de votre scolarité. 
        </div>
        <div class="footer-text">
           © CESI 2019
        </div>

    </footer>

</body>
</html>