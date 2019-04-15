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
	protected $bodyId;
	
	public function get_ViewTitle(){
		return $this->pageTitle;
	}
	
	public function get_ViewBody(){
		return $this->bodyId;
	}
	
	public function set_ViewBody($bodyId){
		$this->bodyId = $bodyId;
	}	
	
	//View Name Constraint
	public function set_MethodName($name){
		define('__VIEW__', $name);  	
	}
	
	//Intercept Request Rules before load
	public function interceptRequest($request){
		
		//Check if hotel as Working 
		if($this->hotelModel->get_HotelInstall()){
			
			//Set method name Constraint
			$this->set_MethodName($request->get_DecodeAction());
			
			//Set_Deafult Body Id
			$this->bodyId = 'home';
			
			if($this->hotel->get_HotelStatus()){
				if(get_class($this) != 'Install'){
					call_user_func_array([new $this($this->hotelConection),$request->get_DecodeAction()],$request->get_DecodeParams());
				}else{
					call_user_func_array([new Not_Found($this->hotelConection),'default'],array());
				}
			}else{
								
				$this->pageTitle = 'Maintenance Break';
				include 'web/maintenance/index.view';	
				exit;
			}
			
		}else{
			if(get_class($this) != 'Install'){		
				header('Location: '.$this->hotel->get_HotelUrl().'/install/start');
			}else{
				call_user_func_array([new $this($this->hotelConection),$request->get_DecodeAction()],$request->get_DecodeParams());
			}
				
		}
	}
	
}
?>