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

// Class: Not Found
// Desc: Not Found Controller (Only if the passed controller isn't valid) 

class Not_Found extends ControllerTemplate{
	
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
	
	/* Default View Call */
	protected function default(){
		
		//Set Page Title;
		$this->pageTitle = "Not Found";
		include 'web/404.view';		
		exit;
	}
	
}

?>