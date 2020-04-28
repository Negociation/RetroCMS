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


// Class: Index Controller
// Desc: Index Controller

namespace Controller;

final class Account extends \Template\Controller{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
		
	}
	
	function login(){
		//Habbo is already Logged so redirect to Index
		if($this->habbo->get_isHabboLoggedIn()){
			header('Location: '.$this->hotel->get_HotelUrl());
		}else{
			include 'web/account/login.view';	
		}
		exit;
	}
	
	function reauthenticate(){
		 if($this->habbo->get_isHabboLoggedIn()){
		 
		 }else{
			header('Location: '.$this->hotel->get_HotelUrl().'/login');
		 }
	}
	
	function submit(){
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->habbo->get_isHabboLoggedIn()){
			echo 'Submiting Data';
		}else{
			header('Location: '.$this->hotel->get_HotelUrl());
		}
	}
	
	function disconnected(){
		//Habbo is Logged destroy session
		if($this->habbo->get_isHabboLoggedIn()){
			include 'web/account/disconnected.view';	
		}else{
			header('Location: '.$this->hotel->get_HotelUrl());
		}
	}
	
	

}

?>