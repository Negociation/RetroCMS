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

// Class: News
// Desc: Habbo News Articles Controller

class News extends ControllerTemplate{
	
	/* Variable of News */
	protected $newsArray = [];
	protected $newsModel;
	protected $articleObject;
	
	/* Construct Method */
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Generic Models
		$this->hotelModel = new hotelModel($hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();

		//New News Object
		$this->newsModel = new newsModel($this->hotelConection);
		$this->newsArray = $this->newsModel->get_ActiveNews();
				
	}
	
	/* Default View Call - News */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Arquivo";
		include 'web/news/index.view';
		exit;	
	}
	

	/* View Call - News/Article/%Id% */
	protected function article($id){
		//Get Article Data By Id
		$this->articleObject = $this->newsModel->get_ArticleObject($id);
		//Author 
		$authorObject = new Habbo();
		if($this->articleObject != false && is_numeric($id)){
			include 'web/news/article.view';
			exit;				
		}else{
			unset($this->articleObject);
			include 'web/404.view';	
			exit;				
		}
	}	
	
	
	
}

?>