<?php

//////////////////////////////////////////////////////////////
// 				     RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 				          	//
//////////////////////////////////////////////////////////////

class Not_Found{
		protected $pageTitle;
		protected $habbo;
		protected $habboModel;
		protected $hotel;
		protected $hotelModel;
	public function __construct($hotelConection){ 
	
		$this->pageTitle = 'Inicio';
		
		$this->hotelModel = new HotelModel($hotelConection);
		$this->habboModel = new HabboModel($hotelConection);
		
		$this->habbo = new Habbo();
		$this->hotel = $this->hotelModel->get_HotelObject();

		if ($this->habbo->get_HabboLoggedIn()){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
		}	
	}


	// Load Default View
	public function default(){
			
		//Check if hotel as Opened
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			require_once './Web/404.php';
			exit;
		}		
		
	}


}

?>
