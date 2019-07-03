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

class HomeObject extends ContentObject{
	
	protected $habboObject;
	
	/** DAO CONSTRUCT **/
	public function constructObject($habboObject){
		$this->habboObject = $habboObject;
		$this->background = 'b_hc_bg_machine';
		$this->editStatus = 'view';
	}	
	
	
}
?>