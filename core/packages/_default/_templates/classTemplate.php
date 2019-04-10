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

// Class: ClassTemplate
// Desc: Default Template for Classes

class ClassTemplate{

	public function get_DateFormat($format,$value){
		switch($format){
			//Format Day/Month/Year
			case 1:
				return date('d/m/y', strtotime(str_replace('-','/', $value)));
				break;
			//Format Month/Day/Year
			case 2:
				return date('m/d/y', strtotime(str_replace('-','/', $value)));
				break;
		}
	}
	
}
?>