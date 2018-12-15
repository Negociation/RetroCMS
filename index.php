<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrino ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////


//Session (Check if Session exists)
session_start();
if (empty($_SESSION['habboLoggedIn'])){ $_SESSION['habboLoggedIn'] = false; }

//ISO-8859-1 (Portuguese and Spanish Accents)
header("Content-Type: text/html; charset=utf-8",true);

//Core of Aplication ( Database and RCON )
require_once "./Core/Core.php";

//URL Treatment Class MVC
require_once "./Core/Settings/Routes.php";
require_once "./Core/Settings/Url.php";

//URL Object Call
$Content = new Route($Conection);
$Content->Load();

?>


