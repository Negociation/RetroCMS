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
// Desc: Habbo Api for Ajax Requests

class Api extends ControllerTemplate{
	
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
		
	}

	protected function habboname_avaliability(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST["habboName"])){
				if($this->habboModel->getByParam('users','username',$_POST["habboName"]) != false){
					echo 'true';	
				}else{
					echo 'false';					
				}
			}else{
				'missing params';
			}
		}else{
			echo 'not allowed';
		}
	}
	
	protected function hotel(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$hotelData = array('hotel_language' => $this->hotel->get_HotelLanguage());
			echo json_encode($hotelData);
		}else{
			echo 'not allowed';
		}
		
	
	}
	
}

	
?>