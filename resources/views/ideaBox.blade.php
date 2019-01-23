<!DOCTYPE html>
<html>
<head>
	<title>Boite à idées</title>
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

         <li><a href="events" class="categories">Évènements</a></li>

          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">A venir</a></li>
                <li><a href="pastEvents">Historique</a></li>
            </ul>
         </li>

        <li><a href="ideaBox" class="categories">Boite à idées</a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="signUp"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
      <li><a href="signIn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
    </ul>

  </div>
</nav>

<main>



	<aside class="aside-ideaBox">

		<h2 class="h2white">Création d'évènement</h2>




		<section class="section-aside-ideaBox">

			<form method="POST" action="signUp">
  					<div class="formulaire">


                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Titre">
                </div>

                <div class="form-group">
                  <textarea class="form-control" placeholder="Description" rows="3"></textarea>
                </div>

    			<div class="form-group">
      				<input type="date" class="form-control optional" placeholder="Date (optionnel)">
      				<p class="optional-text">Optionnel</p>
   				</div>

    				</div>


    						<div class="center">
			    			<img src="./pictures/stylo2.png" alt="" class="picture-event">
          					</div>

          					<div class="center">
    								<label class="btn btn-default btn-file">
    								Parcourir <input type="file" style="display: none;">
									</label>
							</div>

    					<div class="connecIns">
    							<button type="submit" class="btn btn-primary">Publier</button>

    					</div>

  				</form>

		</section>

	</aside>

	<article class="article-center3">

		<h2 class="h2white">Idées d'évènements</h2>

		<section class="section-center">

			<table class="table-event">

					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<div class="desc-right">
								<i class="fas fa-check"></i>
								<i class="fas fa-times"></i>
								<i class="fas fa-thumbs-up"></i>
							</div>
							<div class="desc-left">
								<p class="bold">Titre :</p>
								<p class="bold">Organisateur :</p>
								<p class="bold">Date :</p> 
								<p class="desc-event"><span class="bold">Description :</span>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
							</div>
							
						</td>
					</tr>

					<tr>
					<td><img src="./pictures/stylo1.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<div class="desc-right">
								<i class="fas fa-check"></i>
								<i class="fas fa-times"></i>
								<i class="fas fa-thumbs-up"></i>
							</div>
							<div class="desc-left">
								<p class="bold">Titre :</p>
								<p class="bold">Organisateur :</p>
								<p class="bold">Date :</p> 
								<p class="desc-event"><span class="bold">Description :</span>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
							</div>
							
						</td>
					</tr>

					<tr>
						<td><img src="./pictures/stylo3.png" alt="" class="pic-event"></td>
							<td class="td-event-left">
								<div class="desc-right">
									<i class="fas fa-check"></i>
									<i class="fas fa-times"></i>
									<i class="fas fa-thumbs-up"></i>
								</div>
								<div class="desc-left">
									<p class="bold">Titre :</p>
									<p class="bold">Organisateur :</p>
									<p class="bold">Date :</p> 
									<p class="desc-event"><span class="bold">Description :</span>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
								</div>
								
							</td>
					</tr>

					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<div class="desc-right">
								<i class="fas fa-check"></i>
								<i class="fas fa-times"></i>
								<i class="fas fa-thumbs-up"></i>
							</div>
							<div class="desc-left">
								<p class="bold">Titre :</p>
								<p class="bold">Organisateur :</p>
								<p class="bold">Date :</p> 
								<p class="desc-event"><span class="bold">Description :</span>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
							</div>
							
						</td>
					</tr>

					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<div class="desc-right">
								<i class="fas fa-check"></i>
								<i class="fas fa-times"></i>
								<i class="fas fa-thumbs-up"></i>
							</div>
							<div class="desc-left">
								<p class="bold">Titre :</p>
								<p class="bold">Organisateur :</p>
								<p class="bold">Date :</p> 
								<p class="desc-event"><span class="bold">Description :</span>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo	consequat.</p>
							</div>
							
						</td>
					</tr>

				</table>

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