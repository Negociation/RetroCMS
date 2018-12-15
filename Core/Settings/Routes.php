<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////



class Route{
	protected $urlObject;
	
	public function __construct($HotelConection){
		$this->hotelConection = $HotelConection;
		$this->urlObject = new Url( isset($_GET["origin"]) ? $_GET["origin"] : ''); 
	}

	//Call Controller 
	public function load(){
		echo 'Loading Controller...';
		call_user_func_array([$this->urlObject->get_UrlController(),$this->urlObject->get_UrlMethod()],$this->urlObject->get_UrlParams());
	}
}
?>