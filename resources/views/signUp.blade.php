<?php 
session_start();
use App\Http\Controllers\Controller;
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <!-- bootstrap link-->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <!-- FontAwesome link-->
  <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  


</head>

@include("header")

<main>
  <!--Principal article of the signUp page-->
  <article class="signUp-article-center">

    <section class="signUp-section-center">

     <h2>Inscription</h2>
     <div class="blue-stripe"><br></div>


     @if (isset($_SESSION['id_user']))
     <p> Vous êtes déjà connecté </p>
     @else
     <!--signUp form-->
     <form name="signUp" method="POST" action="signUp" onsubmit="return validateFormSignUp(this); ">
       <div class="formulaire">

        @csrf <!--Token for Laravel-->

        @isset ($_GET['userExist'])
        <p class="error">L'adresse email est déjà utilisée</p>
        @endisset

        <div class="form-group">
          <!--First name-->
          <input type="text" class="form-control" name="first_name" placeholder="Prenom">
          <div id ="error_fname">
          </div>
        </div>

        <div class="form-group">
          <!--Last name-->
          <input type="text" class="form-control" name="last_name" placeholder="Nom">
          <div id ="error_lname">
          </div>
        </div>
        <!--CESI Campus Selection-->
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
          <input type="email" class="form-control" name="email" placeholder="Adresse mail">
          <div id ="error_email">
          </div>
        </div>

        <div class="form-group">
          <!--Password-->
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
          <div id ="error_password"></div>
        </div>

        <div class="form-group">
          <!--Password confirmation-->
          <input type="password" class="form-control" name="password_conf" placeholder="Confirmez le mot de passe">
          <div id ="error_password_conf">
          </div>
        </div>

        <!--Statut field of the POST method-->
        <input type="hidden" name="status" value="student">

      </div>

      <div class="connecIns">
        <!--Registration button-->
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </div>

    </form>
    <!--Sentence to redirect people already registered to the login page-->
    <div class="already">Déjà inscrit ? <a href="signIn"><span>Se connecter</span></a> </div>

    @endif

  </section>

</article>

</main>


    @include("footer")
    <script type="text/javascript" src="{{ URL::asset('js/checkForms.js') }}"></script>


<script  src="{{ URL::asset('js/checkForms.js') }}"></script>
</body>
</html>