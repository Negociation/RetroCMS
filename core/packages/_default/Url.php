<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//
// Branch: Public											//
//////////////////////////////////////////////////////////////



class Url{
	protected $url_controller;
	protected $url_method;
	protected $url_params = [];
	
	public function __construct($targetUrl){
		$this->url_controller = "Index";
		$this->url_method = "default";
		$this->buildUrl($targetUrl);
	}
	
	public function buildUrl($targetUrl){
		$parsedUrl = explode("/",filter_var(rtrim($targetUrl), FILTER_SANITIZE_URL));
		if(end($parsedUrl)== ''){ array_pop($parsedUrl); }
		//Special Cases of URL Routes
		switch(strtolower($parsedUrl[0])){
			case "login":
				$parsedUrl[0] = "Account";
				$parsedUrl[1] = "Login";
			break;
			
			case "logout":
				$parsedUrl[0] = "Account";
				$parsedUrl[1] = "Disconnected";
			break;
		}
		
		//Check if Controller Exist
		if(file_exists("Core/Settings/Controllers/".$parsedUrl[0].".php")){ 
			
			$this->set_UrlController($parsedUrl[0]);
			unset($parsedUrl[0]);
		}else{
			$this->set_UrlController("Not_Found");	
			$this->set_UrlMethod("default");
		}		
		//Check if Method Exists on seted Controller
		if(isset($parsedUrl[1]) &&  Method_Exists(new $this->url_controller(null),$parsedUrl[1])){
			$this->set_UrlMethod($parsedUrl[1]);
			unset($parsedUrl[1]);
		}else{
			if(isset($parsedUrl[1]) || !Method_Exists(new $this->url_controller(null),$this->get_UrlMethod("default"))){
				$this->set_UrlController("Not_Found");	
				$this->set_UrlMethod("default");
			}
		}
		
		

		
		//Get all parameters from the rest of URL	
		if (isset($parsedUrl[2]) && $this->get_UrlController() != "Not_Found"){
			$params = $parsedUrl ? array_values($parsedUrl): [];
			$this->set_UrlParams($params);
		}
	}

	
	public function get_UrlController(){
		return $this->url_controller;
	}	
	
	public function get_UrlMethod(){
		return $this->url_method;		
	}

	public function get_UrlParams(){
		return $this->url_params;		
	}

	public function set_UrlController($url_controller){
		$this->url_controller = $url_controller;
	}	
	
	public function set_UrlMethod($url_method){
		$this->url_method = $url_method;		
	}

	public function set_UrlParams($url_params){
		$this->url_params = $url_params;		
	}		
	

}
?>