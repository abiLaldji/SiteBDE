<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
     <!-- bootstrap link-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- FontAwesome link-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
  
</head>

@include("headerShop")

  <main>

   <article class="cart-article-center">

    

    <?php /*$_COOKIE['cart'] = [['pictureURL' => './pictures/stylo1.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '52', 'unitPrice' => '14'], ['pictureURL' => './pictures/stylo2.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '14', 'unitPrice' => '128'],['pictureURL' => './pictures/stylo3.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '25', 'unitPrice' => '4'],['pictureURL' => './pictures/stylo1.png', 'name' => 'leNom', 'description' => 'ceci', 'quantity' => '8', 'unitPrice' => '54']] */ ?>
    @if (isset($_COOKIE['cart']))

    <section class="cart-section-center">
      <h2>Panier</h2>
      <div class="blue-stripe"><br></div>
      <table class="table-cart">

        <tr>
         <th>Image</th>
         <th>Description</th>
         <th>Quantité</th>
         <th>Prix unitaire</th>
         <th>Prix total</th>
         <th>Annuler</th>
       </tr>

       <?php $total = 0; ?>
       @for ($i = 0; $i < sizeof($_COOKIE['cart']) ; $i++)
       <tr>
        <td><img src="{{$_COOKIE['cart'][$i]['pictureURL']}}" alt="" class="img-article"></td>
        <td><span class="blod">{{$_COOKIE['cart'][$i]['name']}} : </span>{{$_COOKIE['cart'][$i]['description']}}</td>
        <td>{{$_COOKIE['cart'][$i]['quantity']}}</td>
        <td>{{$_COOKIE['cart'][$i]['unitPrice']}}</td>
        <td>
         <?php 
         $subTotal = $_COOKIE['cart'][$i]['quantity'] * $_COOKIE['cart'][$i]['unitPrice'];
         $total += $subTotal;
         echo $subTotal;
         ?>
       </td>
       <td><i class="fas fa-times"></i></td>
     </tr>
     @endfor



   </table>

   <div class="confirmation-cart">
    <p class="prix-total-cart">Prix total : <span class="right">{{$total}} €</span></p>						
    <button type="button" values="Commander" onclick="" class="order-cart">Commander</button>
  </div>

</section>
@else

<section class="section-center section-empty-cart">
  <h2>Panier</h2>
    <div class="blue-stripe"><br></div>
 <p>Vous n'avez pas de produits dans votre panier.</p>
</section>
@endif


</article>

</main>



@include("footer")

