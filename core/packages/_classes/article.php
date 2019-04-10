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
// Desc: All Article Data

class Article extends ClassTemplate{
	
	protected $articleId;
	protected $articleDate;
	protected $articleTitle;
	protected $articleContent;
	protected $articleDesc;
	protected $articleAuthor;
	protected $articleStatus;
	
	public function __construct(){
		$this->articleId = 0;
		$this->articleDate = date('m-d-Y h:i:s a', time());
		$this->articleTitle = "<span class='lang-article-notfound-title'>Noticia não Encontrada</span>";
		$this->articleDesc = "<span class='lang-article-notfound-desc'>Oops, parece que algo inesperado aconteceu, tente novamente mais tarde!</span>";
		$this->articleContent = "<span class='lang-article-notfound-content'>Por favor, verifique sua base de dados e tente novamente...</span>";
		$this->articleStatus = 1;		
	}

	/** DAO CONSTRUCT **/
	public function constructObject($articleId,$articleDate,$articleTitle,$articleDesc,$articleContent,$articleStatus,$articleAuthor){
		$this->articleId = $articleId;
		$this->articleDate = $articleDate;
		$this->articleTitle = $articleTitle;
		$this->articleDesc = $articleDesc;
		$this->articleContent = $articleContent;
		$this->articleStatus = $articleStatus;
		$this->articleAuthor = $articleAuthor;
	}	
	
	public function get_Id(){
		return $this->articleId;
	}
	
	public function get_Title(){
		return $this->articleTitle;
	}
	
	public function get_Content(){
		return $this->articleContent;
	}
	
	public function get_Date(){
		return $this->articleDate;
	}
	
	public function get_Desc(){
		return $this->articleDesc;
	}
	
	public function get_Author(){
		return $this->articleAuthor;
	}
	
	public function get_Status(){
		return $this->articleStatus;
	}	
	
}
?>