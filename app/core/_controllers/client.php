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
	
	private $forwardData = [];
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
		
		//Set Servet Ticket
		$this->habboModel->set_HabboTicket(2,$this->habbo);

		
	}
	
	function default(){
		if($this->habbo->get_isHabboLoggedIn()){
			include 'web/client.view';	
		}else{
			header('Location: '.$this->hotel->get_HotelUrl().'/login?target=habboClient');
		}
	}

}

?>