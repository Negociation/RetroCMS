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

// + Extension Name: languageManager
// - Credits: m.tiago
// - Version: 1.0.0
// - Minimum Version: 0.9.0

class languageManager extends extensionTemplate{

	protected $extensionDirectory = './web/includes/extensions/languageManager/webcontent';
	protected $loadedLanguages = [];
	
	public function __construct(){
		
		//Handle Directories
		$handle = is_dir($this->extensionDirectory) ? opendir($this->extensionDirectory) : false;

		//If file loaded
		if($handle != false){
			while (false !== ($directoryFolder = readdir($handle))) {
				if ($directoryFolder != "." && $directoryFolder != "..") {
					if(file_exists($this->extensionDirectory.'/'.$directoryFolder.'/infoContent.ini') && file_exists($this->extensionDirectory.'/'.$directoryFolder.'/habboweb.js') && file_exists($this->extensionDirectory.'/'.$directoryFolder.'/install.js')){
						array_push($this->loadedLanguages,$directoryFolder);
					}else{
						array_push($this->errorsMessage,'Sorry, some missing files content when loading the language "'.$directoryFolder.'"');
					}
				}
			}
			closedir($handle);
		}
	}
	
	public function get_languageInfo($language){
		 return parse_ini_file($this->extensionDirectory.'/'.$language.'/infoContent.ini', true);
	}
	
	public function get_loadedLanguages(){
		return $this->loadedLanguages;
	}
	
	
}
?>