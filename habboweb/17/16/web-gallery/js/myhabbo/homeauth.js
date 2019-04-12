ReportDialog = Class.create();
ReportDialog.prototype = {
    initialize: function(A) {
        this.element = A;
        this.observed = false;
        this.observers = Array()
    },
    show: function() {
        if (this.element) {
            if (this.beforeShow) {
                this.beforeShow()
            }
            $(this.element).style.zIndex = 9001;
            Element.show(this.element);
            this.observeAll()
        }
    },
    dispose: function() {
        if (this.element) {
            if (this.beforeDispose) {
                this.beforeDispose()
            }
            Element.hide(this.element);
            this.stopObservingAll()
        }
    },
    clonePosition: function(A) {
        if (Prototype.Browser.IE) {
            this.element.clonePosition(A, {
                setWidth: false,
                setHeight: false,
                offsetTop: -5,
                offsetLeft: -8
            })
        } else {
            this.element.clonePosition(A, {
                setWidth: false,
                setHeight: false,
                offsetTop: -5,
                offsetLeft: 0
            })
        }
    },
    cloneDialogPosition: function(A) {
        if (Prototype.Browser.IE) {
            this.element.clonePosition(A.element, {
                setWidth: false,
                setHeight: false,
                offsetLeft: -8
            })
        } else {
            this.element.clonePosition(A.element, {
                setWidth: false,
                setHeight: false
            })
        }
    },
    observeAll: function() {
        if (!this.observed) {
            if (this.observers) {
                for (var A = 0; A < this.observers.length; A++) {
                    Event.observe(this.observers[A]["id"], "click", this.observers[A]["observer"], false)
                }
            }
            this.observed = true
        }
    },
    bringToFront: function() {
        if (this.element) {
            baseelement = $(this.element);
            baseelement.style.zIndex = 9999
        }
    },
    stopObservingAll: function() {
        if (this.observed) {
            if (this.observers) {
                for (var A = 0; A < this.observers.length; A++) {
                    Event.stopObserving(this.observers[A]["id"], "click", this.observers[A]["observer"], false)
                }
            }
            this.observed = false
        }
    }
};
var ReportDialogManager = function() {
    var InappropriateContentReportDialog = Class.create();
    Object.extend(InappropriateContentReportDialog.prototype, ReportDialog.prototype);
    Object.extend(InappropriateContentReportDialog.prototype, {
        initialize: function(objectName) {
            this.objectName = objectName;
            this.observers = Array();
            this.observers[0] = Array();
            this.observers[0]["id"] = objectName + "-report-report";
            this.observers[0]["observer"] = (function(e) {
                Event.stop(e);
                if (!this.objectId) {
                    return
                }
                new Ajax.Request(habboReqPath + "/mod/add_" + objectName + "_report", {
                    parameters: {
                        objectId: this.objectId
                    },
                    onComplete: (function(req) {
                        var resultDialog = "error";
                        if (req.responseText == "SUCCESS") {
                            resultDialog = "success"
                        } else {
                            if (req.responseText == "SPAM") {
                                resultDialog = "spam"
                            }
                        }
                        ReportDialogManager.show(resultDialog, null, this.element, {
                            setWidth: false,
                            setHeight: false
                        });
                        this.dispose()
                    }).bind(this)
                })
            }).bind(this);
            this.observers[1] = Array();
            this.observers[1]["id"] = objectName + "-report-cancel";
            this.observers[1]["observer"] = (function(e) {
                Event.stop(e);
                this.dispose()
            }).bind(this)
        },
        setObjectId: function(id) {
            this.objectId = id
        },
        localizationAvailable: function(localizations) {
            this.templateParams = localizations;
            this.templateParams.id = this.objectName
        },
        createElement: function() {
            if (!this.element) {
                this.element = Builder.build(new Template(this.DIALOG_TEMPLATE).evaluate(this.templateParams));
                var p = $("content");
                if (p) {
                    p.appendChild(this.element)
                }
            }
        },
        DIALOG_TEMPLATE: '<div id="dialog-#{id}-report" class="menu">	<div class="menu-header">		<h3>#{title}</h3>	</div>	<div class="menu-body">		<div class="menu-content" id="#{id}-content">	<div>#{message}</div>	<div style="text-align: right">	<button id="#{id}-report-cancel">#{btnCancelText}</button>	<button id="#{id}-report-report">#{btnReportText}</button>	</div>			<div class="clear"></div>		</div>	</div>	<div class="menu-bottom"></div></div>'
    });
    ReportInfoDialog = Class.create();
    Object.extend(ReportInfoDialog.prototype, ReportDialog.prototype);
    Object.extend(ReportInfoDialog.prototype, {
        initialize: function(objectName) {
            this.objectName = objectName;
            this.observers = Array();
            this.observers[0] = Array();
            this.observers[0]["id"] = objectName + "-report-report";
            this.observers[0]["observer"] = (function(e) {
                Event.stop(e);
                this.dispose()
            }).bind(this)
        },
        localizationAvailable: function(localizations) {
            this.templateParams = localizations;
            this.templateParams.id = this.objectName
        },
        createElement: function() {
            if (!this.element) {
                this.element = Builder.build(new Template(this.DIALOG_TEMPLATE).evaluate(this.templateParams));
                var p = $("content");
                if (p) {
                    p.appendChild(this.element)
                }
            }
        },
        DIALOG_TEMPLATE: '<div id="dialog-#{id}-report" class="menu">	<div class="menu-header">		<h3>#{title}</h3>	</div>	<div class="menu-body">		<div class="menu-content" id="#{id}-content">	<div>#{message}</div>	<div style="text-align: right">	<button id="#{id}-report-report">#{btnText}</button>	</div>			<div class="clear"></div>		</div>	</div>	<div class="menu-bottom"></div></div>'
    });
    var inited = false;
    var dialogs = {};
    var listeners = {};
    var messages = {};
    var showInternal = function(objectName, instanceId, targetEl, positionParams) {
        var dialog = get(objectName);
        if (dialog) {
            dialog.createElement();
            if (instanceId) {
                dialog.setObjectId(instanceId)
            }
            if (positionParams) {
                dialog.element.clonePosition(targetEl, positionParams)
            } else {
                dialog.clonePosition(targetEl)
            }
            dialog.show();
            if (typeof isNotWithinPlayground != "undefined" && isNotWithinPlayground(dialog.element)) {
                new Effect.Move(dialog.element, {
                    x: offsetToPlayground(dialog.element),
                    y: 0,
                    mode: "relative",
                    duration: 0.2
                })
            }
        }
    };
    var onLoaded = function(response, callback) {
        messages = eval("(" + response.responseText + ")");
        var h = $H(listeners);
        h.each(function(pair) {
            var l = messages[pair.key];
            if (l) {
                pair.value.localizationAvailable(l)
            }
        });
        callback()
    };
    var execute = function(callback) {
        if (!inited) {
            new Ajax.Request(habboReqPath + "/mod/localizations", {
                method: "get",
                onComplete: function(response) {
                    inited = true;
                    if (200 == response.status) {
                        onLoaded(response, callback)
                    }
                }
            })
        } else {
            callback()
        }
    };
    var get = function(objectName) {
        return dialogs[objectName]
    };
    var addDialog = function(d) {
        return listeners[d.objectName] = dialogs[d.objectName] = d
    };
    return {
        add: function(objectName) {
            var d = new InappropriateContentReportDialog(objectName);
            return addDialog(d)
        },
        addInfoDialog: function(objectName) {
            var d = new ReportInfoDialog(objectName);
            return addDialog(d)
        },
        show: function(objectName, instanceId, targetEl, positionParams) {
            execute(function() {
                showInternal(objectName, instanceId, targetEl, positionParams)
            })
        },
        hideAll: function() {
            var h = $H(listeners);
            h.each(function(pair) {
                var l = get(pair.key);
                if (l) {
                    pair.value.dispose()
                }
            })
        }
    }
}();
["error", "spam", "success"].each(function(A) {
    ReportDialogManager.addInfoDialog(A)
});
["motto", "name", "url", "room", "stickie", "groupname", "groupdesc", "habbomovie", "animator", "discussionpost"].each(function(A) {
    ReportDialogManager.add(A)
});
var guestbookReportDialog = ReportDialogManager.add("guestbook");
guestbookReportDialog.beforeShow = function() {
    $("guestbook-entry-container").style.overflow = "hidden"
};
guestbookReportDialog.beforeDispose = function() {
    $("guestbook-entry-container").style.overflow = "auto"
};
if (typeof(Object.Event) == "undefined") {
    Object.Event = {
        eventHandlers: {},
        observe: function(B, A) {
            if (!this.eventHandlers[B]) {
                this.eventHandlers[B] = $A([])
            }
            this.eventHandlers[B].push(A)
        },
        stopObserving: function(B, A) {
            this.eventHandlers[B] = this.eventHandlers[B].without(A)
        },
        fireEvent: function(A) {
            if (this.eventHandlers[A]) {
                this.eventHandlers[A].each(function(B) {
                    B(this)
                }.bind(this))
            }
        }
    };
    Object.Event.createEvent = Object.Event.fireEvent
}
if (typeof(Control) == "undefined") {
    Control = {}
}
Control.TextArea = Class.create();
Object.extend(Control.TextArea.prototype, Object.Event);
Object.extend(Control.TextArea.prototype, {
    onChangeTimeoutLength: 500,
    textarea: false,
    onChangeTimeout: false,
    initialize: function(A) {
        this.textarea = $(A);
        $(this.textarea).observe("keyup", this.doOnChange.bindAsEventListener(this));
        $(this.textarea).observe("paste", this.doOnChange.bindAsEventListener(this));
        $(this.textarea).observe("input", this.doOnChange.bindAsEventListener(this))
    },
    doOnChange: function(A) {
        if (this.onChangeTimeout) {
            window.clearTimeout(this.onChangeTimeout)
        }
        this.onChangeTimeout = window.setTimeout(function() {
            this.createEvent("change")
        }.bind(this), this.onChangeTimeoutLength)
    },
    getValue: function() {
        return this.textarea.value
    },
    getSelection: function() {
        if (typeof(document.selection) != "undefined") {
            return document.selection.createRange().text
        } else {
            if (typeof(this.textarea.setSelectionRange) != "undefined") {
                return this.textarea.value.substring(this.textarea.selectionStart, this.textarea.selectionEnd)
            } else {
                return false
            }
        }
    },
    replaceSelection: function(B) {
        if (typeof(document.selection) != "undefined") {
            this.textarea.focus();
            var A = document.selection.createRange();
            A.text = B;
            A.collapse(false);
            A.select()
        } else {
            if (typeof(this.textarea.setSelectionRange) != "undefined") {
                selection_start = this.textarea.selectionStart;
                this.textarea.value = this.textarea.value.substring(0, selection_start) + B + this.textarea.value.substring(this.textarea.selectionEnd);
                this.textarea.setSelectionRange(selection_start + B.length, selection_start + B.length)
            }
        }
        this.doOnChange();
        this.textarea.focus()
    },
    wrapSelection: function(A, B) {
        this.replaceSelection(A + this.getSelection() + B)
    },
    insertBeforeSelection: function(A) {
        this.replaceSelection(A + this.getSelection())
    },
    insertAfterSelection: function(A) {
        this.replaceSelection(this.getSelection() + A)
    },
    injectEachSelectedLine: function(C, A, B) {
        this.replaceSelection((A || "") + $A(this.getSelection().split("\n")).inject([], C).join("\n") + (B || ""))
    },
    insertBeforeEachSelectedLine: function(C, A, B) {
        this.injectEachSelectedLine(function(E, D) {
            E.push(C + D);
            return E
        }, A, B)
    }
});
Control.TextArea.ToolBar = Class.create();
Object.extend(Control.TextArea.ToolBar.prototype, {
    textarea: false,
    toolbar: false,
    initialize: function(A, B) {
        this.textarea = A;
        if (B) {
            this.toolbar = $(B)
        } else {
            this.toolbar = $(document.createElement("ul"));
            this.textarea.textarea.parentNode.insertBefore(this.toolbar, this.textarea.textarea)
        }
    },
    attachButton: function(A, B) {
        A.onclick = function() {
            return false
        };
        $(A).observe("click", B.bindAsEventListener(this.textarea))
    },
    addButton: function(A, C, B) {
        c = document.createElement("li");
        c.className = "control-button";
        link = document.createElement("a");
        link.href = "#";
        this.attachButton(link, C);
        c.appendChild(link);
        if (B) {
            for (a in B) {
                link[a] = B[a]
            }
        }
        if (A) {
            span = document.createElement("span");
            span.innerHTML = A;
            link.appendChild(span)
        }
        this.toolbar.appendChild(c)
    }
});
Control.TextArea.ToolBar.BBCode = Class.create();
Object.extend(Control.TextArea.ToolBar.BBCode.prototype, {
    textarea: false,
    toolbar: false,
    options: {
        preview: false
    },
    initialize: function(A, B) {
        this.textarea = new Control.TextArea(A);
        this.toolbar = new Control.TextArea.ToolBar(this.textarea);
        this.toolbar.toolbar.addClassName("bbcode_toolbar");
        if (B) {
            for (o in B) {
                this.options[o] = B[o]
            }
        }
        this.toolbar.addButton("Bold", function() {
            this.wrapSelection("[b]", "[/b]")
        }, {
            id: "bbcode_bold_button"
        });
        this.toolbar.addButton("Italics", function() {
            this.wrapSelection("[i]", "[/i]")
        }, {
            id: "bbcode_italics_button"
        });
        this.toolbar.addButton("Underline", function() {
            this.wrapSelection("[u]", "[/u]")
        }, {
            id: "bbcode_underline_button"
        });
        this.toolbar.addButton("Quote", function() {
            this.wrapSelection("[quote]", "[/quote]")
        }, {
            id: "bbcode_quote_button"
        });
        this.toolbar.addButton("Small size", function() {
            this.wrapSelection("[size=small]", "[/size]")
        }, {
            id: "bbcode_smallsize_button"
        });
        this.toolbar.addButton("Large size", function() {
            this.wrapSelection("[size=large]", "[/size]")
        }, {
            id: "bbcode_largesize_button"
        });
        this.toolbar.addButton("Code", function() {
            this.wrapSelection("[code]", "[/code]")
        }, {
            id: "bbcode_code_button"
        });
        this.toolbar.addButton("Link", function() {
            var D = this.getSelection();
            var E = D;
            var F = "http://";
            var C = D.match(/^\s*(\w+:\/*)?([^\(\)\?&"'\s]*)([^:\(\)"'\s]*).*/);
            if (C != null) {
                D = C[2] + C[3];
                E = C[2];
                if (D.search(/\./) == -1) {
                    F = "";
                    D = C[2]
                }
                D = D.replace(/\[.*?\]/g, "")
            }
            this.replaceSelection("[url=" + F + D + "]" + E + "[/url]")
        }, {
            id: "bbcode_link_button"
        })
    },
    addColorSelect: function(G, C, E) {
        var B = document.createElement("select");
        if (E) {
            var H = 170;
            if (navigator.appVersion.match(/\bMSIE\b/)) {
                H += 4
            }
            B.style.width = (Element.getDimensions(this.textarea.textarea).width - H - 3) + "px"
        }
        Event.observe(B, "change", function(J) {
            Event.stop(J);
            if (B.selectedIndex == 0) {
                return
            }
            var I = Event.element(J).value;
            B.selectedIndex = 0;
            this.textarea.wrapSelection("[color=" + I + "]", "[/color]")
        }.bind(this));
        var F = document.createElement("option");
        F.innerHTML = G;
        B.appendChild(F);
        B.selectedIndex = 0;
        for (var D in C) {
            F = document.createElement("option");
            F.innerHTML = C[D][1];
            F.style.color = C[D][0];
            F.value = D;
            B.appendChild(F)
        }
        var A = new Element("li", {
            className: "control-button"
        });
        A.appendChild(B);
        this.toolbar.toolbar.appendChild(A)
    },
    addHabboLinkTools: function() {
        var A = new Element("li", {
            className: "linktools"
        });
        var B = new Element("div");
        B.insert(L10N.get("linktool.find.label") + " ");
        var D = function(G, J, I) {
            var H = {
                name: "linktool-scope",
                type: "radio",
                value: J
            };
            if (I) {
                H.checked = "checked"
            }
            B.appendChild(new Element("input", H));
            B.insert(G + " ")
        };
        D(L10N.get("linktool.scope.habbos"), 1, true);
        D(L10N.get("linktool.scope.rooms"), 2);
        D(L10N.get("linktool.scope.groups"), 3);
        var C = new Element("input", {
            name: "linktool-query",
            type: "text",
            size: 20
        });
        B.appendChild(C);
        A.appendChild(B);
        A.insert(" ");
        var F = new Element("a", {
            href: "#",
            className: "new-button search-icon"
        });
        F.appendChild(new Element("b")).appendChild(new Element("span"));
        F.appendChild(new Element("i"));
        A.appendChild(F);
        var E = new Element("div", {
            className: "linktool-results"
        });
        A.appendChild(E);
        new LinkTool(this.textarea, {
            button: F,
            input: C,
            results: E,
            scopeButtons: A.select('input[name="linktool-scope"]')
        });
        this.toolbar.toolbar.appendChild(A)
    }
});
var GroupEditTools = {
    init: function(B, A) {
        GroupEditTools.groupId = B;
        GroupEditTools.buttonEl = A;
        Event.observe(GroupEditTools.buttonEl, "click", GroupEditTools.handleButtonClick);
        Event.observe(document.body, "click", function(C) {
            if (GroupEditTools.isOpen) {
                GroupEditTools.close()
            }
        })
    },
    handleButtonClick: function(A) {
        Event.stop(A);
        (GroupEditTools.isOpen) ? GroupEditTools.close(): GroupEditTools.open()
    },
    handleToolsClick: function(B) {
        GroupEditTools.close();
        var A = Event.findElement(B, "a");
        if (A && A.id) {
            if (A.id != "group-tools-style") {
                Event.stop(B);
                switch (A.id) {
                    case "group-tools-settings":
                        openGroupSettings(GroupEditTools.groupId);
                        break;
                    case "group-tools-badge":
                        openGroupBadgeEditor(GroupEditTools.groupId);
                        break;
                    case "group-tools-members":
                        MembersList.open();
                        break
                }
            }
        } else {
            Event.stop(B)
        }
    },
    open: function() {
        if (!GroupEditTools.toolsEl) {
            GroupEditTools.toolsEl = $("group-tools");
            Event.observe(GroupEditTools.toolsEl, "click", GroupEditTools.handleToolsClick)
        }
        var A = GroupEditTools.buttonEl.cumulativeOffset();
        GroupEditTools.toolsEl.style.top = (Element.getHeight(GroupEditTools.buttonEl) + A[1]) + "px";
        GroupEditTools.toolsEl.style.left = A[0] + "px";
        Element.show(GroupEditTools.toolsEl);
        GroupEditTools.isOpen = true;
        Utils.setAllEmbededObjectsVisibility("hidden")
    },
    close: function() {
        Element.hide(GroupEditTools.toolsEl);
        GroupEditTools.isOpen = false;
        Utils.setAllEmbededObjectsVisibility("visible")
    }
};