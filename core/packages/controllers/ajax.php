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

class Ajax extends Controller{

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
		
		
	}
	public function languageSelector(){
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				include './web/includes/site_content/_ajax/languageSelector.ajax';
				exit;
			}else{
				require_once './web/404.view';
				exit;
			}
		}
	}
	
	public function experience(){
		
	}
	
	public function isHabboExist(){
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["habboName"])){
				if($this->habboModel->getByParam("users","username",$_POST["habboName"]) != false){
					echo 'true';
					exit;
				}else{
					echo 'false';
					exit;
				}
			}else{
				require_once './web/404.view';
				exit;	
			}	
		}
	}
}


?>