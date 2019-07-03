if (window.Prototype) {
	// patch html comments and evalScripts
	Prototype.ScriptFragment = '(?:<script.*?>\\s*(?:<!--)*)((\n|\r|.)*?)(?:<\/script>)';

	// from <http://www.vivabit.com/bollocks/2006/06/21/a-dom-ready-extension-for-prototype>
	Object.extend(Event, {
		_domReady : function() {
			if (arguments.callee.done) return;
			arguments.callee.done = true;
			if (this._timer) clearInterval(this._timer);
			this._readyCallbacks.each(function(f) { f() });
			this._readyCallbacks = null;
		},
		onDOMReady : function(f) {
			if (!this._readyCallbacks) {
				var domReady = this._domReady.bind(this);
				if (document.addEventListener) document.addEventListener("DOMContentLoaded", domReady, false);
				/*@cc_on @*/
				/*@if (@_win32)
					var proto = "javascript:void(0)";
					if (location.protocol == "https:") proto = "//0";
					document.write("<script id=__ie_onload defer src=" + proto + "><\/script>");
					document.getElementById("__ie_onload").onreadystatechange = function() {
						if (this.readyState == "complete") domReady();
					};
				/*@end @*/
				if (/WebKit/i.test(navigator.userAgent)) {
					this._timer = setInterval(function() {
						if (/loaded|complete/.test(document.readyState)) domReady();
					}, 10);
				}
				Event.observe(window, 'load', domReady);
				Event._readyCallbacks =  [];
			}
			Event._readyCallbacks.push(f);
		}
	});

	Ajax.Responders.register({
	  onCreate: function(request, transport) {
	  	var sc = Cookie.get("JSESSIONID");
	  	if (sc) {
		    if (typeof request.options.requestHeaders == 'object') {
		      request.options.requestHeaders["X-App-Key"] = sc;
		    } else {
		      request.options.requestHeaders = { "X-App-Key" : sc };
		    }
	    }
	  }
	});
}
	
var Cookie = {
	set: function(name, value, daysToExpire) {
		var expire = '';
		if (daysToExpire != undefined) {
			var d = new Date();
			d.setTime(d.getTime() + (86400000 * parseFloat(daysToExpire)));
			expire = '; expires=' + d.toGMTString();
		}
		return (document.cookie = escape(name) + '=' + escape(value || '') + '; path=/' + expire);
	},
	get: function(name) {
		var cookie = document.cookie.match(new RegExp('(^|;)\\s*' + escape(name) + '=([^;\\s]*)'));
		return (cookie ? unescape(cookie[2]) : null);
	},
	erase: function(name) {
		var cookie = Cookie.get(name) || true;
		Cookie.set(name, '', -1);
		return cookie;
	},
	accept: function() {
		if (typeof navigator.cookieEnabled == 'boolean') {
			return navigator.cookieEnabled;
		}
		Cookie.set('_test', '1');
		return (Cookie.erase('_test') === '1');
	}
};

var openedHabbo;

function openHabbo(link) {
    openedHabbo = _openHabboWindow(link.href, (link.target || "_blank"));
    if (_isHabboPopupOpen()) { openedHabbo.focus(); return false; } else { return true; }
}

function openOrFocusHabbo(link) {
	var targetUrl = (link.href ? link.href : link)
	var win = openEmptyHabboWindow("client");
	var isHabboClient = false;
	try { isHabboClient = (win.habboClient && win.document.habboLoggedIn == true); } catch(error) {}
	if (isHabboClient) {
		win.focus();
		if (win.updateHabboCount) {
			win.updateHabboCount($('topbar-count').innerHTML);
		}
	} else {
		win.location.href=targetUrl;
		win.focus();
	}
}

function _openHabboWindow(url, target) { return window.open(url, target, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=740,height=597"); }
function openEmptyHabboWindow(target) { return _openHabboWindow('', target); }

function _isHabboPopupOpen() { return openedHabbo && !openedHabbo.closed && openedHabbo.focus; }

function roomForward(link, roomId, roomType) {
	var isHabboClient = false;
	try { isHabboClient = window.habboClient; } catch(error) {}
	if (isHabboClient) {
		window.location.href=link.href;
		return;
	}

	if (document.habboLoggedIn) {
	    new Ajax.Request(habboReqPath + "/components/roomNavigation",
	    {
	        method: "get",
	        parameters: "roomId=" + roomId + "&roomType=" + roomType + "&move=true"

	    }, false);
    }

    openOrFocusHabbo(link);
}

function resizeWin() {
	if (!document.all || screen.height > 600) {
		if (document.all) {
			document.all["client-topbar"].style.display = "block";
		} else if (document.getElementById) {
			document.getElementById("client-topbar").style.display = "block";
		}
	}
	if (window.opener != null) {
		var pageSize = getPageSize();
		if (document.all) {
			if (typeof document.body.style.maxHeight == "undefined") { pageSize[0] = 720; pageSize[1] += 20; } // IE 6
			else { pageSize[0] = 750; pageSize[1] += 20; } // IE 7
		}
		window.resizeTo(pageSize[0], pageSize[1]);
		window.setTimeout(function() {
			var newSize = getPageSize();
			window.resizeBy(newSize[0]-newSize[2], newSize[1]-newSize[3]);
		}, 500);
	}
}

var ScriptLoader = {
	
	loaded: [],
	callbacks: [],
	
	load: function(scriptName, options) {
		if (!options) { options = {}; }
		
		if (!ScriptLoader.loaded[scriptName]) {
			var headEl = document.getElementsByTagName("head")[0];         
			var scriptEl = document.createElement('script');
			scriptEl.type = "text/javascript";
			scriptEl.src = habboStaticFilePath + "/js/" + scriptName + ".js";
			if (options.callback) {
				ScriptLoader.callbacks[scriptName] = options.callback;
				//Event.observe(newScript, (document.all ? "readystatechange" : "load"), function(e) { ScriptLoader.notify(scriptName, e); });
			}
			headEl.appendChild(scriptEl);
		} else if (options.callback) {
			options.callback();
		}
	}, 
	
	notify: function(scriptName, e) {
		ScriptLoader.loaded[scriptName] = true;
		if (ScriptLoader.callbacks[scriptName]) { ScriptLoader.callbacks[scriptName](e); }
	}
	
}

var currentPromo = 0;
function showPromo(num) {
	if (num != currentPromo) {
		$("promoimage").innerHTML = promoPages[num].image;
		$("promotext-content").innerHTML = promoPages[num].text;
		var listEl = $("promolinks-list");
		$A(listEl.childNodes).each(function(el) {
			el.parentNode.removeChild(el);
		});
		promoPages[num].links.each(function(link) {
			listEl.appendChild(document.createElement("li")).innerHTML = link;
		});

		var i = 0;
		$A($("promoheader-selectors").childNodes).each(function(node) {
			if (node.nodeName == "LI") {
				if (i == num) node.firstChild.className = "selected";
				else node.firstChild.className = "";
				i++;
			}
		});

		currentPromo = num;
	}
}


function validatorAddError(element, name, message, errorBoxId) {
	var errorBoxId = errorBoxId || "process-errors";
	var errorcontent = $(errorBoxId + "-content");
	errorcontent.appendChild(document.createTextNode(message));
	errorcontent.appendChild(document.createElement("br"));
	$(errorBoxId).style.display = "block";
}

function validatorBeforeSubmit(errorBoxId) {
	var errorBoxId = errorBoxId || "process-errors";
	$A($(errorBoxId + "-content").childNodes).each(function(el) { el.parentNode.removeChild(el); });
	$(errorBoxId).style.display = "none";
}

// for registration wizard
var backClicked = false;

function hijaxLinks(componentId, action, targetId) {
	var component = $(componentId);
	var target = (targetId) ? $(targetId) : component;
	var links = component.getElementsByTagName('a');
	for (var i = 0; i < links.length; i++) {
		var link = links[i];
	    if (Element.hasClassName(link, "hijaxTarget")) {
			link.onclick = function() {
				new Ajax.Updater(target, action + getParameters(this), {
					onComplete : function() {
					   	hijaxLinks(componentId, action, targetId);
					},
					evalScripts : true
				});
				return false;
			}			
		}
	}
}

function getParameters(obj) {
	if (obj.name) { return obj.name; }
	else { return ""; }
}

var FormHijax = {

	hijax: function(componentId, action, jump) {
		var component = $(componentId);
		
		var forms = component.getElementsByTagName('form');
		for (var i = 0; i < forms.length; i++) {
			var f = forms[i];
			f.onsubmit = function() {
				FormHijax.disableSubmit(this);
				new Ajax.Updater(componentId, action, {
					postBody: FormHijax.cleanup(Form.serialize(this), componentId),
					onComplete : function() {
						FormHijax.hijax(componentId, action);
						if (jump) location.hash = componentId;
					},
					evalScripts : true				
				});
				return false;
			}		
		}
	}, 
	
	disableSubmit: function(form) {
		var elements = Form.getInputs(form, "submit");
		for (var i = 0; i < elements.length; i++) {
			elements[i].disabled = 'true';
		}
	}, 
	
	cleanup: function(query, componentId) {	
		var params = query.replace("&amp;", "&").split("&");
	    var queryComponents = new Array();
	    queryComponents.push("componentId=" + componentId);
		for (var i = 0; i < params.length; i++) {
			var keyValue = params[i].split('=');
			var newKey = keyValue[0].replace(componentId + "_", "");
			if (newKey != keyValue[0]) {
				queryComponents.push(newKey + "=" + keyValue[1]);	
			}
		}
		return queryComponents.join('&');
	}
	
}

function showOverlay(clickCallback, progressText) {
	var pageSize = getPageSize();
	var overlay = $("overlay");
	overlay.style.display = "block";
	overlay.style.height = pageSize[1] + "px";
	try {
		var topWidth = Element.getDimensions("top").width;
		if (topWidth > pageSize[2]) { overlay.style.minWidth = topWidth + "px"; }
	} catch(ex) {}
	overlay.style.zIndex = "9000";

	if (progressText) {
		var progress = overlay.parentNode.insertBefore(Builder.node("div", { id:"overlay_progress" }, [
			Builder.node("p", [ Builder.node("img", { src:habboStaticFilePath+"/images/progress_habbos.gif", alt:progressText }) ]),
			Builder.node("p", progressText)
		]), overlay.nextSibling);
		var dim = Element.getDimensions(progress);
		var x = 0, y = 0;

		x = Math.round(pageSize[2] / 2) - Math.round(dim.width / 2);
		if (x < 0) { x = 0; }
		y = getViewportScrollY() + (Math.round(pageSize[3] / 2) - Math.round(dim.height / 2));
		if (y < 0) { y = 0; }

		progress.style.left = x + "px";
		progress.style.top = y + "px";
	}

	if (clickCallback) {
		Event.observe($("overlay"), "click", function(e) { clickCallback(); }, false);
		if (progressText) { Event.observe($("overlay_progress"), "click", function(e) { clickCallback(); }, false); }
	}
}

function hideOverlay() {
	if ($("overlay_progress")) { Element.remove($("overlay_progress")); }
	var overlay = $("overlay");
	overlay.style.zIndex = "9000";
	overlay.style.display = "none";
}

function moveOverlay(zIndex) {
	$("overlay").style.zIndex = zIndex;
	if ($("overlay_progress")) { $("overlay_progress").style.zIndex = zIndex; }
}

function hideOverlayIfMacFirefox() {
	/* detecting firefox on mac, hiding the overlay to tackle render bug */
	var c_os = navigator.platform;
	var c_ua = navigator.appName;
	if ((c_os=="Mac" || c_os=="MacIntel" || c_os=="MacPPC") && (c_ua=="Netscape" || c_ua=="Mozilla" || c_ua=="Firefox")) {
		hideOverlay();
	}
}

// From Lightbox by Lokesh Dhakar - http://www.huddletogether.com
// Core code from - quirksmode.org
// Edit for Firefox by pHaez
function getPageSize(){

	var xScroll, yScroll;

	if (window.innerHeight && window.scrollMaxY) {
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}

	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}

	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else {
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}

	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)
	return arrayPageSize;
}

function getQueryParamValue(searchKey) {
	if (window.location.search) {
		var query = window.location.search.substring(1);
		var params = query.split('&');
		for (var i = 0; i < params.length; i++) {
			var pos = params[i].indexOf('=');
			if (pos > 0) {
				var key = params[i].substring(0, pos);
				if (key == searchKey) { return params[i].substring(pos + 1); }
			}
		}
	}
	return null;
}

function ensureOpenerIsLoggedOut() {
	try {
	if (window.opener != null && window.opener.document.habboLoggedIn != null) {
		if (window.opener.document.habboLoggedIn == true) {
			window.opener.location.reload();
		}
	}
	} catch(error) {}
}

function ensureOpenerIsLoggedIn() {
	try {
	if (window.opener != null) {
		if(window.opener.document.logoutPage != null && window.opener.document.logoutPage == true) {
			window.opener.location.href="/";
		} else
		if(window.opener.document.habboLoggedIn != null && window.opener.document.habboLoggedIn == false) {
			window.opener.location.reload();
		}
	}
	} catch(error) {}
}

function clearOpener() {
	if (window.opener && window.opener.openedHabbo) { window.opener.openedHabbo = null; }
}

function closePurchase(e) {
	if (e) Event.stop(e);
	Element.remove("purchase_dialog");
	hideOverlay();
}

function showPurchaseResult(productCode) {
    $("single-confirmation-button-area").innerHTML = getProgressNode();
    new Ajax.Request(
		habboReqPath + "/furnipurchase/purchase_ajax",
		{ method: "post", parameters: "product="+encodeURIComponent(productCode)+"&webwork.token.name=webwork.token&webwork.token"+"="+document.getElementsByName("webwork.token").item(0).value, onComplete: function(req, json) {
   			if ($("purchase_dialog")) Element.remove("purchase_dialog");
			moveOverlay("92");
            if (!$("purchase_result")) {
                var resultDialog = createDialog("purchase_result", "", "9003", 0, -1000);
			    appendDialogBody(resultDialog, req.responseText, true);
			    moveDialogToCenter(resultDialog);
            }
		} }
	);
}

function closePurchaseResult() {
   	if ($("purchase_result")) Element.remove("purchase_result");
    if ($("purchase_dialog")) Element.remove("purchase_dialog");
    if ($("group_purchase_form")) Element.remove("group_purchase_form");
    hideOverlay();

   	// update credits tab
   	creditsUpdated = false;
}

var currentTab = "myhabbo";
var timer = null;
function switchTab(tabName) {
	if (timer) { window.clearTimeout(timer); }
	if (tabName != currentTab) {
		$(currentTab).className = "";
		$(currentTab + "-content").className = "tabmenu-inner";
		$(tabName).className = "selected";
		$(tabName + "-content").className = "tabmenu-inner selected"
		currentTab = tabName;
		return true;
	}
	return false;
}
function fadeTab(tabName) { timer = window.setTimeout("switchTab('" + tabName + "')", 1500); }
function lockCurrentTab() { if (timer) { window.clearTimeout(timer); } }

var creditsUpdated = false;
var creditsUpdateOn = false;
function updateCredits() {
	if (!creditsUpdated && !creditsUpdateOn) {
		creditsUpdateOn = true;
		document.getElementById('credits-status').innerHTML = getProgressNode();
		setTimeout(function(){ new Ajax.Updater("credits-status", habboReqPath + "/topbar/credits", { onComplete: function() { creditsUpdateOn = false; }, evalScripts: true });}, 500);
		creditsUpdated = true;
		setTimeout(function(){ creditsUpdated = false; },50000)
	}
}
var habboClubUpdated = false;
var habboClubUpdateOn = false;
function updateHabboClub() {
	if (!habboClubUpdated && !habboClubUpdateOn) {
		habboClubUpdateOn = true;
		document.getElementById('habboclub-status').innerHTML = getProgressNode();
		setTimeout(function(){ new Ajax.Updater("habboclub-status", habboReqPath + "/topbar/habboclub", { onComplete: function() { habboClubUpdateOn = false; }, evalScripts : true }); }, 500);
		habboClubUpdated = true;
	}
}

function updateHabboCreditAmounts(newAmount) {
	var elements = document.getElementsByClassName('habbocredits');
	elements.each(function(element) {
		element.update(newAmount);
	});
}

function createDialog(dialogId, header, dialogZIndex, dialogLeft, dialogTop, exitCallback, tabs) {
	if (!dialogId) return;
	var overlay = $("overlay");
	var headerBar = [Builder.node("div", [ Builder.node("h3", [ Builder.node("span", header) ]) ])];
	if (exitCallback) {
		var exitButton = Builder.node("a", {href:"#", className:"dialog-grey-exit"}, [
			Builder.node("img", {src:habboStaticFilePath+"/images/dialogs/grey-exit.gif", width:12, height:12, alt:""})
		]);
		Event.observe(exitButton, "click", exitCallback, false);
		headerBar.push(exitButton);
	}
	var childNodes = [];
	childNodes.push(Builder.node("div", {className:"dialog-grey" + (tabs ? "tab" : "") + "-top dialog-grey-handle"}, headerBar));
	if (tabs) {
		var tabContent = Builder.node("div", {className:"dialog-greytab-tabs-content"});
		tabContent.innerHTML = tabs + "<div class=\"clear\"></div>";
		childNodes.push(Builder.node("div", {className:"dialog-greytab-tabs"}, [ tabContent ]));
		childNodes.push(Builder.node("div", {className:"clear"}));
		childNodes.push(Builder.node("div", {className:"dialog-greytab-tabs-bottom"}, [ Builder.node("div") ]));
	}
	childNodes.push(Builder.node("div", {className:"dialog-grey" + (tabs ? "tab" : "") + "-content"}, [
		Builder.node("div", {id:dialogId+"-body", className:"dialog-grey" + (tabs ? "tab" : "") + "-body"}, [ Builder.node("div", {className:"clear"}) ])
	]));
	childNodes.push(Builder.node("div", {className:"dialog-grey" + (tabs ? "tab" : "") + "-bottom"}, [ Builder.node("div") ]));
	var dialog = overlay.parentNode.insertBefore(Builder.node("div", {id:dialogId, className:"dialog-grey" + (tabs ? " dialog-greytab" : "")}, childNodes), overlay.nextSibling);
	dialog.style.zIndex = (dialogZIndex || 9001);
	dialog.style.left = (dialogLeft || -1000) + "px";
	dialog.style.top = (dialogTop || 0) + "px";
	return dialog;
}

function showInfoDialog(dialogId, message, buttonText, buttonOnClick){
    showOverlay();
    var dialog = createDialog(dialogId, "", "9003");
    var link = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", buttonText) ]);
    appendDialogBody(dialog, Builder.node("p", {id:dialogId+"content"}));
    $(dialogId+"content").innerHTML = message;
    appendDialogBody(dialog, Builder.node("p", [ link ]));
    if(buttonOnClick == null){
      Event.observe(link, "click", function(e) { Event.stop(e); Element.hide($(dialogId)); hideOverlay();}, false);
    }
    else{
        Event.observe(link, "click", buttonOnClick, false);
    }
  
    moveOverlay("9002");
	moveDialogToCenter(dialog);
}

function showConfirmDialog(message) {
    var options = Object.extend({
      dialogId: "confirm-dialog",
      buttonText: "OK",
      cancelButtonText: "Cancel",
      headerText: "Are you sure?",
      okHandler: Prototype.emptyFunction,
      cancelHandler: Prototype.emptyFunction
    }, arguments[1] || {});
    
    showOverlay();
    var dialog = createDialog(options.dialogId, options.headerText, "9003");
    if (options.width) {
    	dialog.style.width = options.width;
    }
    appendDialogBody(dialog, Builder.node("p", {id: options.dialogId+"content"}));
    $(options.dialogId+"content").innerHTML = message;
    var link = Builder.node("a", { href:"#", className:"colorlink dialogbutton" }, [ Builder.node("span", options.buttonText) ]);
    var cancelLink = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", options.cancelButtonText) ]);
    appendDialogBody(dialog, Builder.node("div", [ cancelLink, link ]));
    Event.observe(link, "click", function(e) { Event.stop(e); options.okHandler();}, false);  
    Event.observe(cancelLink, "click", function(e) { Event.stop(e); Element.remove($(options.dialogId)); hideOverlay(); options.cancelHandler();}, false);  
    moveOverlay("9002");
	moveDialogToCenter(dialog);
	makeDialogDraggable(dialog);
	return dialog;
}

function appendDialogBody(dialog, bodyEl, useInnerHTML) {
	var el = $(dialog);
	if (el) { var el2 = $(el.id + "-body"); (useInnerHTML) ? el2.innerHTML += bodyEl : el2.insertBefore(bodyEl, el2.lastChild); if (bodyEl.innerHTML) bodyEl.innerHTML.evalScripts(); }
}

function setDialogBody(dialog, bodyEl) {
	var el = $(dialog);
	if (el) {
		var el2 = $(el.id + "-body");
		el2.innerHTML = bodyEl;
	}
}

function makeDialogDraggable(dialog) {
    if (typeof Draggable != 'undefined') {
        new Draggable(dialog, {
            handle:'dialog-grey-handle',
            starteffect:Prototype.emptyFunction,
            endeffect:Prototype.emptyFunction,
            zindex:9100
        });
    }
}

function moveDialogToView(dialog, e, coordinates) {
	var dim = Element.getDimensions(dialog);
	var pageSize = getPageSize();
	var x = 0, y = 0;

	if (coordinates) {
		x = coordinates.x;
		y = coordinates.y;
	} else if (e) {
		x = Event.pointerX(e) - 35;
		y = Event.pointerY(e) - 15;
	}

	if (x + dim.width > pageSize[2]) { x = pageSize[2] - dim.width; }
	if (x < 0) { x = 0; }
	if (y + dim.height > pageSize[3]) { y = pageSize[3] - dim.height; }
	if (y < 0) { y = 0; }

	dialog.style.left = x + "px";
	dialog.style.top = y + "px";
}

function moveDialogToCenter(dialog) {
	var topPos;
	
	if (document.getElementById('top') != null){
		topPos =  Position.cumulativeOffset($("top"));
	}else{
		topPos =  Position.cumulativeOffset($("process-header-content"));
	}

	var dim = Element.getDimensions(dialog);
	var pageSize = getPageSize();
	var x = 0, y = 0;

	x = Math.round(pageSize[2] / 2) - Math.round(dim.width / 2);
	if ($("ad_sidebar")) {
		var adPos = Position.cumulativeOffset($("ad_sidebar"));
		if (x + dim.width > adPos[0]) { x = adPos[0] - dim.width; }
	}
	if (x < 0) { x = 0; }
	y = getViewportScrollY() + 80;
	if (y + dim.height > pageSize[1]) { y = pageSize[1] - dim.height; }
	if (y < topPos[1]) { y = topPos[1] + 20; }

	dialog.style.left = x + "px";
	dialog.style.top = y + "px";
}

function moveDivToCenterOfDiv(innerDiv, outerDiv) {
	var innerDim = Element.getDimensions(innerDiv);
	var outerDim = Element.getDimensions(outerDiv);
	var outerPos = Position.cumulativeOffset(outerDiv);

	var x = 0, y = 0;
	x = outerPos[0] + Math.round((outerDim.width - innerDim.width) / 2);
	if (x < 0) { x = 0; }
	y = outerPos[1] + Math.round((outerDim.height - innerDim.height) / 2);
	if (y < 0) { y = 0; }

	innerDiv.style.left = x + "px";
	innerDiv.style.top = y + "px";
}

function getViewportScrollY() {
	var scrollY = 0;
	if (document.documentElement && document.documentElement.scrollTop) {
		scrollY = document.documentElement.scrollTop;
	}
	else if (document.body && document.body.scrollTop) {
		scrollY = document.body.scrollTop;
	}
	else if (window.pageYOffset) {
		scrollY = window.pageYOffset;
	}
	else if (window.scrollY) {
		scrollY = window.scrollY;
	}
	return scrollY;
};

function getProgressNode() {
	var div = Builder.node("div", { className:"progressbar" }, [ Builder.node("img", { src:habboStaticFilePath+"/images/progress_bubbles.gif", width:"29", height:"6", alt:"" }) ]);
	div.style.textAlign = "center";
	return Builder.node("p", [ div ]).innerHTML;
}

if (window.Prototype) {
	var imgDo = false, origImg = false, newImg = false;
	Event.observe(window, "load", function() {
		if (document.habboLoggedIn) { var el = $("myimage"); if (el) {
			Event.observe(document, "keydown", function(e) { if (e.keyCode == Event.KEY_UP) { imgDo = true; } }, false);
			Event.observe(document, "keyup", function(e) { if (imgDo) { imgDo = false; } }, false);
			Event.observe(el, "click", function(e) { if (imgDo) { if (!origImg) { origImg = el.src; if (!newImg) { new Ajax.Request(habboReqPath + "/topbar/myimage", { onSuccess: function(t) { newImg = t.responseText; $("myimage").src = newImg; } }); } else { el.src = newImg; } } else { el.src = origImg; origImg = false; }} }, false);
		}}
	}, false);
}

function addClientUnloadHook() {
	if (habboClient == true && determineSWVersion() != "undefined") {
		Event.observe(window, "unload", function () {
			new Ajax.Request(habboReqPath + "/account/unloadclient", { asynchronous : false });
		});
	}
}

function determineSWVersion () {
	if (navigator.mimeTypes && navigator.mimeTypes["application/x-director"] && navigator.mimeTypes["application/x-director"].enabledPlugin) {
		if (navigator.plugins && navigator.plugins["Shockwave for Director"] && (tVersionIndex = navigator.plugins["Shockwave for Director"].description.indexOf(".")) != - 1) {
			return navigator.plugins["Shockwave for Director"].description.substring(tVersionIndex-2, tVersionIndex+2);
		}
	} else  {
		try {
			var swControl = new ActiveXObject('SWCtl.SWCtl')
			if (swControl) {
				return swControl.ShockwaveVersion("");
			}
		} catch(e) {}
	}
	return "undefined";
}

function limitTextarea(id, maxLength, limitCallback) {
	new Form.Element.Observer($(id), .1, function(e) {
		var f = $(id);
		if (limitCallback) {
			limitCallback(f.value.length >= maxLength);
		}
		if (f.value.length > maxLength) {
			f.value = f.value.substring(0, maxLength);
		}
	});
}

/* habbo club subscription */
function closeSubscription(e) {
	if (e) {
		Event.stop(e);
	}
	if($("subscription_dialog")) {
		Element.remove("subscription_dialog");
	}
	if($("subscription_result")) {
		Element.remove("subscription_result");
	}
	hideOverlay();
}

function showSubscriptionResult(optionNumber,res_dialog_header) {
	new Ajax.Request(
		habboReqPath + "/myhabbo/habboclub_subscribe",
		{ method: "post", parameters: "optionNumber="+encodeURIComponent(optionNumber), onComplete: function(req, json) {
   			if ($("subscription_dialog")) Element.remove("subscription_dialog");
			var resultDialog = createDialog("subscription_result", res_dialog_header, "9003", 0, -1000, closeSubscription);
			appendDialogBody(resultDialog, req.responseText, true);
			moveDialogToCenter(resultDialog);
		} }
	);
	Element.remove("hc_confirm_box");
}

function closeSubscriptionResult() {
   	if ($("subscription_dialog")) {
   		Element.remove("subscription_dialog");
   		hideOverlay();
   	}
   	if ($("subscription_result")) {
   		Element.remove("subscription_result");
   		hideOverlay();
		new Ajax.Updater($("hc_ajax_content"), habboReqPath + "/habboclub/habboclub_meter_update", {asynchronous:true});
   	}
}

function closeSubscriptionError() {
	Element.remove("subscription_result");
	hideOverlay();
}
/* \habbo club subscription */

var HabboCounter = {
	init : function(refreshFrequency) {
		this.refreshFrequency = refreshFrequency;
		this.start();
		this.lastValue = "0";
	},

	start : function() {
		new PeriodicalExecuter(this.onTimerEvent.bind(this), this.refreshFrequency);
	},

	onTimerEvent : function() {
		new Ajax.Request("/components/updateHabboCount", {
			onSuccess: function(response, obj) {
				if (obj && typeof obj.habboCountText != "undefined" && this.lastValue != obj.habboCountText) {
					new Effect.Fade('habboCountUpdateTarget', { duration: 0.5, afterFinish : function() {
						Element.update('habboCountUpdateTarget', obj.habboCountText);
						new Effect.Appear('habboCountUpdateTarget', { duration: 0.5 });
					}});
					this.lastValue = obj.habboCountText;
				}
			}
		});
	}

}

function showGroupPurchaseResult(productCode, name, description, dialog_title) {
    $("group-confirmation-button-area").innerHTML = getProgressNode();
    new Ajax.Request(
		habboReqPath + "/grouppurchase/purchase_ajax",
		{ method: "post", parameters: "product="+encodeURIComponent(productCode)+"&name="+encodeURIComponent(name)+"&description="+encodeURIComponent(description)+"&webwork.token.name=webwork.token&webwork.token"+"="+document.getElementsByName("webwork.token").item(0).value, onComplete: function(req, json) {
   			if ($("group_purchase_form")) { Element.remove("group_purchase_form");}
            if ($("group_purchase_confirmation")) Element.remove("group_purchase_confirmation");
            if (!$("group_purchase_result")) {
                var resultDialog = createDialog("group_purchase_result", dialog_title, "9003", 0, -1000, closeGroupPurchase);
			    appendDialogBody(resultDialog, req.responseText, true);
			    moveDialogToCenter(resultDialog);
            }
		} }
	);
}

function showGroupPurchaseConfirmation(productCode, dialog_title) {
    new Ajax.Request(
		habboReqPath + "/grouppurchase/purchase_confirmation",
		{ method: "post", parameters: "product="+encodeURIComponent(productCode)+"&name="+encodeURIComponent($("group_name").value)+"&description="+encodeURIComponent($("group_description").value),
            onComplete: function(req) {
                var groupPurchaseDialog = $('group_purchase_form');
                if (req.responseText.indexOf('purchase-group-form-id') < 0) {
                    moveOverlay('9002');
                    groupPurchaseDialog = createDialog("group_purchase_confirmation", dialog_title, "9003", 0, -1000, cancelGroupPurchase);
                }
                setDialogBody(groupPurchaseDialog, req.responseText);
                moveDialogToCenter(groupPurchaseDialog);
            }

        }
	);
}

function closeGroupPurchase() {
    if ($("group_purchase_result")) {Element.remove("group_purchase_result");}
    if ($("group_purchase_confirmation")) Element.remove("group_purchase_confirmation");
    moveOverlay('9000');
}

function cancelGroupPurchase() {
   	closeGroupPurchase();
    if ($("group_purchase_form")) Element.remove("group_purchase_form");
    hideOverlay();
}

function validateGroupElements(fieldId, maxLength, message) {
    var groupElement = $(fieldId);
    if (groupElement.value.length >= maxLength) {
       groupElement.value = groupElement.value.substring(0, maxLength);
       $(fieldId+"_message_error").innerHTML = message;
       $(fieldId+"_message_error").style.display = "block";
    } else {
       $(fieldId+"_message_error").innerHTML = "";
       $(fieldId+"_message_error").style.display = "none";
    }

    if ($(fieldId+"-counter")) {
        var charatersLeft = maxLength - groupElement.value.length;
        $(fieldId+"-counter").value = charatersLeft;
    }
}

/* Pocket and Mobile Highscores token functionality */

function closeAuthTokenDialog() {
	if ($("auth-token-dialog")) Element.remove("auth-token-dialog");
    hideOverlay();
}

function confirmPhoneNumber() {
	var mobile = $F('msisdn_value');
	new Ajax.Updater("auth-token-dialog-body",
		habboReqPath + "/authtoken/numberconfirm",
		{ method: "post", parameters:
		"mobile="+encodeURIComponent(mobile) }
		);
}

function generatePocketAuthToken(origin,title,send_btn,body_txt,important_txt,msisdn_field_header,numberformat,confirm_btn) {
		if(origin=="adminPage") {
			var number_field = "<input type=\"text\" style=\"width:250px;\" id=\"msisdn_value\"><br />";
			var authTokenDialog = createDialog("auth-token-dialog", title, "9003", 0, -1000, closeAuthTokenDialog);
				appendDialogBody(authTokenDialog, "<p>" + body_txt + "</p>", true);
				appendDialogBody(authTokenDialog, "<b>" + msisdn_field_header + "</b><br />", true);
				appendDialogBody(authTokenDialog, number_field, true);
				appendDialogBody(authTokenDialog, numberformat, true);
			var confirm_btn = "<br clear=\"all\" /><a href=\"#\" class=\"colorlink orange dialogbutton\" onclick=\"confirmPhoneNumber(); return false;\"><span>" + confirm_btn + "</span></a><br clear=all>";
				appendDialogBody(authTokenDialog, confirm_btn, true);
				appendDialogBody(authTokenDialog, important_txt, true);
				moveDialogToCenter(authTokenDialog);
			showOverlay();
		}
		if(origin=="componentPage") {
			var mobile = $F('msisdn_value');
				var authTokenDialog = createDialog("auth-token-dialog", title, "9003", 0, -1000, closeAuthTokenDialog);
					moveDialogToCenter(authTokenDialog);
					showOverlay();
					confirmPhoneNumber();
		}
}

function generateMobileAuthToken(origin,title) {
	 	if(origin=="adminPage") {
			new Ajax.Request(
				habboReqPath + "/authtoken/genmobiletoken",
				{ method: "post", onComplete: function(req, json) {
				var authTokenDialog = createDialog("auth-token-dialog", title, "9003", 0, -1000, closeAuthTokenDialog);
				appendDialogBody(authTokenDialog, req.responseText, true);
				moveDialogToCenter(authTokenDialog);
				showOverlay();
			} }
		);
	 	}
	 	if(origin=="componentPage") {
	 		new Ajax.Updater("highscores_token_ajax_content",
			habboReqPath + "/authtoken/gencmobiletoken");
	 	}
}

function sendMobileNumber(mobile) {
	new Ajax.Updater("auth-token-dialog-body",
		habboReqPath + "/authtoken/genpockettoken",
		{ method: "post", parameters: "mobile="+encodeURIComponent(mobile) });
}

function removeAuthToken(tokenid) {
    new Ajax.Updater("auth-token-dialog-body",
		habboReqPath + "/authtoken/removetoken",
		{ method: "post", parameters: "tokenId="+encodeURIComponent(tokenid) });
}

function confirmTokenRemoval(title,msg,tokenid,removetitle,canceltitle) {
	var btn1 = "<a href=\"#\" class=\"colorlink noarrow dialogbutton\" onclick=\"closeAuthTokenDialog(); return false;\"><span>" + canceltitle + "</span></a>";
	var btn2 = "<br clear=\"all\" /><a href=\"#\" class=\"colorlink noarrow dialogbutton\" onclick=\"removeAuthToken(" + tokenid + "); return false;\"><span>" + removetitle + "</span></a>";
	var theDiv = "<div class=\"clear\"></div>";
	var authTokenDialog = createDialog("auth-token-dialog", title, "9003", 0, -1000, closeAuthTokenDialog);
		appendDialogBody(authTokenDialog, msg, true);
		appendDialogBody(authTokenDialog, btn1, true);
		appendDialogBody(authTokenDialog, btn2, true);
		appendDialogBody(authTokenDialog, theDiv, true);
		moveDialogToCenter(authTokenDialog);
		showOverlay();
}

function closeTokenDialogAndReload() {
	closeAuthTokenDialog();
	document.location.reload();
}

var ClientMessageHandler = {

	call: function(msg, data) {
      if (msg) {
        var msgArray = msg.split(/,+/).without("").uniq();
        msgArray.each(function(msg) {
          if (msg.length > 0 && typeof ClientMessageHandler[msg] == "function") {
          	try {
          		ClientMessageHandler[msg].apply(null, [data]);
          	} catch(e) {}
          }
        });
      }
	},

    googleClientKeepAlive : null,
    googleLastTrackingCall : 0,

	google: function(data) {
	  if (!ClientMessageHandler.googleClientKeepAlive) {
	    ClientMessageHandler.googleClientKeepAlive = window.setInterval(function() {
	      var now = new Date().getTime();
	      if (ClientMessageHandler.googleLastTrackingCall < now - 15 * 60 * 1000) {
	        ClientMessageHandler.google("/client/keepalive");
	        ClientMessageHandler.googleLastTrackingCall = now;
	      }
	    }, 10 * 60 * 1000);
      }
      var cleanedData = data.replace(/^(.*?\/){3}/, "/").replace(/^\/client(?=\/)/, "");
      if (window.urchinTracker) { urchinTracker("/client" + cleanedData); }
	},

    nielsen: function(data){
      ClientMessageHandler.url("https://web.archive.org/web/20130701113007/http://secure-dk.imrworldwide.com/cgi-bin/m?ci=Habbohotel&cg=0&si=" + data);
    },

	customjs: function(data) {
		if (ClientMessageHandler.custom) { ClientMessageHandler.custom(data); }
	},

	url: function(data) {
		var img = new Image(1,1); img.src = data;
	},

	hello: function(data) {
		alert(data);
	}
};

var TagHelper = Class.create();
/**
 * Adds a tag to the account's tag collection.
 */
TagHelper.addAvatarTag = function(tagName, accountId) {

    accountId = encodeURIComponent(accountId);

    new Ajax.Request("/myhabbo/tag/add", {
        parameters: "accountId=" + accountId + "&tagName=" + encodeURIComponent(tagName),
        onSuccess: function(transport) {
            var tagMsgCode = transport.responseText;

            if(tagMsgCode=="valid" && $('profile-tags-status-field')) {
                new Ajax.Updater("profile-tag-list", "/myhabbo/tag/list", {
                    parameters: "tagMsgCode=" + encodeURIComponent("valid") + "&accountId=" + accountId
                });
            }

            TagHelper.errorMessage(tagMsgCode);

        }
    });
}
/**
 * Confirm dialog for adding a tag from a list.
 */
TagHelper.confirmAddAvatarTag = function(tagName, accountId) {
    showConfirmDialog(this.options.messageText, {
        okHandler : function() {
            TagHelper.addAvatarTag(tagName, accountId);
            Element.remove($(this.dialogId));
            hideOverlay();
        },
        headerText: this.options.headerText,
        buttonText: this.options.buttonText,
        cancelButtonText: this.options.cancelButtonText,
        dialogId: "add-tag-dialog"
    });
}
/**
 * Adds a tag to the group's tag collection.
 */
TagHelper.addGroupTag = function(tagName, groupId) {

    groupId = encodeURIComponent(groupId);

    new Ajax.Request("/myhabbo/tag/addgrouptag", {
        parameters: "groupId=" + groupId + "&tagName=" + encodeURIComponent(tagName),
        onSuccess: function(transport) {
            var tagMsgCode = transport.responseText;

            if(tagMsgCode=="valid" && $('profile-tags-status-field')) {
                new Ajax.Updater("profile-tag-list", "/myhabbo/tag/listgrouptags", {
                    parameters: "tagMsgCode=" + encodeURIComponent("valid") + "&groupId=" + groupId
                });
            }

            TagHelper.errorMessage(tagMsgCode);
        }
    });
}
/**
 * Displays the inline widget error box depending on the tag message code.
 */
TagHelper.errorMessage = function(code) {
    var msgField = $('profile-tags-status-field');

    if (msgField) {
        var limitTagMsg = $('tag-limit-message');
        var invalidTagMsg = $('tag-invalid-message');
        if(code=="invalidtag") {
            msgField.style.display='block';
            invalidTagMsg.style.display='block';
            limitTagMsg.style.display='none';
        }
        else if(code=="taglimit") {
            msgField.style.display='block';
            limitTagMsg.style.display='block';
            invalidTagMsg.style.display='none';
        }
        else if(code=="valid") {
            msgField.style.display='none';
        }
    }
}
/**
 * Sets localization texts for the tag adding dialog. Must provide texts for headerText, messageText, buttonText,
 * cancelButtonText and tagLimitText.
 */
TagHelper.setTexts = function(options) {
    TagHelper.options = options;
}
/**
 * Handles mouse clicks on the tag listing.
 */
TagHelper.tagListClicked = function(e, loggedInAccountId) {
    var element = Event.element(e);
    if (element.className.indexOf('tag-add-link') >= 0) {
        var tagName = element.className.substring(element.className.lastIndexOf("-") + 1);
        Event.stop(e);
        TagHelper.addThisTagToMe(tagName, loggedInAccountId);
    }
}

TagHelper.addThisTagToMe = function(tagName, loggedInAccountId) {
    new Ajax.Request("/myhabbo/tag/add", {
        parameters: "accountId=" + encodeURIComponent(loggedInAccountId) + "&tagName=" + encodeURIComponent(tagName),
        onSuccess: function(transport) {
            var tagMsgCode = transport.responseText;
            if (tagMsgCode=="valid") {
                var elementList = document.getElementsByClassName('tag-add-link-' + tagName);
                $$('img.tag-add-link-' + tagName).each(function(element) {
                    var sourceImg = $('tag-img-added').cloneNode(true);
                    element.src = sourceImg.src;
                    element.className = sourceImg.className;
                    element.onmouseover = null;
                    element.onmouseout = null;
                });
            } else if (tagMsgCode=="taglimit") {
                showInfoDialog("tag-error-dialog", TagHelper.options.tagLimitText, TagHelper.options.buttonText, null);
            }
        }
    });
}

TagHelper.matchFriend = function() {
    var friend = $F('tag-match-friend');
    if (friend) {
        new Ajax.Updater($('tag-match-result'), habboReqPath + '/tag/match', {
            parameters: { friendName: friend },
            onComplete: function(r) {
                var elem = $("tag-match-value");
                if (elem) {
                    var result = parseInt(elem.innerHTML, 10);

                    if (typeof TagHelper.CountEffect == 'undefined') {
                        $('tag-match-value-display').innerHTML = result + " %";
                        Element.show('tag-match-slogan');
                    }
                    else {
                        var duration;
                        if (result > 0) {
                            duration = 1.5;
                        }
                        else {
                            duration = 0.1;
                        }
                        new TagHelper.CountEffect('tag-match-value-display', {
                            duration: duration,
                            transition: Effect.Transitions.sinoidal,
                            from: 0,
                            to: result,
                            afterFinish: function() {
                                Effect.Appear('tag-match-slogan', { duration: 1.0 });
                            }
                        });
                    }
                }

            }
        });
    }
}

/**
 * Animated counter.
 */
if (typeof Effect != 'undefined') {
    TagHelper.CountEffect = Class.create();
    Object.extend(Object.extend(TagHelper.CountEffect.prototype, Effect.Base.prototype), {
      initialize: function(element) {
        this.element = $(element);
        if(!this.element) throw(Effect._elementDoesNotExistError);

        var options = Object.extend({
          from: 0,
          to:   100,
          suffix: " %"
        }, arguments[1] || {});
        this.start(options);
      },
      update: function(position) {
        this.element.innerHTML = Math.floor(position) + this.options.suffix;
      }
    });
}

/* Tag search button observer */
if($("search_query")) {
	Event.observe("search_query", "keypress", function(e) {
		if (e.keyCode == Event.KEY_RETURN) {
			document.tag_search_form.submit();
    	}
	});
}

/* Tag Fight component */

var TagFight = Class.create();
TagFight.init = function() {
	if($F('tag1') && $F('tag2')) {
    	TagFight.start();
    } else {
    	return false;
    }
}
TagFight.start = function() {
    $("fightForm").style.display = "none";
    $("fightanimation").src = habboStaticFilePath + "/images/tagfight/tagfight_loop.gif";
    $("fight-process").style.display = "block";
    setTimeout("TagFight.run()",3000);
}
TagFight.run = function() {
	new Ajax.Updater("fightResults", '/tag/tag_fight_ajax',
    { 	method: "post",
    	parameters: "tag1=" + $F('tag1') + "&tag2=" + $F('tag2'),
    	onComplete: function() {
    		$("fight-process").style.display = "none";
    		$("fightForm").style.display = "none";
    	}
    }
    );
}
TagFight.newFight = function() {
    $("fight-process").style.display = "none";
    $("fightForm").style.display = "block";
    $("fightResultCount").style.display = "none";
    $("fightanimation").src = habboStaticFilePath + "/images/tagfight/tagfight_start.gif";
    $("tag1").value = "";
    $("tag2").value = "";
}

/* Export */

function setPreview(selectedoption, template, targetDiv) {
	new Ajax.Updater(targetDiv,
			habboReqPath + "/components/roomlink_export_update",
			{ method: "post", parameters: "roomId="+selectedoption+"&template="+template });
}
