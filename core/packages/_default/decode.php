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

// Class: Decode
// Desc: Decode the Url Request 

class Decode{
	
	private $urlController;
	private $urlAction;
	private $urlParams = [];
	
	public function __construct($urlRequest,$hotelConection){
		
		//Default Constructor Decode
		$this->urlController = 'index';
		$this->urlAction = 'default';

		//Remove First Character of String if as "/"
		$urlRequest = (isset($urlRequest[0]) && $urlRequest[0] == "/")? substr($urlRequest, 1) : $urlRequest;
				
		//Remove Last Character of String if as "/"
		$urlRequest = (isset($urlRequest[-1]) && $urlRequest[-1] == "/")? rtrim($urlRequest,"/") : $urlRequest;
		
		//Remove Params from URL PHP
		$urlRequest = strtok($urlRequest, '?');
		
		//Split url into array using middle "/"  as param 
		$parsedRequest = (!empty($urlRequest))? explode("/",filter_var(rtrim($urlRequest), FILTER_SANITIZE_URL)) : $urlRequest;
		
		//Decode Data if is Array Object
		if(is_array($parsedRequest)){
			$parsedRequest = $this->orderRequest($parsedRequest);
			$this->decodeRequest($parsedRequest,$hotelConection);
		}
		
	}
	
	//Set and Gets
	
	public function get_DecodeController(){
		return $this->urlController;
	}
	
	public function get_DecodeAction(){
		return $this->urlAction;
	}
	
	public function get_DecodeParams(){
		return $this->urlParams;
	}
	
	
	// Decode parsedRequest
	protected function decodeRequest($request,$hotelConection){
		if(file_exists("./core/packages/_controllers/".$request[0].".php")){
			$this->urlController = $request[0];
			if(isset($request[1])){
				if(Method_Exists(new $request[0]($hotelConection),$request[1]) && $request[1] != 'default' ){
					$this->urlAction = $request[1];
					$reflectionAction = new \ReflectionMethod($request[0],$request[1]); 
					if($reflectionAction->getNumberOfParameters() == (count($request)-2)){
						unset($request[0]);
						unset($request[1]);
						$this->urlParams = $request ? array_values($request): [];
						unset($request);
					}else{
						$this->urlController = 'not_found';
						$this->urlAction= 'default';
						unset($request);
					}
				}else{
					$this->urlController = 'not_found';
					unset($request);
				}
			}
		}else{
			$this->urlController = 'not_found';
			unset($request);
		}
	}
				
	// Re-order url based on Request
	protected function orderRequest($request){
		
		//Special Cases of URL Routes
		switch($request[0]){
			
		}
		return $request;
	}
}

?>