<?php
use App\Http\Controllers\Controller
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



		<aside class="event-aside">

			




			<section class="section-aside-event">
				<h2>Évènement du mois</h2>
				<?php 
				$controller = new Controller();
				$monthEvent = $controller->getMonthEvent();
				?>

				<h3>{{$monthEvent['title']}}</h3>

				<div class="pic-view">
					<img src="./pictures/stylo2.png" alt="" class="event-month-pic">
				</div>

				<div class="desc-event-month">

					<p><span class="bold">Description :</span> {{$monthEvent['description']}}</p>

				</div>

				<p><span class="bold">Organisateur : {{$monthEvent['first_name'] . ' ' . $monthEvent['last_name']}}</span></p>
				<p><span class="bold">Date : {{$monthEvent['date']}}</span></p>

			</section>

		</aside>

		<article class="event-article-center">

			

			<section class="event-section-center">
			<h2>Évènements à venir</h2>
				<table class="table-event">

					<?php 
					$events = $controller->getNextEvents();
					?>

					@for ($i = 0; $i < sizeof($events); $i++)
					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<p class="bold">Titre : {{$events[$i]['title']}}</p>
							<p class="bold">Organisateur : {{$events[$i]['first_name'] . ' ' . $events[$i]['last_name']}}</p>
							<p class="bold">Date : {{$events[$i]['date']}}</p> 
							<p class="desc-event"><span class="bold">Description :</span> {{$events[$i]['description']}}</p>
						</td>
						<td class="td-img-event">
							<div>
								<button type="submit" class="btn btn-primary">S'inscrire</button>
							</div>
						</td>
					</tr>
					@endfor
				</table>
				
			</section>

		</article>

	</main>




@include("footer")
