<?php
//////////////////////////////////////////////////////////////
// 				     RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 				          	//
//////////////////////////////////////////////////////////////

//Include All Classes and Models

//+++++++++++++ Hotel +++++++++++++//
include "./Core/Classes/Hotel.php";
include "./Core/Models/HotelModel.php";






//Database Conection Configuration
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'Kepler' );



//Check if MySQL Conection Works
try{
	$Conection = new PDO( 'mysql:host=' . MYSQL_HOST . 	';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
}catch ( PDOException $e ){
	//Error Message with Code
	echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}



?>

