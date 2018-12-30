<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Habbo{
	protected $habboId;
	protected $habboLoggedIn;
	public function __construct(){
		//Get Data from Habbo if Logged in 
		//Remember to update incluing session expiration time :D
		if (count($_SESSION) > 0 && $_SESSION['habboLoggedIn'] == true){
			$this->habboLoggedIn = true;
			$this->habboId = $_SESSION['id'];
		}else{
			$this->habboLoggedIn = false;
		}		
	}

	public function get_HabboId(){
		return $this->habboId;
	}
	
	public function get_habboLoggedIn(){
		return $this->habboLoggedIn;
	}
	
	public function get_HabboName(){
		return null;
	}
	
	
}


?>
