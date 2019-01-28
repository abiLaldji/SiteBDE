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


		<article class="pastevent-article-center">

			<h2 class="h2white"> Évènements passés </h2>

			<section class="pastevent-section-center">

				<table class="table-event">


					<?php 
					$controller = new Controller();
					$events = $controller->getEvents();
					?>
					@for ($i = 0; $i < sizeof($events); $i++)
					<tr>
						<td><img src="./pictures/stylo2.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<p class="bold">Titre : {{$events[$i]['title']}}</p>
							<p class="bold">Organisateur : {{$events[$i]['first_name'] . ' ' . $events[$i]['last_name']}}</p>
							<p class="bold">Date : {{$events[$i]['date']}}</p> 
							<p class="desc-event"><span class="bold">Description : </span>{{$events[$i]['description']}}</p>

							<div>
								<button type="submit" class="btn btn-primary btn-infos">Plus d'infos</button>
							</div>
						</td>
					</tr>
					@endfor
				</table>




		</section>

	</article>
	
</main>

    @include("footer")

