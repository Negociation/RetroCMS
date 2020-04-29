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

//Home(By Id)
$routerManager->add(
    '/home/$1/id/',
    [
        'controller' => 'home',
        'action'     => 'loadById',
    ]
);

//Home(By Name)
$routerManager->add(
    '/home/$1/',
    [
        'controller' => 'home',
        'action'     => 'loadByName',
    ]
);

//Groups (By Name)
$routerManager->add(
    '/groups/$1/',
    [
        'controller' => 'groups',
        'action'     => 'loadByName',
    ]
);

//Groups (By Id)
$routerManager->add(
    '/groups/$1/id',
    [
        'controller' => 'groups',
        'action'     => 'loadById',
    ]
);

//Housekeeping
$routerManager->add(
    '/allseeingeye/',
    [
        'controller' => 'housekeeping',
        'action'     => 'default',
    ]
);


//Ajax Request (Update MyHabbo Tab - Credits)
$routerManager->add(
    '/topbar/credits',
    [
        'controller' => 'ajax',
        'action'     => 'myhabbo_creditsUpdate',
    ]
);

//Ajax Request (Update MyHabbo Tab - Habboclub)
$routerManager->add(
    '/topbar/habboclub',
    [
        'controller' => 'ajax',
        'action'     => 'myhabbo_habboClubUpdate',
    ]
);

$routerManager->add(
    '/register/start',
    [
        'controller' => 'register',
        'action'     => 'step',
		'params' => [1],
    ]
);

$routerManager->add(
    '/register/done',
    [
        'controller' => 'register',
        'action'     => 'step',
		'params' => [5],
    ]
);

$routerManager->add(
    '/install/start',
    [
        'controller' => 'insyall',
        'action'     => 'step',
		'params' => [1],
    ]
);

$routerManager->add(
    '/install/done',
    [
        'controller' => 'install',
        'action'     => 'step',
		'params' => [5],
    ]
);


//Start Router Validation
$routerManager->init(InstallDiag::daoConnection());

?>