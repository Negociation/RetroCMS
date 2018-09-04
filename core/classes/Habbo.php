<?php


class Habbo{

	// Status of Advertiment contents
	protected $habboId;
	protected $habboName;
	protected $habboPassword;
	protected $habboEmail;
	protected $habboLoggedIn;
	protected $habboCredits;
	protected $habboClubDays;
	protected $habboMotto;
	protected $habboFigure;
	protected $habboGender;
	protected $habboBadge;
	protected $habboBadgeActive;
	protected $habboHomeVisible;
	protected $habboFriends;
	protected $habboRooms;
	protected $habboBirth;
	protected $habboTicket;
	protected $habboLanguage = 'br';
	
	public function __construct(){ 
		$this->habboFriends = array();
		if (count($_SESSION) > 0 ){
			if ( $_SESSION['habboLoggedIn'] == true){
				$this->habboLoggedIn = true;
				$this->habboId = $_SESSION['id'];
					}else{
				$this->habboLoggedIn = false;
			}
				
		}
	}

	//Construct Method (Except Friends)
	public function ConstructObject($id,$username,$credits,$motto,$badge,$badge_active,$home_visible,$figure,$gender,$clubdays,$created){ 
		$this->habboId = $id;	
		$this->habboName = $username;		
		$this->habboCredits = $credits;	
		$this->habboClubDays = $clubdays;	
		$this->habboMotto = $motto;	
		$this->habboBadge = $badge;			
		$this->habboBadgeActive = $badge_active;	
		$this->habboHomeVisible = $home_visible;
		$this->habboFigure = $figure;
		$this->habboGender = $gender;
		$this->habboCreated = $created;
	}


	//Setting Friends
	public function set_HabboFriends($friends){
		$this->habboFriends = $friends;
	}

	//Get Habbo Friend object
	public function get_Friend($i){
		return $this->habboFriends[$i];
	}

	//Get friends count
	public function get_friendsCount(){
		return count($this->habboFriends); 
	}

	public function get_HabboBadge(){
		return $this->habboBadge;
	}

	public function get_HabboCreated(){
		return $this->habboCreated;
	}

	public function get_HabboFigure(){
		return $this->habboFigure;
	}

	public function get_HabboGender(){
		return $this->habboGender;
	}

	public function Get_HabboLoggedIn(){
		return $this->habboLoggedIn;
	}

	public function get_HabboName(){
		return $this->habboName;
	}

	public function get_HabboId(){
		return $this->habboId;
	}
	
	public function get_HabboLanguage(){
		return $this->habboLanguage;
	}
	
	public function get_HabboBadgeActive(){
		return $this->habboBadgeActive;
	}

	public function get_HabboCredits(){
		return $this->habboCredits;
	}

	public function get_habboClubDays(){
		return $this->habboClubDays;
	}

	public function get_HabboHomeVisible(){
		return $this->habboHomeVisible;
	}

	public function get_HabboMotto(){
		return $this->habboMotto;
	}

	public function get_HabboBirth(){
		return $this->habboBirth;
	}
	

	public function get_HabboTicket(){
		return $this->habboTicket;
	}

	public function set_HabboCredits($credits){
		$this->habboCredits = $credits;
	}

	public function set_HabboName($name){
		$this->habboName = $name;
	}

	public function set_HabboFigure($figure){
		$this->habboFigure = $figure;
	}

	public function set_HabboGender($gender){
		$this->habboGender = $gender;
	}

	public function set_HabboMotto($motto){
		$this->habboMotto = $motto;
	}

	public function set_HabboHomeVisible($visibility){
		$this->habboHomeVisible = $visibility;
	}

	public function set_HabboBirth($birth){
		$this->habboBirth = $birth;
	}
	
	
	public function set_HabboTicket($habboTicket){
		//Check if user uses his last ticket
		if (empty($this->habboTicket)){
			$this->habboTicket = $habboTicket;
		}
	}
	
}

?>
