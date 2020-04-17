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

// Class: Route Class 
// Desc: Manage the Routes of MVC Model

namespace System;

final class Router{
	
	private $urlRequest;
	private $urlParsed;
	private $urlRoutes = [];
	
	//Default Construct Method
	public function __construct($hotelConnection){	
		
		//Sanatize Request
		if(isset($_SERVER["REQUEST_URI"])){
			
			//Sanatize Request String
			$this->urlRequest = strtok(strtolower(trim( substr(substr($_SERVER["REQUEST_URI"],-1) == '/' ?  substr($_SERVER["REQUEST_URI"],0,-1) : $_SERVER["REQUEST_URI"],1))), '?');	

			//Split String into Array
			$this->urlParsed = (!empty($this->urlRequest))? explode("/",filter_var(rtrim($this->urlRequest), FILTER_SANITIZE_URL)) : $this->urlRequest;
		}
		
		//Load URL
			$this->loadRequest($hotelConnection);
	}
	
	
	//Handle request based on URL
	private function handleRequest(){
			
		if(is_array($this->urlParsed)){
			
			if($resolvedUrl = $this->isDefined($this->urlParsed)){
				return $resolvedUrl;
			}else if($this->urlParsed[0] != 'index'){
				$urlTarget = [  (isset($this->urlParsed[1]) && $this->urlParsed[1] == 'default' ?  'NotFound' : $this->urlParsed[0]),isset($this->urlParsed[1]) ? $this->urlParsed[1] : 'default', count($this->urlParsed) > 2 ? array_slice($this->urlParsed, 1) : null];
				return $urlTarget;
			}else{
				return ['NotFound','default',null];
			}
		}else{
			return ['index','default',null];
		}
	}
	
	//Validate Request Params into existing controls and functions
	private function validateRequest($handledRequest,$hotelConnection){
		if(class_exists($handledRequest[0] = "Controller\\".$handledRequest[0])){
			if(Method_Exists(new $handledRequest[0]($hotelConnection),$handledRequest[1])){
				$reflectionAction = new \ReflectionMethod($handledRequest[0],$handledRequest[1]); 
				if($reflectionAction->getNumberOfParameters() == (is_array($handledRequest[2]) ? count($handledRequest[2]) : 0 )){
					
					//Destroying Reflection
					unset($reflectionAction);
					
					return [$handledRequest[0],$handledRequest[1],$handledRequest[2]];
				}
			}
		}
		return ['Controller\\NotFound','default',null];
	}
	
	//Load Request Controller based on URL
	private function loadRequest($hotelConnection){
	
		//Handle Request based on Route Rules
		$requestTarget = $this->validateRequest($this->handleRequest(),$hotelConnection);
				
		//Call Controller Handler
		call_user_func_array([new $requestTarget[0]($hotelConnection),$requestTarget[1]],is_array($requestTarget[1]) ? $requestTarget[1] : [] );
		
	}
	
	//Add all Custom Routes 
	public function add($route){
		array_push($this->urlRoutes,$route);
	}
	
	//Validate Route if Exists
	public function isDefined($urlParsed){

		//TODO: Add validator for Route Objects
		
		//If find a valid Route send it resolved 
		if(1 == 2){
			return array('NotFound','default',null);			
		}else{
			return false;
		}
	}
	
	
	
	
	
	
	
	
}

?>