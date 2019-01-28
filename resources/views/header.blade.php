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

<body>

    <header id="header">
        <div id="logo-cesi">
        <a href="/"><img src="./pictures/logoCesi.png" alt="logo du cesi"></a>
        </div> 

        <div id="header-right">

            <h1 id="titre">SITE BDE DU CESI PAU</h1>
            <a id="logo-cart" href="cart"><i class="fas fa-shopping-cart"></i></a>
            <a id="logo-profile" href="myAccount"><i class="fas fa-user"></i></a>
        </div>
    </header>


    <nav class="navbar navbar-inverse" id="navbar-id">
        <div class="container-fluid">

            <ul class="nav navbar-nav">

                <li class="active"><a href="/"><i class="fas fa-home ycolor"></i><span class="navtext"> ACCUEIL</span></a></li>

                <li><a href="shop" class="categories"><span class="navtext">BOUTIQUE</span></a></li>
                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="shopCategory">T-shirt</a></li>
                        <li><a href="shopCategory">Pull</a></li>
                        <li><a href="shopCategory">Goodies</a></li>
                    </ul>
                    
                </li>

                <li><a href="events" class="categories"><span class="navtext">ÉVÈNEMENTS</span></a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="events">A venir</a></li>
                        <li><a href="pastEvents">Historique</a></li>
                    </ul>
                </li>

                <li><a href="ideaBox" class="categories"><span class="navtext">BOITE À IDÉES</span></a></li>

            </ul>



            <ul class="nav navbar-nav navbar-right">
                @if (isset($_SESSION['first_name']))
                <li><a href="#"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> {{$_SESSION['first_name']}} {{$_SESSION['last_name']}}</span></a></li>
                <li><a href="deconnexion"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> DECONNEXION</span></a></li>
                @else
                <li><a href="signUp"><span class="glyphicon glyphicon-user ycolor"></span><span  class="navtext"> INSCRIPTION</span></a></li>
                <li><a href="signIn"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> CONNEXION</span></a></li>
                @endif
            </ul>

        </div>
    </nav>
