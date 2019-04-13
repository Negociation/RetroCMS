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

// Class: Habbo
// Desc: Habbo Home Object;

class HomeObject extends ClassTemplate{
	
	protected $habboObject;
	protected $background;
	protected $widgetsArray  = [];
	protected $stickersArray = []; 
	protected $homeStatus;
	
	/** DAO CONSTRUCT **/
	public function constructObject($habboObject){
		$this->habboObject = $habboObject;
		$this->background = 'b_hc_bg_machine';
		$this->homeStatus = 'view';
	}	
	
	/** GETS **/
	public function get_habboObject(){
		return $this->habboObject;
	}
	
	public function get_widgetsArray(){
		return $this->widgetsArray;
	}
	
	public function get_stickersArray(){
		return $this->stickersArray;
	}
	
	public function get_background(){
		return $this->background;
	}

	public function get_homeStatus(){
		return $this->homeStatus;
	}
	
	/** SETS **/
	public function set_homeMode($mode){
		$this->homeStatus = $mode;
	}
	
}
?>