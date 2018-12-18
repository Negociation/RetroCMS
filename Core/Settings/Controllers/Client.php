<?php
//////////////////////////////////////////////////////////////
// 							RetroCMS 						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Client{
	private $pageTitle;
	private $habbo;
	private $habboModel;

	public function __construct($hotelConection){
		$this->pageTitle = 'Client';
		$this->habbo = new Habbo();		
		if (!is_null($hotelConection)){ 
			$this->hotelModel = new HotelModel($hotelConection);
			$this->habboModel = new HabboModel($hotelConection);
			$this->hotel = $this->hotelModel->get_HotelObject();
			if ($this->habbo->get_HabboLoggedIn()){
				$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
			}	
		}		
	}
	
	//The Main Page 
	public function default(){
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			
			//Check if habbo as logged-in if as true redirects to Home
			if (!$this->habbo->get_HabboLoggedIn()){
				header('Location: ../account/login?target=habboClient');
				exit;
			}else{
				$this->habbo->set_HabboTicket($this->habboModel->get_HabboTicket($this->habbo));
				$this->habboModel->set_HabboTicket($this->habbo);
				
				require_once './Web/Client.php';
				exit;
			}
		}
	}

}
?>

