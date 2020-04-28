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


// Class: Hotel
// Desc:  Plain OLD CLR for Hotel 

namespace CLR;

final class Page{
	
	protected $pageTitle;
	protected $pageStatus;
	protected $pageController;
	protected $pageUrl;
	protected $pageIcon;
	protected $pageTranslate;
	

	//Default Construct Method
    function __construct(){
		$this->pageTitle = 'TESTE';
		$this->pageController = 'Index';
		$this->pageTranslate = "home";
		$this->pageStatus = 1;
		$this->pageUrl = "";
		$this->pageIcon = "c_images/navi_icons/tab_icon_01_home.gif";
	
	}
	
	/* GETS */
	
	public function get_pageTitle(){
		return $this->pageTitle;
	}
	
	public function get_pageTranslate(){
		return $this->pageTranslate;
	}
	
	public function get_pageIcon(){
		return $this->pageIcon;
	}

	public function get_pageStatus(){
		return $this->pageStatus;
	}
	
	public function get_pageController(){
		return $this->pageController;
	}
	
	public function get_pageUrl(){
		return $this->pageUrl;
	}

}

?>