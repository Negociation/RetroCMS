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

	}
	
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
			}else{
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
							header('Location: ../../');	
						}
						break;
						
					//Step 2 ( Habbo Username and Password )	
					case 2:
						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							require_once './web/register/2.view';
						}
						break;
						
					default:
						require_once './web/404.view';
						break;
				}
			}
		}
	}
}


?>
