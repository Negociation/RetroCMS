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

// Class: News Model
// Desc: DAO Content of News Array Object

class NewsModel extends ModelTemplate{

	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
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
	
	//Return a Article Object
	public function get_ArticleObject($id){
		$articleObject = new Article();		
		$result = $this->getById('site_news',$id);
		if ((!$result && $id != 0)){
			return false;
			exit;
		}elseif( is_array($result) && $result != false){
			$articleObject->constructObject($result['id'],$result['date'],utf8_encode($result['title']),utf8_Decode($result['description']),utf8_encode($result['content']),$result['author'],$result['status']);	
		}
		return $articleObject;	
	}

}
?>