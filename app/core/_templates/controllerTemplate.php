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


// Class: ControllerTemplate
// Desc: Default Template for Controllers


namespace Template;

use CLR;

class Controller{
	
	protected $pageTitle;
	protected $habbo;
	protected $habboModel;		
	protected $hotel;
	protected $hotelModel;
	
    function __construct(){
		
		//Default Page Title
		$this->pageTitle = 'Habbo';
		
		//Set_Deafult Body Id
		$this->bodyId = 'home';
		
		//Default Models
		//$this->hotelModel = ;
		//$this->habboModel =;
		
		//Default Hotel Object (REMOVE)
		$this->hotel = new CLR\Hotel();	
		$this->hotel->constructObject();
		
		$this->habbo = new CLR\Habbo();
		
		//Intercept MVC Requests based on some conditions (Version | Rank | Hotel Status)
		$this->requestIntercept();
	}			

	/* GETS [DO NOT REMOVE]*/

	public function get_ViewTitle(){
		return $this->pageTitle;
	}		
	
	public function get_ViewBody(){
		return $this->bodyId;
	}
		

	/* EXTRA */
	
	
	//Request Intercept Rules
	private function requestIntercept(){
		//Is Hotel Installed ?
		if($this->hotel->get_isHotelInstalled()){
			//If Hotel is Closed (Maintenance/(Closed if Offline))
			if($this->hotel->get_isHotelLocked() && get_class($this) != 'Controller\Housekeeping' && get_class($this) != 'Controller\Maintenance'){
				header('Location: '.$this->hotel->get_HotelUrl().'/maintenance');
			}else if(get_class($this) == 'Controller\Install' || (!$this->hotel->get_isHotelLocked() && get_class($this) == 'Controller\Maintenance' )){
				header('Location: '.$this->hotel->get_HotelUrl());
			}
		}else if(get_class($this) != 'Controller\Install'){
			header('Location: '.$this->hotel->get_HotelUrl().'/install/start');
		}		
	}
	

	
	
	
}

?>