<?php
//////////////////////////////////////////////////////////////
// 					    RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

//Include Default
foreach (glob("./core/packages/_default/*.php") as $default){ require_once $default; }

//Include All Classes 
foreach (glob("./core/packages/classes/*.php") as $classe){ require_once $classe; }

//Include All Models 
foreach (glob("./core/packages/models/*.php") as $model){ require_once $model; }

//Include All Controllers 
foreach (glob("./Core/packages/controllers/*.php") as $controller){ include $controller; }


//Check if MySQL Conection Works
try{
	//Recieve MySQL/MariaDB Conection
	$hotelData = parse_ini_file('./core/install/settings.ini', true);
	$hotelConection = new PDO('mysql:host=' . $hotelData['database']['host'] . ';dbname=' . $hotelData['database']['name'], $hotelData['database']['user'], $hotelData['database']['password']);
}catch ( PDOException $e ){	
	
	include './web/install/0.view';
	exit;
}


?>


