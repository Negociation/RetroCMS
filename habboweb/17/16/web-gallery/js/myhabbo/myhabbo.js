var reportingButtonsObserved = false;
var reportingZ = 8100;
var oldZ = new Array();

var bringToTop = function(e) {
	Event.stop(e);
	if(reportingButtonsObserved == true) {
		oldZ[this.id]=this.style.zIndex;
		this.style.zIndex = reportingZ;
		reportingZ++;
	}
}

// init page
function initView(id) {
	var leaveGroupButton = $("leave-group-button");
	if (leaveGroupButton) {
		Event.observe(leaveGroupButton, "click", function(e) {
			Event.stop(e);
			openGroupActionDialog("/groups/actions/confirm_leave", "/groups/actions/leave", null , id, null);
		});
	}
    var joinGroupButton = $("join-group-button");
	if (joinGroupButton) {
		Event.observe(joinGroupButton, "click", function(e) {
			Event.stop(e);
			showGeneralAjaxDialog("join-group-dialog", "/groups/actions/join", "groupId="+encodeURIComponent(id));
		});
	}
	
    var reportButton = $("reporting-button");
    if (reportButton) {
        Element.show(reportButton);
        Event.observe(reportButton, "click", startReportingModeObserver, false);
        Event.observe("stop-reporting-button", "click", stopReportingModeObserver, false)
    }
	
	/* V14 OR HIGH */
	var webStoreButton = $("webstore-button");
	if (webStoreButton) {
		Event.observe(webStoreButton, "click", function(e) {
			Event.stop(e);
			if (window.WebStore) {
				WebStore.open("webstore-store")
			}
		});
	}
	var inventoryButton = $("inventory-button");
	if (inventoryButton) {
		Event.observe(inventoryButton, "click", function(e) {
			Event.stop(e);
			if (window.WebStore) {
				WebStore.open("webstore-inventory")
			}
		});
	}
	
	/* V13 OR LESS */
	var notesButton = $("notes-button");
	if (notesButton) {
		Event.observe(notesButton, "click", function(e) {
			Event.stop(e);
			alert("not coded yet");
		});
	}
	
	var stickersButton = $("stickers-button");
	if (stickersButton) {
		Event.observe(stickersButton, "click", function(e) {
			Event.stop(e);
			alert("not coded yet");
		});
	}
	
	var widgetsButton = $("widgets-button");
	if (widgetsButton) {
		Event.observe(widgetsButton, "click", function(e) {
			Event.stop(e);
			alert("not coded yet");
		});
	}
	
	var backgroundsButton = $("backgrounds-button");
	if (backgroundsButton) {
		Event.observe(backgroundsButton, "click", function(e) {
			Event.stop(e);
			alert("not coded yet");
		});
	}
}

var startReportingModeObserver = function(e) {
	Event.stop(e);

	document.getElementsByClassName("report-button", "playground").each(
		function (el) {
			Element.show(el);
			el.style.zIndex = 9998;
		}
	);
	
	document.getElementsByClassName("urltoolbutton reporting-start").each(
		function (el) {
			Element.show(el);
			el.style.zIndex = 9998;
		}
	);

	document.getElementsByClassName("stickie", "playground").each(
		function (el) {
			Event.observe(el,"click",this.bringToTop.bindAsEventListener(el),false);
		}
	);

	document.getElementsByClassName("RoomsWidget", "playground").each(
		function (el) {
			Event.observe(el,"click",this.bringToTop.bindAsEventListener(el),false);
		}
	);

	document.getElementsByClassName("ProfileWidget", "playground").each(
		function (el) {
			Event.observe(el,"click",this.bringToTop.bindAsEventListener(el),false);
		}
	);

	var hideElements = document.getElementsByClassName("sticker", "playground")
		.concat(document.getElementsByClassName("FriendsWidget", "playground"))
		.concat(document.getElementsByClassName("HighScoresWidget", "playground"))
		.findAll(function(elem) {
			return !elem.hasClassName("es_dynamic_animator_sticker");	
		});
	hideElements.each(function (el) { Element.hide(el); });

	if (!reportingButtonsObserved) {
        //Observe all stickie note reporting buttons
		document.getElementsByClassName("report-button report-s").each(
			function(el) {
				//stickie-${id}-report
				var stickieId = el.id.substring("stickie-".length, el.id.length-"-report".length);

				Event.observe(el, "click",
					function(e) {
                        Event.stop(e);
                        DialogManager.show("stickie", stickieId, el);
					},
					false
				);
			}
		);

		//Observe all name report buttons (usually 1 or 0)
		document.getElementsByClassName("report-button report-n").each(
			function(el) {
				//name-${id}-report
				var accountId = el.id.substring("name-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					DialogManager.show("name", accountId, el);
				}, false);
			}
		);
		
		//Observe all url report buttons (usually 1 or 0)
		document.getElementsByClassName("urltoolbutton reporting-start").each(
			function(el) {
				//url-${id}-report
				var accountId = el.id.substring("url-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					// alert(el.getAttribute("id")+" "+el.getAttribute("class")+": "+accountId);
					DialogManager.show("url", accountId, el);
				}, false);
			}
		);

		//Observe all mottos (usually 1 or 0)
		document.getElementsByClassName("report-button report-m").each(
			function(el) {
				//motto-${id}-report
				var accountId = el.id.substring("motto-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					DialogManager.show("motto", accountId, el);
				}, false);
			}
		);

        document.getElementsByClassName("report-button report-gn").each(
			function(el) {
				var groupId = el.id.substring("groupname-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					DialogManager.show("groupname", groupId, el);
                }, false);
			}
		);

        document.getElementsByClassName("report-button report-gd").each(
			function(el) {
				var groupId = el.id.substring("groupdesc-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					DialogManager.show("groupdesc", groupId, el);
                }, false);
			}
		);
		//Observe all room links
		document.getElementsByClassName("report-button report-r").each(
			function(el) {
				//room-${id}-report
				var roomId = el.id.substring("room-".length, el.id.length-"-report".length);

				Event.observe(el, "click", function(e) {
					Event.stop(e);
					DialogManager.show("room", roomId, el);
				}, false);
			}
		);
		
		document.getElementsByClassName("es_dynamic_animator_sticker").each(
			function(el) {
				var stickerId = el.id.substring("sticker-".length);
				var node = Builder.node("img", { 
					src : habboStaticFilePath  + "/images/myhabbo/buttons/report_button.gif",
					"class" : "animator-report-button"});
				el.appendChild(node);
				setTimeout(function() {
					Event.observe(node, "click", function(e) { 
						Event.stop(e);
						DialogManager.show("animator", stickerId, el);
					 }, false );
				}, 50);
			}
		);


		reportingButtonsObserved = true;
	}

	Element.hide("reporting-button");
	Element.show("stop-reporting-button");	
}

var stopReportingModeObserver = function(e) {
	Event.stop(e);

	document.getElementsByClassName("report-button", "playground").each(
		function (el) {
			Element.hide(el);
		}
	);
	
	document.getElementsByClassName("urltoolbutton reporting-start").each(
		function (el) {
			Element.hide(el);
		}
	);


	reportingZ = 8100;

	document.getElementsByClassName("stickie", "playground").each(
		function (el) {
			Event.stopObserving(el,"click",this.bringToTop,false);
		}
	);

	document.getElementsByClassName("ProfileWidget", "playground").each(
		function (el) {
			Event.stopObserving(el,"click",this.bringToTop,false);
		}
	);

	document.getElementsByClassName("RoomsWidget", "playground").each(
		function (el) {
			Event.stopObserving(el,"click",this.bringToTop,false);
		}
	);

	document.getElementsByClassName("sticker", "playground").each(
		function (el) {
			Element.show(el);
		}
	);

	document.getElementsByClassName("FriendsWidget", "playground").each(
		function (el) {
			Element.show(el);
		}
	);

	document.getElementsByClassName("HighScoresWidget","playground").each(
		function (el) {
			Element.show(el);
		}
	);
	document.getElementsByClassName("es_dynamic_animator_sticker").each(
		function(el) {
			var reportingButtons = el.getElementsByTagName('img');
			if (reportingButtons.length > 0) {
				Element.remove(reportingButtons[0]);
			}
		}
	);

	for(x in oldZ) {
		el = $(x);
		if(el) {
			el.style.zIndex=oldZ[x];
		}
	}
	oldZ = new Array();

	Element.hide("stop-reporting-button");
		
	DialogManager.hideAll();
	
	Element.show("reporting-button");
	Event.observe("reporting-button", "click", startReportingModeObserver, false);
}

function observeAnim() {
	var p = document.getElementsByClassName("profile-figure");
	if (p.length > 0) {
		R=0; x1=.1; y1=.08; x2=.25; y2=.24; x3=1.6; y3=.24;
		x4=220; y4=200; x5=260; y5=200;
		DI = document.getElementsByClassName("movable", "mypage-wrapper");
		DIL=DI.length;
		bckup = new Array();
		for(i=0; i<DIL; i++){
			bckup[DI[i].id +  '-t'] = DI[i].style.top;
			bckup[DI[i].id +  '-l'] = DI[i].style.left;
		}
		Event.observe(p[0], "dblclick", function(e) {
			if (R < 100) {
				Event.stop(e);
				for(i=0; i<DIL; i++){
					new Effect.Move(DI[i], {x : parseFloat(Math.sin(R*x1+i*x2+x3)*x4+x5), y : parseFloat(Math.cos(R*y1+i*y2+y3)*y4+y5), mode : 'absolute'});
				}
				setTimeout(function() {
					B = setInterval(A,10);
				}, 1000);
			}
		});
	}
	function A(){
		for(i=0; i<DIL; i++){
			DIS=DI[i].style;
			DIS.left=Math.sin(R*x1+i*x2+x3)*x4+x5 + "px";
			DIS.top=Math.cos(R*y1+i*y2+y3)*y4+y5 + "px";
		}
		R++;
		if (R > 100) {
			clearInterval(B);
			for(i=0; i<DIL; i++){
				new Effect.Move(DI[i], {x : parseFloat(bckup[DI[i].id +  '-l']), y : parseFloat(bckup[DI[i].id +  '-t']), mode : 'absolute'});
			}
		}
	}
}

function letItSnow() {
    var today = new Date();
    var month = today.getMonth();
    var day = today.getDate();
    var targetMonth = 11;
    var targetDay = 24;
    var targetHour = 18;
    if (targetMonth == today.getMonth() && targetDay == today.getDate() && today.getHours() >= targetHour) {
        // Add the stickrs
        var count = 20;
        var x = new Array();
        var xMax = 850;
        var y = new Array();
        var yMax = 1400;
        var xSpeed = new Array();
        var ySpeed = new Array();
        var xPhase = new Array();
        for (i = 0; i < count; i++) {
            var id = "the_stickr_" + i;
            x[i] = xMax * Math.random();
            y[i] = yMax * Math.random();
            xSpeed[i] = Math.random() * 10 + 5;
            ySpeed[i] = Math.random() * 7 + 1;
            xPhase[i] = Math.random() * 2 * Math.PI;
            var stickrHtml = "";
            if (i % 2 == 0) {
                stickrHtml = "<div class=\"the_stickr sticker s_ss_snowflake2\" style=\"left: " + x[i] + "px; top: " + y[i] + "px; z-index: 100\" id=\"" + id + "\">"
            } else {
                stickrHtml = "<div class=\"the_stickr sticker s_ss_snowflake1\" style=\"left: " + x[i] + "px; top: " + y[i] + "px; z-index: 100\" id=\"" + id + "\">"
            }
            new Insertion.Bottom("playground", stickrHtml);
            Element.hide($(id));
            new Effect.Appear($(id));
        }
        // Make the stickrs fall down
        var stickrs = document.getElementsByClassName("the_stickr", "mypage-wrapper")
        var R = 0;
        var B = 0;

        setTimeout(function() {
            B = setInterval(floatThem, 80);
        }, 1000);

        function floatThem() {
            for (i = 0; i < count; i++) {
                x[i] = Math.sin(xPhase[i] + R * 0.1) * xSpeed[i] + x[i]
                y[i] = ySpeed[i] + y[i]
                if (y[i] > yMax) {
                    y[i] -= yMax
                }
                stickrStyle = stickrs[i].style;
                stickrStyle.left = x[i] + "px";
                stickrStyle.top = y[i] + "px";
            }
            R++;
            if (R > 1000) {
                clearInterval(B);
                for (i = 0; i < count; i++) {
                    var id = "the_stickr_" + i;
                    Element.hide($(id));
                }
            }
        }
    }
}


/**
 * This fucntion is used to make ajax call which returns general error/info box (general_dialog.ftl)
 * and to display the box.
 */
function showGeneralAjaxDialog(id, relativeUrlToCall, ajaxparams){
	showOverlay();
	var overlay = $("overlay");
	$("mypage-top-nav").appendChild(Builder.node("div", {id:id},[], overlay.nextSibling));
	var temp = $(id);
	temp.style.zIndex = overlay.style.zIndex + 1;
    temp.style.position = "relative";
    moveDialogToCenter(temp);
	new Ajax.Updater(temp, habboReqPath + relativeUrlToCall,{
            method : "post",
            parameters : ajaxparams,
            evalScripts : true
        });
}

function openGroupActionDialog(confirmActionName, actionName, accountId, groupId, widget, onCompleteCallback) {
	var dialogZ = "9001";
	if (widget != null && widget.widgetId != 0) { showOverlay(); }
	else { moveOverlay("9002"); dialogZ = "9003"; }
	var dialog = createDialog("group-action-dialog", "", dialogZ);
	moveDialogToCenter(dialog);
	setDialogBody(dialog, getProgressNode());
	var confirmParams = "groupId="+encodeURIComponent(groupId);
	if (accountId) { confirmParams += "&targetAccountId=" + encodeURIComponent(accountId); }
	new Ajax.Request(habboReqPath + confirmActionName, { method:"post", parameters:confirmParams,
		onComplete:function(req, json) {
			setDialogBody(dialog, req.responseText);
			Event.observe($("group-action-cancel"), "click", function(e) { Event.stop(e); hideGroupActionDialog(widget); });
			Event.observe($("group-action-ok"), "click", function(e) {
				Event.stop(e);
				setDialogBody(dialog, getProgressNode());
				var params = "groupId="+encodeURIComponent(groupId);
				if (accountId) { params += "&targetAccountId=" + encodeURIComponent(accountId); }
				new Ajax.Request(habboReqPath + actionName, { method:"post", parameters:params,
					onComplete:function(req, json) {
						var cont = true;
						if (onCompleteCallback) { cont = onCompleteCallback(req, json); }
						if (cont) {
							setDialogBody(dialog, req.responseText);
							req.responseText.evalScripts();
							Event.observe($("error-dialog-cancel"), "click", function(e) { Event.stop(e); hideGroupActionDialog(widget); });
						}
					}
				});
			});
		}
	});
}

function addGroupActionEventHandler(element, event, confirmActionName, actionName, accountId, groupId, widget, onCompleteCallback){
    Event.observe(element, event, function(e) {
			Event.stop(e);
			openGroupActionDialog(confirmActionName, actionName, accountId , groupId, widget, onCompleteCallback);
		});
}

function hideGroupActionDialog(widget) {
	Element.remove("group-action-dialog");
	if (widget != null && widget.widgetId != null && widget.widgetId != 0) { hideOverlay(); }
	else { moveOverlay("9000"); }
}

function showGroupSettingsConfirmation(groupId, responseTitle, confirmationMessage, urlConfirmationMessage, confirmationButtonText, cancelButtonText){
    Element.hide("group-settings-update-button");

	var selectedGroupType = $("group_type").value;
	var selectedForumType = $("forum_type").value;
	var selectedNewTopicPermission = $("new_topic_permission").value;
	var initialGroupType = $("initial_group_type").value;
	var groupUrlEdited = $("group_url_edited").value;
	var groupUrlContent = $("group_url").value;
	var groupUrlEdited = $("group_url_edited").value;
	params = 'url='+groupUrlContent+'&groupId='+groupId;

	if(groupUrlContent == '' || groupUrlEdited == 0 ) {
		// no need to check group url
        if(initialGroupType == 1 && selectedGroupType != 1){

               var dialog = createDialog("group-settings-confirmation", responseTitle, "9003", 0, -1000, cancelGroupSettingsConfirmation);
               var okButton = Builder.node("a", { href:"#", className:"colorlink orange dialogbutton" }, [ Builder.node("span", confirmationButtonText) ]);
               var cancelButton = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", cancelButtonText) ]);

               appendDialogBody(dialog, Builder.node("p", confirmationMessage));
               appendDialogBody(dialog, cancelButton);
               appendDialogBody(dialog, okButton);
               Event.observe(cancelButton, "click", function(e) { Event.stop(e); cancelGroupSettingsConfirmation() }, false);
               Event.observe(okButton, "click", function(e) {
                  Element.remove("group-settings-confirmation");
                  updateGroupSettings(groupId, responseTitle, confirmationMessage, confirmationButtonText, cancelButtonText);
              });
               moveOverlay("9002");
               dialog.style.zIndex = '9003';
               moveDialogToCenter(dialog);
       }
       else {
             	updateGroupSettings(groupId, responseTitle);
       }
	} else {
			new Ajax.Request(habboReqPath + '/groups/actions/check_group_url', { method:"post", parameters:params,
			onComplete:function(req, json) {
			
				var urlDialog = createDialog("group-url-confirmation", responseTitle, "9003", 0, -1000, cancelGroupSettingsConfirmation);
	            var urlOkButton = Builder.node("a", { href:"#", className:"colorlink orange dialogbutton" }, [ Builder.node("span", confirmationButtonText) ]);
	            var urlCancelButton = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", cancelButtonText) ]);
				var response_text = req.responseText;

				var status = response_text.match(/(^ERROR\s)(.+$)/);

				if(status == null) {
				 	// error not occured
			    	appendDialogBody(urlDialog, Builder.node("p", response_text));
	            	appendDialogBody(urlDialog, urlCancelButton);
	            	appendDialogBody(urlDialog, urlOkButton);
				} else {
				// strip off ERROR: key word
	            	response_text= status[2];
			    	appendDialogBody(urlDialog, Builder.node("p", response_text));
	            	appendDialogBody(urlDialog, urlCancelButton);
				}

	            
	            Event.observe(urlCancelButton, "click", function(e) { 
               		Event.stop(e); 
               		// cancelGroupSettingsConfirmation() 
               		Element.remove("group-url-confirmation");
   					Element.show("group-settings-update-button");
   					moveOverlay('9001');
	            }, false);
	            	
	            Event.observe(urlOkButton, "click", function(e) {
	            	Element.remove("group-url-confirmation");
			        if(initialGroupType == 1 && selectedGroupType != 1){
		
		                var dialog = createDialog("group-settings-confirmation", responseTitle, "9003", 0, -1000, cancelGroupSettingsConfirmation);
		                var okButton = Builder.node("a", { href:"#", className:"colorlink orange dialogbutton" }, [ Builder.node("span", confirmationButtonText) ]);
		                var cancelButton = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", cancelButtonText) ]);
		
		                appendDialogBody(dialog, Builder.node("p", confirmationMessage));
		                appendDialogBody(dialog, cancelButton);
		                appendDialogBody(dialog, okButton);
		                Event.observe(cancelButton, "click", function(e) { Event.stop(e); cancelGroupSettingsConfirmation() }, false);
		                Event.observe(okButton, "click", function(e) {
		                    Element.remove("group-settings-confirmation");
		                   	updateGroupSettings(groupId, responseTitle, confirmationMessage, confirmationButtonText, cancelButtonText);
		               });
		                moveOverlay("9002");
		                dialog.style.zIndex = '9003';
		                moveDialogToCenter(dialog);
			       }
			       else {
		              	updateGroupSettings(groupId, responseTitle);
			       }
	            });
	            
	            moveOverlay("9002");
	            urlDialog.style.zIndex = '9003';
	            moveDialogToCenter(urlDialog);
			}
		});
	}
}

function cancelGroupSettingsConfirmation() {
    Element.remove("group-settings-confirmation");
    Element.show("group-settings-update-button");
    moveOverlay('9001');
}

function updateGroupSettings(groupId, responseTitle) {
    new Ajax.Request(habboReqPath + "/groups/actions/update_group_settings", {
			parameters: "name="+encodeURIComponent($("group_name").value)
			             +"&description="+encodeURIComponent($("group_description").value)
			             + "&groupId="+groupId
			             + "&type="+$("group_type").value
			             + "&url="+$("group_url").value
			             + "&forumType="+$("forum_type").value
			             + "&newTopicPermission="+$("new_topic_permission").value
                         ,
            onComplete: function(req) {
                var groupSettingsResultDialog = $('dialog-group-settings');
                if (req.responseText.indexOf('group-settings-form') < 0) {
                    moveOverlay('9002');
                    groupSettingsResultDialog = createDialog("group_settings_result", responseTitle, "9003", 0, -1000, closeGroupSettings);
                    groupSettingsResultDialog.style.zIndex = '9003';
                } else {
                    moveOverlay('9001');
                }
                setDialogBody(groupSettingsResultDialog, req.responseText);
                moveDialogToCenter(groupSettingsResultDialog);

            }
		});
}

function closeGroupSettings() {
	var dialog = $("dialog-group-settings");
	dialog.style.left = "-1500px";
	dialog.hide();
	$("dialog-group-settings-body").innerHTML = getProgressNode();
    hideOverlay();
}

function attachGroupSettingsObserver(id) {
    Event.observe("group-settings-button", "click",function(e) {
        Event.stop(e);
        var dialog = $("dialog-group-settings");
        dialog.show();
        dialog.style.zIndex = "9001";
        new Ajax.Updater("dialog-group-settings-body", habboReqPath + "/groups/actions/group_settings", {
		    parameters: "&groupId="+id,
		     evalScripts : true,
		     method: "post"
        });
        showOverlay();
        moveDialogToCenter(dialog);
    }, false);
}

var MembersList = Class.create();
MembersList.prototype = {

	initialize : function(groupId, myUserId) {
		this.groupId = groupId;
		this.myUserId = myUserId;
		this.selected = "members";
		this.targetPageNumber = 1;

		this.dialog = $("group-memberlist");
		this.membersDiv = $("group-memberlist-members");
		this.pendingDiv = $("group-memberlist-pending");
		this.memberButtonsDiv = $("group-memberlist-members-buttons");
		this.pendingButtonsDiv = $("group-memberlist-pending-buttons");
        this.searchButton = $("group-memberlist-members-search-button");

        Element.hide(this.dialog);
		Element.hide(this.membersDiv);
		Element.hide(this.pendingDiv);
		Element.hide(this.memberButtonsDiv);
		Element.hide(this.pendingButtonsDiv);

		this.loadingMembers = false;
		this.loadingPending = false;
		this.loadedMembers = 0;
		this.loadedPending = 0;

		var self = this;

		Event.observe("group-memberlist-link-members", "click", function(e) {
			Event.stop(e);
			if (self.selected != "members") {
				self.switchToMembers();
				if (new Date().getTime() - self.loadedMembers > 10000) { self.loadMembers(true, 1); }
			}
		});
		Event.observe("group-memberlist-link-pending", "click", function(e) {
			Event.stop(e);
			if (self.selected != "pending") {
				self.switchToPending();
				if (new Date().getTime() - self.loadedPending > 10000) { self.loadPending(true); }
			}
		});
		Event.observe(this.memberButtonsDiv, "click", function(e) { Event.stop(e); self.processButtons(e); });
		Event.observe(this.pendingButtonsDiv, "click", function(e) { Event.stop(e); self.processButtons(e); });
		Event.observe($("group-memberlist-exit"), "click", function(e) { Event.stop(e); self.close(); });
        Event.observe(this.searchButton, "click", function(e) { Event.stop(e); self.processSearch(e); });
    	Event.observe("group-memberlist-members-search-string", "keypress", function(e) {
                if (e.keyCode == Event.KEY_RETURN) {
                    self.processSearch(e);
                }
            });
    },

	open : function() {
		showOverlay();
		Element.show(this.dialog);
		moveDialogToCenter(this.dialog);

		if (this.selected == "pending") {
			this.switchToPending();
			this.loadPending(true);
		} else {
			this.switchToMembers();
			this.loadMembers(true, 1);
		}
	},

	close : function() {
		this.dialog.style.left = "-1500px";
		Element.hide(this.dialog);
		hideOverlay();
	},

	switchToMembers : function() {
		Element.hide("group-memberlist-" + this.selected);
		Element.hide("group-memberlist-" + this.selected + "-buttons");
		Element.removeClassName("group-memberlist-link-" + this.selected, "selected");
		Element.show("group-memberlist-members");
		Element.show("group-memberlist-members-buttons");
		Element.addClassName("group-memberlist-link-members", "selected");
		this.selected = "members";
	},

	switchToPending : function() {
		Element.hide("group-memberlist-" + this.selected);
		Element.hide("group-memberlist-" + this.selected + "-buttons");
		Element.removeClassName("group-memberlist-link-" + this.selected, "selected");
		Element.show("group-memberlist-pending");
		Element.show("group-memberlist-pending-buttons");
		Element.addClassName("group-memberlist-link-pending", "selected");
		this.selected = "pending";
	},
	
	loadMembers : function(updateCounts, targetPageNumber) {
	
		if (!this.loadingMembers) {
			this.membersDiv.innerHTML = getProgressNode();
			this.loadingMembers = true;
            var searchString = $F("group-memberlist-members-search-string");
            if (searchString == null) {
                searchString = "";
            }
            var self = this;
			new Ajax.Updater("group-memberlist-members", habboReqPath + "/myhabbo/groups/memberlist", {
				method:"post", parameters:
								"pageNumber=" + targetPageNumber +
								"&groupId=" + encodeURIComponent(this.groupId) +
								"&searchString=" + searchString, onComplete: function(req, json) {
					
					if (updateCounts) {
						self.updateTitles(json.members, json.pending);
					}
					self.loadingMembers = false;
					self.loadedMembers = new Date().getTime();
					
					if($('member-list-paging')) {
						Event.observe($('member-list-paging'), "click", function(e) { Event.stop(e); self.processSearch(e); });
					}
					Event.observe(self.membersDiv, "click", function(e) {
						var clickedEl = Event.element(e);
						if (clickedEl.nodeName.toLowerCase() == "input") {
							self.clickCheckbox();
							return;
						}
						clickedEl = Event.findElement(e, "li");
						if (clickedEl && clickedEl.id && clickedEl.id.lastIndexOf("-") != -1) {
							var idNum = parseFloat(clickedEl.id.substring(clickedEl.id.lastIndexOf("-")+1));
							if (idNum > 0) {
								self.loadAvatarInfo(idNum);
							}
							return;
						}
					});
				}
			});
		}
	},

	loadPending : function(updateCounts) {
		if (!this.loadingPending) {
			this.pendingDiv.innerHTML = getProgressNode();
			this.loadingPending = true;

			var self = this;
			new Ajax.Updater("group-memberlist-pending", habboReqPath + "/myhabbo/groups/memberlist", {
				method:"post", parameters: "groupId=" + encodeURIComponent(this.groupId) + "&pending=true", onComplete: function(req, json) {
					if (updateCounts) {
						self.updateTitles(json.members, json.pending);
					}
					self.loadingPending = false;
					self.loadedPending = new Date().getTime();

					Event.observe(self.pendingDiv, "click", function(e) {
						var clickedEl = Event.element(e);
						if (clickedEl.nodeName.toLowerCase() == "input") {
							self.clickCheckbox();
							return;
						}
						clickedEl = Event.findElement(e, "li");
						if (clickedEl && clickedEl.id && clickedEl.id.lastIndexOf("-") != -1) {
							var idNum = parseFloat(clickedEl.id.substring(clickedEl.id.lastIndexOf("-")+1));
							if (idNum > 0) {
								self.loadAvatarInfo(idNum);
							}
							return;
						}
					});
				}
			});
		}
	},

	loadAvatarInfo : function(userId) {
		var avatarInfoEl = $("group-memberlist-avatarinfo-" + userId);
		var parent = avatarInfoEl.parentNode;
		if (avatarInfoEl.innerHTML == "") {
			avatarInfoEl.innerHTML = getProgressNode();
			Element.show(avatarInfoEl);
			Element.addClassName(parent, "group-memberlist-opened");
			var self = this;
			new Ajax.Request(habboReqPath + "/myhabbo/groups/memberlist_avatarinfo", {
				method:"post", parameters:"theAccountId=" + encodeURIComponent(userId) + "&groupId=" + encodeURIComponent(this.groupId), onComplete: function(req, json) {
					avatarInfoEl.innerHTML = req.responseText;
					avatarInfoEl.style.display = "block";
					Element.addClassName($("group-memberlist-member-" + userId), "group-memberlist-opened");
				}
			});
		} else {
			if (!Element.visible(avatarInfoEl)) {
				avatarInfoEl.style.display = "block";
				Element.addClassName(parent, "group-memberlist-opened");
			} else {
				avatarInfoEl.style.display = "none";
				Element.removeClassName(parent, "group-memberlist-opened");
			}
		}
	},

	updateTitles : function(membersTitle, pendingTitle) {
		($("group-memberlist-link-members").getElementsByTagName("a"))[0].innerHTML = membersTitle;
		($("group-memberlist-link-pending").getElementsByTagName("a"))[0].innerHTML = pendingTitle;
	},

	processButtons: function(e) {
		var clickedEl = Event.findElement(e, "a");
		if (clickedEl) {
			if (!Element.hasClassName(clickedEl, "group-memberlist-button-disabled")) {
				var id = clickedEl.id;
				if (id.indexOf("-close") != -1) {
					this.close();
				} else if (id == "group-memberlist-button-remove") {
					this.confirm("remove");
				} else if (id == "group-memberlist-button-give-rights") {
					this.confirm("give_rights");
				} else if (id == "group-memberlist-button-revoke-rights") {
					this.confirm("revoke_rights");
				} else if (id == "group-memberlist-button-accept") {
					this.confirm("accept");
				} else if (id == "group-memberlist-button-decline") {
					this.confirm("decline");
				}
			}
		}
	},

    processSearch: function(e) {
        var clickedPagingEl = Event.element(e);
		var pageNumber = parseInt($F("pageNumberMemberList"));
        if (pageNumber == null) {
        	pageNumber = 1;
        }
        var totalPages = parseInt($F("totalPagesMemberList"));
        if (totalPages == null) {
        	totalPages = 0;
        }
        var targetPageNumber = 1;
        			
        if (clickedPagingEl.id == "memberlist-search-first") {
        	targetPageNumber = 1;
        } else if (clickedPagingEl.id == "memberlist-search-previous") {
        	targetPageNumber = pageNumber - 1;
        } else if (clickedPagingEl.id == "memberlist-search-next") {
        	targetPageNumber = pageNumber + 1;
        } else if (clickedPagingEl.id == "memberlist-search-last") {
        	targetPageNumber = totalPages;
        }
        this.loadMembers(true, targetPageNumber);
    },

    clickCheckbox : function() {
		if (this.selected == "members") {
			var a = false;
			var m = false;
			var myUserId = this.myUserId;
			var meSelected = false;
			$A(this.membersDiv.getElementsByTagName("input")).each(function(el) {
				if (el.checked) {
					if (el.id.substring(17, 18) == "a") { a = true; }
					else { m = true; }
					if (el.id.substring(el.id.lastIndexOf("-")+1) == myUserId) { meSelected = true; }
				}
			});

			if (a && m) {
				this.disableButton("give-rights");
				this.disableButton("revoke-rights");
				this.enableButton("remove");
			} else if (!a && !m) {
				this.disableButton("give-rights");
				this.disableButton("revoke-rights");
				this.disableButton("remove");
			} else if (a) {
				this.disableButton("give-rights");
				this.enableButton("revoke-rights");
				this.enableButton("remove");
			} else if (m) {
				this.enableButton("give-rights");
				this.disableButton("revoke-rights");
				this.enableButton("remove");
			}
			if (meSelected) {
				this.disableButton("revoke-rights");
				this.disableButton("remove");
			}
		} else if (this.selected == "pending") {
			var checked = false;
			$A(this.pendingDiv.getElementsByTagName("input")).each(function(el) {
				if (el.checked) {
					checked = true;
					throw $break;
				}
			});

			if (checked) {
				this.enableButton("accept");
				this.enableButton("decline");
			} else {
				this.disableButton("accept");
				this.disableButton("decline");
			}
		}
	},

	enableButton : function(buttonId) {
		Element.removeClassName($("group-memberlist-button-" + buttonId), "group-memberlist-button-disabled");
		Element.addClassName($("group-memberlist-button-" + buttonId), "group-memberlist-button");
	},

	disableButton : function(buttonId) {
		Element.removeClassName($("group-memberlist-button-" + buttonId), "group-memberlist-button");
		Element.addClassName($("group-memberlist-button-" + buttonId), "group-memberlist-button-disabled");
	},

	confirm : function(actionName) {
		var ids = [];
		var container = (this.selected == "pending") ? this.pendingDiv : this.membersDiv;

		$A(container.getElementsByTagName("input")).each(function(el) {
			if (el.checked) {
				ids.push(el.id.substring(el.id.lastIndexOf("-")+1));
			}
		});

		if (ids.length > 0) {
			moveOverlay("9002");
			var dialog = createDialog("group-memberlist-action-dialog", "", "9003");
			moveDialogToCenter(dialog);
			setDialogBody(dialog, getProgressNode());

			var self = this;

			new Ajax.Request(habboReqPath + "/myhabbo/groups/batch/confirm_" + actionName, { method:"post",
				parameters:"groupId="+encodeURIComponent(this.groupId)+"&targetIds="+encodeURIComponent(ids),
				onComplete:function(req, json) {
					setDialogBody(dialog, req.responseText);
					if ($("error-dialog-cancel")) { Event.observe($("error-dialog-cancel"), "click", function(e) { Event.stop(e); self.closeConfirmationDialog(); }); }
					if ($("group-action-cancel")) { Event.observe($("group-action-cancel"), "click", function(e) { Event.stop(e); self.closeConfirmationDialog(); }); }
					if ($("group-action-ok")) {
						Event.observe($("group-action-ok"), "click", function(e) {
							Event.stop(e);
							setDialogBody(dialog, getProgressNode());
							new Ajax.Request(habboReqPath + "/myhabbo/groups/batch/" + actionName, { method:"post",
								parameters:"groupId="+encodeURIComponent(self.groupId)+"&targetIds="+encodeURIComponent(ids),
								onComplete:function(req, json) {
									if (req.responseText == "OK") {
										self.closeConfirmationDialog();
										if (self.selected == "pending") {
											self.loadPending(true);
										} else {
											self.loadMembers(true, 1);
										}
									} else {
										setDialogBody(dialog, req.responseText);
										Event.observe($("error-dialog-cancel"), "click", function(e) { Event.stop(e); self.closeConfirmationDialog(); });
									}
								}
							});
						});
					}
				}
			});
		}
	},

	closeConfirmationDialog : function() {
		Element.remove("group-memberlist-action-dialog");
		moveOverlay("9000");
	}

}

function attachGroupBadgeEditorButtonObserver(groupId, buttonId, dialogHeaderText) {
    Event.observe($(buttonId), "click",function(e) {
       Event.stop(e);
       var dialog = createDialog("badge-editor-dialog", dialogHeaderText, "9003", null, null, closeBadgeEditor);
       makeDialogDraggable(dialog);
       showOverlay();
       hideOverlayIfMacFirefox();
	   moveDialogToCenter(dialog);
	   setDialogBody(dialog, getProgressNode());
       dialog.show();
       dialog.style.zIndex = "9001";
       new Ajax.Updater("badge-editor-dialog-body", habboReqPath + "/groups/actions/show_badge_editor", {
		    parameters: "&groupId="+groupId,
		     evalScripts : true,
		     method: "post",
		     onComplete:function(req, json) {
					setDialogBody(dialog, req.responseText);
				}
			});
		}, false);
	}

function closeBadgeEditor(e){
   hideOverlay();
   if(e != null){
   	Event.stop(e);
   }
   Element.remove("badge-editor-dialog");
}

function loadWebStore(onLoadCallback) {
	ScriptLoader.load("myhabbo/myhabbo-store", { callback: onLoadCallback || null });
}

function initDraggableDialogs() {
	$$('.dialog-grey').each(function(dialog) {
		new Draggable(dialog, {
	        handle:'dialog-grey-handle',
			starteffect:Prototype.emptyFunction,
	        endeffect:Prototype.emptyFunction,
	        zindex:9100
		});
	});
}

var LinkTool = Class.create();
LinkTool.prototype = {

	initialize: function(textarea) {
        this.textarea = textarea;
        Event.observe("linktool-find", "click", this.search);
        var self = this;
        Event.observe("linktool-query", "keypress", function(e) {
            if (e.keyCode == Event.KEY_RETURN) {
                self.search(e);
            }
        });
    },

    addLink: function(tagName, clickUrl, displayUrl) {
        if (!this.textarea.getSelection() || this.textarea.getSelection() == "") {
            this.textarea.replaceSelection("[" + tagName + "=" + clickUrl + "]" + displayUrl + "[/" + tagName + "]");
        } else {
            this.textarea.wrapSelection("[" + tagName + "=" + clickUrl + "]", "[/" + tagName + "]");
        }
    },

    search: function(e) {
        Event.stop(e);
        $("linktool-results").style.display = "block";
        $("linktool-results").innerHTML = getProgressNode();
        var query = $F('linktool-query');
        var scope = 1;
        document.getElementsByClassName("linktool-scope").each(function(element) {
            if (element.checked) {
                scope = element.value;
            }
        });
        new Ajax.Updater("linktool-results",
            habboReqPath + "/myhabbo/linktool/search",
            { method: "get", parameters: "query=" + encodeURIComponent(query) + "&scope=" + encodeURIComponent(scope) });
    }
};

function isNotWithinPlayground(element) {
  var pg = $("playground");
  if (!pg) return false;

  var pgTopLeft = Position.cumulativeOffset(pg);
  var pgWidthHeight = Element.getDimensions(pg);

  var elTopLeft = Position.cumulativeOffset(element);
  var elWidthHeight = Element.getDimensions(element);

  return !(Position.within(pg, elTopLeft[0], elTopLeft[1]) && Position.within(pg, elTopLeft[0] + elWidthHeight.width, elTopLeft[1] + elWidthHeight.height));
}

function offsetToPlayground(element) {
  var pg = $("playground");
  if (!pg) return 0;
  var pgTopLeft = Position.cumulativeOffset(pg);
  var pgWidthHeight = Element.getDimensions(pg);

  var elTopLeft = Position.cumulativeOffset(element);
  var elWidthHeight = Element.getDimensions(element);
  return pgTopLeft[0] + pgWidthHeight.width - elTopLeft[0] - elWidthHeight.width;
}
