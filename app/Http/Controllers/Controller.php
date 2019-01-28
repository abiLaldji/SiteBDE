<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

const IP = 'localhost:3001';
const TOKEN = '8SIE4CaWSiGb9IFQa8DSPyXVQ63n9jWHiXRsatOpoxBrHyxKKnTSFOC8TpIWxo4F';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    // sign in a new user
    public function signIn(){

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

		if($output){
			$output = json_decode($output, true)[0];
			if($output['password'] == hash('sha256', $_POST['password'])){
				session_start();
				$_SESSION['connected'] = true;
				$_SESSION['first_name'] = $output['first_name'];
				$_SESSION['last_name'] = $output['last_name'];
				$_SESSION['email'] = $output['email'];
				$_SESSION['id_user'] = $output['id_user'];
				//$_SESSION['campus'] = $output['campus'];
				$_SESSION['status'] = $output['status'];
			}else{
				return redirect()->route('signIn', 'notRegistered');
			}
			return redirect('/');
		}

		return redirect()->route('signIn', 'notRegistered');
	}


	public function signUp(){
		// format user's entry
		$_POST['first_name'] = ucfirst($_POST['first_name']);
		$_POST['last_name'] = ucfirst($_POST['last_name']);
		$_POST['email'] = strtolower($_POST['email']);

		// return an error if a field is empty
		if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_conf']) || empty($_POST['campus'])){
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
		
		// L'utilisateur a t il deja un compte 
		$_POST['password'] = hash('sha256', $_POST['password']);



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

		unset($_SESSION['connected']);
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['email']);
		unset($_SESSION['id_user']);

		return redirect('/');
	}

	public function addProduct(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ' . TOKEN));

		unset($_POST['_token']);

		
		$_POST['item_sold'] = 0;
		$_POST['Stock'] = 2;
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

	public function getEvents(){

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

		$events = json_decode($output, true);

		if($events == []){
			$events = [['title'=> '', 'description'=> '', 'date' => '', 'picture_url' => './pictures/defaultPicture.png', 'is_approved'=> 1, 'is_public' => 1, 'first_name' => '', 'last_name' => '']];
		}

		return $events;
	}

	public function getIdeas(){
		$events = $this->getEvents();

		$ideas = [];
		$j = 0;

		for ($i = 0; $i < sizeof($events); $i++){
			if($events[$i]['is_approved'] == 0 && $events[$i]['is_public'] == 1){
				$ideas[$j] = $events[$i];
				$j++;
			}
		}

		return $ideas;
	}

	public function getMonthEvent(){
		$event = ['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => ''];


		return $event;
	}

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
		$_POST['is_approved'] = 1;
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
	}



	public function getNextEvents(){

		$events = $this->getEvents();

		$nextEvents = [];
		$j = 0;

		for ($i = 0; $i < sizeof($events); $i++){
			if($events[$i]['is_approved'] == 1 && $events[$i]['is_public'] == 1 && $events[$i]['date'] > date('j')){
				$nextEvents[$j] = $events[$i]; 
				$j++;
			}
		}

		return $nextEvents;
	}

	public function getNextEvent(){

		$events = $this->getEvents();

		$nextEvent = $events[0];
		for ($i = 1; $i < sizeof($events); $i++){

			if($events[$i]['is_approved'] == 1 && $events[$i]['is_public'] == 1 && $events[$i]['date'] > $nextEvent['date']){
				$nextEvent = $event[$i]; 
			}
		}
		return $nextEvent;
	}

	public function getTopSales(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/product");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$products = json_decode($output, true);

		var_dump($output);

		$products = [['name' => 'rae', 'price' => '11', 'picture_url' => './pictures/defaultPicture.png', 'description' =>'decrire'],['name' => 'rae', 'price' => '10', 'picture_url' => './pictures/defaultPicture.png', 'description' =>'decrire'],['name' => 'rae', 'price' => '9', 'picture_url' => './pictures/defaultPicture.png', 'description' =>'decrire'],['name' => 'rae', 'price' => '12', 'picture_url' => './pictures/defaultPicture.png', 'description' =>'decrire']];

		$price = array_column($products, 'price');

		array_multisort($price, SORT_DESC, $products);

		$topSales[0] = $products[0];
		$topSales[1] = $products[1];
		$topSales[2] = $products[2];

		return $topSales;
	}

	public function getCategories(){
		$categories = ['stylo', 'pull', 'saccoche', 'fourchette', 'voiture', 'fusée', 'etoile', 'divers'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . TOKEN));
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . "/bde_site/api/category/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		var_dump($output);

		//return $categories;
	}

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
}
