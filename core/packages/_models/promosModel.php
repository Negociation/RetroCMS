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

// Class: Promos Model
// Desc: DAO Content of promos Array Object

class PromosModel extends ModelTemplate{

	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
	}
	
	public function get_ActivePromos(){
		$promosArray = [];
		$promoObject;
		
		//Get all content from table (site_promos) where Column(status) as active(true)
		$result = $this->getByParam('site_promos','status',true);
		if (count($result) > 0 && $result != false ){
			foreach($result as $row){
				$promoObject = new Promo();
				$promoObject->constructObject($row['id'],$row['image'],utf8_encode($row['text']),array(utf8_encode($row['buttonTextTop']),utf8_encode($row['buttonTextBottom'])),array($row['buttonUrlTop'],$row['buttonUrlBottom']),$row['status']);				
				array_push($promosArray,$promoObject);
			}
		}else{
			$promoObject = new Promo();
			array_push($promosArray,$promoObject);
		}
		return array_reverse($promosArray);
	}
}
?>