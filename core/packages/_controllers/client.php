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

// Class: Client
// Desc: Habbo Client Controller 

class Client extends ControllerTemplate{
	
	protected $forwardData = [];
	
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
		
		//If Logged In
		if($this->habboModel->get_SessionStatus($this->habbo->get_habboSession())){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId(),1);
			$this->habbo->set_isHabboLoggedIn(true);
			
			//Set Client Ticket
			$this->habbo->set_habboTicket($this->habboModel->get_ValidTicket('ST',$this->habbo));
			$this->habboModel->set_habboTicket('ST',$this->habbo);
			
		}else{
			$this->habbo->set_isHabboLoggedIn(false);		
		}
		
	}
	
	/* Default View Call */
	protected function default(){
		//Set Page Title;
		$this->pageTitle = "Client";
		if($this->habbo->get_isHabboLoggedIn()){
			
			//Get forward Shortcut
			if(isset($_GET['forwardId']) && isset($_GET['roomId']) && is_numeric($_GET['roomId']) && is_numeric($_GET['forwardId'])){
				array_push($this->forwardData,$_GET['forwardId']);
				array_push($this->forwardData,$_GET['roomId']);
			}
			
			include 'web/client.view';				
			exit;
		}else{
			header('Location: ../account/login?target=habboClient');
			exit;
		}
		exit;
	}
}

?>