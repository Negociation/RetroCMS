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

class News{
	protected $news_Id;
	protected $news_Date;
	protected $news_Title;
	protected $news_Desc;
	protected $news_Content;
	protected $news_Status;
	
	public function __construct(){	
	
	}
	
	public function constructObject($News_Id,$News_Date,$News_Title,$News_Desc,$News_Content,$News_Status){
		$this->news_Id = $News_Id;
		$this->news_Date = $News_Date;
		$this->news_Title = $News_Title;
		$this->news_Desc = $News_Desc;
		$this->news_Content = $News_Content;
		$this->news_Status = $News_Status;
	}
	
	public function get_Id(){
		return $this->news_Id;
	}
	
	public function get_Title(){
		return $this->news_Title;
	}
	
	public function get_Desc(){
		return $this->news_Desc;
	}
	
	public function get_Status(){
		return $this->news_Status;
	}
	
}


?>
