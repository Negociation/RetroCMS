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

class HotelModel extends Model{

	public function __construct($hotelConection){
		$this->hotelConection = $hotelConection;
	}
	
	//Check if table Site_Settings exist and have content inside 
	public function get_HotelInstall(){
		try {
			$sql = 'SELECT 1 FROM Site_Settings LIMIT 1';
			$result = $this->hotelConection->query($sql);
		}catch(Exception $e){
			//If not return false
			return false;
		}
			//If exists return true :D
		    return $result !== false;
	}
}

?>
