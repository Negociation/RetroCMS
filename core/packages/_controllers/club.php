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

// Class: Club
// Desc: Habbo Club Controller 

class Club extends ControllerTemplate{
	
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
	
	/* Default View Call - Club */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Habbo Club";
		include 'web/club/index.view';	
		exit;
	}
	

	/* View Call - Club/Join */
	protected function join(){
		//Set Page Title;
		$this->pageTitle = "Habbo";
		include 'web/club/join.view';	
		exit;
	}	
	
	
	/* View Call - Club/Shop */
	protected function shop(){
		//Set Page Title;
		$this->pageTitle = "Habbo";
		include 'web/club/shop.view';	
		exit;
	}
	
	protected function club_subscribe(){
		echo 'result';
		
	}
	
	
	protected function club_subscribe_form(){
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["optionNumber"])){
			if($this->habbo->get_isHabboLoggedIn()){
				switch($_POST["optionNumber"]){
					case 'subscribe1':
						$optionDays = 31;
						$optionCredits = 25;
						break;
					case 'subscribe2':
						$optionDays = 96;
						$optionCredits = 60;
						break;
					case 'subscribe3':
						$optionDays = 186;
						$optionCredits = 105;
						break;							
				}				
				include './web/includes/modules/ajax/club_subscribe_form.ajax';
				exit;		
			}else{
				include './web/includes/modules/ajax/login_intercept_form.ajax';
				exit;
			}
		}else{
			echo 'not allowed';
		}
	}
	
}

?>