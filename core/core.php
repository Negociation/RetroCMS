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

// + Setting Default Configuration Timeout 
// - Desc: Preveting errors during Install
ini_set('max_execution_time', 300); 


// + Include Default
// - Desc: Include all default classes for MVC model
foreach (glob("./core/packages/_default/*.php") as $default){ require_once $default; }





//Check if MySQL Conection Works
try{
	//Recieve MySQL/MariaDB Conection
	$hotelData = parse_ini_file('./core/install/settings.ini', true);
	$hotelConection = new PDO('mysql:host=' . $hotelData['database']['host'] . ';dbname=' . $hotelData['database']['name'], $hotelData['database']['user'], $hotelData['database']['password']);
}catch ( PDOException $e ){	

}

?>