<?php
//////////////////////////////////////////////////////////////
// 					    RetroCMS 							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Url{
	protected $hotelModel;
	protected $hotelConection;
	protected $url_controller;
	protected $url_method;
	protected $url_params = [];
	
	//Recieve the Url from Route and Work with before return
	public function __construct($targetUrl,$hotelConection){
		$this->hotelConection = $hotelConection;
		$this->url_controller = "Index";
		$this->url_method = "default";
		$this->hotelModel = new HotelModel($this->hotelConection);
		//If CMS not Installed Show Install Content instead 
		if(!$this->hotelModel->get_HotelInstall()){
			$this->url_controller = "Install";
		}else{
			$this->buildUrl($targetUrl);
			unset($targetUrl);
		}
	}
	
	protected function buildUrl($targetUrl){
		
		//Remove last character if as / ex:. http://localhost/client/ -> http://localhost/client 
		$targetUrl = $targetUrl[-1] == "/" ? rtrim($targetUrl,"/") : $targetUrl;
		
		//Split url into array using "/"  as param 
		$parsedUrl = explode("/",filter_var(rtrim($targetUrl), FILTER_SANITIZE_URL));

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
		
		//Check if file of controller exist
		if(file_exists("./core/packages/controllers/".$parsedUrl[0].".php")){ 
			$this->set_UrlController($parsedUrl[0]);	
			unset($parsedUrl[0]);
			//Check if Method Exists on selected Controller
			if(isset($parsedUrl[1]) &&  Method_Exists(new $this->url_controller($this->hotelConection),$parsedUrl[1]) && strtolower($parsedUrl[1]) != "default"){
				$this->set_UrlMethod($parsedUrl[1]);
				unset($parsedUrl[1]);
				//Get all parameters from the rest of URL if method exist
				$method = new ReflectionMethod($this->get_UrlController(), $this->get_UrlMethod());
				//Check if numbers of parameters passed are equal number of args of function(View)
				if ($method->getNumberOfParameters()== count($parsedUrl)){
					$params = $parsedUrl ? array_values($parsedUrl): [];
					$this->set_UrlParams($params);
				}else{
					$this->set_UrlController("Not_Found");	
					$this->set_UrlMethod("default");	
				}
			}else{
				if(isset($parsedUrl[1]) && !Method_Exists(new $this->url_controller($this->hotelConection),"default") || isset($parsedUrl[1]) && strtolower($parsedUrl[1]) == "default" || !isset($parsedUrl[1]) && !Method_Exists(new $this->url_controller($this->hotelConection),"default")){
					$this->set_UrlController("Not_Found");					
					unset($parsedUrl[1]);
				}
			}
		}else{
			$this->set_UrlController("Not_Found");	
			unset($parsedUrl[0]);
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