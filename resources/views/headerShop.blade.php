
<body>

    <!--header-->
    <header id="header">
        <!-- display the logo CESI -->
        <div id="logo-cesi">
            <a href="/"><img src="{{asset('/pictures/logoCesi.png')}}" alt="logo du cesi"></a>
        </div>

        <div id="header-right">


                <h1 id="titre">SITE BDE DU CESI PAU</h1>
                <a id="logo-cart" href="{{url('cart')}}"><i class="fas fa-shopping-cart"></i></a>
                <a id="logo-profile" href="{{url('myAccount')}}"><i class="fas fa-user"></i></a>
            </div>
    </header>


    <!--nav bar-->
    <nav class="navbar navbar-inverse" id="navbar-id">
        <div class="container-fluid">

            <ul class="nav navbar-nav">

                <li class="active"><a href="{{url('/')}}"><i class="fas fa-home ycolor"></i><span class="navtext"> ACCUEIL</span></a></li>


                <li><a href="{{url('shop')}}" class="categories"><span class="navtext">BOUTIQUE</span></a></li>
                

                <li><a href="shop" class="categories float-left"><span class="navtext">BOUTIQUE</span></a></li>
                <!--different categories of the shop-->
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="shopCategory">T-shirt</a></li>
                        <li><a href="shopCategory">Pull</a></li>
                        <li><a href="shopCategory">Goodies</a></li>
                    </ul>
                    
                </li>

                <li><a href="{{url('events')}}" class="categories"><span class="navtext">ÉVÈNEMENTS</span></a></li>

                <!--different type of event-->
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('events')}}">A venir</a></li>
                        <li><a href="{{url('pastEvents')}}">Historique</a></li>
                    </ul>
                </li>

                <li><a href="{{url('ideaBox')}}" class="categories"><span class="navtext">BOITE À IDÉES</span></a></li>

            </ul>

            <ul id="navbar-search-bar">
                <!--Make sure the form has the autocomplete function switched off:-->
                <form autocomplete="off" action="/action_page.php">
                    <div class="autocomplete" style="width:300px;">
                        <input id="myInput" type="text" name="myCountry" placeholder="Rechercher produit">
                    </div>
                    <input type="submit">
                </form>

            </ul>

            <!-- display connection/registration or  my account/disconnection-->
            <ul class="nav navbar-nav navbar-right">
                @if (isset($_SESSION['first_name']))
                <li><a href="{{url('myAccount')}}"><span class="glyphicon glyphicon-user ycolor"></span><span class="navtext"> {{$_SESSION['first_name']}} {{$_SESSION['last_name']}}</span></a></li>
                <li><a href="{{url('deconnexion')}}"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> DECONNEXION</span></a></li>
                @else
                <li><a href="{{url('signUp')}}"><span class="glyphicon glyphicon-user ycolor"></span><span  class="navtext"> INSCRIPTION</span></a></li>
                <li><a href="{{url('signIn')}}"><span class="glyphicon glyphicon-log-in ycolor"></span><span  class="navtext"> CONNEXION</span></a></li>
                @endif
            </ul>

        </div>
    </nav>

