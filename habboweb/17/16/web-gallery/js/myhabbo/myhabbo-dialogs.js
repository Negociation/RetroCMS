Dialog = Class.create();
Dialog.prototype = {
    initialize: function(id) {
    	this.element = id;
    	this.observed = false;
    	this.observers = Array();
    },

    show: function() {
		if (this.element) {
	    	if (this.beforeShow) {
	    		this.beforeShow();
	    	}
			$(this.element).style.zIndex = 9001;
	    	Element.show(this.element);
	    	this.observeAll();
		}
    },

    dispose: function() {
		if (this.element) {
			if (this.beforeDispose) {
				this.beforeDispose();
			}
	    	Element.hide(this.element);
	    	this.stopObservingAll();
		}
    },

	clonePosition: function(el) {
		if (navigator.appVersion.match(/\bMSIE\b/)) {
			Position.clone(el, this.element, {setWidth: false, setHeight: false, offsetTop: -5,offsetLeft: -8});
		} else {
			Position.clone(el, this.element, {setWidth: false, setHeight: false, offsetTop: -5,offsetLeft: 0});
		}
	},

	cloneDialogPosition: function(dialog) {
		if (navigator.appVersion.match(/\bMSIE\b/)) {
			Position.clone(dialog.element, this.element, {setWidth: false, setHeight: false,offsetLeft: -8});
		} else {
			Position.clone(dialog.element, this.element, {setWidth: false, setHeight: false});
		}
	},

    observeAll: function () {
  	 	if (!this.observed) {
    		if (this.observers) {
    			for (var i=0; i < this.observers.length; i++) {
    				Event.observe(this.observers[i]["id"], 'click',
    					this.observers[i]["observer"], false);
    			}
    		}

    		this.observed = true;
    	}
    },

    bringToFront: function() {
    	if(this.element) {
    		baseelement = $(this.element);
    		baseelement.style.zIndex = 9999;
    	}
    },

    stopObservingAll: function() {
    	if (this.observed) {
    		if (this.observers) {
    			for (var i=0; i < this.observers.length; i++) {
    				Event.stopObserving(this.observers[i]["id"], 'click',
    					this.observers[i]["observer"], false);
    			}
    		}

    		this.observed = false;
    	}
    }
}

//-- Inappropriate content reporting -----------------------------------------------------------
var DialogManager = function() {
	
	// inner class
	var InappropriateContentReportDialog = Class.create();
	Object.extend(InappropriateContentReportDialog.prototype, Dialog.prototype);
	Object.extend(InappropriateContentReportDialog.prototype, {
		initialize: function(objectName) {		
			this.objectName = objectName;
			
			this.observers = Array();
			this.observers[0] = Array();
			this.observers[0]["id"] = objectName + "-report-report";
			this.observers[0]["observer"] = (function(e) {
				Event.stop(e);			
				if (!this.objectId) {
					return;
				}
				new Ajax.Request(
					habboReqPath + "/mod/add_" + objectName + "_report", {
						parameters: "objectId=" + this.objectId,
						onComplete: (function(req) {
							var resultDialog = "error";
							if (req.responseText == "SUCCESS") {
								resultDialog = "success";
							} else if (req.responseText == "SPAM") {
								resultDialog = "spam";
							}
							DialogManager.show(resultDialog, null, this.element, {setWidth: false, setHeight: false});
							this.dispose();
						}).bind(this)
					}
				);						
			}).bind(this);
			
			this.observers[1] = Array();
			this.observers[1]["id"] = objectName + "-report-cancel";
			this.observers[1]["observer"] = (function(e) {
				Event.stop(e);
				this.dispose();
			}).bind(this);
					
		},
		
		setObjectId: function(id) {
			this.objectId = id;
		},
	
		localizationAvailable: function(localizations) {
			this.templateParams = localizations;
			this.templateParams['id'] = this.objectName;
		},
		
		createElement: function() {
			if (!this.element) {
				this.element = Builder.build(new Template(this.DIALOG_TEMPLATE).evaluate(this.templateParams));
				var p = $("main-content");
				if (p) p.appendChild(this.element);
			}		
		},
			
		DIALOG_TEMPLATE : 
			'<div id="dialog-#{id}-report" class="menu">' + 
			'	<div class="menu-header">' + 
			'		<h3>#{title}</h3>' + 
			'	</div>' + 
			'	<div class="menu-body">' + 
			'		<div class="menu-content" id="#{id}-content">' +		 
			'	<div>#{message}</div>' +		
			'	<div>' + 	
			'	<div id="#{id}-report-cancel" class="button grey">' + 
			'		<div class="button-header"><div></div></div>' + 
			'		<div class="button-body">' + 
			'			<div class="button-content">#{btnCancelText}</div>' + 
			'		</div>' + 
			'	</div>' +
			'	<div id="#{id}-report-report" class="button grey">' + 
			'		<div class="button-header"><div></div></div>' + 
			'		<div class="button-body">' + 
			'			<div class="button-content">#{btnReportText}</div>' + 
			'		</div>' + 
			'	</div>' +
			'	</div>' + 			
			'			<div class="clear"></div>' + 
			'		</div>' + 
			'	</div>' + 
			'	<div class="menu-bottom"></div>' + 
			'</div>'	
	});
	
	ReportInfoDialog = Class.create();
	Object.extend(ReportInfoDialog.prototype, Dialog.prototype);
	
	Object.extend(ReportInfoDialog.prototype, {
		initialize: function(objectName) {
			this.objectName = objectName;
			this.observers = Array();
			this.observers[0] = Array();
			this.observers[0]["id"] = objectName + "-report-report";
			this.observers[0]["observer"] = (function(e) {
				Event.stop(e);
				this.dispose();
			}).bind(this);
		},
		
		localizationAvailable: function(localizations) {
			this.templateParams = localizations;
			this.templateParams['id'] = this.objectName;
		},
		
		createElement: function() {
			if (!this.element) {
				this.element = Builder.build(new Template(this.DIALOG_TEMPLATE).evaluate(this.templateParams));
				var p = $("main-content");
				if (p) p.appendChild(this.element);
			}		
		},
			
		DIALOG_TEMPLATE : 
			'<div id="dialog-#{id}-report" class="menu">' + 
			'	<div class="menu-header">' + 
			'		<h3>#{title}</h3>' + 
			'	</div>' + 
			'	<div class="menu-body">' + 
			'		<div class="menu-content" id="#{id}-content">' +		 
			'	<div>#{message}</div>' +		
			'	<div>' + 	
			'	<div id="#{id}-report-report" class="button grey">' + 
			'		<div class="button-header"><div></div></div>' + 
			'		<div class="button-body">' + 
			'			<div class="button-content">#{btnText}</div>' + 
			'		</div>' + 
			'	</div>' +
			'	</div>' + 			
			'			<div class="clear"></div>' + 
			'		</div>' + 
			'	</div>' + 
			'	<div class="menu-bottom"></div>' + 
			'</div>'	
		
	});	
	
	// private stuff
	var inited = false;
	var dialogs = {};
	var listeners = {}; 
	var messages = {};
	
	var showInternal = function(objectName, instanceId, targetEl, positionParams) {
		var dialog = get(objectName);
		if (dialog) {
			dialog.createElement();
			if (instanceId) {
				dialog.setObjectId(instanceId);
			}
			if (positionParams) {
				Position.clone(targetEl, dialog.element, positionParams);
			} else {
				dialog.clonePosition(targetEl);
			}
            if (positionParams) {
            	Position.clone(targetEl, dialog.element, positionParams);
            } else {
            	dialog.clonePosition(targetEl);
            }
			dialog.show();
            if (typeof isNotWithinPlayground != 'undefined' && isNotWithinPlayground(dialog.element)) {
              new Effect.Move(dialog.element,{ x: offsetToPlayground(dialog.element), y: 0, mode: 'relative', duration: 0.2});
            }
		}
	};

	var onLoaded = function(response, callback) {
		messages = eval("(" + response.responseText + ")");
		var h = $H(listeners);
		h.each(function(pair) {
			var l = messages[pair.key];
			if (l) {
  				pair.value.localizationAvailable(l);
			}
		});
		callback();
	};

	var execute = function(callback) {
		if (!inited) {
			new Ajax.Request(habboReqPath + "/mod/localizations", { method: "get", onComplete: function(response) {
				inited = true;
				if (200 == response.status) {
					onLoaded(response, callback);
				}
			}});
		} else {
			callback();
		}
	};

	var get = function(objectName) {
		return dialogs[objectName];
	};

	var addDialog = function(d) {
		return listeners[d.objectName] = dialogs[d.objectName] = d;
	}

	return {
		add : function(objectName) {
			var d = new InappropriateContentReportDialog(objectName);
			return addDialog(d);
		},

		addInfoDialog : function(objectName) {
			var d = new ReportInfoDialog(objectName);
			return addDialog(d);
		},

		show : function(objectName, instanceId, targetEl, positionParams) {
			execute(function() {
				showInternal(objectName, instanceId, targetEl, positionParams);
			});
		},

		hideAll : function() {
			var h = $H(listeners);
			h.each(function(pair) {
				var l = get(pair.key);
				if (l) {
	  				pair.value.dispose();
				}
			});
		}
	};
}();

["error", "spam", "success"].each(function(item) {
	DialogManager.addInfoDialog(item);
});

["motto", "name", "url", "room", "stickie", "groupname", "groupdesc", "habbomovie", "animator", "discussionpost"].each(function(item) {
	DialogManager.add(item);
});

//-- Guestbook reporting ----------------------------------------------------
var guestbookReportDialog = DialogManager.add("guestbook");
guestbookReportDialog.beforeShow = function() {
	$("guestbook-entry-container").style.overflow = "hidden";
}
guestbookReportDialog.beforeDispose = function() {
	$("guestbook-entry-container").style.overflow = "auto";
}
