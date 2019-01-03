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
	protected $habboName;
	protected $habboPassword;
	protected $habboLoggedIn;
	protected $habboRank;
	protected $habboFigure;
	protected $habboGender;
	protected $habboCredits;
	
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
	
	public function constructObject($id,$username,$password,$rank,$figure,$gender,$credits){
		$this->habboId = $id;	
		$this->habboName = $username;	
		$this->habboPassword = $password;	
		$this->habboRank = $rank;	
		$this->habboFigure = $figure;	
		$this->habboGender = $gender;
		$this->habboCredits = $credits;
		
	}

	public function get_HabboId(){
		return $this->habboId;
	}
	
	public function get_habboLoggedIn(){
		return $this->habboLoggedIn;
	}
	
	public function get_HabboName(){
		return $this->habboName;
	}

	public function get_HabboRank(){
		return $this->habboRank;	
	}
	
	public function set_HabboName($Param){
		$this->habboName = $Param;
	}
	
	public function get_HabboFigure(){
		return $this->habboFigure;	
	}
	
	public function get_HabboCredits(){
		return $this->habboCredits;
	}
	
	public function get_HabboClubStatus(){
		return false;;
	}
	public function set_HabboPassword($Param){
		if(strlen($Param) > 6){
			$this->habboPassword = $Param;
		}
	}

	public function set_HabboSession(){
		$_SESSION['habboLoggedIn'] = true;
		$_SESSION['id'] = $this->habboId;
	}
	
	public function set_HabboLogout(){
		session_destroy();
		$_SESSION['habboLoggedIn'] = false;
	}
	
	public function set_HabboTicket($Param){
		$this->habboTicket = $Param;
	}
	
	public function get_HabboPassword(){
		return $this->habboPassword;
	}
	
	
	public function get_HabboTicket(){
		return $this->habboTicket;
	}
	
	public function get_HabboLanguage(){
			return 'br';
	}
}


?>
