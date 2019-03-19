<?php
//////////////////////////////////////////////////////////////
// 					    RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////



class Route{
	protected $hotelConection;
	protected $urlObject;
	
	public function __construct($HotelConection){
		$this->hotelConection = $HotelConection;
		$this->urlObject = new Url( ((isset($_GET["origin"]) &&  ($_GET["origin"]) != "") ) ? $_GET["origin"] : "Index",$HotelConection); 
	}

	//Call Controller 
	public function load(){
		//Get Controller
		$this->urlController = $this->urlObject->get_UrlController();
		//Create a new Object
		$this->urlController = new $this->urlController($this->hotelConection);
		
		//Set method name Constraint
		$this->urlController->set_MethodName($this->urlObject->get_UrlMethod());
		
		//Load View on Controller Object
		call_user_func_array([$this->urlController,$this->urlObject->get_UrlMethod()],$this->urlObject->get_UrlParams());			
	}
	
}
?>
