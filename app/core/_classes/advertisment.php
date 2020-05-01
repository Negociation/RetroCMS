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

// Class: Advertisements
// Desc:  Plain OLD CLR for Hotel Advertisements 

namespace CLR;

final class Advertisement{

	protected $advertisementId;
	protected $advertisementImage;	
	protected $advertisementStatus;
	protected $advertisementType;
	protected $advertisementUrl;
	
	//Default Construct Method
	public function constructObject($advertisementId,$advertisementImage,$advertisementStatus,$advertisementType,$advertisementUrl){
		$this->advertisementId = $advertisementId;
		$this->advertisementImage = $advertisementImage;
		$this->advertisementStatus = $advertisementStatus;
		$this->advertisementType =  $advertisementType;
		$this->advertisementUrl = $advertisementUrl;	
	}
	
	/** GETS **/
	
	public function get_advertisementImage(){
		return $this->advertisementImage;
	}
	
	public function get_advertisementUrl(){		
		return "#";
	}
	
	public function get_advertisementType(){
		return $this->advertisementType;
	}
	
	public function get_advertisementStatus(){
		return $this->advertisementStatus;
	}
}

?>