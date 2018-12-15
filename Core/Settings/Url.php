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
		if(end($parsedUrl)== '/'){ array_pop($parsedUrl); }
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
		


		if(file_exists("Core/MVC/Controllers/".$parsedUrl[0].".php")){ 

			$this->set_UrlController($parsedUrl[0]);
			unset($parsedUrl[0]);
		}else{
			$this->url_controller = "404";	
			$this->url_method = "default";
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

	private function set_UrlController($url_controller){
		$this->url_controller = $url_controller;
	}	
	
	private function set_UrlMethod(){
		return $this->url_method;		
	}

	private function set_UrlParams(){
		return $this->url_params;		
	}		
	

}
?>