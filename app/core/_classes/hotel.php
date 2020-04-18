<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// Class: Hotel
// Desc:  Plain OLD CLR for Hotel 

namespace CLR;

final class Hotel{
	
	//Construct Method
    function __construct(){
		
	}
	
	//Return if Hotel is Installed Correctly (Based on Database Structure)
	public function get_isHotelInstalled(){
		return true;
	}
	
	//Return if Hotel is Locked (Offline is setted or Maintenance )
	public function get_isHotelLocked(){
		return false;
	}

}

?>