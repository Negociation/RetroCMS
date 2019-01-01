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

class NewsModel extends Model{

	public function __construct($hotelConection){
		$this->hotelConection = $hotelConection;

	}
	
	//Return a array of active promos(Object)
	public function get_ActivePromos(){
		$Promos_Array = [];
		$promoObject;
		//Get all content from table (site_promos) where Column(status) as active(true)
		$result = $this->getByParam('site_promos','status',true);
		if (count($result) > 0 && $result != false ){
			foreach($result as $row){
				$promoObject = new Promo();
				$promoObject->constructObject($row['id'],$row['image'],$row['text'],array($row['buttonTextTop'],$row['buttonTextBottom']),array($row['buttonUrlTop'],$row['buttonUrlBottom']),$row['status']);				
				array_push($Promos_Array,$promoObject);
			}
		}
		return $Promos_Array;
	}
	
}

?>
