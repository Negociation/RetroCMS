<?php
//////////////////////////////////////////////////////////////
//							RetroCMS						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

//Small Correction for Install
ini_set('max_execution_time', 300);

//Core of Aplication ( Database and RCON )
require_once "./core/core.php";

//ISO-8859-1 (Portuguese and Spanish Accents)
header("Content-Type: text/html; charset=utf-8",true);

//Start session before load content;
session_start();

//URL Object Call
$Content = new Route($hotelConection);
$Content->load();
?>