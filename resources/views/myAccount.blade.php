<?php 
session_start();
if (!isset($_SESSION['id_user'])){
    header("Location: signIn");
    exit();
}
use App\Http\Controllers\Controller;
?>
<!DOCTYPE html>
<html lang='fr'>
    <head>
        <title>Mon compte</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        
        <!-- bootstrap link-->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <!-- FontAwesome link-->
        <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    
    </head>

@include("header")

   
    <main>
        <article id="article_compte">
            <!--displays a form that allows to modify our profile-->
            <section id="section_compte">
                <h2>Mon compte</h2>
                <div class="blue-stripe"><br></div>
                    @if($_SESSION['status'] == 'bde_member')
                        <!--redirection to add product-->
                        <button id="key-admin"><i class="fas fa-key"></i></button>
                    @endif
                    @if($_SESSION['status'] == 'employe')
                        <!--allows us to download all images-->
                        <button id="download-all-pic"><i class="fas fa-file-download"></i></button>
                    @endif
                    <!--form-->
                    <form method="POST" action="putUser">

                        @csrf

                        <label id="first-label-compte"> Nom : {{$_SESSION['last_name']}}   </label><input type="text" placeholder="Nouveau nom"  class="border-raduis input-account" name="first_name"><br><br>
                        <label> Prénom : {{$_SESSION['first_name']}}</label>   <input type="text" placeholder="Nouveau prenom"  class="border-raduis input-account" name="last_name"><br><br>
                        <label for="campus">Centre CESI : </label>
                        <select name="campus_name" id="campus" class="border-raduis">
                            <optgroup label='Centre Actuel'>
                                <option value="{{$_SESSION['campus_name']}}">{{$_SESSION['campus_name']}}</option>
                            </optgroup>
                            <optgroup label='Nouveau Centre'>
<?php  
$controller = new Controller();
$campus = $controller->getCampus();
?>
                                @for($i=0 ; $i < sizeof($campus) ; $i++)
                                    <option value="{{$campus[$i]['campus_name']}}">{{$campus[$i]['campus_name']}}</option>
                                @endfor

                            </optgroup>

                        </select><br><br>
                        <label> Adresse mail : {{$_SESSION['email']}}   </label><input type="text" placeholder="Nouvelle adresse"  class="border-raduis input-account" name="email"><br><br>
                        <label> Changer de mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis input-account" name="password"><br><br>
                        <label> Retaper le nouveau mot de passe   </label><input type="text" placeholder="Nouveau mot de passe"  class="border-raduis input-account" name="password_conf"><br><br>
                        <input id="valider-les-modifications" type="submit" value="Valider les modifications">
                    </form>
                    <div><br></div>
                </section>
            </article>
        </main>

        
@include("footer")


</body>
</html>