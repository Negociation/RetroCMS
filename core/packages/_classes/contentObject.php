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

// Class: ContentObject 
// Desc: ContentObject for Habbo Homes and Habbo Groups

class ContentObject extends ClassTemplate{
	
	protected $background;
	protected $widgetsArray  = [];
	protected $stickersArray = []; 
	protected $editStatus;
	
	public function __construct(){

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
	
	public function get_pageStatus(){
		return $this->editStatus;
	}
	
	/** SETS **/
	public function set_pageMode($mode){
		$this->editStatus = $mode;
	}
	

	
}
?>