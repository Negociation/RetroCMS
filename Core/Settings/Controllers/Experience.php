<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Experience{
		protected $hotel;		
		protected $hotelModel;

	public function __construct($hotelConection){		
		if (!is_null($hotelConection)){ 
			$this->hotelModel = new HotelModel($hotelConection);
			$this->hotel = $this->hotelModel->get_HotelObject();	
		}		
	}


	// Load Default View
	public function default(){
	
		//Check Maintenance Status
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			require_once './Web/Includes/Content/Ajax/Experience/Index.php';
			exit;
		}
	}
}

?>
