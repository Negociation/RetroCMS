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
		}
		return array_reverse($promosArray);
	}
	
	public function get_ActiveNews(){
		$newsArray = [];
		$newsObject;
		$result = $this->getByParam('site_news','status',true);
		foreach($result as $row){
			$newsObject = new News();
			$newsObject->constructObject($row['id'],$row['date'],utf8_encode($row['title']),utf8_encode($row['description']),utf8_encode($row['content']),$row['status']);				
			array_push($newsArray,$newsObject);
		}
		return array_reverse($newsArray);
	}
}

?>
