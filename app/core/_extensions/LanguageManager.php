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

namespace Extension;

final class LanguageManager extends \Template\Extension{
	
	private $loadedLanguages = [];
	private $loadedDirs = [];
	
	//Default Construct Method
    function __construct(){
		$this->init();
	}
	
	
	public function init(){
		if(file_exists($ini = $this->extensionDirectory.substr(strrchr(__CLASS__, "\\"), 1).'/about.ini')){
			$parse = parse_ini_file($ini, true);
			$this->extensionName = $parse['data']['extensionName'];
			$this->extensionPublisher = $parse['data']['extensionPublisher'];
			$this->extensionVersion = $parse['data']['extensionVersion'];
		}
		$this->loadLanguages();
		$this->set_ExtensionScripts(str_replace("\\","",strrchr(__CLASS__, "\\")));

	}
	
	public function onWindowLoaded(){
		
	}
	
	public function onAjaxRequestCompleted(){
		
	}

	public function onAjaxRequestInit(){
		
	}
	
	private function set_ExtensionScripts($dir){
		array_push($this->extensionScripts,$this->extensionDirectory.$dir.'/languageManager.js');
		foreach($this->loadedDirs as $languageLibrary){
			array_push($this->extensionScripts, $this->extensionDirectory.$dir.'/'.$languageLibrary.'/resourceLanguage.js');
		}
	}
	
	public function get_ExtensionScripts(){
		return $this->extensionScripts;
	}
	
	public function loadLanguages(){
		//Handle Directories
		$handle = is_dir($this->extensionDirectory) ? opendir($this->extensionDirectory.'/'.str_replace("\\","",strrchr(__CLASS__, "\\"))) : false;

		//If file loaded
		if($handle != false){		
			foreach(array_slice(scandir($this->extensionDirectory.'/LanguageManager/'),2) as $dir){
				if (is_dir($this->extensionDirectory.'/LanguageManager/'.$dir)){
					if(file_exists($ini = $this->extensionDirectory.'/LanguageManager/'.$dir.'/infoContent.ini') && file_exists($this->extensionDirectory.'/LanguageManager/'.$dir.'/resourceLanguage.js')){
						array_push($this->loadedDirs,$dir);
						$parse = parse_ini_file($ini, true);
						array_push($this->loadedLanguages,$parse['languageParams']['languageAcronomy']);
					}
					
				}
			}
			closedir($handle);
		}
	}
}

?>