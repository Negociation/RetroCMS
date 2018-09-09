<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////


class Hotel{
	protected $hotelName;
	protected $hotelNick;
	protected $hotelUrl;
	protected $hotelWeb;
	protected $hotelVersion;
	protected $hotelAdvertisementTop = array();
	protected $hotelAdvertisementMiddle = array();
	protected $hotelAdvertisementRight = array();
	

	//Object Construct
//	public function constructObject($Adv00,$Adv01,$Adv02,$Adv10,$Adv11,$Adv12,$Adv20,$Adv21,$Adv22,$Closed,$Name,$Nick,$Url,$Version,$Web){
	public function constructObject($Adv00,$Adv01,$Adv02,$Adv10,$Adv11,$Adv12,$Adv20,$Adv21,$Adv22){

		//0 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementTop,$Adv00);
		array_push($this->hotelAdvertisementTop,$Adv01);
		array_push($this->hotelAdvertisementTop,$Adv02);
		
		//1 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementMiddle,$Adv10);
		array_push($this->hotelAdvertisementMiddle,$Adv11);
		array_push($this->hotelAdvertisementMiddle,$Adv12);
		
		//2 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementRight,$Adv20);
		array_push($this->hotelAdvertisementRight,$Adv21);
		array_push($this->hotelAdvertisementRight,$Adv22);
		
		//Hotel Info
		//$this->hotelClosed = $Closed;
		//$this->hotelName = $Name;
		//$this->hotelNick = $Nick;
		//$this->hotelUrl = $Url;
		//$this->hotelVersion = $Version;
		//$this->hotelWeb = $Web;
	}
	
	function get_AdvertisementTop($setting){
		switch($setting){
			case  'status':
			return $this->hotelAdvertisementTop[0];
			break;
			case  'image':
			return $this->hotelAdvertisementTop[1];
			break;
			case  'url':
			return $this->hotelAdvertisementTop[2];
			break;
		}
		
	}

	function get_AdvertisementMiddle($setting){
		switch($setting){
			case  'status':
			return $this->hotelAdvertisementMiddle[0];
			break;
			case  'image':
			return $this->hotelAdvertisementMiddle[1];
			break;
			case  'url':
			return $this->hotelAdvertisementMiddle[2];
			break;
		}
		
	}

	function get_AdvertisementRight($setting){
		switch($setting){
			case  'status':
			return $this->hotelAdvertisementRight[0];
			break;
			case  'image':
			return $this->hotelAdvertisementRight[1];
			break;
			case  'url':
			return $this->hotelAdvertisementRight[2];
			break;
		}
		
	}

	function get_HotelClosed(){
		return $this->hotelClosed;
	}

	public function get_HotelName(){
		return $this->hotelName;
	}

	function get_HotelNick(){
		return $this->hotelNick;
	}


	function get_HotelURL(){
		return $this->hotelUrl;
	}

	function get_HotelVersion(){
		return $this->hotelVersion;
	}


	function get_HotelWeb(){
		return $this->hotelWeb;
	}
	
	//Default Construct
	public function __construct(){ 
		$this->hotelName = "RetroCMS";
		$this->hotelNick = "Retro";
		$this->hotelClosed = false;
	}
}

?>
