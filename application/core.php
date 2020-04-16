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


// + Include Autoload for Classes
// - Desc: Check if Autoload file exists then include it

if(stream_resolve_include_path(__DIR__."/install/vendor/autoload.php")){
	require_once(__DIR__."/install/vendor/autoload.php");
}else{
	echo 'Waiting Composer Setup';
}


?>