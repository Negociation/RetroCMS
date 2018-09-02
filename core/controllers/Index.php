<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Index{
	private $pageTitle;
	
	public function __construct(){ 
	$this->pageTitle = 'Inicio';
	}
	
	//The Main Page 
	function default(){
		
		//Call the Hotel Settings from Core
		global $hotel;
		global $hotelModel;

		echo 'Its alive, and working as well! <br>';
		
		echo 'Your SSO Login Ticket as: '.$hotelModel->get_HotelTicket().'<br>';
		echo $hotel->get_HotelName().' ~ '.$hotel->get_HotelNick();
		
		echo '<center><br> <b> WARNING: Alpha Preview, only for test. <br> <a href="'.$hotel->get_HotelURL().'/login.">Login </a>   |   <a href="'.$hotel->get_HotelURL().'/register/start.">Register </a>
 <b></center>';


	}

	
}
?>

