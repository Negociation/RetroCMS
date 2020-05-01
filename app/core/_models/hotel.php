<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: Client
// Desc: Hotel Client Class

namespace Model;

final class Hotel extends \Template\Model{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
	}



	public function get_HotelObject(){

		
		//Empty Advertisement Array
		$advertisementArray = [];
		$queryResult = $this->getAll('web_advertisements');
		if (count($queryResult) > 0){
			foreach($queryResult as $row){
				$advertisementObject = new Advertisement();
				$advertisementObject->constructObject($row['id'],$row['image'],$row['url'],$row['type'],$row['status']);
				array_push($advertisementArray,$advertisementObject);
			}
		}
		
		//Empty Web Pages Array 
		$pagesArray = [];
		$queryResult = $this->getAll('web_pages');
		if (count($queryResult) > 0){
			foreach($queryResult as $row){
				$pageObject = new \CLR\Page($row['id'],$row['title'],$row['translate_tag'],$row['controller_name'],intval($row['status']),$row['url'],$row['icon_url'],$row['ver_min']);
				array_push($pagesArray,$pageObject);
			}
		}
		

		//Empty Hotel Object
		$hotelObject = new \CLR\Hotel();
		$queryResult = $this->getAll('web_settings');
		if (true){
			$hotelObject->constructObject($queryResult[0]['value'],$queryResult[1]['value'],$queryResult[2]['value'],$queryResult[3]['value'],$queryResult[4]['value'],$advertisementArray,$pagesArray);
		}
		
		return $hotelObject;
	}
}

?>