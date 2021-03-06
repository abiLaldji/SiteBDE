<?php 
use App\Http\Controllers\Controller;
session_start();
?>

<!DOCTYPE html>
<html lang='fr'>
	<head>

		<title>Boîte à idées</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/style.css">

		<!-- bootstrap link-->
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
		<!-- FontAwesome link-->
		<link rel="stylesheet" href="./fontawesome/css/all.min.css">

	</head>


@include("header")
<main>

	<aside class="aside-ideaBox">

		<section class="section-aside-ideaBox">
			<h2>Création d'évènement</h2>
			<div class="gray-stripe"><br></div>
			<form method="POST" action="submitIdea" onsubmit="return validateFormIdeaBox(this);" enctype="multipart/form-data">
				<!--Form for creating an idea of ​​an event-->
				<div class="formulaire">

					@csrf <!--token for Laravel-->

					@if (isset($_GET['fieldEmpty']))
					<p class='error'>Tous les champs obligatoires doivent être remplis</p>
					@endif

					@if (isset($_GET['notConnected']))
					<p class="error">Vous devez être connecté pour ajouter une idée</p>
					@endif
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Titre" name="title">
					</div>
					<!--Description of the event-->
					<div class="form-group">
						<textarea class="form-control" placeholder="Description" rows="3" name="description"></textarea>
					</div>

					<div class="form-group">
						<input type="date" class="form-control optional" name="date">
						<p class="optional-text">Optionnel</p>
					</div>
					<!--Image chosen to illustrate the event-->
					<div class="center">
						<img src="./pictures/stylo2.png" alt="" class="picture-event preview">
					</div>

					<div class="center">
						<!--"Browse" button to choose the desired image on your computer-->
						<label class="btn btn-default btn-file">
							Parcourir <input type="file" style="display: none;" onchange="readURL(this);" name="picture">
						</label>
					</div>
					<!--Validation button, to publish his idea-->
					<div class="connecIns">
						<button type="submit" class="btn btn-primary">Publier</button>

					</div>
				</div>
			</form>

		</section>

	</aside>

	<article class="ib-article-center">

		<section class="ib-section-center">
			<h2>Idées d'évènements</h2>
			<div class="blue-stripe"><br></div>

			<table class="table-event">
					<?php 
					$controller = new Controller();
					$ideas = $controller->getIdeas();
					?>
					@for ($i = 0; $i < sizeof($ideas); $i++)
					@if($ideas[$i]['is_public'] == 1)
					<tr>
						<td><img src="./pictures/defaultPicture.png" alt="" class="pic-event"></td>
						<td class="td-event-left">
							<!--Logo to validate or delete an idea-->
							<div class="desc-right">

								<a href="approveIdea/{{$ideas[$i]['id_event']}}"><button class="fas fa-check ideabox-check"></button></a>
								<a href="declineIdea/{{$ideas[$i]['id_event']}}"><button class="fas fa-times ideabox-cross"></button>

							</div>
							<div class="desc-left">
								<p class="bold">Titre : {{$ideas[$i]['title']}}</p>
								<p class="bold">Organisateur : {{$ideas[$i]['first_name'] . ' ' . $ideas[$i]['last_name']}}</p>
								<p class="bold">Date : {{$ideas[$i]['date']}}</p> 
								<p class="desc-event"><span class="bold">Description :</span> {{$ideas[$i]['description']}}</p>
								<!--Logos to like an idea or to report it-->
								<div class="like">
									<a href="/"><i class="fas fa-thumbs-up ideabox-thumb"></i></a>
									<p class="like-counter">1</p>
									<i class="fas fa-flag ideabox-flag"></i>
								</div>
							</div>
						</div>

					</td>
				</tr>
				@endif
				@endfor

			</table>

		</section>

	</article>

</main>

    @include("footer")

	<script src="{{ URL::asset('js/checkForms.js') }}"></script>
    <script src="{{ URL::asset('js/picturePreview.js') }}"></script>

	</body>
</html>

