<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////
class Install{
	private $pageTitle;
	private $habbo;
	private $newHabbo;
	private $habboModel;
	private $hotel;
	
	public function __construct($hotelConection){ 
		$this->hotelModel = new HotelModel($hotelConection);
		$this->hotel = new Hotel();
		$this->pageTitle = 'Login';
		$this->newHabbo = new Habbo();
		$this->habboModel = new HabboModel($hotelConection);
	}
	
	public function default(){
		header('Location: ../install/start');
		exit;
	}
	
	public function start(){
		$this->step(1);
	}

	
	public function done(){
		$this->step(3);
	}
	
	public function step($id){
		if($this->hotelModel->get_HotelInstall()){
			header('Location: ../');
			exit;	
		}else{

			switch($id){
				case 1:
					require_once './Web/install/1.php';
					break;
				case 2:
					require_once './Web/install/2.php';
					break;
				case 3:
					require_once './Web/install/3.php';
					break;
				case 4:
					$this->hotelModel->set_HotelInstall();
					break;
			}
		}
	}

	
}
?>

