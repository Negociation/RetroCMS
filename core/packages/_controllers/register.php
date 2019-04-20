<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: Register
// Desc: Register a new Habbo

class Register extends ControllerTemplate{
	
	/* Construct Method */
	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;

		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();
		$this->newHabbo = new Habbo();

		//If Logged In
		if($this->habboModel->get_SessionStatus($this->habbo->get_habboSession())){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId(),1);
			$this->habbo->set_isHabboLoggedIn(true);
		}else{
			$this->habbo->set_isHabboLoggedIn(false);		
		}
		
		
	}
	
	/* Default View Calls */
	protected function default(){
		$this->step(1);	
	}
	
	//Step 1
	protected function start(){
		$this->step(1);
	}
	
	/* Steps of Install */
	protected function step($id){
		if( (is_numeric($id) && (($_SERVER['REQUEST_METHOD'] == 'POST' &&  $id > 0 ) || $id == 0 ))&&(!$this->habbo->get_isHabboLoggedIn())){
			switch($id){
				case 0:
					include 'web/register/0.view';
					break;
				case 1:
					include 'web/register/1.view';
					break;
				case 2:
					include 'web/register/2.view';
					break;
				case 3:
					include 'web/register/3.view';
					break;
				case 4:
					include 'web/register/4.view';
					break;
				case 5:
					include 'web/register/5.view';
					break;
				default:
					header('Location: ../../register/start');
					break;
			}
		}else if(!$this->habbo->get_isHabboLoggedIn()){
			//Restart Install
			header('Location: ../../register/step/0');
		}else{
			header('Location: ../../');			
		}
	}
	
	//Step 6
	protected function done(){
			$this->step(5);
			exit;		
	}
	
	
}

?>