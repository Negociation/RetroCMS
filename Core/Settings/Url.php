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
		echo $targetUrl;
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

}
?>