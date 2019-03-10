<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// + Call the Configuration File Once
// - File: Core.php
// - Desc: Database Settings 
require_once('./core/core.php');

// + Start Session "habboWebsite"
// - Desc: Sessions for Website 
session_id("habboWebsite");
session_start();

// + Load the Destination Content
// - Desc: Created a Object of RoutePath and Called function Load
$routeObject = new RoutePath();
$routeObject->load($hotelConection);

?>