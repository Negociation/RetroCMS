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


// Class: Register
// Desc: Controller for User Registration

namespace Controller;

final class Register extends \Template\Controller{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
		
	}
	
	function step($param){
		if(!$this->habbo->get_isHabboLoggedIn()){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && $param > 0){
				switch($param){
					case 1:
					break;
					case 2:
					break;
					case 3:
					break;
					case 4:
					break;
					case 5:
					break;					
				}
			}else if($param == 0){
				include 'web/register/0.view';	
			}else{
				header('Location: '.$this->hotel->get_HotelUrl().'/register/step/0');
			}
		}else{
			header('Location: '.$this->hotel->get_HotelUrl());
		}
	}

}

?>