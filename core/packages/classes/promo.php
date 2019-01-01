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

class Promo{
	protected $promo_Id;
	protected $promo_Image;
	protected $promo_Status;
	protected $promo_Text;
	protected $promo_Urls = [];
	protected $promo_Labels = [];

	
	public function __construct(){	
	
	}
	
	
	public function constructObject($Promo_Id,$Promo_Image,$Promo_Text,$Promo_Labels,$Promo_Urls,$Promo_Status){
		$this->promo_Id = $Promo_Id;
		$this->promo_Image = $Promo_Image;
		$this->promo_Text = $Promo_Text;
		$this->promo_Status = $Promo_Status;
		$this->promo_Labels = $Promo_Labels;
		$this->promo_Urls = $Promo_Urls;
		
	}	
	
	public function get_Id(){
		return $this->promo_Id;
	}
	
	public function get_Image(){
		return $this->promo_Image;
	}
	
	public function get_Text(){
		return $this->promo_Text;
	}
	
	public function get_ButtonStatus($id){
		if ($this->promo_Labels[$id-1] != 'None'){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_ButtonLabel($id){
		return $this->promo_Labels[$id-1];
	}
	
	public function get_ButtonUrl($id){
		return $this->promo_Urls[$id-1];
	}
}


?>
