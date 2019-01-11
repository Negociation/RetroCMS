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

	public function languageSelectorResult(){
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if($this->habbo->get_habboLoggedIn()){
					$this->habboModel->setColumnById('users','user_language',$this->habbo->get_HabboId(),$_POST["userLang"]);
				}
				include './web/includes/site_content/_ajax/languageSelector_Result.ajax';
				exit;
			}else{
				require_once './web/404.view';
				exit;
			}
		}
	}
	
	
	public function experience(){
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				echo '<iframe align="center" width="650px" height="430px" src="'.$this->hotel->get_HotelWeb().'/c_images/downloads/experience/exp-20060201-1/index_br.html" name="myIframe" id="myIframe" scrolling="no" frameborder="no"> </iframe>';
				exit;
			}
		}			
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