<?php


class Figure{
	private $hr;
	private $hd;
	private $ch;
	private $lg;
	private $sh;
	
	public function __construct($Figure,$params){ 
		$this->setFigure($this->splitFigure($Figure));
		$this->fixColorData();
	}
	
	
	
	
	private function splitFigure($Figure){
		$startPoint = 0;
		$splitFigure = array();
		for($i = 0; $i < 5; $i++) {
			array_push($splitFigure,substr($Figure, $startPoint, 3));
			$startPoint = $startPoint + 5;
		}
		return $splitFigure;
	}
	
	private function fixColorData(){
		$oldXml = simplexml_load_file('http://localhost/oldxml.xml');
		$newXml = simplexml_load_file('http://localhost/newxml.xml');
	}
	
	private function setFigure($splitFigure){
		$this->hr = $splitFigure[0];
		$this->hd = $splitFigure[1];	
		$this->ch = $splitFigure[2];
		$this->lg = $splitFigure[3];	
		$this->sh = $splitFigure[4];
	}
	
	public function getFigure(){
		return 'hr-'.$this->hr.'-00.hd-'.$this->hd.'-00.ch-'.$this->ch.'-00.lg-'.$this->lg.'-00.sh-'.$this->sh;
	}
		
}
?>
