<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Account{
	private $pageTitle;
	private $habbo;
	private $habboModel;
	private $hotel;

	public function __construct($hotelConection){ 
		$this->hotelModel = new HotelModel($hotelConection);
		$this->hotel = $this->hotelModel->get_HotelObject();
		$this->pageTitle = 'Login';
		$this->habbo = new Habbo();
		$this->habboModel = new HabboModel($hotelConection);
		if ($this->habbo->get_HabboLoggedIn()){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo);		
		}
	}
	
	//The Main Page 
	function login(){
		
		//Call the Hotel Settings from Core
		global $hotel;
		global $hotelModel;
		if($hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;

		}else{
			
			//Check if habbo as logged-in if as true redirects to Home
			if ($this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;
			}else{
				//$this->habboModel->set_HabboLogout();
				require_once './Web/Account/Login.php';
				exit;	
			}
		}
	}
	
	function Disconnected(){
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if(!$this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;			
			}else{
					$this->habboModel->set_HabboLogout();
					require_once './Web/Account/Disconnected.php';
					exit;	
			}
		}			
	}
	
	function Submit(){		
		if($this->hotel->get_HotelClosed()){
				require_once './Web/Maintenance/Index.php';
				exit;
		}elseif($_SERVER['REQUEST_METHOD'] != 'POST' || $this->habbo->get_HabboLoggedIn()){
			header('Location: ../');
			exit;	
		}else{
			//Get Form data using POST
			$this->habbo->set_HabboName(isset($_POST['login-username']) ? $_POST['login-username'] : '');
			$this->habbo->set_HabboPassword(isset($_POST['login-password']) ? $_POST['login-password'] : '');
			if($this->habboModel->set_HabboLogin($this->habbo)){
				header('Location: ../');
				exit;	
			}else{
				echo '<link href="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/styles/style.css" type="text/css" rel="stylesheet">';
				header( "refresh:0.5;url=../account/login" );
				exit;
			}
		}	
	}	
}
?>

