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
	
	protected $newHabbo;
	protected $defaultHabbo;
	
	/* Construct Method */
	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;

		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
		
		//Get Hotel Object
		$this->hotel = new Hotel();
		$this->newHotel = new Hotel();
		$this->newHabbo = new Habbo();
		$this->defaultHabbo = new Habbo();
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
		if( is_numeric($id) && (($_SERVER['REQUEST_METHOD'] == 'POST' &&  $id > 1 ) || $id == 1 || $id == 6)){

			
			//Step 1
			if (isset($_POST['required-hotelLanguage'])){ $this->newHotel->set_HotelLanguage($_POST['required-hotelLanguage']); }

			//Step 2
			//To-DO
			
			
			//Step 3	
			if (isset($_POST['required-hotelName'])){ $this->newHotel->set_HotelName($_POST['required-hotelName']); }
			if (isset($_POST['required-hotelNick'])){ $this->newHotel->set_HotelNick($_POST['required-hotelNick']); }
			if (isset($_POST['required-hotelVersion'])){ $this->newHotel->set_HotelVersion($_POST['required-hotelVersion']); }
			//if (isset($_POST['required-hotelWindows'])){ $this->newHotel->set_HotelWindows($_POST['required-hotelWindows']); }
			if (isset($_POST['required-hotelUrl'])){ $this->newHotel->set_HotelUrl($_POST['required-hotelUrl']); }
			if (isset($_POST['required-hotelWeb'])){ $this->newHotel->set_HotelWeb($_POST['required-hotelWeb']); }
			
			//Step 4
			if (isset($_POST['required-hotelVersion'])){ $this->newHotel->set_HotelVersion($_POST['required-hotelVersion']); }
			if (isset($_POST['required-hotelVars'])){ $this->newHotel->set_HotelVariables($_POST['required-hotelVars']); }
			if (isset($_POST['required-hotelTexts'])){ $this->newHotel->set_HotelTexts($_POST['required-hotelTexts']); }
			if (isset($_POST['required-hotelDcr'])){ $this->newHotel->set_HotelDcr($_POST['required-hotelDcr']); }
			if (isset($_POST['required-hotelHost'])){ $this->newHotel->set_HotelHost($_POST['required-hotelHost']); }
			if (isset($_POST['required-hotelPort'])){ $this->newHotel->set_HotelPort($_POST['required-hotelPort']); }
			if (isset($_POST['required-hotelMusHost'])){ $this->newHotel->set_HotelMusHost($_POST['required-hotelMusHost']); }
			if (isset($_POST['required-hotelMusPort'])){ $this->newHotel->set_HotelMusPort($_POST['required-hotelMusPort']); }		
			
			//Step 5
			if (isset($_POST['required-hotelCredits'])){ $this->defaultHabbo->set_HabboCredits($_POST['required-hotelCredits']); }
			if (isset($_POST['required-hotelTickets'])){ $this->defaultHabbo->set_HabboTickets($_POST['required-hotelTickets']); }
			if (isset($_POST['required-hotelFilms'])){ $this->defaultHabbo->set_HabboFilms($_POST['required-hotelFilms']); }
			//if (isset($_POST['required-hotelClub'])){ $this->defaultHabbo->set_HabboClub($_POST['required-hotelClub']); }		
			if (isset($_POST['required-hotelMotto'])){ $this->defaultHabbo->set_HabboMotto($_POST['required-hotelMotto']); }
			if (isset($_POST['required-hotelConsole'])){ $this->defaultHabbo->set_HabboConsoleMotto($_POST['required-hotelConsole']); }
			
			//Step 6
			if (isset($_POST['required-avatarName'])){ $this->newHabbo->set_HabboName($_POST['required-avatarName']);  }
			if (isset($_POST['required-password'])){ $this->newHabbo->set_HabboPassword($_POST['required-password']); }
			$this->newHabbo->set_HabboRank(7);
			
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
					if(count($_POST) >=13){
						include 'web/install/steps/5.view';
					}else{
						echo 'error please restart the install';
					}
					break;
				case 6:
					if($this->hotelModel->set_HotelInstall($this->newHotel,$this->defaultHabbo)){
						include 'web/install/steps/6.view';
					}
					break;
				case 7:			
					
					if ($this->habboModel->set_HabboRegistration($this->newHabbo)){
						$this->hotelModel->set_HotelAdjusts($this->newHotel);
						$this->habboModel->set_habboLogin($this->newHabbo);
						include 'web/install/steps/7.view';
					}else{
						header('Location: ../6?status=errorDuringInstall');
					}
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