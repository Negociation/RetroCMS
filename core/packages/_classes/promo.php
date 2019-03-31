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

// Class: Habbo
// Desc: All Promo Data

class Promo{
	
	protected $promoId;
	protected $promoImage;
	protected $promoStatus;
	protected $promoText;
	protected $promoUrls = [];
	protected $promoLabels = [];	
	
	public function __construct(){
		$this->promoId = 0;
		$this->promoText = "<span class='lang-promo-notfound'>Nenhuma noticia foi Encontrada, tente novamente mais tarde!</span>";
		$this->promoImage = "./c_images/album144/breaking_news2.gif";
		$this->promoStatus = 1;
		$this->promoLabels[1] = 'Hotel';
		$this->promoUrls[1] = './client';
	}

	/** DAO CONSTRUCT **/
	public function constructObject($promoId,$promoImage,$promoText,$promoLabels,$promoUrls,$promoStatus){
		$this->promoId = $promoId;
		$this->promoImage = $promoImage;
		$this->promoText = $promoText;
		$this->promoStatus = $promoStatus;
		$this->promoLabels = $promoLabels;
		$this->promoUrls = $promoUrls;
		
	}	
	
	/** GETS **/
	public function get_Id(){
		return $this->promoId;
	}
	
	public function get_Image(){
		return $this->promoImage;
	}
	
	public function get_Text(){
		return $this->promoText;
	}
	
	public function get_ButtonStatus($id){
		if (isset($this->promoLabels[$id-1]) && $this->promoLabels[$id-1] != 'none'){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_ButtonLabel($id){
		if(isset($this->promoLabels[$id-1])){
			return $this->promoLabels[$id-1];
		}else{
			return false;
		}
	}
	
	public function get_ButtonUrl($id){
		if(isset($this->promoUrls[$id-1])){
			return $this->promoUrls[$id-1];
		}else{
			return false;
		}
	}
	
	
}
?>