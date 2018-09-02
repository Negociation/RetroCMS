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
		
		//Check if Hotel Table Exists
		if($this->get_HotelInstall() == false){
			echo $this->set_HotelInstall();
		}
		
	}
	
	//Verifiy if Hotel Settinhs for Website as Installed on Database
	private function get_HotelInstall(){
		try {
			$sql = 'SELECT 1 FROM Hotel_Settings LIMIT 1';
			$result = $this->hotelConection->query($sql);
		}catch(Exception $e){
			return false;
		}
		    return $result !== false;
	}
	
	public function set_HotelInstall(){
			try{
			//I'll remove that soon
			$sql = "
			CREATE TABLE `hotel_settings` (
			  `setting_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
			  `value` text CHARACTER SET latin2 NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;

			INSERT INTO `hotel_settings` (`setting_name`, `value`) VALUES
			('AdvertisementLeft_Enable', 'true'),
			('AdvertisementLeft_ImageURL', 'http://localhost/c_images/album728/ads_habbogroup_bbpromo.gif'),
			('AdvertisementLeft_URL', ''),
			('AdvertisementMiddle_Enable', 'true'),
			('AdvertisementMiddle_ImageURL', 'http://localhost/c_images/album728/ads_habbogroup_monstersofhabbo.png'),
			('AdvertisementMiddle_URL', ''),
			('AdvertisementTop_Enable', 'true'),
			('AdvertisementTop_ImageURL', 'http://localhost/c_images/album728/ads_habbogroup_clubjoin.png'),
			('AdvertisementTop_URL', './'),
			('Hotel_Closed', '0'),
			('Hotel_Name', 'RetroCMS'),
			('Hotel_Nick', 'Retro'),
			('Hotel_URL', 'http://localhost'),
			('Hotel_Version', '22'),
			('Hotel_Web', 'http://localhost');

			ALTER TABLE `site_settings`
			  ADD PRIMARY KEY (`setting_name`),
			  ADD UNIQUE KEY `Unique_Setting` (`setting_name`);
			COMMIT;
			";
			
			
			$stmt = $this->hotelConection->prepare($sql);
			$stmt->execute();
			echo"Executando a Instação no Banco de Dados <br>";
			
			}catch(Exception $e){
				echo "Ocorreu um erro com a execução do Script";
			}
	}
	
	public function get_HotelTicket(){
		$ticket = 'LT-'.bin2hex(random_bytes(10)).'-'.rand (1000 , 9999 ).'-br-fe2';
		return $ticket;
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
