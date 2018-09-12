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
	protected $hotelClosed;
	protected $hotelAdvertisementTop = array();
	protected $hotelAdvertisementMiddle = array();
	protected $hotelAdvertisementRight = array();
	protected $hotelVariables;
	protected $hotelTexts;
	protected $hotelDcr;
	protected $hotelPort;
	protected $hotelHost;
	protected $hotelMusPort;
	protected $hotelMusHost;	

	//Object Construct
	public function constructObject($Adv00,$Adv01,$Adv02,$Adv10,$Adv11,$Adv12,$Adv20,$Adv21,$Adv22,$Version,$Url,$Web,$Name,$Nick,$Status,$Texts,$Vars,$Dcr,$Host,$Port,$MusHost,$MusPort){

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
		$this->hotelVersion = $Version;
		$this->hotelUrl = $Url;
		$this->hotelWeb = $Web;
		$this->hotelName = $Name;
		$this->hotelNick = $Nick;
		$this->hotelClosed = $Status; //[ 0 / 1 ]

		//Loader Info
		$this->hotelDcr = $Dcr;
		$this->hotelTexts = $Texts;
		$this->hotelVariables = $Vars;
		$this->hotelHost = $Host;
		$this->hotelPort = $Port;
		$this->hotelMusHost = $MusHost;
		$this->hotelMusPort = $MusPort;
		
		
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
	
	function get_HotelVariables(){
		return $this->hotelVariables;
	}
	
	function get_HotelTexts(){
		return $this->hotelTexts;
	}
	
	function get_HotelDcr(){
		return $this->hotelDcr;
	}
	
	function get_HotelHost(){
		return $this->hotelHost;
	}

	function get_HotelPort(){
		return $this->hotelPort;
	}
	
	function get_HotelMusHost(){
		return $this->hotelMusHost;
	}

	function get_HotelMusPort(){
		return $this->hotelMusPort;
	}	
	
//--

	function set_HotelClosed($status){
		$this->hotelClosed = $status;
	}

	public function set_HotelName($name){
		$this->hotelName = $name;
	}

	function set_HotelNick($nick){
		$this->hotelNick = $nick;
	}


	function set_HotelUrl($url){
		$this->hotelUrl = $url;
	}

	function set_HotelVersion($version){
		$this->hotelVersion = $version;
	}


	function set_HotelWeb($web){
		 $this->hotelWeb = $web;
	}
	
	function set_HotelVariables($variables){
		$this->hotelVariables = $variables;
	}
	
	function set_HotelTexts($texts){
		$this->hotelTexts = $texts;
	}
	
	function set_HotelDcr($dcr){
		$this->hotelDcr = $dcr;
	}
	
	function set_HotelHost($host){
		$this->hotelHost = $host;
	}

	function set_HotelPort($port){
		$this->hotelPort = $port;
	}
	
	function set_HotelMusHost($mushost){
		$this->hotelMusHost = $mushost;
	}

	function set_HotelMusPort($musport){
		$this->hotelMusPort = $musport;
	}	
	
	function get_HotelStatus(){
		$connection = @fsockopen($this->Host, $this->Port);
		if (is_resource($connection)){
			fclose($connection);
			return true;
		}else{
			return false;
		}
	}
	//Default Construct
	public function __construct(){ 
		$this->hotelName = "RetroCMS";
		$this->hotelNick = "Retro";
		$this->hotelClosed = false;
	}
}

?>
