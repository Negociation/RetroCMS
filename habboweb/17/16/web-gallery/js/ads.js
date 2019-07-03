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


/*  Advertsement Top */
				
var Images_Top = new Array();
var Links_Top = new Array();				
var curOffsetT = 0;

function Ads_Top(){
	for (var i = 0; i < arguments.length; i++){
		Images_Top[i] = document.createElement('img');
		Images_Top[i].setAttribute('src',arguments[i]);
	};
}
				
/*  Advertsement Middle */
				
var Images_Middle = new Array();
var Links_Middle = new Array();
var curOffsetM = 0;
				
function Ads_Middle(){
	for (var i = 0; i < arguments.length; i++){
		Images_Middle[i] = document.createElement('img');
		Images_Middle[i].setAttribute('src',arguments[i]);
	};
}
				
/*  Advertsement Right */			
				
var Images_Right = new Array();
var Links_Right = new Array();
var curOffsetR = 0;
	
function Ads_Right(){
	for (var i = 0; i < arguments.length; i++){
		Images_Right[i] = document.createElement('img');
		Images_Right[i].setAttribute('src',arguments[i]);
	};
}

/* Load All ADS */

function advertisementLoad(){
	if(document.getElementById('TopLink')){
		document.getElementById('TopLink').href = Links_Top[0];
		document.getElementById('TopImage').src = Images_Top[0].src;
	
		setInterval(
			function() {
				document.getElementById('TopLink').href = Links_Top[curOffsetT];
				document.getElementById('TopImage').src = Images_Top[curOffsetT].src;
				curOffsetT = (curOffsetT >= Images_Top.length-1) ? 0 : curOffsetT + 1;
			}
		,10000);
	}
	
	if(document.getElementById('MiddleLink')){			
		document.getElementById('MiddleLink').href = Links_Middle[0];
		document.getElementById('MiddleImage').src = Images_Middle[0].src;
			
		setInterval(
			function() {
				document.getElementById('MiddleLink').href = Links_Middle[curOffsetM];
				document.getElementById('MiddleImage').src = Images_Middle[curOffsetM].src;
				curOffsetM = (curOffsetM >= Images_Middle.length-1) ? 0 : curOffsetM + 1;
			}
		,20000);
	}
	
	if(document.getElementById('RightLink')){
		document.getElementById('RightLink').href = Links_Right[0];
		document.getElementById('RightImage').src = Images_Right[0].src;	
		
		setInterval(
			function() {
				document.getElementById('RightLink').href = Links_Right[curOffsetR];
				document.getElementById('RightImage').src = Images_Right[curOffsetR].src;
				curOffsetR = (curOffsetR >= Images_Right.length-1) ? 0 : curOffsetR + 1;
			}
		,25000);
	}	
	
}