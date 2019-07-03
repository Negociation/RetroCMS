var selectedLang = null;

function closeSelector(e){
	if (e) Event.stop(e);
	Element.remove("selector_dialog");
	hideOverlay();
}


function showLanguageDialog() {
		
		var dialog = createDialog("selector_dialog",'SELECIONE O SEU IDIOMA', 9001, 0, -1000, closeSelector);
		appendDialogBody(dialog, "<p style=\"text-align:center\"><img src=\"" + habboStaticFilePath +"/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>", true);
		moveDialogToCenter(dialog);
		showOverlay();
		new Ajax.Request(habboReqPath+"/ajax/languageSelector",{ 
			method: "post",
			onComplete: function(req, html) {
				setDialogBody(dialog, req.responseText); 
				var getDivId = document.getElementById("loadedLanguages");
				var images = getDivId.getElementsByTagName("a");
				var imglist =  Array.prototype.slice.call(images);
				imglist.forEach(setSelector);
			} 
		});
}


function setLanguageResult(lang) {
	new Ajax.Request(
		habboReqPath + "/ajax/languageResult",
		{ method: "post", parameters: "userLang="+encodeURIComponent(lang), onComplete: function(req, html) {
			if ($("selector_dialog")) Element.remove("selector_dialog");
			var resultDialog = createDialog("selector_dialog", "Status", "9003", 0, -1000, closeSelector);
			appendDialogBody(resultDialog, req.responseText, true);
			moveDialogToCenter(resultDialog);
			setCurrentLanguage(lang);
		} }
	);		


}

function loadCurrentLanguage(){
	if (localStorage.getItem("userSelectedLanguage") === null){
		new Ajax.Request(habboReqPath + "/api/hotel",{ method: "get", onComplete: function(req, json) {
			 var hotelObj = JSON.parse(req.responseText);
			 setCurrentLanguage(hotelObj.hotel_language);
			 loadCurrentLanguage();
		}
		});		
	}else{
		j('span[class^="lang"]').each(function(){  
			var LangVar = (this.className).replace('lang-','');
			var Text = window["WORDS_"+localStorage.getItem("userSelectedLanguage")][LangVar];
			j(this).text(Text);
		});
		if(document.getElementById("languageIcon")){
			//document.getElementById("languageIcon").src = habboStaticUrl+"/c_images/hlanguages/icon_"+lang+".png";  
		}
		
		if(document.getElementById("footerIcon")){
			//document.getElementById("footerIcon").src = habboStaticUrl+"/c_images/hlanguages/footer_"+lang+".png";  
		}
		
		j('option[id^="lang"]').each(function(){
			var LangVar = (this.id).replace('lang-','');
			var Text = window["WORDS_"+localStorage.getItem("userSelectedLanguage")][LangVar];
			j(this).text(Text);        
		});
					  
		j('input[id^="lang"]').each(function(){
			var LangVar = (this.id).replace('lang-','');
			var Text = window["WORDS_"+localStorage.getItem("userSelectedLanguage")][LangVar];
			j(this).val(Text);
		});
		
		set_languageInterface(localStorage.getItem("userSelectedLanguage"));
	}
}

function selectLanguage(sender,lang){
	var getDivId = document.getElementById("loadedLanguages");
	var images = getDivId.getElementsByTagName("img");
	var imglist =  Array.prototype.slice.call(images);
	imglist.forEach(cleanSelector);
	if(lang != null){
		document.getElementById('flag_'+sender.id).src = habboReqPath+"/c_images/album1401/flag_"+sender.id.toLowerCase()+".gif";
		selectedLang = lang;
	}
		
}

function cleanSelector(value, index, array){
	if(value.name =="flag"){
		document.getElementById(value.id).src = habboReqPath+"/c_images/album1401/"+value.id.toLowerCase()+"_off.gif";
	}
}

function setSelector(value, index, array){
	if(value.id !== ''){
		if(value.name == localStorage.getItem("userSelectedLanguage")){
			document.getElementById('flag_'+value.id).src = habboReqPath+"/c_images/album1401/flag_"+value.id.toLowerCase()+".gif";
		}
	}
}

function setCurrentLanguage(userLanguage){
	if(userLanguage !== null && userLanguage != ''){
		window.localStorage.setItem('userSelectedLanguage', userLanguage);
		set_languageInterface(userLanguage);
		loadCurrentLanguage();
	}
}
	
function set_languageInterface(userLanguage){
	if(document.getElementById("languageIcon") !== null ){		  
		document.getElementById("languageIcon").src = habboStaticFilePath+"/images/languages/header/icon_"+userLanguage.toLowerCase()+".png";  
	}
	
	if(document.getElementById("footerIcon") !== null ){		  
		document.getElementById("footerIcon").src = habboStaticFilePath+"/images/languages/footer/footer_"+userLanguage.toLowerCase()+".png";  
	}
}
