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

// Class: Topbar
// Desc: Update Habbo TopBar information

class TopBar extends ControllerTemplate{
	
	protected $forwardData = [];
	
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

	protected function credits(){
		include('./web/includes/modules/topmenu_mycredits.viewpart');
		exit;
	}
	

	protected function habboclub(){
		include('./web/includes/modules/topmenu_habboclub.viewpart');
		exit;
	}
}

?>