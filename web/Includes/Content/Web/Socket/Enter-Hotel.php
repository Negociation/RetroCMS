<?php
//////////////////////////////////////////////////////////////
// 						   RetroCMS 						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//
//////////////////////////////////////////////////////////////

?>

	<?php
	if($this->hotel->get_HotelStatus()){ 
			echo '
			<div id="enter-hotel">
				<a href="'.$this->hotel->get_HotelURL().'/client" id="enter-hotel-link" target="client" onclick="openOrFocusHabbo(this); return false;"></a>
			</div>';
	}else{
			echo '
			<div id="hotel-closed">
			</div>
		';
	}		
	
		
?>
		
		
		