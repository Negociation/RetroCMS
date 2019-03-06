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
	protected $hotel_Language;
	protected $hotel_Client = [] ; //(0 DCR) - (1 TEXTS) - (2 VARIABLES) - (3 SERVER HOST) - (4 SERVER PORT) - ( 5 MUS PORT );
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
	public function constructObject($Hotel_Name,$Hotel_Nick,$Hotel_Version,$Hotel_Web,$Hotel_Url,$Hotel_Language,$Hotel_Client){
		$this->hotel_Name = $Hotel_Name;
		$this->hotel_Nick = $Hotel_Nick;
		$this->hotel_Version = $Hotel_Version;		
		$this->hotel_Web = $Hotel_Web;
		$this->hotel_Url = $Hotel_Url;
		$this->hotel_Language = $Hotel_Language;
		$this->hotel_Client = $Hotel_Client;
		$this->hotelStatus = 1;
	}
	
	//Get Hotel Advertisements if have any enabled :)
	public function set_hotelAdvertisements($Hotel_Advertisements){
		if(count($Hotel_Advertisements) > 0){
			$this->hotel_Advertisements = $Hotel_Advertisements;
		}
	}
	
	public function get_hotelAdvertisements(){
		return $this->hotel_Advertisements;
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
		return $this->hotel_Web;
	}
	
	public function get_HotelDCR(){
		return $this->hotel_Client[0];
	}
	
	public function get_HotelTexts(){
		return $this->hotel_Client[1];
	}
	
	public function get_HotelVars(){
		return $this->hotel_Client[2];
	}
	
	public function get_HotelHost(){
		return $this->hotel_Client[3];
	}
	
	public function get_HotelPort(){
		return $this->hotel_Client[4];
	}

	public function get_HotelMUS(){
		return $this->hotel_Client[5];
	}
	
	public function get_HotelLanguage(){
		return $this->hotel_Language;
	}
	
	function get_HotelVersion(){
		return $this->hotel_Version;
	}


	function set_HotelClosed($status){
		$this->hotel_Status= $status;
	}

	public function set_HotelName($name){
		$this->hotel_Name = $name;
	}

	function set_HotelNick($nick){
		$this->hotel_Nick = $nick;
	}


	function set_HotelUrl($url){
		$this->hotel_Url = $url;
	}

	function set_HotelVersion($version){
		$this->hotel_Version = $version;
	}


	function set_HotelWeb($web){
		 $this->hotel_Web = $web;
	}
	
	function set_HotelVariables($variables){
		$this->hotel_Client[2] = $variables;
		}
	
	function set_HotelTexts($texts){
		$this->hotel_Client[1] = $texts;
	}
	
	function set_HotelDcr($dcr){
		$this->hotel_Client[0] = $dcr;
	}
	
	function set_HotelHost($host){
				$this->hotel_Client[3] = $host;
	}

	function set_HotelPort($port){
				$this->hotel_Client[4] = $port;
	}
	
	function set_HotelMusHost($mushost){

	}

	function set_HotelMusPort($musport){
				$this->hotel_Client[5] = $musport;
	}	
}
?>