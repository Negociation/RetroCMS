<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Hotel{
	protected $hotel_Advertisements = [];
	protected $hotel_Name;
	protected $hotel_Nick;
	protected $hotel_Version;
	protected $hotel_Web;
	protected $hotel_Url;
	protected $hotel_Status;
	
	//Default construct method if hotel haven't installed yet [ Php doesnt allow multiple constructors methods :/ ]
	public function __construct(){
		$this->hotel_Name = "RetroCMS";
		$this->hotel_Nick = "Retro";
		$this->hotel_Web = "http://localhost";
		$this->hotel_Url = "http://localhost";
		$this->hotel_Status = 1;
	}
	
	//Construct hotel Object 
	public function constructObject($Hotel_Name,$Hotel_Nick,$Hotel_Version){
		$this->hotel_Name = $Hotel_Name;
		$this->hotel_Nick = $Hotel_Nick;
		$this->hotel_Version = $Hotel_Version;		
	}
	
	//Get Hotel Advertisements if have any enabled :)
	public function set_hotelAdvertisements($Hotel_Advertisements){
		if(count($Hotel_Advertisements) > 0){
			$this->hotel_Advertisements = $Hotel_Advertisements;
		}
	}
	
	public function get_HotelName(){
		return $this->hotel_Name;
	}
	
	public function get_HotelNick(){
		return $this->hotel_Nick;
	}
	
	public function get_HotelStatus(){
		return $this->hotel_Status;
	}
	
	public function get_HotelUrl(){
		return $this->hotel_Url;
	}
	
		public function get_HotelWeb(){
		return $this->hotel_Url;
	}
}
?>