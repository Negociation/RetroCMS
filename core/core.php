<?php
//////////////////////////////////////////////////////////////
// 					    RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

//Include Default
foreach (glob("./core/packages/_default/*.php") as $default){ require_once $default; }

//Include All Classes 
foreach (glob("./core/packages/classes/*.php") as $classe){ require_once $classe; }

//Include All Models 
foreach (glob("./core/packages/models/*.php") as $model){ require_once $model; }

//Include All Controllers 
foreach (glob("./Core/packages/controllers/*.php") as $controller){ include $controller; }

if(version_compare(PHP_VERSION, '7.0.0', '<')){
	$e = "<center> <br>Sua versão do PHP não é compativel com o RetroCMS, atualize antes de continuar! <br><br> Your version of PHP its not compatibile with RetroCMS, please update before install! </center>";
	include './web/install/index.view';
	exit;
}else if(!extension_loaded ("sodium")){
	$e = "<center><br> Extensão sodim não encontrada <br> Extension Sodium disabled or not found</center>";
	include './web/install/index.view';		
	exit;
}else{
	//Check if MySQL Conection Works
	try{
		//Recieve MySQL/MariaDB Conection
		$hotelData = parse_ini_file('./core/install/settings.ini', true);
		$hotelConection = new PDO('mysql:host=' . $hotelData['database']['host'] . ';dbname=' . $hotelData['database']['name'], $hotelData['database']['user'], $hotelData['database']['password']);
	}catch ( PDOException $e ){	
		$e = "<center><br>Erro de conexão com o Banco de Dados<br>".$e->getMessage()."</center>";
		include './web/install/index.view';
		exit;
	}
}
?>