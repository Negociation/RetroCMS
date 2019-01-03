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

class Account extends Controller{
	protected $promoArray = [];
	protected $newsModel;
	
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Setting Hotel_Model(DAO) and getting Hotel Object from Database
		$this->hotelModel = new HotelModel($this->hotelConection);
		$this->hotel =  $this->hotelModel->get_HotelObject();
	
		
		//Starting Habbo
		$this->habbo = new Habbo();

	}
	
	public function login(){
		//Set Page Title;
		$this->pageTitle = "Login";
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/account/login.view';	
			exit;
		}
	}
	
	public function disconected(){
		//Set Page Title;
		$this->pageTitle = "Login";
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/account/login.view';	
			exit;
		}
	}

	public function submit(){
		echo 'Trying to submit';
	}
	
}


?>
