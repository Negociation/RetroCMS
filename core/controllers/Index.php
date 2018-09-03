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

class Index{
	private $pageTitle;
	private $habbo;
	private $habboModel;

	public function __construct(){ 
	global $Conection;
	$this->pageTitle = 'Inicio';
	$this->habbo = new Habbo();
	$this->habboModel = new HabboModel($Conection);
		if ($this->habbo->get_HabboLoggedIn()){
			$this->habbo = $this->habboModel->get_HabboObject($_SESSION['id']);	
			
		}
	}
	
	//The Main Page 
	function default(){
		
		//Call the Hotel Settings from Core
		global $hotel;
		global $hotelModel;

		echo 'Its alive, and working as well! <br>';
		
		echo 'Your SSO Login Ticket as: '.$hotelModel->get_HotelTicket().'<br>';
		
		echo $hotel->get_HotelName().' ~ '.$hotel->get_HotelNick();
		
		echo '<center><br> <b> WARNING: Alpha Preview, only for test. </b><br>';
		
		//Check if hotel as Opened
		if($hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if ($this->habbo->get_HabboLoggedIn()){
				echo ' <b>'. $this->habbo->get_HabboName().' </b> -- <i>'.$this->habbo->get_HabboMotto() .'</i><br> <a href="'.$hotel->get_HotelURL().'/logout.">Logout </a> | <a href="'.$hotel->get_HotelURL().'/client.">Client </a>';
				
			}else{
				echo '<b> <a href="'.$hotel->get_HotelURL().'/login.">Login </a>   |   <a href="'.$hotel->get_HotelURL().'/register/start.">Register </a>';
			}
		}		
	}

	
}
?>

