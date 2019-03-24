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
		$this->hotelModel = new hotelModel($hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
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
	
}

?>