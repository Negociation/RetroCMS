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
class Register{
	private $pageTitle;
	private $habbo;
	private $newHabbo;
	private $habboModel;
	private $hotel;

	public function __construct($hotelConection){ 
		$this->pageTitle = 'Register';
		$this->habbo = new Habbo();
		$this->newHabbo = new Habbo();
		if (!is_null($hotelConection)){ 
			$this->hotelModel = new HotelModel($hotelConection);
			$this->habboModel = new HabboModel($hotelConection);
			$this->hotel = $this->hotelModel->get_HotelObject();
			if ($this->habbo->get_HabboLoggedIn()){
				$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
			}	
		}
	}
	

	public function start(){
		$this->step(1);
	}
	
	public function exit(){
		header('Location: ../');
		exit;
	}
	
	public function done(){
		$this->step(5);
	}
	public function step($id){

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
				
			
			
		if($this->hotel->get_HotelClosed()){
				require_once './Web/Maintenance/Index.php';
				exit;
		}elseif($this->habbo->get_HabboLoggedIn()){
			header('Location: ../../');
			exit;	
		}else{
			switch($id){
				case 0:
				require_once './Web/register/0.php';
				break;
					case 1:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ../../register/step/0');
						exit;	
					}else{
						
						require_once './Web/register/1.php';
					}
				break;
				case 2:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{
						require_once './Web/register/2a.php';
					}
				break;	
				case 3:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{
						if ($this->habboModel->get_HabboName($this->newHabbo->get_HabboName())){
							require_once './Web/register/3.php';
						}else{
							$id = 2;
							require_once './Web/register/2b.php';
						}
						
					}
				break;
				case 4:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{
						require_once './Web/register/4.php';
					}
				break;
				case 5:
					if ($_SERVER['REQUEST_METHOD'] != 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{	
						if ($this->habboModel->set_HabboRegistration($this->newHabbo)){
							$this->habboModel->set_HabboLogin($this->newHabbo);
							require_once './Web/register/5.php';
						}
					}
				break;
			}
		}
	}

	
}
?>

