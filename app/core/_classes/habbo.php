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

namespace CLR;

use RetroRCON\RemoteConnection;

final class Habbo{

	private $habboLoggedIn;

	//Default Construct Method
    function __construct(){
		
	}
	
	function constructObject(){
		//If GRPC Enabled set a rCon based on Hotel Object Info
		$hotelConnection = ( extension_loaded("grpc") !== null && extension_loaded("grpc") ) ? new RemoteConnection(['host' => '127.0.0.1','port' => 12309]) : false;
				
		$this->habboLoggedIn = false;
	
    }
	
	
	/** GETS **/
	
	public function get_isHabboLoggedIn(){
		return $this->habboLoggedIn;
	}
	
	public function get_HabboName(){
		return null;
	}
	
}

?>