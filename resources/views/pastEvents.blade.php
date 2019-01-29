<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Evènement passé</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>


@include("header")

	<main>

		<article class="pastevent-article-center">

			<section class="pastevent-section-center">
				<h2> Évènements passés </h2>
				<div class="blue-stripe"><br></div>
				<!--Table containing the list of past events and their description-->
				<table class="table-event">

<?php 
$controller = new Controller();
$events = $controller->getPastEvents();
?>
 					@for ($i = 0; $i < sizeof($events); $i++)

					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<p class="bold">Titre : {{$events[$i]['title']}}</p>
							<p class="bold">Organisateur : {{$events[$i]['first_name'] . ' ' . $events[$i]['last_name']}}</p>
							<p class="bold">Date : {{$events[$i]['date']}}</p> 
							<p class="desc-event"><span class="bold">Description : </span>{{$events[$i]['description']}}</p>
							<!--Button to get more info about an event-->
							<div>
								<a href="imageEvent" class="btn btn-primary btn-infos">Plus d'infos</a>
							</div>
						</td>
					</tr>
					@endfor
				</table>




		</section>

	</article>
	
</main>

    @include("footer")

	</body>
</html>