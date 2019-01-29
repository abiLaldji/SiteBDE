<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

const IP = 'localhost:3001';
const TOKEN = '8SIE4CaWSiGb9IFQa8DSPyXVQ63n9jWHiXRsatOpoxBrHyxKKnTSFOC8TpIWxo4F';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    // sign in a new user
    public function signIn(){
    	if(isset($_COOKIE['isUsingCookies']) && $_COOKIE['isUsingCookies'] == true && isset($_POST['remember_me'])){
    		unset($_POST['remember_me']);
    		setcookie('remember_me', true, time()+60*60*24*365);
    	}

		json_encode($_POST);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/email/" . $_POST['email']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if($info['http_code'] != '200'){
			return abort(500);
		}

		if($output != '[]'){
			$output = json_decode($output, true)[0];
			var_dump($output);
			if($output['password'] == hash('sha256', $_POST['password'])){
				session_start();
				$_SESSION['first_name'] = $output['first_name'];
				$_SESSION['last_name'] = $output['last_name'];
				$_SESSION['email'] = $output['email'];
				$_SESSION['id_user'] = $output['id_user'];
				$_SESSION['campus_name'] = $output['campus_name'];
				$_SESSION['status'] = $output['status'];
				if(isset($_COOKIE['isUsingCookies']) && $_COOKIE['isUsingCookies'] == true){
					setcookie('first_name');
					setcookie('last_name');
					setcookie('last_name');
				}
			}else{
				return redirect()->route('signIn', 'notRegistered');
			}
			return redirect('/');
		}

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


		// check if the email address is already used
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/email/" . $_POST['email']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$output = json_decode($output, true);

		if(!empty($output)){
			return redirect()->route('signUp', 'userExist');
		}


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		unset($_POST['_token']);
		unset($_POST['password_conf']);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if($info['http_code'] != '200'){
			return abort(500);
		}

		return redirect('/');
	}

	public function deconnect(){
		session_start();

		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['email']);
		unset($_SESSION['id_user']);
		unset($_SESSION['campus_name']);
		unset($_SESSION['status']);

		return redirect('/');
	}

	public function addProduct(){
		$_POST['name'] = 'boite';
		$_POST['price'] = '20';
		$_POST['picture_url'] = './pictures/defaultPicture.png';
		$_POST['picture_alt'] = 'descritpion';
		$_POST['stock'] = '15';
		$_POST['item_sold'] = '2';
		$_POST['name_category'] = 'stylo';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		unset($_POST['_token']);
		
		var_dump($_POST);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if($info['http_code'] != '200'){
			return abort(500);
		}

		return redirect('/');
	}

	// returns the event list from the API
	public function getEvents(){
		// request the event list to the API
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
		if($info['http_code'] != '200'){
			return abort(500);
		}

		// decode the reponse of the API
		$events = json_decode($output, true);

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
		$events = $this->getEvents();

		$ideas = [];
		$eventNumber = sizeof($events);

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
		$event = ['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => ''];
		$events = $this->getEvents();

		echo '<br><br>';
		$voteCount = array_column($events, 'vote_count');

		array_multisort($voteCount, SORT_DESC, $events);

		return array_shift($events);
	}

	// sends a new idea to the API
	public function submitIdea(Request $request){
		session_start();


		if(!isset($_SESSION['id_user'])){
			return redirect()->route('ideaBox', 'notConnected');
		}

		if(empty($_POST['title']) || empty($_POST['description'])){
			return redirect()->route('ideaBox', 'fieldEmpty');
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/event/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		unset($_POST['_token']);
		$_POST['is_approved'] = 0;
		$_POST['is_public'] = 1;
		$_POST['id_user'] = $_SESSION['id_user'];
		$picture = $_POST['picture'];

		unset($_POST['picture']);


		
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		var_dump($output);
		echo '<br>';
		var_dump($info);
		echo '<br>';
		var_dump($_POST);

		return redirect()->route('ideaBox', 'success');
	}

	// returns the events that have not occured yet from the event list
	public function getNextEvents(){

		$events = $this->getEvents();

		$nextEvents = [];
		$eventNumber = sizeof($events);

		for ($i = 0; $i < $eventNumber; $i++){
			$event = array_shift($events);
			if($event['is_approved'] == 1 && $event['date'] > date('Y-m-d')){
				array_push($nextEvents, $event);
			}
		}

		return $nextEvents;
	}

	public function getPastEvents(){

		$events = $this->getEvents();

		$nextEvents = [];
		$eventNumber = sizeof($events);

		for ($i = 0; $i < $eventNumber; $i++){
			$event = array_shift($events);
			if($event['is_approved'] == 1 && $event['date'] < date('Y-m-d')){
				array_push($nextEvents, $event);
			}
		}

		return $nextEvents;
	}

	// returns the next event that will occure from the event list
	public function getNextEvent(){

		$events = $this->getEvents();

		$nextEvent = array_shift($events);
		for ($i = 1; $i < sizeof($events); $i++){
			$event = array_shift($events);
			if($events[$i]['is_approved'] == 1 && $events[$i]['date'] > $nextEvent['date']){
				$nextEvent = $event;
			}
		}
		return $nextEvent;
	}

	// returns the 3 best selling products from the API 
	public function getTopSales(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$products = json_decode($output, true);


		$price = array_column($products, 'price');

		array_multisort($price, SORT_DESC, $products);

		$topSales[0] = $products[0];
		$topSales[1] = $products[1];
		$topSales[2] = $products[2];

		return $topSales;
	}

	public function getNewProducts(){
		
	}

	// returns the products categories from the API
	public function getCategories(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/category/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		return $categories;
	}

	// returns the campuses from the API
	public function getCampus(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/campus/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);


		$campus = json_decode($output, true);

		return $campus;
	}

	public function updateUser(){
		session_start();

		// check if both passwords are the same
		if($_POST['password'] != $_POST['password_conf']){
			return redirect()->route('signUp', 'differentPasswords');
		}

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

		unset($_POST['_token']);
		unset($_POST['password_conf']);


		// send the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/user/id_user/" . $_SESSION['id_user']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		// update the campus in the current session
		$_SESSION['campus_name'] = $_POST['campus_name'];


		return redirect()->route('myAccount', 'success');
	}

	public function acceptCookies(){
		setcookie('isUsingCookies', true, time()+60*60*24*365);
		return redirect()->route('home');
	}

	public function declineCookies(){
		setcookie('isUsingCookies', false, time()+60*60*24*365);
		return redirect()->route('home');
	}

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

}
