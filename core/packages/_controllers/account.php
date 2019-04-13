<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: Index
// Desc: Index Controller 

class Account extends ControllerTemplate{
	
	/* Construct Method */
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();
		
		//If Logged In
		if($this->habboModel->get_SessionStatus($this->habbo->get_habboSession())){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId(),1);
			$this->habbo->set_isHabboLoggedIn(true);
		}else{
			$this->habbo->set_isHabboLoggedIn(false);		
		}
		
	}
	
	/* Login View Call */
	protected function login(){
		if($this->habbo->get_isHabboLoggedIn()){
			header('Location: ../../');
			exit;
		}else{
			//Set Page Title;
			$this->pageTitle = "Habbo";
			include 'web/account/login.view';	
			exit;
		}
	}
	
	/* Login Reauthenticate Call */
	protected function reauthenticate(){
		if(isset($_GET["target"])){
			//Call Login Method Again
			$this->login();
			exit;
		}else{
			header('Location: ../../');
			exit;		
		}
	}
	
	/* Submit View Call */	
	protected function submit(){
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->habbo->get_isHabboLoggedIn()){
			
			//Add username and password from POST fields to Habbo Object
			$this->habbo->set_HabboName(isset($_POST['login-username']) ? $_POST['login-username'] : '');
			$this->habbo->set_HabboPassword(isset($_POST['login-password']) ? $_POST['login-password'] : '');
			
			//Recieve the result of habbo login
			$requestStatus = $this->habboModel->set_HabboLogin($this->habbo);
			//The request return True , so Login is valid
			if ($requestStatus){				
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

				//The request returned Login or Password Wrong
				if(!is_array($requestStatus[1])){
					
				}else{
					//habbo Banned (comming soon)
				}
			}

			exit;
		}else{
			header('Location: ../');
			exit;
		}
	}
	
	
	/* Logout View Call */
	protected function disconnected(){		
		if($this->habbo->get_isHabboLoggedIn()){
			//Set Page Title;
			$this->pageTitle = "Habbo";
			include 'web/account/disconnected.view';	
			$this->habbo->set_HabboLogout();
			exit;
		}else{
			header('Location: ../');
			exit;
		}
	}
}

?>