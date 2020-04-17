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
	public function __construct(){
		
		//Sanatize Request
		if(isset($_SERVER["REQUEST_URI"])){
			
			//Sanatize Request String
			$this->urlRequest = strtok(strtolower(trim( substr(substr($_SERVER["REQUEST_URI"],-1) == '/' ?  substr($_SERVER["REQUEST_URI"],0,-1) : $_SERVER["REQUEST_URI"],1))), '?');	

			//Split String into Array
			$this->urlParsed = (!empty($this->urlRequest))? explode("/",filter_var(rtrim($this->urlRequest), FILTER_SANITIZE_URL)) : $this->urlRequest;
		}
		
		//Load URL
			$this->loadRequest();
	}
	
	//Handle request based on URL
	private function handleRequest(){
		if(is_array($this->urlParsed)){
			
			if($this->urlParsed[0] != 'index' && $this->urlParsed[1] != 'default'){
				$urlTarget = [$this->urlParsed[0],isset($this->urlParsed[1]) ? $this->urlParsed[1] : 'default', count($this->urlParsed) > 2 ? array_slice($this->urlParsed, 1) : null];
				return $urlTarget;
			}else{
				return ['NotFound','default',null];
			}
		}else{
			return ['index','default',null];
		}
	}
	
	//Validate Request Params into existing controls and functions
	private function validateRequest($handledRequest){
		if(class_exists($handledRequest[0] = "Controller\\".$handledRequest[0])){
			if(Method_Exists(new $handledRequest[0](),$handledRequest[1])){
				$reflectionAction = new \ReflectionMethod($handledRequest[0],$handledRequest[1]); 
				if($reflectionAction->getNumberOfParameters() == (is_array($handledRequest[2]) ? count($handledRequest[2]) : 0 )){
					
					//Destroying Reflection
					unset($reflectionAction);
					
					return [$handledRequest[0],$handledRequest[1],$handledRequest[2]];
				}
			}
		}
		return ['NotFound','default',null];
	}
	
	//Load Request Controller based on URL
	public function loadRequest(){
		
		//Handle Request based on Route Rules
		$requestTarget = $this->validateRequest($this->handleRequest());
		
		//call_user_func_array();
		
	}
	
	
	
	
	
	
	
	
}

?>