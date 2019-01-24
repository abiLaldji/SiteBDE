<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

const IP = '10.64.128.131';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    


    // sign in a new user
    public function signIn(){
		json_encode($_POST);
		// check si les données correspondent avec la base de donnée

		if($_POST['email'] != 'antonin.beauregard@viacesi.fr' || $_POST['password'] != 'a'){
			return redirect()->route('signIn', 'notRegistered');
		}

			session_start();

			$_SESSION['connected'] = true;
			$_SESSION['firstName'] = 'antonin';
			$_SESSION['lastName'] = 'beauregard';
			$_SESSION['email'] = $_POST['email'];

		return redirect('/');
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
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . ":3000/bde_site/api/user/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

		unset($_POST['_token']);
		unset($_POST['password_conf']);
		var_dump($_POST);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		var_dump($output);


		//return redirect('/');
	}

	public function deconnect(){
		session_start();

		unset($_SESSION['connected']);
		unset($_SESSION['firstName']);
		unset($_SESSION['lastName']);

		return redirect('/');
	}

	public function addProduct(){

	}

	public function getEvents(){
		$events = [['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png']];
		return $events;
	}

	public function getIdeas(){
		$ideas = [['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png'],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png '],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => './pictures/stylo3.png']];
		return $ideas;
	}

	public function getMonthEvent(){
		$event = ['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => ''];
		return $event;
	}

	public function submitIdea(){
		if(empty($_POST['title']) || empty($_POST['description'])){
			return redirect()->route('ideaBox', 'fieldEmpty');
		}

/*
if(Input::hasFile('file')){

			echo 'Uploaded';
			$file = Input::file('file');
			$file->move('uploads', $file->getClientOriginalName());
			echo '';
		}*/





		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://" . IP . ":3000/bde_site/api/user/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

		unset($_POST['_token']);



		unset($_POST['picture']);


		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);*/
	}

	public function getNextEvent(){
		$nextEvent = ['title' => 'titre', 'date' => 'aujourdhui', 'description' => 'ceciLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pictureURL' => './pictures/activite.jpeg'];
		return $nextEvent;
	}

	public function getTopSales(){
		$topSales = [['name' => 'unProduit', 'description' => 'decrire', 'pictureURL' => './pictures/stylo1.png'],['name' => 'unProduit','description' => 'decrire', 'pictureURL' => './pictures/stylo2.png'],['name' => 'unProduit','description' => 'decrire', 'pictureURL' => './pictures/stylo3.png']];
		return $topSales;
	}

	public function getCategories(){
		$categories = ['stylo', 'pull', 'saccoche', 'fourchette', 'voiture', 'fusée', 'etoile', 'divers'];
		return $categories;
	}

	public function getCampus(){
		$campus = ['pau', 'toulouse', 'angouleme', 'paris', 'lille', 'tarbes', 'nantes', 'nanterres'];
		return $campus;
	}
}
