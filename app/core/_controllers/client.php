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
// Desc: Hotel Client Class

namespace Controller;

final class Client extends \Template\Controller{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
		
	}
	
	function default(){
		if($this->habbo->get_isHabboLoggedIn()){
					echo 'RetroCMS ~ Client';

		}else{
			header('Location: '.$this->hotel->get_HotelUrl().'/login?origin=habboClient');
		}
	}

}

?>