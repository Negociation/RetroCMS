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
		$this->hotelModel = new hotelModel($hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();
	}
	
	/* Login View Call */
	protected function login(){
		if($this->habbo->get_isHabboLoggedIn()){
			exit;
		}else{
			//Set Page Title;
			$this->pageTitle = "Habbo";
			include 'web/account/login.view';	
			exit;
		}
	}
	
	/* Submit View Call */	
	protected function submit(){
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->habbo->get_isHabboLoggedIn()){
			echo 'Validating Username...';
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
			include 'web/account/login.view';	
			exit;
		}else{
			echo 'You have to login  first';
			exit;
		}
	}
}

?>