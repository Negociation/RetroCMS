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

// Class: Install
// Desc: Install method (Only for first access)

class Install extends ControllerTemplate{
	
	/* Construct Method */
	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;

		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
		
		//Get Hotel Object
		$this->hotel = new Hotel();

		$this->newHabbo = new Habbo();
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
		if( is_numeric($id) && (($_SERVER['REQUEST_METHOD'] == 'POST' &&  $id > 1 ) || $id == 1)){
			switch($id){
				case 1:
					include 'web/install/steps/1.view';
					break;
				case 2:
					include 'web/install/steps/2.view';
					break;
				case 3:
					include 'web/install/steps/3.view';
					break;
				case 4:
					include 'web/install/steps/4.view';
					break;
				case 5:
					include 'web/install/steps/5.view';
					break;
				case 6:
					include 'web/install/steps/6.view';
					break;
				case 7:
					include 'web/install/steps/7.view';
					break;
				default:
					header('Location: ../start');
					break;

			}
		}else{
			//Restart Install
			header('Location: ../start');
		}
	}
	
	//Step 6
	protected function done(){
			$this->step(7);
			exit;		
	}
	
	
}

?>