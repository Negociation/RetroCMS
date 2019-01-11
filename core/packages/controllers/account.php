<?php
//////////////////////////////////////////////////////////////
// 						RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Account extends Controller{
	protected $promoArray = [];
	protected $newsModel;
	
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Setting Hotel_Model(DAO) and getting Hotel Object from Database
		$this->hotelModel = new HotelModel($this->hotelConection);
		$this->hotel =  $this->hotelModel->get_HotelObject();
	
		//Starting Habbo
		$this->habboModel = new HabboModel($this->hotelConection);
		$this->habbo = new Habbo();

	}
	
	public function login(){
		//Set Page Title;
		$this->pageTitle = "Login";
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/account/login.view';	
			exit;
		}
	}
	
	public function disconnected(){
		//Set Page Title;
		$this->pageTitle = "Login";
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($this->habbo->get_HabboLoggedIn()){
				$this->habbo->set_HabboLogout();
				include 'web/account/disconnected.view';	
				exit;
			}else{
				header('Location: ../');
				exit;	
			}
		}
	}

	public function submit(){
		//Set Page Title;
		$this->pageTitle = "Redirecionando";
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
				require_once './Web/Maintenance/Index.php';
				exit;
		//If url method as POST and habbo not logged so try validate POST CONTENT 
		}elseif($_SERVER['REQUEST_METHOD'] == 'POST' || !$this->habbo->get_HabboLoggedIn()){
			//Add username and password from POST fields to Habbo Object
			$this->habbo->set_HabboName(isset($_POST['login-username']) ? $_POST['login-username'] : '');
			$this->habbo->set_HabboPassword(isset($_POST['login-password']) ? $_POST['login-password'] : '');
			//If Habbo Login returns "Index 0" true (Username and Password correctly and Habbo not Banned) so start session :D
			if($this->habboModel->set_HabboLogin($this->habbo)[0] == true){
				//If login hasn't a target ( like client )just redirect to Index
				if (!isset($_POST['target'])){
					header('Location: ../');
					exit;
				}else{
					switch($_POST['target']){
						case 'habboClient': 
							header('Location: ../client');
							break;
						case 'clubSubscribe': 
							header('Location: ../club/join');
							break;
						default:
							header('Location: ../');
							break;
					}
				}
				
			}else{
				
				//Set the error message by id:
				switch($this->habboModel->set_HabboLogin($this->habbo)[1]){
					case 1:
						//Habbo Login or Password Wrong
						break;					
					case 2:
						//Habbo dont exist
						break;						
					case 3:
						//Habbo Banned 
						break;
					default:
						//Something wrong try again
						break;
				}
				
				//Now redirect to login showing the seted error
				header('Location: ../account/login');
				exit;
				
			}
		}else{
			//If method as diferrent from POST or Habbo as already logged in just send back to Index
			header('Location: ../');
			exit;	
		}
	}
	
}


?>
