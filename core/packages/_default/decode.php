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

// Class: Decode
// Desc: Decode the Url Request 

class Decode{
	
	private $urlController;
	private $urlAction;
	private $urlParams;
	
	public function __construct($urlRequest){
		echo trim($urlRequest);
	}
	
	public function get_DecodeController(){
		return $this->urlController;
	}
	
	public function get_DecodeAction(){
		return $this->urlAction;
	}
	
	public function get_DecodeParams(){
		return $this->urlParams;
	}	
	
}

?>