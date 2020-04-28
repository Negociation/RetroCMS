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

use RetroRCON\RemoteConnection;

final class Hotel{
	
	protected $hotelStatus;
	protected $hotelUrl;
	protected $hotelWeb;
	protected $hotelName;
	protected $hotelNick;
	protected $hotelLayout = [];
	protected $hotelConnection;
	protected $hotelClient = [];
	protected $hotelPages = [];
	

	//Default Construct Method
    function __construct(){
		$this->hotelStatus = false;
		$this->hotelInstalled = true;
		$this->hotelName = 'RetroCMS';
		$this->hotelNick = 'Retro';		
		$this->hotelWeb = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
		$this->hotelUrl = 'http://'.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != "80" ? ':'.$_SERVER['SERVER_PORT'] : '');
		$this->hotelPages = array(new Page('HOME','home','Index',1,"","c_images/navi_icons/tab_icon_01_home.gif"));
		$this->hotelLayout = array($this->hotelWeb.'/habboweb/17/16/web-gallery/images/bg_patterns/habbo.gif',$this->hotelWeb.'/habboweb/17/16/web-gallery/images/hotelviews/web_view_bg_beta.gif',$this->hotelWeb.'/habboweb/17/16/web-gallery/images/logos/habbo_logo_nourl.gif');
	}
	
	function constructObject(){
			
		//If GRPC Enabled set a rCon based on Hotel Object Info
		$this->hotelConnection = ( extension_loaded("grpc") !== null && extension_loaded("grpc") ) ? new RemoteConnection(['host' => '127.0.0.1','port' => 12309]) : false;
			
		//Check if Hotel is Online/Offline
		$this->hotelStatus = (is_resource(@fsockopen('127.0.0.1', 12309))) ? true : false;
    }
	
	
	/** GETS **/
		
	//Return if Hotel is Locked (Offline is setted or Maintenance )
	public function get_isHotelLocked(){
		return false;
	}
	
	//Return if Hotel is Installed Correctly (Based on Database Structure)
	public function get_isHotelInstalled(){
		return $this->hotelInstalled;
	}
	
	public function get_HotelLayout(){
		return $this->hotelLayout;
	}
	
	
	public function get_HotelName(){
		return $this->hotelName;
	}
	
	public function get_HotelNick(){
		return $this->hotelNick;
	}
	
	public function get_HotelStatus(){
		return $this->hotelStatus;
	}
	
	public function get_HotelPages(){
		return $this->hotelPages;
	}
		
	public function get_HotelUrl(){
		return $this->hotelUrl;
	}
	
	public function get_HotelWeb(){
		return $this->hotelWeb;
	}
	
	
	
}

?>