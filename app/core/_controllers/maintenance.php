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


// Class: Client
// Desc: Hotel Maintenance Controller

namespace Controller;

final class Maintenance extends \Template\Controller{
	
	//Construct Method
    function __construct(){
		//Call the super-class constructor
		parent::__construct(); 
		
	}
	
	//Maintenance Index
	function default(){
		include 'web/maintenance/index.view';	
		exit;		
	}

}

?>