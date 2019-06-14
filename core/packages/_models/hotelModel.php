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

// Class: Hotel Model
// Desc: DAO Content of hotel Object

class HotelModel extends ModelTemplate{

	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
	}

	public function get_HotelObject(){
		
		//Empty Hotel Object
		$hotelObject = new Hotel();
		
		//Empty Advertisement Array
		$advertisementArray = [];
		
		//Get all infromation from table site_settings by getAll method
		$queryResult = $this->getAll('site_settings');
		
		//If the query returned all site_settings
		
		if (count($queryResult) >= 12){
			//Set Hotel data in Object
			$hotelObject->constructObject($queryResult[0]['setting_value'],$queryResult[1]['setting_value'],$queryResult[2]['setting_value'],$queryResult[3]['setting_value'],$queryResult[4]['setting_value'],$queryResult[5]['setting_value'],array($queryResult[6]['setting_value'],$queryResult[7]['setting_value'],$queryResult[8]['setting_value'],$queryResult[9]['setting_value'],$queryResult[10]['setting_value'],$queryResult[11]['setting_value']),array());		
		
		
			//Get Hotel Adverstments
			$queryResult = $this->getAll('site_advertisements');
			if (count($queryResult) > 0){
				foreach($queryResult as $row){
					$advertisementObject = new Advertisement();
					$advertisementObject->constructObject($row['id'],$row['image'],$row['url'],$row['type'],$row['status']);
					array_push($advertisementArray,$advertisementObject);
				}
			}
			
			//Set Hotel Advertisements in Object
			$hotelObject->set_hotelAdvertisement($advertisementArray);
		}else{
			//If something wrong on construct method (like missing information) so set the hotel to Offline!
			$hotelObject->set_HotelStatus(false);	
		}
		return $hotelObject;
	}
	

	//Check if table Site_Settings exist and have content inside 
	public function get_HotelInstall(){
		$resultObject = $this->getAll('site_settings');
		if ($resultObject == false){
			return false;
		}else{
			if(count($this->getAll('users')) == 0 || $this->getAll('users') == false ){
				return false;
			}else{
				return $resultObject !== false;
			}
		}
	}


	public function set_HotelInstall($hotelObject,$habboObject){
		$status = true;
		foreach (glob("./core/install/retrodb/*.sql") as $sqlcontent){ 
			try{
				$stmt = $this->hotelConection->prepare(file_get_contents($sqlcontent));
				
				if($sqlcontent == './core/install/retrodb/retroinstall_table_site_settings.sql'){
					$stmt->bindValue(':url',$hotelObject->get_HotelUrl());
					$stmt->bindValue(':web',$hotelObject->get_HotelWeb());
					$stmt->bindValue(':version', $hotelObject->get_HotelVersion());
					$stmt->bindValue(':name',$hotelObject->get_HotelName());
					$stmt->bindValue(':nick',$hotelObject->get_HotelNick());
					$stmt->bindValue(':language',$hotelObject->get_HotelLanguage());
					$stmt->bindValue(':texts',$hotelObject->get_HotelTexts());
					$stmt->bindValue(':vars',$hotelObject->get_HotelVars());
					$stmt->bindValue(':dcr',$hotelObject->get_HotelDcr());
					$stmt->bindValue(':host',$hotelObject->get_HotelHost());
					$stmt->bindValue(':port',$hotelObject->get_HotelPort());
					$stmt->bindValue(':musport',$hotelObject->get_HotelMus());
					$stmt->bindValue(':windows',$hotelObject->get_HotelWindows());
				}
				
				if($sqlcontent == './core/install/retrodb/retroinstall_table_users.sql'){
					$stmt->bindValue(':startcredits',$habboObject->get_HabboCredits());
					$stmt->bindValue(':starttickets',$habboObject->get_HabboTickets());
					$stmt->bindValue(':startfilms',$habboObject->get_HabboFilms());
					$stmt->bindValue(':startmotto',$habboObject->get_HabboMotto());
					$stmt->bindValue(':startconsole',$habboObject->get_HabboConsoleMotto());
					$stmt->bindValue(':startlanguage',$hotelObject->get_HotelLanguage());
				}
				
				if($sqlcontent == './core/install/retrodb/retroinstall_table_site_advertisements.sql'){
					$stmt->bindValue(':url',$hotelObject->get_HotelUrl());
					$stmt->bindValue(':web',$hotelObject->get_HotelWeb());	
				}

				if($sqlcontent == './core/install/retrodb/retroinstall_table_site_promos.sql'){
					$stmt->bindValue(':url',$hotelObject->get_HotelUrl());
					$stmt->bindValue(':web',$hotelObject->get_HotelWeb());	
				}
				
				if($sqlcontent == './core/install/retrodb/retroinstall_table_xtra.sql'){
					//$stmt->bindValue(':habboname', $adminObject->get_HabboName());
					//$stmt->bindValue(':password', sodium_crypto_pwhash_str($adminObject->get_HabboPassword(), SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE));
				}
				
				$stmt->execute();
			}catch(Exception $e){
				echo $sqlcontent;
				$status = false;
				echo "Ocorreu um erro com a execução do Script em: ".$sqlcontent;
			}			
		}		
		return $status;
	}
	
	public function set_HotelAdjusts($hotelObject){
		if($hotelObject->get_HotelVersion() >= 17){
			try{
				$stmt = $this->hotelConection->prepare("UPDATE `catalogue_items` SET `is_hidden` = '3' WHERE `catalogue_items`.`id` = 453;");
				$stmt->execute();
			}catch(Exception $e){
				
			}
			if($hotelObject->get_HotelVersion() == 17 || $hotelObject->get_HotelVersion() > 23 ){
				//Future teleporter
			}
		}
	}
}
?>