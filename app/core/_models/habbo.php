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

// Class: Client
// Desc: Hotel Client Class

namespace Model;


final class Habbo extends \Template\Model{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
	}
	
	public function get_SessionStatus($sessionData){
		//If recieved session data 
		if(!$sessionData){
			return false;
		}else{
			//MySQL Query
			$resultQuery = $this->getByParam('web_sessions','ticket',$sessionData[1]) ? $this->getByParam('web_sessions','ticket',$sessionData[1]) : false;
			//If not found a ticked
			if(!$resultQuery){
				return false;
			}else{
				//If founded ticket and not expired yet 
				return ((date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) < date("Y-m-d H:i:s", strtotime('+12 hours', strtotime($resultQuery[0]['created_at']))) ) &&  ($resultQuery[0]['ticket'] == $sessionData[1])) ? $resultQuery[0]['habboid'] : false;
			}
		}
	}
	
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
			$habboObject = new \CLR\Habbo();
			$habboObject->constructObject($resultQuery['id'],$resultQuery['username'],$resultQuery['password'],$resultQuery['rank'],$resultQuery['credits']);
			return $habboObject;
		}else{
			return false;
		}
	}
	
	public function set_HabboLogin($habboCredentials){
		
		//New Habbo
		$habboObject = new \CLR\Habbo();
		
		//Get all content from table (users) where Column(username) as equal habboObject username
		$resultQuery = $this->getByParam('users','username',$habboCredentials[0]);
		
		//If found the habbo
		if(count($resultQuery) == 1){
				$habboObject->constructObject($resultQuery[0]['id'],$resultQuery[0]['username'],$resultQuery[0]['password'],$resultQuery[0]['rank'],$resultQuery[0]['credits']);
				if(!$this->validatePassword($habboCredentials[1],$habboObject->get_HabboPassword())){
					return array(3);
				}else if($habboObject->get_HabboRank() == 0){
					return array(2,'REASON FOR BAN');
				}else{
					$habboObject->set_HabboSession();
					$this->set_HabboTicket('LT',$habboObject);
					return array(1);
				}
		}else{
			//Habbo not exists
			return array(0);
		}
	}
	
		
	public function set_HabboTicket($type,$habboObject){
		switch($type){
			
			//Set Login ticket on site_sessions
			case 'LT':
				$sql = "INSERT INTO web_sessions( `habboid`,`ticket`) VALUES (:habboid,:ticket);";
				try{
					$stmt = $this->hotelConection->prepare($sql);
					$stmt->bindValue(':habboid', $habboObject->get_habboId());
					$stmt->bindValue(':ticket', $habboObject->get_habboSession()[1]);
					$stmt->execute();
				}catch (PDOException $e){
					echo "Erro during create user";
				}
				break;
			
			//Set Server ticked on field SSO of username row
			case 'ST':
				return $this->setColumnById('users', 'sso_ticket', $habboObject->get_HabboId(), $habboObject->get_HabboTicket());
				break;
		}
	}

}

?>