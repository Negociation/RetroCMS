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
	private $habboModel;
	private $hotel;

	public function __construct($hotelConection){ 
		$this->hotelModel = new HotelModel($hotelConection);
		$this->hotel = $this->hotelModel->get_HotelObject();
		$this->pageTitle = 'Login';
		$this->habbo = new Habbo();
		$this->habboModel = new HabboModel($hotelConection);
		if ($this->habbo->get_HabboLoggedIn()){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo);		
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
						header('Location: ./step/0');
						exit;	
					}else{
						require_once './Web/register/1.php';
					}
				break;
				case 2:
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{
						require_once './Web/register/2.php';
					}
				break;	
				case 3:
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						header('Location: ./step/0');
						exit;	
					}else{
						require_once './Web/register/3.php';
					}
				break;
				case 4:
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
						require_once './Web/register/5.php';
					}
				break;
			}
		}
	}

	
}
?>

