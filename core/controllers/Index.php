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
	
	
	//The Main Page 
	function default(){
		
		//Call the Hotel Settings from Core
		global $hotel;

		echo 'Its aliveeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee! <br>';

		echo $hotel->get_HotelName();
	}
	
}
?>

