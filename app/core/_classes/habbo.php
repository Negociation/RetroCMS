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
	private $habboId;
	private $habboLoggedIn;

	//Default Construct Method
    function __construct(){
		$this->habboLoggedIn = false;
	}
	
	function constructObject(){
		//If GRPC Enabled set a rCon based on Hotel Object Info
		$hotelConnection = ( extension_loaded("grpc") !== null && extension_loaded("grpc") ) ? new RemoteConnection(['host' => '127.0.0.1','port' => 12309]) : false;	
    }
	
	
	/** GETS **/
	
	public function get_isHabboLoggedIn(){
		return $this->habboLoggedIn;
	}
	
	public function get_HabboName(){
		return null;
	}
	
	public function get_habboSession(){
		return (isset($_SESSION['habboLoggedId']) &&  isset($_SESSION['habboLoggedToken'])) ? array($_SESSION['habboLoggedId'],$_SESSION['habboLoggedToken']) : false;
	}
	
	/** SETS **/
	public function set_HabboId($param){
		$this->habboId = $param;
	}
}

?>