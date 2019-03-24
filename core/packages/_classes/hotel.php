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
	
	public function __construct(){
		
		//Default Information only for database issues or hotel Install 
		$this->hotelStatus = true;
		$this->hotelWeb = $this->hotelUrl = 'http://'.$_SERVER['SERVER_NAME'];
		$this->hotelName = 'RetroCMS';
		$this->hotelNick = 'Retro';
		
		
	}
	
	/** DAO CONSTRUCT **/
	public function constructObject($hotelName,$hotelNick,$hotelVersion,$hotelWeb,$hotelUrl,$hotelLanguage,$hotelClient,$hotelCustom){
		$this->hotelName = $hotelName;
		$this->hotelNick = $hotelNick;
		//$this->hotelVersion = $hotelVersion
		$this->hotelWeb = $hotelWeb;
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
	
	/** SETS **/
	public function set_HotelAdvertisements(){
	}
	
	public function set_HotelStatus($status){
		$this->hotelStatus = $status;			
	}
}
?>