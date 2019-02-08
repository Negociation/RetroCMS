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
	protected $habboClub = [];
	
	public function __construct(){
		//Get Data from Habbo if Logged in 
		//Remember to update incluing session expiration time :D

		if (isset($_SESSION['habboLoggedIn'])){
			if($_SESSION['habboLoggedIn'] == true){
				$this->habboLoggedIn = true;
				$this->habboId = $_SESSION['id'];
			}else{
				
				$this->habboLoggedIn = false;
				$_SESSION['habboLoggedIn'] = false;
			}
		}else{
			$this->habboLoggedIn = false;
			$_SESSION['habboLoggedIn'] = false;
			unset($_SESSION['id']);
		}
		
	}
	
	public function constructObject($id,$username,$password,$rank,$figure,$gender,$credits,$habboclub,$language){
		$this->habboId = $id;	
		$this->habboName = $username;	
		$this->habboPassword = $password;	
		$this->habboRank = $rank;	
		$this->habboFigure = $figure;	
		$this->habboGender = $gender;
		$this->habboCredits = $credits;
		$this->habboClub = $habboclub;
		$this->habboLanguage = $language;
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
		if(strlen($Param) >= 6){
			$this->habboPassword = $Param;
		}else{
			$this->habboPassword = "";	
		}
	}

	public function set_HabboSession(){
		$_SESSION['habboLoggedIn'] = true;
		$_SESSION['id'] = $this->habboId;
	}
	
	public function set_HabboLogout(){
		session_destroy();
		$this->habboLoggedIn = false;
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
		if($this->get_habboLoggedIn()){
			return $this->habboLanguage;			
		}
	}
	
	public function get_HabboGender(){
		return $this->habboGender;
	}
	
	
	public function get_HabboClub($requestId){
		switch($requestId){
			//Status
			case 1:
				if(($this->habboClub[1]-$this->habboClub[0]) > 0){
					return true;
				}else{
					return false;
				}
			//Days Left from all pre-paid period
			case 2:
				return(new DateTime(date("Y-m-d",$this->habboClub[1])))->diff(new DateTime(date("Y-m-d")))->format("%a");	
			break;
			//Days left from pre-paid period
			case 3:
				$calc = (new DateTime(date("Y-m-d",$this->habboClub[1])))->diff(new DateTime(date("Y-m-d")))->format("%a");
				$calc = $calc % 31;
				return($calc);
			break;
			//Pre-paid peridods
			case 4:
				$calc = (new DateTime(date("Y-m-d",$this->habboClub[1])))->diff(new DateTime(date("Y-m-d")))->format("%a");
				$calc = $calc % 31;
				$calc = (new DateTime(date("Y-m-d",$this->habboClub[1])))->diff(new DateTime(date("Y-m-d")))->format("%a") - $calc;
				$calc = $calc/31;
				return($calc);
			break;		
			case 5:
				if($this->get_HabboClub(1)){
					if($this->habboClub[2]-1 >= 0){
						return ($this->habboClub[2]-1);
					}else{
						return 0;	
					}
				}else{
					return($this->habboClub[2]);
				}
			break;			
		}	
	}
}


?>
