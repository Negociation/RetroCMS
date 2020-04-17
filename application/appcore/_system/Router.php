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
	
	private static $urlRequest;
	private static $urlParsed;
	private static $urlRoutes = [];
	//Default Construct Method
	public static function init($hotelConnection){
		
		
		//Sanatize Request
		if(isset($_SERVER["REQUEST_URI"])){
			
			//Sanatize Request String
			self::$urlRequest = strtok(strtolower(trim( substr(substr($_SERVER["REQUEST_URI"],-1) == '/' ?  substr($_SERVER["REQUEST_URI"],0,-1) : $_SERVER["REQUEST_URI"],1))), '?');	

			//Split String into Array
			self::$urlParsed = (!empty(self::$urlRequest))? explode("/",filter_var(rtrim(self::$urlRequest), FILTER_SANITIZE_URL)) : self::$urlRequest;
		}
		
		//Load URL
			self::loadRequest($hotelConnection);
	}
	
	//Handle request based on URL
	private static function handleRequest(){
		if(is_array(self::$urlParsed)){
			
			if(self::$urlParsed[0] != 'index'){
				$urlTarget = [  (isset(self::$urlParsed[1]) && self::$urlParsed[1] == 'default' ?  'NotFound' : self::$urlParsed[0]),isset(self::$urlParsed[1]) ? self::$urlParsed[1] : 'default', count(self::$urlParsed) > 2 ? array_slice(self::$urlParsed, 1) : null];
				return $urlTarget;
			}else{
				return ['NotFound','default',null];
			}
		}else{
			return ['index','default',null];
		}
	}
	
	//Validate Request Params into existing controls and functions
	private static function validateRequest($handledRequest){
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
		return ['Controller\\NotFound','default',null];
	}
	
	//Load Request Controller based on URL
	private static function loadRequest($hotelConnection){
	
		//Handle Request based on Route Rules
		$requestTarget = self::validateRequest(self::handleRequest());
				
		//Call Controller Handler
		call_user_func_array([new $requestTarget[0]($hotelConnection),$requestTarget[1]],is_array($requestTarget[1]) ? $requestTarget[1] : [] );
		
	}
	
	
	
	
	
	
	
	
}

?>