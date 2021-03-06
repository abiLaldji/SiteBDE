<!DOCTYPE html>
<html lang='fr'>
    <head>

        <title>Image de l'évènement</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        
        <!-- bootstrap link-->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <!-- FontAwesome link-->
        <link rel="stylesheet" href="./fontawesome/css/all.min.css">

    
    </head>

@include("header")
    
    <main>
        <article id="article-image_event">
            <!-- display all image of one event-->
            <section id="section-image_event">
            <h2 class="text-black">Liste des photos</h2>
            <div class="blue-stripe"><br></div>
                <!--title of event-->
                <h3 id="name-event-image_event">Festival de Cannes</h3>
                <!--one image-->
                <article class="article-image_event">
                    <!--title of image-->
                    <p class="name-image_event">Depp</p>
                    <!--redirection to comment on the image-->
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/hoodi.png" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <!--this button allows us to count the number of likes-->
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <article class="article-image_event">
                    <p class="name-image_event">Jackson</p>
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/mug.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <article class="article-image_event">
                    <p class="name-image_event">Obama</p>
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/stylo.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <article class="article-image_event">
                    <p class="name-image_event">Mandela</p>
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/hoodi.png" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <article class="article-image_event">
                    <p class="name-image_event">Stark</p>
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/mug.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <article class="article-image_event">
                    <p class="name-image_event">Stallone</p>
                    <a class="a-image_event" href="commentImageEvent"><img src="pictures/stylo.jpg" class="image-image_event"><p class="p-image_event">Commenter</p></a>
                    <button class="button-image_event"><i class="fas fa-thumbs-up"></i></button>
                </article>
                <div id="div-image_event"> <br> </div>
            </section>
            <div> <br> </div>
    </article>
  </main>
  
@include("footer")


</body>
</html>