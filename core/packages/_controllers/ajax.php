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

// Class: Ajax
// Desc: Generic Ajax Request

class Ajax extends ControllerTemplate{
	
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
	protected function languageSelector(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include './web/includes/extensions/languageManager/ajax/languageSelector.ajax';
			exit;
		}else{
			require_once './web/404.view';
			exit;
		}
	}
	
	
	protected function languageResult(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->habbo->get_isHabboLoggedIn()){
				if($_POST["userLang"] != 'null'){
					$this->habboModel->setColumnById('users','user_language',$this->habbo->get_HabboId(),$_POST["userLang"]);
				}
			}
			include './web/includes/extensions/languageManager/ajax/languageResult.ajax';
			exit;
		}else{
			require_once './web/404.view';
			exit;
		}
	}
	
}

?>