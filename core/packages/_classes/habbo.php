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
	protected $habboFilms;
	protected $habboClub = [];
	protected $habboBirth;
	protected $habboLoggedStatus;
	protected $habboTicket;
	protected $habboTickets;
	protected $habboMotto;
	protected $habboConsoleMotto;
		
	//Construct for Default Register/Install
	public function __construct(){
		
		//Habbo Avatar Default Easter Egg
		if(rand(1,100) <= 50){
			$this->habboFigure = '1000118001210012700129001';	
			$this->habboGender = 'M';		
		}else{
			$this->habboFigure = '5000160001710077250164512';	
			$this->habboGender = 'F';		
		}
		
		//Default Value
		$this->habboRank = 1;
		$this->habboEmail = 'staff@retrocms.com';
		$this->habboBirth = '1546300800';
		
		
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
		return $this->habboCredits;
	}

	public function get_HabboFilms(){
		return $this->habboFilms;
	}
	
	public function get_HabboFigure(){
		return $this->habboFigure;
	}
	
	public function get_HabboGender(){
		return $this->habboGender;
	}
	
	public function get_HabboTicket(){
		return $this->habboTicket;
	}

	public function get_HabboClub($requestId){
		switch($requestId){
			
			//If habbo have been part of HC
			case 1:
				if($this->habboClub[0]>0){
					return true;
				}else{
					return false;
				}
				break;
			
			//If habbo have hc days left (with prepaid periods)
			case 2:
				return ($this->habboClub[1] - $_SERVER['REQUEST_TIME'] )> 0  ?  ceil(($this->habboClub[1] - $_SERVER['REQUEST_TIME'])/86400) : 0;
				break;
				
			//Days left from the current period (1 month)
			case 3:
				return $this->get_habboClub(2)%31;
				break;			
			
			
			
			//Pre-paid peridods
			case 4:
				return ($this->get_habboClub(2) - $this->get_habboClub(3)) / 31;
			break;
			
			//Elapsed Periods
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
			//Get HC Ending TIME
			case 6:
				return (new DateTime(date("Y-m-d",$this->habboClub[1])))->format('d-m-Y');
				break;
		}		
	}

	public function get_isHomeVisible(){
		return true;
	}
	
	public function get_habboLanguage(){
		return $this->habboLanguage;
	}
	
	public function get_habboBirth(){
		return $this->habboBirth;
	}
	
	public function get_habboEmail(){
		return $this->habboEmail;
	}

	public function get_HabboTickets(){
		return $this->habboTickets;
	}	

	public function get_HabboMotto(){
		return $this->habboMotto;
	}	

	public function get_HabboConsoleMotto(){
		return $this->habboConsoleMotto;
	}
	
	/** SETS **/
	public function set_isHabboLoggedIn($status){
		//Set the logged status
		$this->habboLoggedStatus = $status;
		
		//Destroy session ticket for safety
		if(!$status){
			unset($_SESSION['habboLoggedId']);
			unset($_SESSION['habboLoggedToken']);
		}
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
	
	public function set_HabboTicket($param){
		$this->habboTicket = $param;
	}

	public function set_HabboCredits($param){
		$this->habboCredits = $param;
	}

	public function set_HabboFilms($param){
		$this->habboFilms = $param;
	}
	
	public function set_HabboPassword($param){
		if(strlen($param) >= 6){
			$this->habboPassword = $param;
		}else{
			$this->habboPassword = null;	
		}
	}
	
	public function set_HabboBirth($param){
		$this->habboBirth = $param;
	}

	public function set_HabboFigure($param){
		$this->habboFigure = $param;
	}
	
	public function set_HabboGender($param){
		$this->habboBGender = $param;
	}
	
	public function set_HabboEmail($param){
		$this->habboEmail = $param;
	}
	
	public function set_EmailCalls($param){
		true;
	}

	public function set_HabboLanguage($param){
		$this->habboLanguage = $param;
	}		

	public function set_HabboRank($param){
		$this->habboRank = $param;
	}

	public function set_HabboTickets($param){
		$this->habboTickets = $param;
	}	

	public function set_HabboMotto($param){
		$this->habboMotto = $param;
	}	

	public function set_HabboConsoleMotto($param){
		$this->habboConsoleMotto = $param;
	}	
}
?>