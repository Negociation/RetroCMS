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
		}else{
			$promoObject = new Promo();
			array_push($promosArray,$promoObject);
		}
		return array_reverse($promosArray);
	}
	
	//Return a array of active newsCalls (Object)
	public function get_ActiveNews(){
		$newsArray = [];
		$articleObject;
		//Get all content from table (site_news) where Column(status) as active(true)
		$result = $this->getByParam('site_news','status',true);
		if (count($result) > 0 && $result != false ){
			foreach($result as $row){
				$articleObject = new Article();
				$articleObject->constructObject($row['id'],$row['date'],utf8_encode($row['title']),utf8_encode($row['description']),utf8_encode($row['content']),$row['author'],$row['status']);				
				array_push($newsArray,$articleObject);
			}
		}else{
			$articleObject = new Article();
			array_push($newsArray,$articleObject);
		}
		return array_reverse($newsArray);
	}
	
	public function get_Article($id){
		$articleObject = new Article();		
		$result = $this->getById('site_news',$id);
		if ((!$result && $id != 0) || $result['status'] == false){
			return false;
			exit;
		}elseif( is_array($result) && $result != false){
			$articleObject->constructObject($result['id'],$result['date'],utf8_encode($result['title']),utf8_encode($result['description']),utf8_encode($result['content']),$result['author'],$result['status']);	
		}
		return $articleObject;
	}
}

?>
