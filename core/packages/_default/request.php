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

// Class: Request
// Desc: Handle the URL Target Request

class Request{
	
	private $urlRequest;
	
	/* Construct Method */
	public function __construct(){
		if(isset($_SERVER["REQUEST_URI"])){
			$this->urlRequest =  $_SERVER["REQUEST_URI"];
		}
	}
	
	/* Return url Request */	
	public function getRequest(){
		return $this->urlRequest;
		
	}
	
}

?>