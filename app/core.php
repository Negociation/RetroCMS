<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// + Setting Default Configuration Timeout 
// - Desc: Preveting errors during Install
ini_set('max_execution_time', 300); 


// + Setting Default Cookie Mode
// - Desc: Preveting XSS Atacks
ini_set('session.cookie_httponly', 1);


// + Import Install Diagnosis Class 
// - Desc: Basic Class nedded without Autoload support
require(__DIR__."/install/retrosys/classes/installDiag.php");


// + Validate System Integrity 
// - Desc: Check if Autoload file exists, all minimum requirements as PHP Version its valid...
if(InstallDiag::result(0)){
	
	//Include Autoload for Classes
	require_once(__DIR__."/install/vendor/autoload.php");
	
	// + Start Session "habboWebsite"
	// - Desc: Sessions for Website
	session_start();

	//Load Custom Routes
	include (__DIR__.'\core\_system\routes.php');

	exit;
}else{
	include './web/install/index.view';
	exit;
}





?>