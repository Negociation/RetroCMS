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

class Controller{
	protected $pageTitle;
	protected $habbo;
	protected $habboModel;		
	protected $hotel;
	protected $hotelModel;
	
	public function get_ViewTitle(){
		return $this->pageTitle;
	}
	
	//View Name Constraint
	public function set_MethodName($name){
		define('__VIEW__', $name);  	
	}
	
}


?>
