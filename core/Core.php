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

//Database Conection Configuration
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'KeplerMaster' );

//Check if MySQL Conection Works
try{
	//Recieve MySQL/MariaDB Conection
	$Conection = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
	

}catch ( PDOException $e ){
	//Error Message with Code and stop the Script
	echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
	exit;
}



//Include All Classes and Models

//++++++++++++++++++++++++++ Hotel ++++++++++++++++++++++++++++
include "./Core/Classes/Hotel.php";
include "./Core/Models/HotelModel.php";

//Instance HotelModel and Hotel with the Conection
$hotelModel = new HotelModel($Conection);


//Instance Hotel
$hotel = $hotelModel->get_HotelObject();

//++++++++++++++++++++++++++ Habbo ++++++++++++++++++++++++++++
include "./Core/Classes/Habbo.php";
include "./Core/Models/HabboModel.php";

?>

