<?php 
session_start();
use App\Http\Controllers\Controller;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
      <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  <script type="text/javascript" src="{{ URL::asset('js/checkForms.js') }}"></script>

</head>

@include("header")

  <main>

   <article class="signUp-article-center">

    <section class="signUp-section-center">

     <h2>Inscription</h2>
     <div class="blue-stripe"><br></div>


     @if (isset($_SESSION['id_user']))
     <p> Vous êtes déjà connecté </p>
     @else
     <!--Formulaire d'inscription-->
     <form name="signUp" method="POST" action="signUp" onsubmit="return validateFormSignUp(this); ">
       <div class="formulaire">

                @csrf

                @isset ($_GET['userExist'])
                  <p class="error">L'adresse email est déjà utilisée</p>
                @endisset

        <div class="form-group">
          <!--Prenom-->
          <input type="text" class="form-control" name="first_name" placeholder="Prenom">
          <div id ="error_fname">
							</div>
        </div>

        <div class="form-group">
          <!--Nom-->
          <input type="text" class="form-control" name="last_name" placeholder="Nom">
          <div id ="error_lname">
							</div>
        </div>
        <!--Sélection du campus Cesi-->
        <select class=form-control name="campus_name">
<?php 
  $controller = new Controller();
  $campus = $controller->getCampus();
?>
                  @for ($i = 0; $i < sizeof($campus); $i++)
                    <option value="{{$campus[$i]['campus_name']}}">{{$campus[$i]['campus_name']}}</option>
                  @endfor
                 </select>

        <div class="form-group">
          <!--email-->
          <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Adresse mail">
          <div id ="error_email">
							</div>
        </div>

        <div class="form-group">
          <!--Mot de passe-->
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
          <div id ="error_password">
							</div>
        </div>

        <div class="form-group">
          <!--Confirmation mot de passe-->
          <input type="password" class="form-control" name="password_conf" placeholder="Confirmez le mot de passe">
          <div id ="error_password_conf">
							</div>
        </div>

        <input type="hidden" name="status" value="etudiant">

      </div>

      <div class="connecIns">
        <!--Bouton d'inscription-->
       <button type="submit" class="btn btn-primary">S'inscrire</button>
     </div>

   </form>
   <!--Phrase permettant de de rediriger les personnes deja inscrites vers la page de connexion-->
   <div class="already">Déjà inscrit ? <a href="signIn"><span>Se connecter</span></a> </div>

   @endif

 </section>

</article>

</main>

    @include("footer")

    </body>
</html>