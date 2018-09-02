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


class HotelModel{
	protected $hotelConection;

	//Recieves MySQL/MariaDB Conection if as sucessfull
	public function __construct($HotelConection){ 
		$this->hotelConection = $HotelConection;
	}
	
	public function get_HotelObject(){
		$sql = "SELECT * FROM Hotel_Settings";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$hotelObject = new Hotel($result[0]['value'],$result[1]['value'],$result[2]['value'],$result[3]['value'],$result[4]['value'],$result[5]['value'],$result[6]['value'],$result[7]['value'],$result[8]['value'],$result[9]['value'],$result[10]['value'],$result[11]['value'],$result[12]['value'],$result[13]['value'],$result[14]['value']);
		return $hotelObject;
	}
}
?>
