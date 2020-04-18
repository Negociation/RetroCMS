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
	protected $hotelName;
	protected $hotelNick;
	protected $hotelCustom = [];
	
	//Default Construct Method
    function __construct(){
		$this->hotelStatus = false;
		$this->hotelInstalled = true;
		$this->hotelName = 'RetroCMS';
		$this->hotelNick = 'Retro';		
		$this->hotelWeb = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
		$this->hotelUrl = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
		$this->hotelCustom = array('http://localhost/habboweb/17/16/web-gallery/images/bg_patterns/habbo.gif','http://localhost/habboweb/17/16/web-gallery/images/hotelviews/web_view_bg_beta.gif','http://localhost/habboweb/17/16/web-gallery/images/logos/habbo_logo_nourl.gif');
	}
	
	
	/** GETS **/
		
	//Return if Hotel is Locked (Offline is setted or Maintenance )
	public function get_isHotelLocked(){
		return true;
	}
	
	//Return if Hotel is Installed Correctly (Based on Database Structure)
	public function get_isHotelInstalled(){
		return $this->hotelInstalled;
	}
	

	
	public function get_HotelName(){
		return $this->hotelName;
	}
	
	public function get_HotelNick(){
		return $this->hotelNick;
	}
	
	
	
	public function get_HotelUrl(){
		return $this->hotelUrl;
	}
	
	public function get_HotelWeb(){
		return $this->hotelWeb;
	}
	
	
}

?>