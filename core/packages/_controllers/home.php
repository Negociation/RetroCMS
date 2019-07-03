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
		
		//If Logged In
		if($this->habboModel->get_SessionStatus($this->habbo->get_habboSession())){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId(),1);
			$this->habbo->set_isHabboLoggedIn(true);
		}else{
			$this->habbo->set_isHabboLoggedIn(false);		
		}	
		
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
		$this->pageTitle = "Habbo home: ".$habboname;	
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
		if($this->homeObject->get_HabboObject()->get_isHomeVisible()){
			//Set Home Status if as edit
			if((isset($_GET['do']) && $_GET['do'] == 'edit') && ($this->homeObject->get_HabboObject()->get_habboId() == $this->habbo->get_HabboId())){
				$this->homeObject->set_pageMode('edit');
				$this->set_viewBody('editmode');
			}else{
				$this->set_viewBody('viewmode');
			}
			include 'web/home/home.view';
			exit;
		}else{
			include 'web/home/home_hidden.view';
			exit;
		}						
	}
	
	
}

?>