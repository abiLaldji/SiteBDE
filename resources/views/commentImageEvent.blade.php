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
    <article id="article-Comment_image_event">
        <h1 class="titre_page">Commentaire</h1>
        <section id="section-image-Comment_image_event" class="border-raduis" >
            <img id="image-Comment_image_event" class="border-raduis" src="pictures/mug.jpg">
            <button id="button-section-image-Comment_image_event"><i class="fas fa-thumbs-up"></i></button>
            <p id="p-section-image-Comment_image_event">10</p>
        </section>
        <section id="section-Comment_image_event" class="border-raduis">
            <article class="article-Comment_image_event">
                <div> <br></div>
                <table id="table-Comment_image_event">
                    <tr class="tr-Comment_image_event">
                        <td class="td-1-Comment_image_event"><p>Simpson Bart</p></td>
                        <td class="td-2-Comment_image_event"><p>24/01/2019 10:42</p></td>
                        <td class="td-3-Comment_image_event">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                            ultricies sed, dolor.
                        </td>
                        <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                    </tr>
                    <tr class="tr-Comment_image_event">
                        <td class="td-1-Comment_image_event"><p>Simpson Marge</p></td>
                        <td class="td-2-Comment_image_event"><p>24/01/2019 10:43</p></td>
                        <td class="td-3-Comment_image_event">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        </td>
                        <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                    </tr>
                    <tr class="tr-Comment_image_event">
                        <td class="td-1-Comment_image_event"><p>Simpson Homer</p></td>
                        <td class="td-2-Comment_image_event"><p>24/01/2019 10:44</p></td>
                        <td class="td-3-Comment_image_event">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed non risus. Suspendisse lectus tortor,
                        </td>
                        <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                    </tr>
                    <tr class="tr-Comment_image_event">
                        <td class="td-1-Comment_image_event"><p>Simpson Lisa</p></td>
                        <td class="td-2-Comment_image_event"><p>24/01/2019 10:42</p></td>
                        <td class="td-3-Comment_image_event">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, 
                            ultricies sed, dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        </td>
                        <td class="td-4-Comment_image_event"><input type="image" src="pictures/suppr.png" class="suppr-category"></td>
                    </tr>

                </table>
                <input type="text" id="input-text-Comment_image_event">
                <input type="submit" id="input-submit-Comment_image_event" class="border-raduis" value="Poster commentaire">
                <div> <br></div>
            </article>
        </section>
    </article>
</main>




@include("footer")
