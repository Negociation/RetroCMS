<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Index extends Controller{

	public function __construct($hotelConection){
		$this->hotelConection = $hotelConection;

	

	}
	public function default(){
		$this->pageTitle = "Habbo";
		echo "Index Loaded";
	}
	
}


?>
