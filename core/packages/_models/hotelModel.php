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

// Class: Hotel Model
// Desc: DAO Content of hotel Object

class HotelModel extends ModelTemplate{

	public function get_HotelObject(){
		
		//Empty Hotel Object
		$hotelObject = new Hotel();
		
		//Empty Advertisement Array
		$advertisementArray = [];
		
		
		return $hotelObject;
	}
}
?>