<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Url{	

	//URL Deafult Variables
	protected $url_controller;
	protected $url_method;
	protected $url_param = [];
	protected $url_parsed = [];
	protected $hotelConection;

	//Construct Method
	public function __construct($HotelConection){
		$this->hotelConection = $HotelConection;
		
		//Initialize
		$this->url_controller = "Index";
		$this->url_method = "default";	
		if (isset($_GET["origin"])){
			$this->urlValidate();
		}
	}
	
	
	public function urlValidate(){
		//If Url Exists 
		$this->url_parsed = explode("/",filter_var(rtrim($_GET["origin"]), FILTER_SANITIZE_URL));
		
		//Remove Index 1 if url ends with /
		if (isset($this->url_parsed[1]) && ($this->url_parsed[1] == "")){ 
			unset($this->url_parsed[1]);
		}
			
			
		//Special Friendly Cases
		switch(strtolower($this->url_parsed[0])){
			
			case "habboclient":
				$this->url_parsed[0] = "Account";
				$this->url_parsed[1] = "redirectlogin";
			$this->url_parsed[2] = "habboClient";
			break;

			case "habboclub":
				$this->url_parsed[0] = "Account";
				$this->url_parsed[1] = "redirectlogin";
				$this->url_parsed[2] = "habboClub";
				break;

			case "login":
				$this->url_parsed[0] = "Account";
				$this->url_parsed[1] = "login";
				break;
			
			case "logout":
				$this->url_parsed[0] = "Account";
				$this->url_parsed[1] = "Disconnected";
				break;
				
			case "home":
				if(isset($this->url_parsed[1]) && !isset($this->url_parsed[2]) ){
					$this->url_parsed[2] = $this->url_parsed[1];
					$this->url_parsed[1] = "Home"; 
				}else if (isset($this->url_parsed[1]) && isset($this->url_parsed[2]) && $this->url_parsed[2] == "id"){
					$this->url_parsed[2] = $this->url_parsed[1];
					$this->url_parsed[1] = "id";
				}else{
					$this->url_parsed[1] = "default";				  
				}
				break;
			
			case "groups":
				if(isset($this->url_parsed[1]) && isset($this->url_parsed[2]) && $this->url_parsed[2] == "id"){
				$this->url_parsed[2] = $this->url_parsed[1];
				$this->url_parsed[1] = "id";
				}else{
					if(!isset($this->url_parsed[1])){
					$this->url_parsed[1] = "default";				 
					}
				}
				break;
		}

	}
		
		
	public function urlLoad(){
		//Check if Controller File from URL exists
		if (count($this->url_parsed) != 0){
			if(file_exists("Core/Controllers/".$this->url_parsed[0].".php")){ 
				$this->url_controller = $this->url_parsed[0];
				unset($this->url_parsed[0]);
			}else{
				$this->url_controller = "404";	
				$this->url_method = "default";
			}
		}
		
		//Include Existing Controller
		require_once "Core/Controllers/".$this->url_controller.".php";	
		
		if ($this->url_controller == "404"){ 
			$this->url_controller = "Not_Found";
		}
		
		//Turning Variable Control into a Object 
		$this->url_controller = new $this->url_controller($this->hotelConection);
		
		//Check if Method from URL exists		
		if(isset($this->url_parsed[1]) && Method_Exists($this->url_controller,$this->url_parsed[1])){ 
			$this->url_method = $this->url_parsed[1];
			unset($this->url_parsed[1]);
		}else{
			if (isset($this->url_parsed[1]) || !Method_Exists($this->url_controller,'default')){
				//Include Error Controler
				$this->url_controller = "404";	
				require_once "Core/Controllers/".$this->url_controller.".php";
				$this->url_controller = "Not_Found";
				$this->url_controller = new $this->url_controller($this->hotelConection);
			}
		}
		
		//Get all parameters from the rest of URL
		if (isset($this->url_parsed)){
			$this->url_param = $this->url_parsed ? array_values($this->url_parsed): [];
		}
		
		//Call Function from Array
		call_user_func_array([$this->url_controller,$this->url_method],$this->url_param);
	}

}


?>
