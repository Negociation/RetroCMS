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


// Class: Home
// Desc: Habbo Home Classes (Load / Edit / Manager)

namespace Controller;

final class Home extends \Template\Controller{
	
	protected $homeUser;
	//Construct Method
    function __construct($hotelConnection){
		//Call the super-class constructor
		parent::__construct($hotelConnection); 
		
	}
	
	function default(){
		echo 'RetroCMS ~ Habbo Home Index';
	}
	
	function loadById($param){
		if(is_numeric($param) && $this->homeUser = $this->habboModel->get_HabboObject($param,1)){
			if(true){
				include 'web/home/'.(($this->homeUser->get_isHabboHomeVisible() && ($this->homeUser->get_HabboId() == $this->habbo->get_HabboId())) ? 'home_view' : 'home_hidden').'.view';	
			}else{
				include 'web/home/home_banned.view';
			}
		}else{
			include 'web/404.view';	
		}
	}
	
	function loadByName($param){
		if($this->homeUser = $this->habboModel->get_HabboObject($param,2)){
			if(true){
				include 'web/home/'.(($this->homeUser->get_isHabboHomeVisible() && ($this->homeUser->get_HabboId() == $this->habbo->get_HabboId())) ? 'home_view' : 'home_hidden').'.view';	
			}else{
				include 'web/home/home_banned.view';
			}
		}else{
			include 'web/404.view';	
		}
	}

}

?>