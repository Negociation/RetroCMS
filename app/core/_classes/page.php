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
	protected $pageId;
	protected $pageTitle;
	protected $pageStatus;
	protected $pageController;
	protected $pageUrl;
	protected $pageIcon;
	protected $pageTranslate;
	

	//Default Construct Method
    function __construct($pageId,$pageTitle,$pageTranslate,$pageController,$pageStatus,$pageUrl,$pageIcon){
		$this->pageId = $pageId;
		$this->pageTitle = $pageTitle;
		$this->pageController = $pageController;
		$this->pageTranslate = $pageTranslate;
		$this->pageStatus = $pageStatus;
		$this->pageUrl = $pageUrl;
		$this->pageIcon = $pageIcon;
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