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


// Class: Install
// Desc: Hotel Install Controller

namespace Controller;

final class Install extends \Template\Controller{
	
	//Construct Method
    function __construct(){
		//Call the super-class constructor
		parent::__construct(); 
		
	}
	
	function default(){
		echo 'RetroCMS ~ Install';
	}

}

?>