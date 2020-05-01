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


// Class: ControllerTemplate
// Desc: Default Template for Controllers


namespace Template;

abstract class Extension{
	
	protected $extensionName;
	protected $extensionPublisher;
	protected $extensionVersion;
	protected $extensionDirectory = 'web/includes/_ext/';
	protected $extensionScripts = [];
	
	
	public abstract function onWindowLoaded();
	
	public abstract function onAjaxRequestCompleted();

	public abstract function onAjaxRequestInit();

	public abstract function get_ExtensionScripts();	
}

?>