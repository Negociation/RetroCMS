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

// Class: Diagnosis Class 
// Desc: Diagnosis Check-Up of All CMS 

class Diagnosis{
	
	private $generalStatus;
	private $testsStatus = [];
	private $hotelConection;
	private $hotelData;
	
	public function __construct(){
		$this->generalStatus = true;	
	}
	
	public function start(){
		
		// TEST PHP VERSION 
		  $this->testsStatus[0] = version_compare(PHP_VERSION, '7.0.0', '>') ? true : false;
		  
		// TEST IF HOTEL DATA LOADED 
		$this->hotelData = parse_ini_file('./core/install/settings.ini', true);
		$this->testsStatus[1] = !empty($this->hotelData) ? true : false;

		//TEST IF LIBSODIUM EXTENSION LOADED
		$this->testsStatus[2] = extension_loaded("sodium") ? true : false;
		
		//TEST PDO CONECTION
		$this->testsStatus[3]= true;
		try{
			//Recieve MySQL/MariaDB Conection
			$this->hotelConection = new PDO('mysql:host=' . $this->hotelData['database']['host'] . ';dbname=' . $this->hotelData['database']['name'], $this->hotelData['database']['user'], $this->hotelData['database']['password']);
		}catch ( PDOException $e ){	
			$this->testsStatus[3]= array(false,$e->getMessage());
		}
	}
	
	public function result(){
		foreach ($this->testsStatus as $value){
			if(is_array($value) || $value==false){
				$this->generalStatus = false;	
			}
		}
		return $this->generalStatus;
	}

	/* SETS AND GETS */
	
	public function get_hotelData(){
		return $this->hotelData;		
	}
	
	public function get_hotelConection(){
		return $this->hotelConection;
	}
		
	public function get_testStatus(){
		return $this->testsStatus;

	}
}

?>