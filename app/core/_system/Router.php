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
	public function init($hotelConnection){	
		
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
			}else if($this->urlParsed[0] != 'index' && !$this->inUse()){
				$urlTarget = [  (isset($this->urlParsed[1]) && $this->urlParsed[1] == 'default' ?  'NotFound' : $this->urlParsed[0]),isset($this->urlParsed[1]) ? $this->urlParsed[1] : 'default', count($this->urlParsed) > 2 ? array_slice($this->urlParsed, 2) : null];
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
		call_user_func_array([new $requestTarget[0]($hotelConnection),$requestTarget[1]],is_array($requestTarget[2]) ? $requestTarget[2] : [] );
		
	}
	
	//Add all Custom Routes 
	public function add($urlTarget,$controllerTarget){
		array_push($this->urlRoutes,['url'=>$urlTarget,'config'=>$controllerTarget,]);
	}
	
	//Verify if a url is setted 
	private function inUse(){
		$inUse = false;
		foreach($this->urlRoutes as $route){
			if($this->urlRequest == ($route['config']['controller'].($route['config']['action'] != 'default' ? '/'.$route['config']['action'] : ''))){
				
				$inUse = true;
			}
		}
		return $inUse;
	}
	
	
	//Validate Route if Exists
	public function isDefined($urlParsed){
		
		$foundRoute = false;
		
		foreach($this->urlRoutes as $route){
			$testRoute = explode("/",filter_var(rtrim(strtok(strtolower(trim( substr(substr($route['url'],-1) == '/' ?  substr($route['url'],0,-1) : $route['url'],1))), '?')), FILTER_SANITIZE_URL));
			
			if(is_array($testRoute) && (count($testRoute) == count($urlParsed))){
				if($urlParsed[0] == $testRoute[0]){
					if(isset($urlParsed[1])){	
						if($urlParsed[1] == $testRoute[1] || $testRoute[1]  == '$1'){

							if(isset($urlParsed[2])){
								$switch = false;
								if($testRoute[1] == '$1' && substr($testRoute[2],0,1)  != '$' && $testRoute[2] == $urlParsed[2]){
									$switch = $urlParsed[1];
									$urlParsed[1] = $urlParsed[2];
									$urlParsed[2] = $switch;		
								}
								
								$isEverythingParams = true;

								foreach(array_slice($testRoute, ($switch ? 3 : 2)) as $params){
									if(substr($params,0,1) != '$' || !is_numeric(intval(substr($params,1)))){
										$isEverythingParams = false;
									}
								}								
							
								if($isEverythingParams){
									$foundRoute = array($route['config']['controller'],$route['config']['action'],array_slice($urlParsed,2));
								}		
							}else{
								$foundRoute = array($route['config']['controller'],$route['config']['action'],$testRoute[1]  == '$1' ? array($urlParsed[1]) : null);
							}
						}			
					}else{
						$foundRoute = array($route['config']['controller'],$route['config']['action'],null);
					}
				}
			}
		}
		return $foundRoute;
	}
	
	
	
	
	
	
}

?>