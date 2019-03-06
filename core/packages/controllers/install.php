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

class Install extends Controller{


	private $newHabbo;
	private $newHotel;
	
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;

		//Setting Hotel_Model(DAO) and getting Hotel Object from Database
		$this->hotelModel = new HotelModel($this->hotelConection);
		$this->hotel =  $this->hotelModel->get_HotelObject();
		$this->newHotel = new Hotel();
		
		//Starting Habbo_Model(DAO) and get the logged Habbo 
		$this->habboModel = new HabboModel($this->hotelConection);
		$this->habbo = new Habbo();
		$this->newHabbo = new Habbo();
	}
	
	public function default(){
		header('Location: ../install/start');
		exit;
	}
	
	public function start(){
		$this->step(1);
	}

	
	public function done(){
		$this->step(4);
	}
	
	public function step($id){
		if(($this->hotelModel->get_HotelInstall()) && $id < 3){
			header('Location: ../');
			exit;	
		}else{
			if (isset($_POST['required-hotelName'])){ $this->newHotel->set_HotelName($_POST['required-hotelName']); }
			if (isset($_POST['required-hotelNick'])){ $this->newHotel->set_HotelNick($_POST['required-hotelNick']); }
			if (isset($_POST['required-hotelWeb'])){ $this->newHotel->set_HotelWeb($_POST['required-hotelWeb']); }
			if (isset($_POST['required-hotelUrl'])){ $this->newHotel->set_HotelUrl($_POST['required-hotelUrl']); }
			if (isset($_POST['required-hotelVersion'])){ $this->newHotel->set_HotelVersion($_POST['required-hotelVersion']); }

			if (isset($_POST['required-hotelVars'])){ $this->newHotel->set_HotelVariables($_POST['required-hotelVars']); }
			if (isset($_POST['required-hotelTexts'])){ $this->newHotel->set_HotelTexts($_POST['required-hotelTexts']); }
			if (isset($_POST['required-hotelDcr'])){ $this->newHotel->set_HotelDcr($_POST['required-hotelDcr']); }
			if (isset($_POST['required-hotelHost'])){ $this->newHotel->set_HotelHost($_POST['required-hotelHost']); }
			if (isset($_POST['required-hotelPort'])){ $this->newHotel->set_HotelPort($_POST['required-hotelPort']); }
			//if (isset($_POST['required-hotelMusHost'])){ $this->newHotel->set_HotelMusHost($_POST['required-hotelMusHost']); }
			if (isset($_POST['required-hotelMusPort'])){ $this->newHotel->set_HotelMusPort($_POST['required-hotelMusPort']); }
			
			if (isset($_POST['required-avatarName'])){ $this->newHabbo->set_HabboName($_POST['required-avatarName']);  }
			if (isset($_POST['required-password'])){ $this->newHabbo->set_HabboPassword($_POST['required-password']); }
			$this->newHabbo->set_HabboRank(7);
			
			switch($id){
				case 1:
					require_once './web/install/1.view';
					break;
				case 2:
				if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ../install/start');
						exit;	
					}else{
						require_once './web/install/2.view';
					}
					break;
				case 3:
					if ($this->hotelModel->set_HotelInstall($this->newHotel) && $_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/install/3.view';
						}else{
							header('Location: ../install/start');
						}
					break;
				case 4:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ../install/start');
						exit;	
					}else{
						if ($this->habboModel->set_HabboRegistration($this->newHabbo)){
							require_once './web/install/4.view';
							$this->habboModel->set_HabboLogin($this->newHabbo);
						}else{
							header('Location: ../../');
						}
					}
					break;
			}
		}
	}

	
}
?>

