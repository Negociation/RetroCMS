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

// Class: Hotel 
// Desc: Get all hotel data 

class Hotel{

	protected $hotelStatus;
	
	public function __construct(){
		
		//Default Information if database issues or hotel Install 
		$this->hotelStatus = true;
	}
	
	
	/** GETS **/
	public function get_HotelStatus(){
		return $this->hotelStatus;
	}
	
	
}
?>