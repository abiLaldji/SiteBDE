<!DOCTYPE html>
<html lang='fr'>
	<head>
		<title>Contact</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		
		<!-- bootstrap link-->
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
		<!-- FontAwesome link-->
		<link rel="stylesheet" href="./fontawesome/css/all.min.css">
	
	</head>


@include("header")

	<main>
		<!--Principal article of the contact page-->
		<article class="contact-article-center">
			<!--Principal section of the contact page-->
			<section class="contact-section-center">

				<h2>Contact</h2>
				<div class="blue-stripe"><br></div>

				<div class="center">
					<!--Envelope logo + email address-->
					<div class="email-div">

						<i class="fas fa-envelope email-pic"></i>
						<p class="email-address"><a href="mailto:bde.pau@cesi.fr">bde.pau@cesi.fr</a></p>

					</div>
					<!--Phone logo + phone number-->
					<div class="phone-number-div">

						<i class="fas fa-phone phone-pic"></i>
						<p class="phone-number"><a href="tel:0651898314">0651898314</a></p>

					</div>

				</div>

			</section>

		</article>

	</main>

    @include("footer")

	</body>
</html>