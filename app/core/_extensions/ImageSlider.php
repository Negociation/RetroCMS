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


// Class: Hotel
// Desc:  Plain OLD CLR for Hotel 

namespace Extension;

final class ImageSlider extends \Template\Extension{

	
	//Default Construct Method
    function __construct(){
		$this->init();
	}
	
	public function init(){
		$this->set_ExtensionScripts();
	}
		
	public function onWindowLoaded(){
		echo 'initializeSlider();';
	}
	
	public function onAjaxRequestCompleted(){
	}

	public function onAjaxRequestInit(){
		
	}
	
	public function set_ExtensionScripts(){
		array_push($this->extensionScripts,$this->extensionDirectory.'imageSlider/imageSlider.js');
	}
	
	public function get_ExtensionScripts(){
		return $this->extensionScripts;
	}
	

}

?>