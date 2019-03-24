<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: Hotel Model
// Desc: DAO Content of hotel Object

class HotelModel extends ModelTemplate{

	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
	}

	public function get_HotelObject(){
		
		//Empty Hotel Object
		$hotelObject = new Hotel();
		
		//Empty Advertisement Array
		$advertisementArray = [];
		
		//Get all infromation from table site_settings by getAll method
		$queryResult = $this->getAll('site_settings');
		
		//If the query returned all site_settings
		
		if (count($queryResult) == 12 ){
			//Set Hotel data in Object
			$hotelObject->constructObject($queryResult[0]['setting_value'],$queryResult[1]['setting_value'],$queryResult[2]['setting_value'],$queryResult[3]['setting_value'],$queryResult[4]['setting_value'],$queryResult[5]['setting_value'],array($queryResult[6]['setting_value'],$queryResult[7]['setting_value'],$queryResult[8]['setting_value'],$queryResult[9]['setting_value'],$queryResult[10]['setting_value'],$queryResult[11]['setting_value']),array());		
		
		
			//Get Hotel Adverstments
			$queryResult = $this->getAll('site_advertisements');
			if (count($queryResult) > 0){
				foreach($queryResult as $row){
					$advertisementObject = new Advertisement();
					$advertisementObject->constructObject($row['id'],$row['image'],$row['url'],$row['type'],$row['status']);
					array_push($advertisementArray,$advertisementObject);
				}
			}
			
			//Set Hotel Advertisements in Object
			$hotelObject->set_hotelAdvertisements($advertisementArray);
		}else{
			//If something wrong on construct method (like missing information) so set the hotel to Offline!
			$hotelObject->set_HotelStatus(false);	
		}
		return $hotelObject;
	}
	

	//Check if table Site_Settings exist and have content inside 
	public function get_HotelInstall(){
		$resultObject = $this->getAll('site_settings');
		if ($resultObject == false){
			return false;
		}else{
			return $resultObject !== false;
		}
	}
	
}
?>