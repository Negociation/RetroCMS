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
	protected $hotelAdvertisementLeft = array();
	protected $hotelAdvertisementMiddle = array();
	protected $hotelAdvertisementRight = array();
	
	//Object Construct
	public function constructObject($Adv00,$Adv01,$Adv02,$Adv10,$Adv11,$Adv12,$Adv20,$Adv21,$Adv22,$Closed,$Name,$Nick,$Url,$Version,$Web){
		
		//0 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementLeft,$Adv00);
		array_push($this->hotelAdvertisementLeft,$Adv01);
		array_push($this->hotelAdvertisementLeft,$Adv02);
		
		//1 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementMiddle,$Adv10);
		array_push($this->hotelAdvertisementMiddle,$Adv11);
		array_push($this->hotelAdvertisementMiddle,$Adv12);
		
		//2 Advertisement Left [0 - Enabled/Disabled] [1 - Image URL ] [2 - URL Link ]
		array_push($this->hotelAdvertisementRight,$Adv20);
		array_push($this->hotelAdvertisementRight,$Adv21);
		array_push($this->hotelAdvertisementRight,$Adv22);
		
		//Hotel Info
		$this->hotelClosed = $Closed;
		$this->hotelName = $Name;
		$this->hotelNick = $Nick;
		$this->hotelUrl = $Url;
		$this->hotelVersion = $Version;
		$this->hotelWeb = $Web;
	}
	
	function get_AdvertisementTopEnabled(){
		return $this->hotelAdvertisementTop;
	}

	function get_AdvertisementTopImg(){
		return $this->hotelAdvertisementTopImg;
	}


	function get_AdvertisementMiddleEnabled(){
		return $this->hotelAdvertisementMiddle;
	}

	function get_AdvertisementMiddleImg(){
		return $this->hotelAdvertisementMiddleImg;
	}


	function get_AdvertisementLeftEnabled(){
		return $this->hotelAdvertisementLeft;
	}

	function get_AdvertisementLeftImg(){
		return $this->hotelAdvertisementLeftImg;
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
		$this->hotelClosed = true;
	}
}

?>
