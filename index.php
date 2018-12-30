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

//Core of Aplication ( Database and RCON )
require_once "./Core/Core.php";

//ISO-8859-1 (Portuguese and Spanish Accents)
header("Content-Type: text/html; charset=utf-8",true);

//Start session before load content;
session_start();

//URL Object Call
$Content = new Route($hotelConection);
$Content->load();
?>