<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

$hotelData = parse_ini_file('./install/settings.ini', true);

//Check if MySQL Conection Works
try{
	//Recieve MySQL/MariaDB Conection
	$Conection = new PDO('mysql:host=' . $hotelData['database']['host'] . ';dbname=' . $hotelData['database']['name'], $hotelData['database']['user'], $hotelData['database']['password']);
}catch ( PDOException $e ){
	//Error Message with Code and stop the Script
	echo 'PT: Erro ao conectar com o MySQL: ' . $e->getMessage() . '<br>';
	echo 'EN: Error to connect with MySQL: ' . $e->getMessage();
	exit;
}

?>


