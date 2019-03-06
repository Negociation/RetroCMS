<?php
//////////////////////////////////////////////////////////////
// 						RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Register extends Controller{
	protected $promoArray = [];
	protected $newsModel;
	protected $newHabbo;
	
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		$this->pageTitle = 'Registro';
		
		//Setting Hotel_Model(DAO) and getting Hotel Object from Database
		$this->hotelModel = new HotelModel($this->hotelConection);
		$this->hotel =  $this->hotelModel->get_HotelObject();
	
		//Starting Habbo
		$this->habboModel = new HabboModel($this->hotelConection);
		$this->habbo = new Habbo();
		$this->newHabbo = new Habbo();
	}
	
	//Start registration 
	public function start(){
		$this->step(1);			
	}
	
	public function step($id){
		
		//Maintenance ? 
		if(!$this->hotel->get_HotelStatus()){
			require_once './web/maintenance/index.view';
			exit;
		}else{
			if($this->habbo->get_HabboLoggedIn()){
				header('Location: ../../');
				exit;
			}else if(is_numeric($id)){
				//Step 0
				$this->newHabbo->set_HabboBirth(isset($_POST['required-birth']) ? $_POST['required-birth'] : '');

				//Step 1
				
					//V17 OR LESS
					if (isset($_GET['newGender'])){ $this->newHabbo->set_HabboGender($_GET['newGender']); }
					if (isset($_GET['figureData'])){ $this->newHabbo->set_HabboFigure($_GET['figureData']); }
					if (isset($_POST['newGender'])){ $this->newHabbo->set_HabboGender($_POST['newGender']); }
					if (isset($_POST['figureData'])){ $this->newHabbo->set_HabboFigure($_POST['figureData']); }
					
					//V18 ... V21
						
				//Step 2		
				if (isset($_POST['required-avatarName'])){ $this->newHabbo->set_HabboName($_POST['required-avatarName']);  }
				if (isset($_POST['required-password'])){ $this->newHabbo->set_HabboPassword($_POST['required-password']); }

				//Step 3
				if (isset($_POST['required-email'])){ $this->newHabbo->set_HabboEmail($_POST['required-email']); }
						
					
				switch($id){
					//Step 0 ( Habbo Birthday )
					case 0:
						
						require_once './web/register/0.view';
						break;
						
					//Step 1 ( Habbo Avatar )
					case 1:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/register/1.view';
						}else{
							header('Location: ../../register/step/0');	
						}
						break;
						
					//Step 2 ( Habbo Username and Password )	
					case 2:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/register/2.view';
						}else{
							header('Location: ../../');	
							break;
						}
						break;
					
					//Step 3 (Email and default language)
					case 3:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/register/3.view';
						}else{
							header('Location: ../../');	
							break;
						}
						break;
						
					//Step 4 (TOS)
					case 4:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/register/4.view';
						}else{
							header('Location: ../../');	
							break;
						}
						break;
						
					//Step 5 (Welcome Page)
					case 5:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							$this->habboModel->set_HabboRegistration($this->newHabbo);
							if ($this->habboModel->set_HabboRegistration($this->newHabbo)){
								$this->habboModel->set_HabboLogin($this->newHabbo);
								require_once './web/register/5.view';
							}else{
								header('Location: ../error');	
								break;
							}
							
						}else{
							header('Location: ../../');	
							break;
						}
						break;
					default:
						require_once './web/404.view';
						break;
				}
			}else{
				require_once './web/404.view';
				exit;
			}
		}
	}
	
	//Finish Registration
	public function done(){
		$this->step(5);			
	}
}


?>
