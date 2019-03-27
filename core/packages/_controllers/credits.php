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

// Class: Credits
// Desc: Habbo Credits Controller 

class Credits extends ControllerTemplate{
	
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
	
	/* Default View Call - Credits */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Habbo Club";
		include 'web/credits/index.view';	
		exit;
	}
	

	/* View Call - Credits/Credit_Faq */
	protected function credit_faq(){
		//Set Page Title;
		$this->pageTitle = "Habbo";
		include 'web/club/join.view';	
		exit;
	}	
	
	
	/* Rirediect Call - Credits/Redeem */
	protected function redeem(){
		//Set Page Title;
		$this->pageTitle = "Habbo";
		include 'web/credits/index.view';	
		exit;
	}	
	
}

?>