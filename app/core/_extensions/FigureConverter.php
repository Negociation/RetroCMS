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


// Class: FigureConverter
// Desc:  Habbo Figure Converter extension Class

namespace Extension;

final class FigureConverter extends \Template\Extension{
	
	
	//Default Construct Method
    function __construct(){	
		self::init();
	}

	public function init(){
		/*
		if(file_exists($ini = self::extensionDirectory.substr(strrchr(__CLASS__, "\\"), 1).'/about.ini')){
			$parse = parse_ini_file($ini, true);
			$this->extensionName = $parse['data']['extensionName'];
			$this->extensionPublisher = $parse['data']['extensionPublisher'];
			$this->extensionVersion = $parse['data']['extensionVersion'];
		}
		*/
	}
	
	
	public function onWindowLoaded(){
	}
	
	public function onAjaxRequestCompleted(){
	}

	public function onAjaxRequestInit(){
	}
	
	public function get_ExtensionScripts(){
		return $this->extensionScripts;
	}
	
	public function get_ConvertedImage($oldImage){
		$start = 0;
		$parts = array();
		$increase_start = array(0, 5, 10, 15, 20);

		for($x = 0; $x < 10; $x++) {
			$length = (in_array($start, $increase_start)) ? 3 : 2;
			$parts[$x] = substr($oldImage, $start, $length);
			$start = $start + $length;
		}

		$buildFigure = 'hr-'.$parts[0].'-'.self::convertOldColorToNew("hr", $parts[0], $parts[1]);
		$buildFigure .= '.hd-'.$parts[2].'-'.self::convertOldColorToNew("hd", $parts[2], $parts[3]);
		$buildFigure .= '.ch-'.$parts[8].'-'.self::convertOldColorToNew("ch", $parts[8], $parts[9]);
		$buildFigure .= '.lg-'.$parts[4].'-'.self::convertOldColorToNew("lg", $parts[4], $parts[5]);
		$buildFigure .= '.sh-'.$parts[6].'-'.self::convertOldColorToNew("sh", $parts[6], $parts[7]);
		$buildFigure .= self::takeCareOfHats($parts[0], self::convertOldColorToNew("hr", $parts[0], $parts[1]));
		return $buildFigure;
	}

	
	function getOldColorFromFigureList($iPart, $iSprite, $iColorIndex){
		$iColorIndex = (int) ltrim($iColorIndex, "0");
		$string = file_get_contents($this->extensionDirectory."FigureConverter/oldfiguredata.json");
		if ($string === false){
			echo "error";
		}

		$json_a = json_decode($string, true);
		if ($json_a === null) {
			echo "error";
		}
		foreach($json_a["colors"] as $genderIndex =>  $gender) {
			foreach($gender as $parts) {
				foreach($parts as $part => $partDefinition) {
					if($part == $iPart) {
						foreach($partDefinition as $spriteIndex => $spriteDefinition) {

							foreach($spriteDefinition as $sprite) {
								$spriteId = $sprite["s"];
								$spriteColors = $sprite["c"];

								if($spriteId == $iSprite) {
									return $spriteColors[$iColorIndex-1];
								}
							}
						}
					}

				}
			}
		}
	}

	private function convertOldColorToNew($iPart, $iSprite, $iColorIndex) {
		$iColorIndex = (int) ltrim($iColorIndex, "0");
		$string = file_get_contents($this->extensionDirectory."FigureConverter/figuredata.json");
		if ($string === false) {
			echo "error";
		}

		$json_a = json_decode($string, true);
		if ($json_a === null) {
			echo "error";
		}
		$color = self::getOldColorFromFigureList($iPart, $iSprite, $iColorIndex);

		foreach ($json_a["palette"] as $paletteIndex => $paletteValue) {
			foreach ($paletteValue as $colorIndex => $colorValue) {
				if($color == $colorValue["color"]) {
					return $colorIndex;
				}
			}
		}
	}

	private function takeCareOfHats($spriteId, $colorId) {
		switch ($spriteId) {
			// REggae
			case 120:
				return '.ha-1001-0';
			// Cap
			case 525:
			case 140:
				return '.ha-1002-' . $colorId;
			// Comfy beanie
			case 150:
			case 535:
				return '.ha-1003-' . $colorId;
			//Fishing hat
			case 160:
			case 565:
				return '.ha-1004-' . $colorId;
			// Bandana
			case 570:
				return '.ha-1005-' . $colorId;
			// Xmas beanie
			case 585:
			case 175:
				return '.ha-1006-0';
			// Xmas rodolph
			case 580:
			case 176:
				return '.ha-1007-0';
			// Bunny
			case 590:
			case 177:
				return '.ha-1008-0';
			// Hard Hat
			case 595:
			case 178;
				return '.ha-1009-1321';
			// Boring beanie
			case 595:
				return '.ha-1010-' . $colorId;
			// HC Beard hat
			case 801:
				return '.hr-829-' . $colorId.'.fa-1201-62.ha-1011-' . $colorId;

			// HC Beanie
			case 800:
			case 810:
				return '.ha-1012-' . $colorId;
			// HC Cowboy Hat
			case 802:
			case 811:
				return '.ha-1013-' . $colorId;
			default:
				return '.ha-0-' . $colorId;
		}
	}
}