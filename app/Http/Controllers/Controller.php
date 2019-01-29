<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


// The API IP
const IP = '10.64.128.131:3001';

// The token for the API
const TOKEN = '8SIE4CaWSiGb9IFQa8DSPyXVQ63n9jWHiXRsatOpoxBrHyxKKnTSFOC8TpIWxo4F';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    // sign in a new user
    public function signIn(){
    	// check if user has accepted cookies
    	if(isset($_COOKIE['isUsingCookies']) && $_COOKIE['isUsingCookies'] == true && isset($_POST['remember_me'])){
    		unset($_POST['remember_me']);
    		setcookie('remember_me', true, time()+60*60*24*365);
    	}

    	// encode the request content in json
		json_encode($_POST);

		// request the user from the API that possesses the entered email
		// prepares the resquest
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/email/" . $_POST['email']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);


		if($output != '[]'){
			$output = json_decode($output, true)[0];
			var_dump($output);

			// if the password is correct, connect the user
			if($output['password'] == hash('sha256', $_POST['password'])){
				session_start();
				$_SESSION['first_name'] = $output['first_name'];
				$_SESSION['last_name'] = $output['last_name'];
				$_SESSION['email'] = $output['email'];
				$_SESSION['id_user'] = $output['id_user'];
				$_SESSION['campus_name'] = $output['campus_name'];
				$_SESSION['status'] = $output['status'];

				// if the user has accepted cookies, registers the users data into cookies
				if(isset($_COOKIE['isUsingCookies']) && $_COOKIE['isUsingCookies'] == true){
					setcookie('first_name', $_SESSION['first_name'], time()+60*60*24*365);
					setcookie('last_name', $_SESSION['last_name'], time()+60*60*24*365);
					setcookie('email', $_SESSION['email'], time()+60*60*24*365);
					setcookie('id_user', $_SESSION['id_user'], time()+60*60*24*365);
					setcookie('campus_name', $_SESSION['campus_name'], time()+60*60*24*365);
					setcookie('status', $_SESSION['status'], time()+60*60*24*365);
				}
				// if the user is not in the database, returns an error
			}else{
				return redirect()->route('signIn', 'notRegistered');
			}

			// open the home view
			return redirect('/');
		}

		// if the user is not in the database, returns an error
		return redirect()->route('signIn', 'notRegistered');
	}

	// signUp a user
	public function signUp(){
		// format user's entry
		$_POST['first_name'] = ucfirst($_POST['first_name']);
		$_POST['last_name'] = ucfirst($_POST['last_name']);
		$_POST['email'] = strtolower($_POST['email']);

		// return an error if a field is empty
		if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_conf']) || empty($_POST['campus_name'])){
			return redirect()->route('signUp', 'fieldEmpty');
		}

		// return an error if the email address is not @viacesi.fr nor @cesi.fr
		if(!preg_match("#@viacesi.fr#", $_POST['email']) && !preg_match("#@cesi.fr#", $_POST['email'])){
			return redirect()->route('signUp', 'badEmail');
		}

		//return an error if passwords are not the same
		if($_POST['password'] != $_POST['password_conf']){
			return redirect()->route('signUp', 'differentPasswords');
		}
		
		// hash the password
		$_POST['password'] = hash('sha256', $_POST['password']);


		// request to check if the email address is already used
		// prepares the resquest
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/email/" . $_POST['email']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$output = json_decode($output, true);

		// if the answer if empty
		if(!empty($output)){
			return redirect()->route('signUp', 'userExist');
		}

		// post a new user into the database
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		// unset unused attributes from the variable
		unset($_POST['_token']);
		unset($_POST['password_conf']);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));

		//send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		return redirect('/');
	}

	// deconnects the user
	public function deconnect(){
		session_start();

		// unsets the data from the session
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['email']);
		unset($_SESSION['id_user']);
		unset($_SESSION['campus_name']);
		unset($_SESSION['status']);

		// erase the cookies
		unset($_COOKIE['first_name']);
   		setcookie('first_name', '', time() - 3600);
   		unset($_COOKIE['last_name']);
   		setcookie('last_name', '', time() - 3600);
   		unset($_COOKIE['email']);
   		setcookie('email', '', time() - 3600);
   		unset($_COOKIE['id_user']);
   		setcookie('id_user', '', time() - 3600);
   		unset($_COOKIE['campus_name']);
   		setcookie('campus_name', '', time() - 3600);
   		unset($_COOKIE['status']);
   		setcookie('status', '', time() - 3600);

		return redirect('/');
	}

	// adds a new product in the poduct table of the API
	public function addProduct(){
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		// unset unused attributes from the variable
		unset($_POST['_token']);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		return redirect('/');
	}

	// returns the event list from the API
	public function getEvents(){
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the reponse of the API
		$events = json_decode($output, true);

		// format the date
		foreach ($events as $key => $event) {
			$events[$key]['date'] = explode('T', $event['date'])[0];
		}

		// if the user is not connected or if he is a student, remove events which are not public
		if (!isset($_SESSION['status']) || $_SESSION['status'] == 'student'){
			$publicEvents = [];
			$eventNumber = sizeof($events);
			for($i=0 ; $i < $eventNumber; $i++){
				$event = array_shift($events);
				if($event['is_public'] == 1){
					array_push($publicEvents, $event);
				}
			}

			return $publicEvents;
		}

		// return all events
		return $events;
	}

	// returns the ideas from the event list
	public function getIdeas(){
		// get the events
		$events = $this->getEvents();

		$ideas = [];
		$eventNumber = sizeof($events);

		// extract the ideas from the event list
		for ($i = 0; $i < $eventNumber; $i++){
			$event = array_shift($events);
			if($event['is_approved'] == 0){
				array_push($ideas, $event);
			}
		}

		return $ideas;
	}

	// returns the event which have the most votes
	public function getMonthEvent(){
		// get the events
		$events = $this->getEvents();

		// sorts the events by number of votes
		$voteCount = array_column($events, 'vote_count');
		array_multisort($voteCount, SORT_DESC, $events);

		// returns the event which have the most vote
		return array_shift($events);
	}

	// sends a new idea to the API
	public function submitIdea(Request $request){
		session_start();
		


		// if the user is not connected, returs an error
		if(!isset($_SESSION['id_user'])){
			return redirect()->route('ideaBox', 'notConnected');
		}

		// if one required field is empty, returns an error
		if(empty($_POST['title']) || empty($_POST['description'])){
			return redirect()->route('ideaBox', 'fieldEmpty');
		}

		// set the name which will be used to save the picture
		$name = date('Y-m-d_h-m-s') . $_FILES['picture']['name'];

		// set the path where the picture will be saved
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '\\pictures\\events\\' . $name;

		// saves the picture
		move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath);

		// post a new idea
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		//unset unused attributes from variable and set required attributes
		unset($_POST['_token']);
		$_POST['is_approved'] = 0;
		$_POST['is_public'] = 1;
		$_POST['id_user'] = $_SESSION['id_user'];
		$_POST['picture_url'] = '\\pictures\\events\\' . $name;

		unset($_POST['picture']);

		// send the request
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// returns the idea box view
		return redirect()->route('ideaBox', 'success');
	}

	// returns the events that have not occured yet from the event list
	public function getNextEvents(){
		// get the events
		$events = $this->getEvents();

		$nextEvents = [];
		$eventNumber = sizeof($events);

		// extracts the events which has not happened yet, which date is not passed
		for ($i = 0; $i < $eventNumber; $i++){
			$event = array_shift($events);
			if($event['is_approved'] == 1 && $event['date'] > date('Y-m-d')){
				array_push($nextEvents, $event);
			}
		}

		return $nextEvents;
	}

	// returns the events that have occured from the event list
	public function getPastEvents(){
		// get the events
		$events = $this->getEvents();

		$pastEvents = [];
		$eventNumber = sizeof($events);

		// extracts the events which has not happened yet, which date is not passed
		for ($i = 0; $i < $eventNumber; $i++){
			$event = array_shift($events);
			if($event['is_approved'] == 1 && $event['date'] < date('Y-m-d')){
				array_push($pastEvents, $event);
			}
		}

		return $pastEvents;
	}

	// returns the next event that will occure from the event list
	public function getNextEvent(){
		// get the events
		$events = $this->getEvents();

		// extract the next event that will happen
		$nextEvent = array_shift($events);
		for ($i = 1; $i < sizeof($events); $i++){
			$event = array_shift($events);
			if($events[0]['is_approved'] == 1 && $events[0]['date'] > $nextEvent['date']){
				$nextEvent = $event;
			}
		}

		return $nextEvent;
	}

	// returns the products
	public function getProducts(){
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$products = json_decode($output, true);

		return $products;
	}

	// returns one product
	public function getProduct($product){
		// encode the product's name to pass it to an url
		$product = rawurlencode($product);
			
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product/name/" . $product);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$output = json_decode($output, true);

		return $output[0];
	}

	// returns the 3 best selling products from the API 
	public function getTopSales(){
		// get the products
		$products = $this->getProducts();

		// sort the products by number of item sold
		$price = array_column($products, 'item_sold');
		array_multisort($price, SORT_DESC, $products);

		$topSales = [];

		// extract the 3 most sold items
		for($i=0;$i<3;$i++){
			array_push($topSales, array_shift($products));
		}

		return $topSales;
	}

	// returns the 3 last added products
	public function getNewProducts(){
		// get the products
		$products = $this->getProducts();

		$newProducts = [];

		// extract the 3 lastest sold items
		for($i=0 ; $i < 3 ; $i++){
			array_push($newProducts, array_pop($products));
		}

		return $newProducts;
	}

	// returns the products categories from the API
	public function getCategories(){
		// preapres the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/category/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$categories = json_decode($output, true);

		return $categories;
	}

	// returns the products that belong to a category
	public function getProductsByCategory(String $category){
		// get the products
		$products = $this->getProducts();

		$categoryProducts = [];

		// exctract the products that belong to the category
		foreach ($products as $key => $product) {
			if($product['name_category'] == $category){
				array_push($categoryProducts, $product);
			}
		}

		return $categoryProducts;
	}

	// returns the campuses from the API
	public function getCampus(){
		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/campus/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$campus = json_decode($output, true);

		return $campus;
	}

	// update user's data
	public function updateUser(){
		session_start();

		// check if both passwords are the same
		if($_POST['password'] != $_POST['password_conf']){
			return redirect()->route('signUp', 'differentPasswords');
		}

		// if one data is empty, if it is, unset the attribute from the variable
		if(empty($_POST['first_name'])){
			unset($_POST['first_name']);
		}
		if(empty($_POST['last_name'])){
			unset($_POST['last_name']);
		}
		if(empty($_POST['email'])){
			unset($_POST['email']);
		}
		if(empty($_POST['password'])){
			unset($_POST['password']);
		}else{
			$_POST['password'] = hash('sha256', $_POST['password']);
		}

		// unset unused attributes from variable
		unset($_POST['_token']);
		unset($_POST['password_conf']);


		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/id_user/" . $_SESSION['id_user']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		// send the request
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// update the campus in the current session
		$_SESSION['campus_name'] = $_POST['campus_name'];


		return redirect()->route('myAccount', 'success');
	}

	// accept to use cookies
	public function acceptCookies(){
		setcookie('isUsingCookies', true, time()+60*60*24*365);
		return redirect()->route('home');
	}

	// decline to use cookies
	public function declineCookies(){
		setcookie('isUsingCookies', false, 0);
		return redirect()->route('home');
	}

	// add a product to the cart
	public function addToCart(){
		// if the user has accepted to use cookies, they will be stored
		if(isset($_COOKIE['isUsingCookies']) && $_COOKIE['isUsingCookies'] == true){
			$expirationTime = time()+60*60*24*62;
		}else{
			$expirationTime = 0;
		}

		// unset unused attributes from variable
		unset($_POST['_token']);

		// add the product to the current cart or increase the quantity if it is already in the cart
		if(isset($_COOKIE['cart'])){
			$previousCart = json_decode($_COOKIE['cart'],true);
			foreach ($previousCart as $key => $product) {
				var_dump($product);
				echo'<br>';

				if($_POST['id_product'] == $product['id_product']){
					$previousCart[$key]['quantity'] += 1;
					setcookie('cart', json_encode($previousCart), $expirationTime);
					return redirect()->route('cart');
				}
			}

			array_push($previousCart, ['id_product' => $_POST['id_product'], 'quantity' => '1', 'price' => $_POST['price'], 'picture_url' => $_POST['picture_url'], 'name' => $_POST['name'], 'picture_alt' => $_POST['picture_alt'], 'stock' => $_POST['stock'], 'item_sold' => $_POST['item_sold'], 'name_category' => $_POST['name_category']]);
			$newCart = json_encode($previousCart);

			setcookie('cart', $newCart, $expirationTime);
		}else{
			setcookie('cart', json_encode([['id_product' => $_POST['id_product'], 'quantity' => '1', 'price' => $_POST['price'], 'picture_url' => $_POST['picture_url'], 'name' => $_POST['name'], 'picture_alt' => $_POST['picture_alt'], 'stock' => $_POST['stock'], 'item_sold' => $_POST['item_sold'], 'name_category' => $_POST['name_category']]]), $expirationTime);
		}
		return redirect()->route('cart');
	}

	// adds the product to the order in the API
	public function addToOrder($productId, $insertId, $quantity){
		// papares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/contain/" . $productId);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id_product' => $productId,'id_purchase' => $insertId,'quantity' => $quantity]));

		// send the request
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);


	}

	// insert a new order in the API
	public function makeOrder(){
		session_start();

		// prepares the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/purchase/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		// send the request
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id_user' => $_SESSION['id_user'], 'date' => date('Y-m-d')]));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// decode the answer into a php object
		$insertId = json_decode($output,true)['insertId'];

		// decode the cookie into a php object
		$cart = json_decode($_COOKIE['cart'], true);

		// fill the contain table from the API with the products of the order
		foreach ($cart as $key => $product) {
			$this->addToOrder($product['quantity'], $insertId, $product['quantity']);
		}

/*
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/status/bde_member");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$bdeMembers = json_decode($output, true);

		var_dump($bdeMembers);

		$emailMessage = "L'utilisateur " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " a passer une commande :\n";
		$total = 0;
		foreach ($cart as $key => $product) {
			$emailMessage = $emailMessage . "\t" . $cart['name'] . " : "  . $cart['quantity'] . "\n";
			$total += $cart['price'] * $cart['quantity'];
		}

		$emailMessage = $emailMessage . "Montant : " . $total . "€";

		echo $emailMessage;

		foreach ($bdeMembers as $key => $bdeMember) {
			mail('antonin.beaurgard@viacesi.fr', "Commande n°" . '1', 'test');
		}*/

		// deletes the cart cookie

		// erase the cookie
		unset($_COOKIE['cart']);
   		setcookie('cart', '', time() - 3600);

   		return redirect()->route('cart', 'success');
	}

	// set down the 'is_public' flag of an event
	public function privateEvent($id_event){
		// send the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event/id_event/" . $id_event);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("is_public"=>"0")));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
	}

	// raise up the 'is_approved' flag of an event
	public function approveEvent($id_event){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event/id_event/" . $id_event);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("is_approved"=>"1")));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
	}

	// download all the event pictures
	public function downloadAllEventPictures(){
		return response()->download(public_path('pictures/events'));
	}

	// add a new couple user-event to the subscribe table from the API
	public function subscribe($id_event){
		session_start();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/subscribe/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id_event' => $id_event, 'id_user' => $_SESSION['id_user']]));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		return redirect()->route('home');
	}

}
