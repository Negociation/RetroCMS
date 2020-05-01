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


// Class: Index Controller
// Desc: Index Controller

namespace Controller;

final class Habbo_Imaging extends \Template\Controller{
	
	//Construct Method
    function __construct($hotelConection){
		//Call the super-class constructor
		parent::__construct($hotelConection); 
		
	}
	
	function avatar(){
		   header("Content-type: image/png");

			if(isset($_GET['figure'])) {
				echo file_get_contents('http://habbo.com/habbo-imaging/avatarimage');
			}
	}
	
	function badge(){
		if(isset($_GET['figure'])) {
			echo'<img src="http://habbo.com/habbo-imaging/avatarimage?figure=""">';
		}
	}

}

?>