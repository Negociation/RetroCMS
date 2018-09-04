<?php
//////////////////////////////////////////////////////////////
// 				     RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 				          	//
//////////////////////////////////////////////////////////////

class HabboModel{
	protected $hotelConection;
	
	public function __construct($HotelConection){ 
		$this->hotelConection = $HotelConection;
		
	}
	
	//Sets Habbo ticket after habbo reload the client
	public function set_HabboTicket($habboObject){
		$sql = 'UPDATE users SET sso_ticket = :sso where id = :id';
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':id', $habboObject->get_HabboId());
		$stmt->bindValue(':sso', $habboObject->get_HabboTicket());
		$stmt->execute();
	}
	
	//Get a Random Unique Habbo ticket
	public function get_HabboTicket($habboObject){
		$sql = 'SELECT sso_ticket from users where sso_ticket != ""';
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->execute();			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//Check if as a unique Ticket
		$uniqueTicket = true;
		do{
			$ramdomTicket = 'LT-'.rand (100000 , 999999 ).'-'.bin2hex(random_bytes(10)).'-'.$habboObject->get_HabboLanguage().'-fe2';
			foreach($result as $existingTicket){
				if($ramdomTicket == $existingTicket){
					$uniqueTicket = false;
				}
			}
		}while($uniqueTicket == false);
		return $ramdomTicket;
	
	}
	
	//Returns the Habbo after pass the HabboObject with ID
	public function get_HabboObject($habboObject){
		$sql = "SELECT id,username,credits,motto,badge,badge_active,home_enabled,figure,sex,club_subscribed,club_expiration,created FROM users WHERE id = :id";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':id', $habboObject->get_HabboId());
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 1){	
			$habboObject->ConstructObject($result[0]['id'],
$result[0]['username'],$result[0]['credits'],$result[0]['motto'],$result[0]['badge'],$result[0]['badge_active'],$result[0]['home_enabled'],$result[0]['figure'],$result[0]['sex'],0,$result[0]['created']);
		}
		return $habboObject;	
	}

	//Destroys Habbo Session 
	public function set_HabboLogout(){
		unset($this->habbo);
		$_SESSION['habboLoggedIn'] = false;
		session_destroy();
	}	

}


?>
