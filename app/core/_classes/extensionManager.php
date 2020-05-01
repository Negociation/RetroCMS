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
use Extension;

abstract class ExtensionManager extends \Template\Shared{
	private static $extensionsName = [];
	private static $extensionsObject = [];
	private static $classDir;
	
	public static function init(){
		
		//Reset extension Array
		self::$extensionsName = [];

		//Get Dir
		self::$classDir = dirname(__DIR__, 1).'/_extensions';
		$handle = is_dir(self::$classDir) ? opendir(self::$classDir) : false;
		//If file loaded
		if($handle != false){
			foreach(array_slice(scandir(self::$classDir),2) as $classFile){
				array_push(self::$extensionsName,rtrim($classFile, ".php"));
			}
		}
	}
	
	public static function getExtensions(){
		return self::$extensionsName;
	}

	public static function loadExtension($name){	
		foreach(self::$extensionsName as $ext){
			if( strtolower($ext)== strtolower($name)){
				$ext =  'Extension\\'.$ext;
				self::$extensionsObject[$ext] = new $ext();
			}
		}
	}
	
	public static function loadAll(){
		foreach(self::$extensionsName as $ext){
			$ext =  'Extension\\'.$ext;
			self::$extensionsObject[$ext] = new $ext();
		}		
	}
	
	public static function getLoadedExtensions(){
		return self::$extensionsObject;
	}
}

?>