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
		$result = $this->getAll('site_settings');
		if ($result == false){
			return false;
		}else{
			return $result !== false;
		}
	}
	
	//Return all Hotel Information 
	public function get_HotelObject(){
		$hotelObject = new Hotel();
		$Advertisement_Array = [];
		//Get Hotel Data 
		$result = $this->getAll('site_settings');
		if (count($result) > 0){
			//Set Hotel data in Object
			$hotelObject->constructObject($result[0]['setting_value'],$result[1]['setting_value'],$result[2]['setting_value'],array($result[5]['setting_value'],$result[6]['setting_value'],$result[7]['setting_value'],$result[8]['setting_value'],$result[9]['setting_value'],$result[10]['setting_value']));		
		}			
		
		//Get Hotel Adverstments
		$result = $this->getAll('site_advertisements');
		if (count($result) > 0){
			foreach($result as $row){
				$Advertisement = new Advertisement();
				$Advertisement->constructObject($row['id'],$row['image'],$row['url'],$row['type'],$row['status']);
				array_push($Advertisement_Array,$Advertisement);
			}
		}
		//Set Hotel Advertisements in Object
		$hotelObject->set_hotelAdvertisements($Advertisement_Array);

		return $hotelObject;
	}
	
}

?>
