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

// Class: Profile
// Desc: Habbo Profile Controller 

class Home extends ControllerTemplate{
	
	/* Variables of Views */
	protected $promoArray = [];
	protected $promosModel;
	protected $newsArray = [];
	protected $newsModel;
	protected $homeObject;
	
	/* Construct Method */
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
	
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();
		
		
		
	}
	
	/* Default View Call */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Habbo Homes";
		include 'web/home/index.view';	
		exit;
	}
	
	/* Load Home by Id */
	protected function id($habboid){	
		if($this->habboModel->get_HabboObject($habboid,1) == false){
			//Set Page Title;
			$this->pageTitle = "Habbo Home não encontrada";	
			//Include Not Found
			include 'web/404.view';	
			exit;			
		}else{
			$this->loadContent($this->habboModel->get_HabboObject($habboid,1));
		}
	}

	/* Load Home by Name */
	protected function name($habboname){
		//Set Page Title;
		$this->pageTitle = "Habbo Home não encontrada";	
		if($this->habboModel->get_HabboObject($habboname,2) == false){
			//Set Page Title;
			$this->pageTitle = "Habbo Home não encontrada";	
			//Include Not Found
			include 'web/404.view';	
			exit;
		}else{
			$this->loadContent($this->habboModel->get_HabboObject($habboname,2));
		}
		
	}
	
	//Load Home Content (Private Access)
	private function loadContent($habboObject){
			$this->homeObject = new homeObject();
			$this->homeObject->constructObject($habboObject);
			include 'web/home/home.view';	
			exit;
			
	}
	
	
}

?>