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

// Class: Install
// Desc: Install method (Only for first access)

class Install extends ControllerTemplate{
	
	/* Construct Method */
	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;

		//Generic Models
		$this->hotelModel = new hotelModel($hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();		
	}
	
	/* Default View Calls */
	protected function default(){
		$this->steps(0);
		
	}
	
	protected function start(){
		$this->steps(0);
		
	}
	
	/* Steps of Install */
	protected function steps($id){
		echo 'Lets start the RetroCMS Install';
	}
	
	protected function done(){
		$this->steps(6);
		exit;			
	}
	
	
}

?>