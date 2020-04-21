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


// Class: ModelTemplate
// Desc: Default Template for Models


namespace Template;

class Model{
	
	protected $hotelConection;
	
    function __construct($hotelConection){		
		//Setting MySQL Conection to Hotel Database
		$this->hotelConection = $hotelConection;
	}			
	
}

?>