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
	
	public function __construct(){
		//Create Url Request 
		$this->urlRequest = new Request();
		
		//Decode Request Url
		$this->urlDecode = new Decode($this->urlRequest->getRequest());
	}
	
	
	public function load($hotelConection){
		
		//Create a object loadController
		$loadController = $this->urlDecode->get_DecodeController();
		$loadController = new $loadController($hotelConection);
		
		//Call the View (If the intercept Allows)
		$loadController->interceptRequest($this->urlDecode);

		
	}
	
}
?>