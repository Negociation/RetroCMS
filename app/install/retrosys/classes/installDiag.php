<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// Class: Diagnosis Class 
// Desc: Diagnosis Check-Up of All CMS 
final class InstallDiag{
	
	private static $resultStatus = true;
	private static $testsStatus = [];
	private static $hotelData;
	private static $hotelConection;
	
	
	private static function start(){	
		// TEST PHP VERSION 
		  self::$testsStatus[0] = version_compare(PHP_VERSION, '7.0.0', '>') ? true : false;
				
		// TEST IF HOTEL DATA LOADED 
		self::$hotelData = parse_ini_file(dirname(__DIR__, 1).'\settings.ini', true);
		self::$testsStatus[1] = !empty(self::$hotelData) ? true : false;

		// TEST IF COMPOSER HAVE BE STARTED
		self::$testsStatus[2] = stream_resolve_include_path(dirname(__DIR__, 3)."/install/vendor/autoload.php") ? true : false;
		
		// TEST IF LIBSODIUM EXTENSION LOADED
		self::$testsStatus[3] = extension_loaded("sodium") !== null && extension_loaded("sodium") ? true : false;
		
		//TEST IF GRPC EXTENSION LIBRARY IS LOADED
		self::$testsStatus[4] = ( extension_loaded("grpc") !== null && extension_loaded("grpc") ) || ( self::$hotelData['features']['grpc'] == 'false' )  ? true : false;
		
		// TEST PDO CONECTION
		try{
			//Recieve MySQL/MariaDB Conection
			self::$hotelConection = new PDO('mysql:host=' . self::$hotelData['database']['host'] . ';dbname=' . self::$hotelData['database']['name'], self::$hotelData['database']['user'], self::$hotelData['database']['password']);
			self::$testsStatus[5]= true;
			
		}catch ( PDOException $e){	
			self::$testsStatus[5]= array(false,$e->getMessage());
		}
		
		// VALIDATE TEST RESULTS
		foreach (self::$testsStatus as $value){
			if(is_array($value) || $value==false){
				self::$resultStatus = false;	
			}
		}
	}
	
	public static function result($type){
		// START TESTS ROUTINE
		self::start();
		
		// RETURN TEST RESULT (0 - GLOBAL STATUS / 1 - DETAILED STATUS)
		if($type){
			return self::$testsStatus;
			exit;
		}else{
			return self::$resultStatus;
			exit;
		}
	}
	
		public static function daoConnection(){
			return self::$hotelConection;
		}


}

?>