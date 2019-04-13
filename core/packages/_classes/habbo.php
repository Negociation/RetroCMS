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

// Class: Habbo
// Desc: All Habbo Data

class Habbo extends ClassTemplate{
	
	protected $habboId;
	protected $habboName;
	protected $habboPassword;
	protected $habboLoggedIn;
	protected $habboRank;
	protected $habboFigure;
	protected $habboGender;
	protected $habboCredits;
	protected $habboClub = [];
	protected $habboBirth;
	protected $habboLoggedStatus;
	
	public function __construct(){

	}

	/** DAO CONSTRUCT **/
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
	
	/** GETS **/
	
	public function get_isHabboLoggedIn(){
		return $this->habboLoggedStatus;
	}
	
	public function get_strHabboLoggedIn(){
		return $this->get_isHabboLoggedIn() ? "true" : "false";
	}

	public function get_habboSession(){
		if(isset($_SESSION['habboLoggedId']) &&  isset($_SESSION['habboLoggedToken'])){
			
			//If logged set the ID
			$this->habboId = $_SESSION['habboLoggedId'];
			
			// + Set New Timeout for "habboWebsite"
			$_SESSION['habboLastActivity'] = $_SERVER['REQUEST_TIME'];
			
			//Return Array
			return array($_SESSION['habboLoggedId'],$_SESSION['habboLoggedToken']);
		}else{
			return false;
		}
	}

	public function get_HabboId(){
		return $this->habboId;
	}
	
	public function get_HabboName(){
		return $this->habboName;
	}

	public function get_HabboPassword(){
		return $this->habboPassword;
	}

	public function get_HabboRank(){
		return $this->habboRank;
	}
	
	public function get_HabboCredits(){
		return 0;
	}

	public function get_HabboFigure(){
		return 0;
	}

	public function get_HabboClub(){
		return 0;
	}

	
	public function get_isHomeVisible(){
		return true;
	}

	/** SETS **/
	public function set_isHabboLoggedIn($status){
		//Set the logged status
		$this->habboLoggedStatus = $status;
	}
	
	public function set_HabboSession($sessionToken){
		$_SESSION['habboLoggedId'] = $this->habboId;
		$_SESSION['habboLoggedToken'] = $sessionToken;
	}

	public function set_HabboLogout(){
		//Destroy Session
		session_unset();
		session_destroy();
	}
	
	public function set_HabboName($param){
		$this->habboName = $param;
	}
	
	
	public function set_HabboPassword($param){
		if(strlen($param) >= 6){
			$this->habboPassword = $param;
		}else{
			$this->habboPassword = null;	
		}
	}
	
	
}
?>