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

// Class: RoutePath
// Desc: Load the View based on Url Target

class RoutePath{
	
	//Class Variables
	private $urlRequest;
	private $urlDecode;
	private $hotelConection;
	
	public function __construct($hotelConection){
		//Create Url Request 
		$this->urlRequest = new Request();
		
		//PDO Conection 
		$this->hotelConection = $hotelConection;
		
		//Decode Request Url
		$this->urlDecode = new Decode($this->urlRequest->getRequest(),$hotelConection);
	}
	
	
	public function load(){
		
		//Create a object loadController
		$loadController = $this->urlDecode->get_DecodeController();
		call_user_func_array([new $loadController($this->hotelConection),'interceptRequest'],array($this->urlDecode));



		
	}
	
}
?>