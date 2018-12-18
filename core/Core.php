<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

//Database Conection Configuration
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'retro' );

//Check if MySQL Conection Works
try{
	//Recieve MySQL/MariaDB Conection
	$Conection = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
}catch ( PDOException $e ){
	//Error Message with Code and stop the Script
	echo 'PT: Erro ao conectar com o MySQL: ' . $e->getMessage() . '<br>';
	echo 'EN: Error to connect with MySQL: ' . $e->getMessage();
	exit;
}

//Include All Classes 
foreach (glob("./Core/Settings/Classes/*.php") as $classe){ require_once $classe; }

//Include All Models 
foreach (glob("./Core/Settings/Models/*.php") as $model){ require_once $model; }

//Include All Controllers 
foreach (glob("./Core/Settings/Controllers/*.php") as $controller){ include $controller; }

?>

