<?php

//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Account{
	protected $pageTitle;
	protected $habbo;
	protected $habboModel;		
	protected $hotel;
	protected $hotelModel;
	
	public function __construct($hotelConection){ 
		$this->pageTitle = 'Inicio';
		$this->habbo = new Habbo();
		if (!is_null($hotelConection)){ 
			$this->hotelModel = new HotelModel($hotelConection);
			$this->habboModel = new HabboModel($hotelConection);
			$this->hotel = $this->hotelModel->get_HotelObject();
		}
	}


	//Check if hotel as Opened
	public function login(){
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if ($this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;
			}else{
				//$this->habboModel->set_HabboLogout();
				require_once './Web/Account/Login.php';
				exit;	
			}
		}
	}
	
	public function disconnected(){
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if(!$this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;			
			}else{
					$this->habboModel->set_HabboLogout();
					require_once './Web/Account/Disconnected.php';
					exit;	
			}
		}
	}	

	
}

?>
