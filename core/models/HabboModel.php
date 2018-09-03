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


class HabboModel{
	
	protected $hotelConection;
	
	public function __construct($HotelConection){ 
		$this->hotelConection = $HotelConection;
		
	}
	
	public function get_HabboObject($HabboId){
		global $Conection;
		$habboObject = new Habbo(); 
		$sql = "SELECT id,username,credits,motto,badge,badge_active,home_enabled,figure,sex,club_subscribed,club_expiration,created FROM users WHERE id = :id";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindParam(':id', $HabboId);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 1){	
			$habboObject->ConstructObject($result[0]['id'],
$result[0]['username'],$result[0]['credits'],$result[0]['motto'],$result[0]['badge'],$result[0]['badge_active'],$result[0]['home_enabled'],$result[0]['figure'],$result[0]['sex'],$this->get_HabboClubDays($result[0]['club_subscribed'],$result[0]['club_expiration']),$this->get_Date($result[0]['created']));
		}
		return $habboObject;	
	}
	
	public function get_HabboClubDays($Value){
		return 0;
	}
	
	public function get_Date($Value){
		return 0;
	}
	
}
	
?>