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


//ISO-8859-1 (Portuguese and Spanish Accents)
header("Content-Type: text/html; charset=utf-8",true);

//Core of Aplication ( Database and RCON )
require_once "./Core/Core.php";

//URL Object Call
$Content = new Route($Conection);
$Content->Load();



?>


