<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.1 ( Citrine ) 							//
// Branch: Public (Unstable)								//
//////////////////////////////////////////////////////////////

class Advertisement{
	protected $adv_Id;
	protected $adv_Image;	
	protected $adv_Status;
	protected $adv_Type;
	protected $adv_Url;
	
	public function __construct(){		
	}
	
	public function constructObject($Adv_Id,$Adv_Image,$Adv_Url,$Adv_Type,$Adv_Status){
		$this->adv_Id = $Adv_Id;
		$this->adv_Image = $Adv_Image;
		$this->adv_Status = $Adv_Status;
		$this->adv_Type = $Adv_Type;
		$this->adv_Url = $Adv_Url;

	}	
	
	public function get_Image(){
		return $this->adv_Image;
	}
	
	public function get_Url(){
						
		return "http://localhost";
	}
	
	public function get_Type(){
		return $this->adv_Type;
	}
	
	public function get_Status(){
		return $this->adv_Status;
	}
}


?>
