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

class News extends Controller{
	protected $promoArray = [];
	protected $newsArray = [];
	protected $newsModel;
	protected $article;
	
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Setting Hotel_Model(DAO) and getting Hotel Object from Database
		$this->hotelModel = new HotelModel($this->hotelConection);
		$this->hotel =  $this->hotelModel->get_HotelObject();
	
		
		//Starting Habbo_Model(DAO) and get the logged Habbo 
		$this->habboModel = new HabboModel($this->hotelConection);
		$this->habbo = new Habbo();
		
		if ($this->habbo->get_HabboLoggedIn()){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId());	
		}
		
		//Webpromos and News
		$this->newsModel = new NewsModel($this->hotelConection);
		$this->newsArray = $this->newsModel->get_ActiveNews();
		$this->article = new Article();
	}
	
	public function article($id){	
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			$this->article = $this->newsModel->get_Article($id);
			if($this->article != false){
				include 'web/news/article.view';
				exit;				
			}else{
				include 'web/404.view';	
				exit;				
			}
		}
	}
	

}


?>
