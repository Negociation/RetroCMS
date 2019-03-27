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
	protected $hotelUrl;
	protected $hotelWeb;
	protected $hotelName;
	protected $hotelNick;
	protected $hotelClient;
	protected $hotelCustom;
	protected $hotelAdvertisement;
	
	public function __construct(){
		
		//Default Information only for database issues or hotel Install 
		$this->hotelStatus = true;
		$this->hotelWeb = $this->hotelUrl = 'http://'.$_SERVER['SERVER_NAME'];
		$this->hotelName = 'RetroCMS';
		$this->hotelNick = 'Retro';
		$this->hotelCustom = array('http://localhost/habboweb/17/16/web-gallery/images/bg_patterns/habbo.gif','http://localhost/habboweb/17/16/web-gallery/images/hotelviews/web_view_bg_beta.gif','http://localhost/habboweb/17/16/web-gallery/images/logos/habbo_logo_nourl.gif');
		
	}
	
	/** DAO CONSTRUCT **/
	public function constructObject($hotelName,$hotelNick,$hotelVersion,$hotelWeb,$hotelUrl,$hotelLanguage,$hotelClient,$hotelCustom){
		$this->hotelName = $hotelName;
		$this->hotelNick = $hotelNick;
		
		//$this->hotelVersion = $hotelVersion
		$this->hotelWeb = $hotelWeb;
		$this->hotelUrl = $hotelUrl;
		$this->hotelLanguage = $hotelLanguage;
		$this->hotelClient = $hotelClient;
		$this->hotelCustom = $hotelCustom;
		//$this->hotelStatus = $hotelStatus;
		
	}
	
	/** GETS **/
	public function get_HotelStatus(){
		return $this->hotelStatus;
	}
	
	public function get_HotelUrl(){
		return $this->hotelUrl;
	}
	
	public function get_HotelWeb(){
		return $this->hotelWeb;
	}

	public function get_HotelName(){
		return $this->hotelName;
	}
	
	public function get_HotelNick(){
		return $this->hotelNick;
	}
	
	public function get_HotelCustom(){
		return $this->hotelCustom;
	}
	
	public function get_isHotelOnline(){
		return false;
	}
	
	public function get_HotelCount(){
		return 0;
	}
	
	public function get_hotelAdvertisement(){
		return $this->hotelAdvertisement;
	}
	
	/** SETS **/
	public function set_HotelAdvertisement($hotelAdvertisement){
		$this->hotelAdvertisement = $hotelAdvertisement;
	}
	
	public function set_HotelStatus($status){
		$this->hotelStatus = $status;			
	}
}
?>