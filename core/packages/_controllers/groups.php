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

// Class: Groups
// Desc: All Habbo Groups Related Content

class Groups extends ControllerTemplate{
	
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
	
	/* Default View Call */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Habbo Groups";
		include 'web/groups/index.view';	
		exit;
	}
	
	/* Ajax Create Group Form */
	protected function group_create_form(){
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["product"])){
			if($this->habbo->get_isHabboLoggedIn()){
				include './web/includes/modules/ajax/group_create_form.ajax';
				exit;
			}else{
				include './web/includes/modules/ajax/ajax_logged_required.ajax';
				exit;
			}
		}else{
			echo 'not allowed';	
		}
	}
	
}

?>