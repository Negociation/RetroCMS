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

//Session
session_start();
if (empty($_SESSION['habboLoggedIn'])){ 
	$_SESSION['habboLoggedIn'] = false; 
}

//ISO-8859-1
header("Content-Type: text/html; charset=ISO-8859-1",true);

//Core of Aplication
require_once "./Core/Core.php";

//URL Treatment Class MVC
require_once "./Core/Decrypt.php";

//URL Object Call
$url = new Url($Conection);
$url->urlLoad();

?>


