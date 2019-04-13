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

// Class: Habbo Model
// Desc: DAO Content of habbo user Object

class HabboModel extends ModelTemplate{

	public function __construct($hotelConection){
		
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
	}

	//Get a Habbo Object by Value where type can be { 1 - by Id | 2 - by Name }
	public function get_HabboObject($value,$type){

		//Get Value by Type
		switch($type){
			case 1:
				$resultQuery = ($this->getById('users',$value) != false) ? $this->getById('users',$value) : false;
				break;
			case 2:
				$resultQuery = (count($this->getByParam('users','username',$value)) > 0) ? $this->getByParam('users','username',$value)[0] : false;
				break;		
		}

		//Construct Object 
		if($resultQuery){
			//Empty Habbo Object
			$habboObject = new Habbo();
			$habboObject->constructObject($resultQuery['id'],$resultQuery['username'],$resultQuery['password'],$resultQuery['rank'],$resultQuery['figure'],$resultQuery['sex'],$resultQuery['credits'],array($resultQuery['club_subscribed'],$resultQuery['club_expiration'],count($this->getByParam('users_club_gifts','user_id',$resultQuery['id']))),$resultQuery['user_language']);
			return $habboObject;
		}else{
			return false;
		}
	}
	
	public function get_SessionStatus($sessionData){
		
		//Remove That Later
		//$sessionData[0] = '1';
		//$sessionData[1] = 'ola';	
		
		if(!$sessionData){
			return false;
		}else{
			$resultQuery = $this->getById('site_sessions',$sessionData[1]) ? $this->getById('site_sessions',$sessionData[1]) : false;
			if(!$resultQuery){
				return false;
			}else{
				if(date($resultQuery[2]) <= date('Y-m-d h:i:s', strtotime('+12 hours')) && ($sessionData[0] == $resultQuery[1])){	
					return true;
				}else{
					return false;
				}
			}
		}
	}


}
?>