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
		
		//POST Hotel Object
		$this->hotel = $this->hotelModel->Get_HotelObject();
		
		//New Habbo Object
		$this->habbo = new Habbo();
		$this->newHabbo = new Habbo();

		//If Logged In
		if($this->habboModel->Get_SessionStatus($this->habbo->Get_habboSession())){
			$this->habbo = $this->habboModel->Get_HabboObject($this->habbo->Get_HabboId(),1);
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
		if( (is_numeric($id) && (($_SERVER['REQUEST_METHOD'] == 'POST' &&  $id > 0 ) || $id == 0 ))&&(!$this->habbo->Get_isHabboLoggedIn())){
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
					if(count($_POST) == 9){
						$validationError = false;
						if( isset($_POST['required-birth']) && $_POST['required-birth'] != '' ){ $this->newHabbo->set_HabboBirth($_POST['required-birth']); }else{ $validationError = true;};
						if(isset($_POST['required-figure']) && $_POST['required-figure'] != '' ){ $this->newHabbo->set_HabboFigure($_POST['required-figure']); }else{ $validationError = true;};
						if(isset($_POST['required-gender']) && $_POST['required-gender'] != '' ){ $this->newHabbo->set_HabboGender($_POST['required-gender']); }else{ $validationError = true;};
						if(isset($_POST['required-avatarName']) && $_POST['required-avatarName'] != '' ){ $this->newHabbo->set_HabboName($_POST['required-avatarName']); }else{ $validationError = true;};
						if(isset($_POST['required-password']) && $_POST['required-password'] != '' ){ $this->newHabbo->set_HabboPassword($_POST['required-password']); }else{ $validationError = true;};
						if(isset($_POST['required-email']) && $_POST['required-email'] != '' ){ $this->newHabbo->set_HabboEmail($_POST['required-email']); }else{ $validationError = true;};
						if(isset($_POST['required-emailMarket']) && $_POST['required-emailMarket'] != '' ){ $this->newHabbo->set_EmailCalls($_POST['required-emailMarket']); }else{ $validationError = true;};
						if(isset($_POST['required-language']) && $_POST['required-language'] != '' ){ $this->newHabbo->set_HabboLanguage($_POST['required-language']); }else{ $validationError = true;};
						
						if(!$validationError && $this->habboModel->set_habboRegistration($this->newHabbo)){
							$this->habboModel->set_habboLogin($this->newHabbo);
							include 'web/register/5.view';
						}else{
							echo "error";
						}
						
						
						
					}else{
						echo 'error';
					
	
					}
					break;
				default:
					header('Location: ../../register/start');
					break;
			}
			exit;
		}else if(!$this->habbo->Get_isHabboLoggedIn()){
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