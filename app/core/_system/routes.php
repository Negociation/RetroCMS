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

// File: Routes
// Desc: Create Custom Routes for RetroCMS Controllers, if not setted a route will use the default [ REQUEST_URI/Controller_Name/View_Function/Params ]

	
//Router Manager Declaration
$routerManager = new System\Router();
	

// Define a route
$routerManager->add(
    '/home/$1/id/',
    [
        'controller' => 'home',
        'action'     => 'loadById',
    ]
);

// Define a route
$routerManager->add(
    '/home/$1/',
    [
        'controller' => 'home',
        'action'     => 'loadByName',
    ]
);

// Define a route
$routerManager->add(
    '/groups/$1/',
    [
        'controller' => 'groups',
        'action'     => 'loadByName',
    ]
);

// Define a route
$routerManager->add(
    '/groups/$1/id',
    [
        'controller' => 'groups',
        'action'     => 'loadById',
    ]
);

// Define a route
$routerManager->add(
    '/allseeingeye/',
    [
        'controller' => 'housekeeping',
        'action'     => 'default',
    ]
);


//Start Router Validation
$routerManager->init(InstallDiag::daoConnection());

?>