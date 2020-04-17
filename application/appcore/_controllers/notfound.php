<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// Class: 404 Controller
// Desc: 404 Controller

namespace Controller;

final class NotFound extends \Template\Controller{
	
	//Construct Method
    function __construct(){
		//Call the super-class constructor
		parent::__construct(); 
		
	}
	
	function default(){
		echo 'RetroCMS ~ NotFound';
	}

}

?>