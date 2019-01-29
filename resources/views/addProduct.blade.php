<?php 
use App\Http\Controllers\Controller;
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter produit</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>


@include("header")


  <main>

   <article class="addProduct-article-center">

    

    <section class="addProduct-section-center">
      <h2> Ajout de produit </h2>

      <div class="center">
       <img src="./pictures/stylo2.png" alt="" class="picture-product preview">
     </div>

     <!--Form to add a product-->
     <form method="POST" action="addProduct">
      <div class="center">
        <!--Selection of the image-->
        <label class="btn btn-default btn-file">
          Parcourir <input type="file" style="display: none;" onchange="readURL(this);" name="picutre_url">
        </label>
      </div>

      @csrf
      <!--Selection of other information-->
      <div class="formulaire">
        <div class="form-group">
          <!-- Name of the product-->
          <input type="text" class="form-control" placeholder="Nom du produit" name="name">
        </div>
        <select class=form-control name="name_category">
<?php 
 $controller = new Controller();
 $categories = $controller->getCategories();
?>
          @for ($i = 0; $i < sizeof($categories); $i++)
          <option value="{{$categories[$i]['name']}}">{{$categories[$i]['name']}}</option>
          @endfor
        </select>
        <div class="form-group">
          <!--Price of the product-->
          <input type="number" class="form-control" placeholder="Prix" name="price">
        </div>
        <div class="form-group">
          <!--Description-->
          <textarea class="form-control" placeholder="Description" rows="3" name="description"></textarea>
        </div>

      </div>
      <!-- Validation button-->
      <div class="connecIns">
       <button type="submit" class="btn btn-primary">Valider</button>
     </div>
   </form>

 </section>

</article>

</main>

@include("footer")


  <script type="text/javascript" src="{{ URL::asset('js/picturePreview.js') }}"></script>
  
</body>
</html>