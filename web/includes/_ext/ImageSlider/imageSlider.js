//////////////////////////////////////////////////////////////
//                         RetroCMS                         //
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]                    //
// Development Thread: goo.gl/nwzdZo                        //
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine )                    //
// Branch: Public (Unstable)                                //
// Compatibility Version(s): [r14,r15,r16,r17]              //
//////////////////////////////////////////////////////////////
				
var sliderIndexes = {};
var slideElements = [];
var teste = [];
function initializeSlider(){
	

		if(Object.keys(sliderIndexes).length > 0){		
			Object.keys(sliderIndexes).forEach(function (value, index){	
				if(document.getElementById(value)){
					setInterval(
						function(){
							if(sliderIndexes[value][2].length > 0){
								document.getElementById(value).src =  sliderIndexes[value][2][sliderIndexes[value][1]].src;
								document.getElementById(value).parentElement.href =  sliderIndexes[value][2][sliderIndexes[value][1]].href;
								console.log(sliderIndexes[value][2][sliderIndexes[value][1]].href);
								sliderIndexes[value][1] = (sliderIndexes[value][1] >= sliderIndexes[value][2].length - 1) ? 0 : sliderIndexes[value][1] + 1;
							}						
						}
					,sliderIndexes[value][0]);
				}	
			});
		}
	
}
	
	
	
		

function newSliderTarget(name,interval){
	sliderIndexes[name] = [interval,0,[]];
}


function newSliderElement(sliderElement){
		if(sliderIndexes.hasOwnProperty(sliderElement[0])){
			sliderIndexes[sliderElement[0]][2].push({src:sliderElement[1],href:sliderElement[2]});
			
		}

}



			
