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
	if (obj.name) {
		return obj.name;
	} else {
		return "";
	}
}

function hijaxForms(componentId, action, jump) {
	var component = $(componentId);
	
	var forms = component.getElementsByTagName('form');
	for (var i = 0; i < forms.length; i++) {
		var f = forms[i];
		f.onsubmit = function() {
			disableSubmit(this);
			new Ajax.Updater(componentId, action, {
				postBody: cleanup(Form.serialize(this), componentId),
				onComplete : function() {
					hijaxForms(componentId, action);
					if (jump) location.hash = componentId;
				},
				evalScripts : true				
			});
			return false;
		}		
	}
}

function disableSubmit(form) {
	var elements = Form.getInputs(form, "submit");
	for (var i = 0; i < elements.length; i++) {
		elements[i].disabled = 'true';
	}
}

function cleanup(query, componentId) {	
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
	
