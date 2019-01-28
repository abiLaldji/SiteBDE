<?php 
session_start();
use App\Http\Controllers\Controller;
?>

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



@include("header")





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
          <option value="{{$campus[$i]['campus_name']}}">{{$campus[$i]['campus_name']}}</option>
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


    @include("footer")

