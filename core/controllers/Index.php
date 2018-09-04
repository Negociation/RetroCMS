<?php

//////////////////////////////////////////////////////////////
// 				     RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 				          	//
//////////////////////////////////////////////////////////////

class Index{
		protected $pageTitle;
		protected $habbo;
		protected $habboModel;
		protected $hotel;
		protected $hotelModel;
	public function __construct($hotelConection){ 
	
		$this->pageTitle = 'Inicio';
		
		$this->hotelModel = new HotelModel($hotelConection);
		$this->habboModel = new HabboModel($hotelConection);
		
		$this->habbo = new Habbo();
		$this->hotel = $this->hotelModel->get_HotelObject();

		if ($this->habbo->get_HabboLoggedIn()){
			echo $this->habbo->get_HabboId();
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
		}
		
	}


	// Load Default View
	public function default(){
	
		echo 'Its alive, and working as well! <br>';
		
		echo 'Your SSO Login Ticket as: '.$this->habboModel->get_HabboTicket($this->habbo).'<br>';
		
		echo $this->hotel->get_HotelName().' ~ '.$this->hotel->get_HotelNick();

		echo '<center><br> <b> WARNING: Alpha Preview, only for test. </b><br>';
		
		//Check if hotel as Opened
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if ($this->habbo->get_HabboLoggedIn()){
				echo ' <b>'. $this->habbo->get_HabboName().' </b> -- <i>'.$this->habbo->get_HabboMotto() .'</i><br> <a href="'.$this->hotel->get_HotelURL().'/logout.">Logout </a> | <a href="'.$this->hotel->get_HotelURL().'/client.">Client </a>';
				
			}else{
				echo '<b> <a href="'.$this->hotel->get_HotelURL().'/login.">Login </a>   |   <a href="'.$this->hotel->get_HotelURL().'/register/start.">Register </a>';
			}
		}		
		
	}


}

?>
