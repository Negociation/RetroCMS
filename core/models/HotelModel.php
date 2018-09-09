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
			
			ALTER TABLE users ADD home_enabled INT;
			
			ALTER TABLE users ADD created INT;
	
			INSERT INTO users (`id`, `username`, `password`, `figure`, `pool_figure`, `sex`, `motto`, `credits`, `tickets`, `film`, `rank`, `console_motto`, `last_online`, `created_at`, `updated_at`, `sso_ticket`, `club_subscribed`, `club_expiration`, `badge`, `badge_active`, `allow_stalking`, `sound_enabled`, `tutorial_finished`, `battleball_points`, `snowstorm_points`, `home_enabled`, `created`) VALUES (1, 'Admin', :password , '1150118001235112800129001', '', 'M', 'My Motto', 199919, 0, 6, 7, 'I\'m a new user!', 1536089951, '2018-09-04 00:23:29', '2018-09-04 16:46:15', 'LT-831809-1545bb5ee8d66508dfbe-br-fe2', 0, 1546300800, 'ADM', 1, 1, 1, 1, 0, 0, 0, 1546300800);
			
			
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
			$stmt->bindValue(':password', '$argon2d$v=19$m=1024,t=1,p=1$c29tZXNhbHQ$/3ABA2gK1+olDO6wP2ifWEEllUMiZ4EKA4W5Xiuh0o8');

			$stmt->execute();
			echo"Executando a Instação no Banco de Dados <br>";
			
			}catch(Exception $e){
				echo "Ocorreu um erro com a execução do Script";
			}
	}
	
	public function get_HotelObject(){
		$sql = "SELECT * FROM Site_Settings order by id";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$hotelObject = new Hotel();
		$hotelObject->constructObject($result[0]['value'],$result[1]['value'],$result[2]['value'],$result[3]['value'],$result[4]['value'],$result[5]['value'],$result[6]['value'],$result[7]['value'],$result[8]['value']);
		//$hotelObject->constructObject($result[0]['value'],$result[1]['value'],$result[2]['value'],$result[3]['value'],$result[4]['value'],$result[5]['value'],$result[6]['value'],$result[7]['value'],$result[8]['value'],$result[9]['value'],$result[10]['value'],$result[11]['value'],$result[12]['value'],$result[13]['value'],$result[14]['value']);
		return $hotelObject;
	}
	
	
}
?>
