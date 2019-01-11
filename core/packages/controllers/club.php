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

class Club extends Controller{
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

	}

	public function default(){
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/club/index.view';
			exit;	
		}
	}
	
	public function join(){
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/club/join.view';
		}
	}	
	
	//Ajax Club Subscribe
	public function club_subscribe_form(){
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["optionNumber"])){
					if($this->habbo->get_HabboLoggedIn()){
						switch($_POST["optionNumber"]){
							case 'subscribe1':
								$optionDays = 31;
								$optionCredits = 25;
							break;
							case 'subscribe2':
								$optionDays = 96;
								$optionCredits = 60;
							break;
							case 'subscribe3':
								$optionDays = 186;
								$optionCredits = 105;
							break;							
						}
						include './web/includes/site_content/_ajax/club_subscribe_form.ajax';
						exit;
					}else{
						include './web/includes/site_content/_ajax/login_intercept_form.ajax';
						exit;
					}
			}else{
				require_once './web/404.view';
				exit;	
			}
		}
	}

	
	// Ajax Club Result
	public function club_subscribe_result(){
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["optionNumber"])){
				if($this->habbo->get_HabboLoggedIn()){
					if($this->habboModel->set_habboSubscribe($this->habbo->get_HabboId(),$_POST["optionNumber"])){
						include './web/includes/site_content/_ajax/club_subscribe_success.ajax';
						exit;
					}else{
						include './web/includes/site_content/_ajax/club_subscribe_error.ajax';
						exit;						
					}
				}else{
					include './web/includes/site_content/_ajax/login_intercept_form.ajax';
					exit;
				}
			}else{
				require_once './web/404.view';
				exit;	
			}
		}
	}

	public function shop(){
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			include 'web/club/shop.view';
			exit;	
		}
	}
}


?>
