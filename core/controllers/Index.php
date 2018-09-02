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

		echo 'Its alive, and working as well! <br>';

		echo $hotel->get_HotelName().' ~ '.$hotel->get_HotelNick();
		
		echo '<center><br> <b> WARNING: Alpha Preview, only for test. <b></center>';
		
		
		
	}

	
}
?>

