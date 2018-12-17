<?php

//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Avatarimage{
	protected $habbo;
	protected $habboModel;		
	protected $hotel;
	protected $hotelModel;
	
	public function __construct($hotelConection){ 
		$this->pageTitle = 'Inicio';
		$this->habbo = new Habbo();
		if (!is_null($hotelConection)){ 
			$this->hotelModel = new HotelModel($hotelConection);
			$this->habboModel = new HabboModel($hotelConection);
			$this->hotel = $this->hotelModel->get_HotelObject();
			if ($this->habbo->get_HabboLoggedIn()){
				$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
			}	
		}
	}


	//Check if hotel as Opened
	public function figure($figure){
		//echo  sodium_crypto_pwhash_str('123456', SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			$converted = new Figure($figure,null);
			echo'<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?figure='.$converted->getFigure().'&size=b&action=wav,&direction=3&head_direction=3&gesture=sml&size=m" alt="" class="tabmenu-image" style="margin-right: 5px; margin-right: 0px;"/>';
			exit;
		}
	}
}

?>
