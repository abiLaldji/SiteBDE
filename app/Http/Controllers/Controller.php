<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
		$_POST['firstName'] = ucfirst($_POST['firstName']);
		$_POST['lastName'] = ucfirst($_POST['lastName']);
		$_POST['email'] = strtolower($_POST['email']);

		// return an error if a field is empty
		if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordConf'])){
			return redirect()->route('signUp', 'fieldEmpty');
		}

		// return an error if the email address is not @viacesi.fr nor @cesi.fr
		if(!preg_match("#@viacesi.fr#", $_POST['email']) && !preg_match("#@cesi.fr#", $_POST['email'])){
			return redirect()->route('signUp', 'badEmail');
		}

		//return an error if passwords are not the same
		if($_POST['password'] != $_POST['passwordConf']){
			return redirect()->route('signUp', 'differentPasswords');
		}
		

		// L'utilisateur a t il deja un compte 


		$_POST['password'] = hash('sha256', $_POST['password']);

		json_encode($_POST);

/*
		if($state){
			return redirect('/signUp');
		}*/
		return redirect('/');
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
		$events = [['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => '']];
		return $events;
	}

	public function getIdeas(){
		$ideas = [['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceci', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => ''],['title' => 'titre', 'organizator' => 'lui', 'date' => 'aujourdhui', 'description' => 'ceic', 'pictureURL' => '']];
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
}
