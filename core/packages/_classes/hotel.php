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
	protected $hotelVersion;
	protected $hotelClient = [];
	protected $hotelCustom = [];
	protected $hotelAdvertisement;
	protected $hotelLanguage;
	protected $hotelWindows;
	
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
		$this->hotelVersion = $hotelVersion;
		$this->hotelWeb = $hotelWeb;
		$this->hotelUrl = $hotelUrl;
		$this->hotelLanguage = $hotelLanguage;
		$this->hotelClient = $hotelClient;
		$this->hotelCustom = $hotelCustom;
		$this->hotelStatus = true;
		
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
	
	public function get_HotelVersion(){
		return $this->hotelVersion;	
	}

	public function get_HotelWindows(){
		if(is_null($this->hotelWindows)){
			return 0;
		}else{
			return $this->hotelWindows;
		}
	}
	
	public function get_HotelDCR(){
		return $this->hotelClient[0];
	}
	
	public function get_HotelTexts(){
		return $this->hotelClient[1];
	}
	
	public function get_HotelVars(){
		return $this->hotelClient[2];
	}
	
	public function get_HotelHost(){
		return $this->hotelClient[3];
	}
	
	public function get_HotelPort(){
		return $this->hotelClient[4];
	}

	public function get_HotelMUS(){
		return $this->hotelClient[5];
	}
	
	public function get_hotelAdvertisement(){
		return $this->hotelAdvertisement;
	}
	

	public function get_HotelLanguage(){
		return $this->hotelLanguage;	
	}
	
	/** SETS **/

	public function set_HotelName($name){
		$this->hotel_Name = $name;
	}

	function set_HotelNick($nick){
		$this->hotel_Nick = $nick;
	}

	public function set_HotelAdvertisement($hotelAdvertisement){
		$this->hotelAdvertisement = $hotelAdvertisement;
	}
	
	public function set_HotelStatus($status){
		$this->hotelStatus = $status;			
	}
	
	public function set_HotelLanguage($language){
		$this->hotelLanguage = $language;			
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
		$this->hotelClient[2] = $variables;
	}
	
	function set_HotelTexts($texts){
		$this->hotelClient[1] = $texts;
	}
	
	function set_HotelDcr($dcr){
		$this->hotelClient[0] = $dcr;
	}
	
	function set_HotelHost($host){
		$this->hotelClient[3] = $host;
	}

	function set_HotelPort($port){
		$this->hotelClient[4] = $port;
	}
	
	function set_HotelMusHost($mushost){

	}

	function set_HotelMusPort($musport){
		$this->hotelClient[5] = $musport;
	}	

	function set_HotelWindows($param){
		if($param == 'on'){
			$this->hotelWindows = 1;
		}else{
			$this->hotelWindows = 0;
		}
	}
}
?>