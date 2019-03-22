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

// + Setting Default Configuration Timeout 
// - Desc: Preveting errors during Install
ini_set('max_execution_time', 300); 


// + Include Default
// - Desc: Include all default classes for MVC model
foreach (glob("./core/packages/_default/*.php") as $default){ require_once $default; }

// + Include Diagnosis Class and Related Content
// - Desc: A small check-up of all cms requirements before install 
foreach (glob("./core/packages/_default/_install/*.php") as $install){ require_once $install; }

// + Include Default Structure
// - Desc: Include all default template structure for Classes/Models/Controllers
foreach (glob("./core/packages/_default/_templates/*.php") as $template){ require_once $template; }

// + Include Controllers
// - Desc: Include all Controllers of the Website 
foreach (glob("./core/packages/_controllers/*.php") as $controllers){ require_once $controllers; }

// + Include Controllers
// - Desc: Include all Models of ObjectClass
foreach (glob("./core/packages/_models/*.php") as $models){ require_once $models; }



// + Site Diagnosis Unit Test
// - Desc: Test if the diagnosis result as true , if not so show error status
$siteDiagnosis = new Diagnosis();
$siteDiagnosis->start();
if(!$siteDiagnosis->result()){
	include './web/install/index.view';
	exit;
}


?>