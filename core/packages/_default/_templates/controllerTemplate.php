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

// Class: ControllerTemplate
// Desc: Default Template for Controllers

class ControllerTemplate{
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
	
	//Intercept Request Rules before load
	public function interceptRequest($request){
		
		if($this->hotel->get_HotelStatus()){
			//Load View on Controller Object
			call_user_func_array([new $this($this->hotelConection),$request->get_DecodeAction()],$request->get_DecodeParams());
		}else{
			$this->pageTitle = 'Maintenance';
			echo 'Maintenance Break';
			//include 'web/account/login.view';	
			exit;
		}
	}
	
}
?>