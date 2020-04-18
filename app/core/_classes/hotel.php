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
	
	protected $hotelStatus;
	protected $hotelUrl;
	protected $hotelWeb;
	
	//Default Construct Method
    function __construct(){
		$this->hotelStatus = false;
		$this->hotelInstalled = false;
		$this->hotelWeb = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
		$this->hotelUrl = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
	}
	
	
	//Return if Hotel is Installed Correctly (Based on Database Structure)
	public function get_isHotelInstalled(){
		return $this->hotelInstalled;
	}
	
	//Return if Hotel is Locked (Offline is setted or Maintenance )
	public function get_isHotelLocked(){
		return false;
	}
	
	public function get_HotelUrl(){
		return $this->hotelUrl;
	}
	

}

?>