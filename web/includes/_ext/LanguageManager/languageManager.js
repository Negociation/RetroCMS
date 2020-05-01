﻿//////////////////////////////////////////////////////////////
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


function loadLanguageData(language){
	//Validate HTML Content (x-lang TAG)
	jLibrary('x-lang').each(function(){  
		let constantElements = [];
		//If Id exists and a respective Language Tag 
		if( this.hasAttribute("id") && typeof(window["LANG_"+language][this.getAttribute("id")]) !== 'undefined'){
			if ( this.hasAttribute("constant")){ constantElements = this.getAttribute("constant").split(','); }
				let replacementText = window["LANG_"+language][this.getAttribute("id")];
				constantElements.each(function(value){
					replacementText = replacementText.replace('%data%',value);
				});	
				
				//Replace with the new Language Markeup
				jLibrary(this).html(replacementText);
		}
	});
	
	//Validate HTML Inputs Value
	jLibrary('input').each(function(){  
		if( this.hasAttribute("id") && typeof(window["LANG_"+language][this.getAttribute("id")]) !== 'undefined'){
			let replacementText = window["LANG_"+language][this.getAttribute("id")];
			//Replace with the new Language Markeup
			jLibrary(this).val(replacementText);
		}
	});
	
	//Validate HTML Option Inputs
	jLibrary('option').each(function(){  
		if( this.hasAttribute("id") && typeof(window["LANG_"+language][this.getAttribute("id")]) !== 'undefined'){
			let replacementText = window["LANG_"+language][this.getAttribute("id")];
			//Replace with the new Language Markeup
			jLibrary(this).text(replacementText);
		}
	});	
}

function initializeLanguageManager(){
	loadLanguageData('EN');
}