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
	
	//Verifiy if Hotel Settinhs for Website as Installed on Database
	public function get_HotelInstall(){
		try {
			$sql = 'SELECT 1 FROM Site_Settings LIMIT 1';
			$result = $this->hotelConection->query($sql);
		}catch(Exception $e){
			return false;
		}
		    return $result !== false;
	}
	
	public function set_HotelInstall($hotelObject){
			$status = true;
			echo"Executando a Instação no Banco de Dados <br>";
			try{
			$stmt = $this->hotelConection->prepare(file_get_contents('./core/install/retrodb.sql'));
			$stmt->bindValue(':url',$hotelObject->get_HotelUrl() );
			$stmt->bindValue(':web',$hotelObject->get_HotelWeb() );
			$stmt->bindValue(':version', $hotelObject->get_HotelVersion() );
			$stmt->bindValue(':name',$hotelObject->get_HotelName() );
			$stmt->bindValue(':nick',$hotelObject->get_HotelNick() );
			$stmt->bindValue(':startcredits',100);			
			$stmt->execute();
			
			}catch(Exception $e){
				$status = false;
				echo "Ocorreu um erro com a execução do Script";
			}
			return $status;
	}
	
	public function get_HotelObject(){
		$sql = "SELECT * FROM Site_Settings order by id";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$hotelObject = new Hotel();
		$hotelObject->constructObject($result[0]['value'],$result[1]['value'],$result[2]['value'],$result[3]['value'],$result[4]['value'],$result[5]['value'],$result[6]['value'],$result[7]['value'],$result[8]['value'],$result[9]['value'],$result[10]['value'],$result[11]['value'],$result[12]['value'],$result[13]['value'],$result[14]['value']);
		//$hotelObject->constructObject($result[0]['value'],$result[1]['value'],$result[2]['value'],$result[3]['value'],$result[4]['value'],$result[5]['value'],$result[6]['value'],$result[7]['value'],$result[8]['value'],$result[9]['value'],$result[10]['value'],$result[11]['value'],$result[12]['value'],$result[13]['value'],$result[14]['value']);
		return $hotelObject;
	}
	
	
}
?>
