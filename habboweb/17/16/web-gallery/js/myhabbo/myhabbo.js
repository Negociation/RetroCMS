var reportingButtonsObserved = false;
var reportingZ = 8100;
var oldZ = new Array();
var bringToTop = function(A) {
    Event.stop(A);
    if (reportingButtonsObserved == true) {
        oldZ[this.id] = this.style.zIndex;
        this.style.zIndex = reportingZ;
        reportingZ++
    }
};

function initView(D, E) {
    var L = $("leave-group-button");
    if (L) {
        Event.observe(L, "click", function(O) {
            Event.stop(O);
            openGroupActionDialog("/groups/actions/confirm_leave", "/groups/actions/leave", null, D, null)
        })
    }
    var H = $("join-group-button");
    if (H) {
        Event.observe(H, "click", function(O) {
            Event.stop(O);
            openGroupJoinDialog("/groups/actions/join", D)
        })
    }
    var C = $("join-group-with-invite-button");
    if (C) {
        Event.observe(C, "click", function(O) {
            Event.stop(O);
            openGroupJoinWithInviteDialog("/groups/actions/join", D)
        })
    }
    var A = $("webstore-button");
    if (A) {
        Event.observe(A, "click", function(O) {
            Event.stop(O);
            loadWebStore(function() {
                if (window.WebStore) {
                    WebStore.open("webstore-store")
                }
            })
        })
    }
    var F = $("inventory-button");
    if (F) {
        Event.observe(F, "click", function(O) {
            Event.stop(O);
            loadWebStore(function() {
                if (window.WebStore) {
                    WebStore.open("webstore-inventory")
                }
            })
        })
    }
    var I = $("reporting-button");
    if (I) {
        Element.show(I);
        Event.observe(I, "click", startReportingModeObserver, false);
        Event.observe("stop-reporting-button", "click", stopReportingModeObserver, false)
    }
    var N = $("myhabbo-group-tools-button");
    if (N) {
        GroupEditTools.init(D, N)
    }
    var J = $("group-memberlist");
    if (J) {
        MembersList.init(D, E)
    }
    var K = $("select-favorite-button");
    var G = $("deselect-favorite-button");
    if (K || G) {
        GroupFavoriteSelector.init(null, E, D, function() {
            window.location.replace(window.location.href)
        });
        if (K) {
            Event.observe(K, "click", GroupFavoriteSelector.selectFavorite)
        }
        if (G) {
            Event.observe(G, "click", GroupFavoriteSelector.deselectFavorite)
        }
    }
    if (!!location.hash) {
        var M = location.hash.substring(1).split("/");
        if (J && M[0] == "members") {
            MembersList.open();
            if (M[1] == "pending") {
                MembersList.switchToPending();
                MembersList.loadPending(true)
            }
        }
        if (!!$("group-tools-settings") && window.GroupEditTools) {
            if (M[0] == "settings") {
                openGroupSettings(GroupEditTools.groupId)
            }
        }
    }
}
var startReportingModeObserver = function(C) {
    Event.stop(C);
    var D = $("playground");
    D.select(".report-button").each(function(E) {
        Element.show(E);
        E.style.zIndex = 9998
    });
    $$(".reporting-start").each(function(E) {
        Element.show(E);
        E.style.zIndex = 9998
    });
    D.select(".stickie").each(function(E) {
        Event.observe(E, "click", this.bringToTop.bindAsEventListener(E), false)
    });
    D.select(".RoomsWidget").each(function(E) {
        Event.observe(E, "click", this.bringToTop.bindAsEventListener(E), false)
    });
    D.select(".ProfileWidget").each(function(E) {
        Event.observe(E, "click", this.bringToTop.bindAsEventListener(E), false)
    });
    var A = D.select(".sticker").concat(D.select(".FriendsWidget")).concat(D.select(".HighScoresWidget")).findAll(function(E) {
        return !E.hasClassName("es_dynamic_animator_sticker")
    });
    A.each(function(E) {
        Element.hide(E)
    });
    if (!reportingButtonsObserved) {
        $$(".report-button.report-s").each(function(F) {
            var E = F.id.substring("stickie-".length, F.id.length - "-report".length);
            Event.observe(F, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("stickie", E, F)
            }, false)
        });
        $$(".report-button.report-n").each(function(E) {
            var F = E.id.substring("name-".length, E.id.length - "-report".length);
            Event.observe(E, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("name", F, E)
            }, false)
        });
        $$(".reporting-start").each(function(E) {
            var F = E.id.substring("url-".length, E.id.length - "-report".length);
            Event.observe(E, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("url", F, E)
            }, false)
        });
        $$(".report-button.report-m").each(function(E) {
            var F = E.id.substring("motto-".length, E.id.length - "-report".length);
            Event.observe(E, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("motto", F, E)
            }, false)
        });
        $$(".report-button.report-gn").each(function(F) {
            var E = F.id.substring("groupname-".length, F.id.length - "-report".length);
            Event.observe(F, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("groupname", E, F)
            }, false)
        });
        $$(".report-button.report-gd").each(function(F) {
            var E = F.id.substring("groupdesc-".length, F.id.length - "-report".length);
            Event.observe(F, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("groupdesc", E, F)
            }, false)
        });
        $$(".report-button.report-r").each(function(E) {
            var F = E.id.substring("room-".length, E.id.length - "-report".length);
            Event.observe(E, "click", function(G) {
                Event.stop(G);
                ReportDialogManager.show("room", F, E)
            }, false)
        });
        $$(".es_dynamic_animator_sticker").each(function(E) {
            var G = E.id.substring("sticker-".length);
            var F = Builder.node("img", {
                src: habboStaticFilePath + "/images/myhabbo/buttons/report_button.gif",
                "class": "animator-report-button"
            });
            E.appendChild(F);
            setTimeout(function() {
                Event.observe(F, "click", function(H) {
                    Event.stop(H);
                    ReportDialogManager.show("animator", G, E)
                }, false)
            }, 50)
        });
        reportingButtonsObserved = true
    }
    Element.hide("reporting-button");
    Element.show("stop-reporting-button")
};
var stopReportingModeObserver = function(A) {
    Event.stop(A);
    var C = $("playground");
    C.select(".report-button").each(function(D) {
        Element.hide(D)
    });
    $$(".reporting-start").each(function(D) {
        Element.hide(D)
    });
    reportingZ = 8100;
    C.select(".stickie").each(function(D) {
        Event.stopObserving(D, "click", this.bringToTop, false)
    });
    C.select(".ProfileWidget").each(function(D) {
        Event.stopObserving(D, "click", this.bringToTop, false)
    });
    C.select(".RoomsWidget").each(function(D) {
        Event.stopObserving(D, "click", this.bringToTop, false)
    });
    C.select(".sticker").each(function(D) {
        Element.show(D)
    });
    C.select(".FriendsWidget").each(function(D) {
        Element.show(D)
    });
    C.select(".HighScoresWidget").each(function(D) {
        Element.show(D)
    });
    $$(".es_dynamic_animator_sticker").each(function(E) {
        var D = E.getElementsByTagName("img");
        if (D.length > 0) {
            Element.remove(D[0])
        }
    });
    for (x in oldZ) {
        el = $(x);
        if (el) {
            el.style.zIndex = oldZ[x]
        }
    }
    oldZ = new Array();
    Element.hide("stop-reporting-button");
    ReportDialogManager.hideAll();
    Element.show("reporting-button");
    Event.observe("reporting-button", "click", startReportingModeObserver, false)
};

function observeAnim() {
    var D = $$(".profile-figure");
    if (D.length > 0) {
        R = 0;
        x1 = 0.1;
        y1 = 0.08;
        x2 = 0.25;
        y2 = 0.24;
        x3 = 1.6;
        y3 = 0.24;
        x4 = 220;
        y4 = 200;
        x5 = 260;
        y5 = 200;
        DI = $("mypage-wrapper").select(".movable");
        DIL = DI.length;
        bckup = new Array();
        for (i = 0; i < DIL; i++) {
            bckup[DI[i].id + "-t"] = DI[i].style.top;
            bckup[DI[i].id + "-l"] = DI[i].style.left
        }
        Event.observe(D[0], "dblclick", function(A) {
            if (R < 100) {
                Event.stop(A);
                for (i = 0; i < DIL; i++) {
                    new Effect.Move(DI[i], {
                        x: parseFloat(Math.sin(R * x1 + i * x2 + x3) * x4 + x5),
                        y: parseFloat(Math.cos(R * y1 + i * y2 + y3) * y4 + y5),
                        mode: "absolute"
                    })
                }
                setTimeout(function() {
                    B = setInterval(C, 10)
                }, 1000)
            }
        })
    }

    function C() {
        for (i = 0; i < DIL; i++) {
            DIS = DI[i].style;
            DIS.left = Math.sin(R * x1 + i * x2 + x3) * x4 + x5 + "px";
            DIS.top = Math.cos(R * y1 + i * y2 + y3) * y4 + y5 + "px"
        }
        R++;
        if (R > 100) {
            clearInterval(B);
            for (i = 0; i < DIL; i++) {
                new Effect.Move(DI[i], {
                    x: parseFloat(bckup[DI[i].id + "-l"]),
                    y: parseFloat(bckup[DI[i].id + "-t"]),
                    mode: "absolute"
                })
            }
        }
    }
}

function letItSnow() {
    var Q = new Date();
    var T = Q.getMonth();
    var N = Q.getDate();
    var I = 11;
    var M = 24;
    var P = 18;
    if (I == Q.getMonth() && M == Q.getDate() && Q.getHours() >= P) {
        var F = 20;
        var H = new Array();
        var V = 850;
        var G = new Array();
        var A = 1400;
        var O = new Array();
        var U = new Array();
        var D = new Array();
        for (i = 0; i < F; i++) {
            var L = "the_stickr_" + i;
            H[i] = V * Math.random();
            G[i] = A * Math.random();
            O[i] = Math.random() * 10 + 5;
            U[i] = Math.random() * 7 + 1;
            D[i] = Math.random() * 2 * Math.PI;
            var J = "";
            if (i % 2 == 0) {
                J = '<div class="the_stickr sticker s_ss_snowflake2" style="left: ' + H[i] + "px; top: " + G[i] + 'px; z-index: 100" id="' + L + '">'
            } else {
                J = '<div class="the_stickr sticker s_ss_snowflake1" style="left: ' + H[i] + "px; top: " + G[i] + 'px; z-index: 100" id="' + L + '">'
            }
            $("playground").insert(J);
            Element.hide($(L));
            new Effect.Appear($(L))
        }
        var S = $("mypage-wrapper").select(".the_stickr");
        var C = 0;
        var K = 0;
        setTimeout(function() {
            K = setInterval(E, 80)
        }, 1000);

        function E() {
            for (i = 0; i < F; i++) {
                H[i] = Math.sin(D[i] + C * 0.1) * O[i] + H[i];
                G[i] = U[i] + G[i];
                if (G[i] > A) {
                    G[i] -= A
                }
                stickrStyle = S[i].style;
                stickrStyle.left = H[i] + "px";
                stickrStyle.top = G[i] + "px"
            }
            C++;
            if (C > 1000) {
                clearInterval(K);
                for (i = 0; i < F; i++) {
                    var W = "the_stickr_" + i;
                    Element.hide($(W))
                }
            }
        }
    }
}

function openGroupActionDialog(J, H, F, D, E, C) {
    var A = "9001";
    if (E != null && E.widgetId != 0) {
        Overlay.show()
    } else {
        Overlay.move("9002");
        A = "9003"
    }
    var G = Dialog.createDialog("group-action-dialog", "", A);
    Dialog.moveDialogToCenter(G);
    Dialog.setAsWaitDialog(G);
    var I = {
        groupId: D
    };
    if (F) {
        I.targetAccountId = F
    }
    new Ajax.Request(habboReqPath + J, {
        method: "post",
        parameters: I,
        onComplete: function(L, K) {
            Dialog.setDialogBody(G, L.responseText);
            if (!!$("group-action-cancel")) {
                Event.observe($("group-action-cancel"), "click", function(M) {
                    Event.stop(M);
                    hideGroupActionDialog(E)
                })
            }
            if (!!$("group-action-ok")) {
                Event.observe($("group-action-ok"), "click", function(M) {
                    Event.stop(M);
                    Dialog.setAsWaitDialog(G);
                    var N = {
                        groupId: D
                    };
                    if (F) {
                        N.targetAccountId = F
                    }
                    new Ajax.Request(habboReqPath + H, {
                        method: "post",
                        parameters: N,
                        onComplete: function(Q, P) {
                            var O = true;
                            if (C) {
                                O = C(Q, P)
                            }
                            if (O) {
                                Dialog.setDialogBody(G, Q.responseText);
                                Q.responseText.evalScripts();
                                if (!!$("group-action-cancel")) {
                                    Event.observe($("group-action-cancel"), "click", function(S) {
                                        Event.stop(S);
                                        hideGroupActionDialog(E)
                                    })
                                }
                            }
                        }
                    })
                })
            }
        }
    })
}

function openGroupJoinDialog(A, D) {
    var E = "9001";
    Overlay.show();
    var C = Dialog.createDialog("group-action-dialog", "", E);
    Dialog.moveDialogToCenter(C);
    Dialog.setAsWaitDialog(C);
    new Ajax.Request(habboReqPath + A, {
        method: "post",
        parameters: {
            groupId: D
        },
        onComplete: function(G, F) {
            Dialog.setDialogBody(C, G.responseText);
            if ($("error-action-cancel")) {
                Event.observe($("error-dialog-cancel"), "click", function(H) {
                    Event.stop(H);
                    hideGroupActionDialog()
                })
            }
            if ($("group-action-ok")) {
                Event.observe($("group-action-ok"), "click", function(H) {
                    Event.stop(H);
                    window.location.replace(window.location.href)
                })
            }
            G.responseText.evalScripts()
        }
    })
}

function openGroupJoinWithInviteDialog(A, D) {
    var E = "9001";
    Overlay.show();
    var C = Dialog.createDialog("group-action-dialog", "", E);
    Dialog.moveDialogToCenter(C);
    Dialog.setAsWaitDialog(C);
    new Ajax.Request(habboReqPath + A, {
        method: "post",
        parameters: {
            groupId: D,
            inviteNeeded: true
        },
        onComplete: function(G, F) {
            Dialog.setDialogBody(C, G.responseText);
            if ($("group-action-ok")) {
                Event.observe($("group-action-ok"), "click", function(H) {
                    Event.stop(H);
                    var I = $F("group-invitation-code");
                    Dialog.setAsWaitDialog(C);
                    new Ajax.Request(habboReqPath + A, {
                        method: "post",
                        parameters: {
                            groupId: D,
                            inviteNeeded: true,
                            inviteCode: I
                        },
                        onComplete: function(K, J) {
                            Dialog.setDialogBody(C, K.responseText);
                            if ($("group-action-ok")) {
                                Event.observe($("group-action-ok"), "click", function(L) {
                                    Event.stop(L);
                                    window.location.replace(window.location.href)
                                })
                            }
                        }
                    })
                })
            }
            if ($("group-action-cancel")) {
                Event.observe($("group-action-cancel"), "click", function(H) {
                    Event.stop(H);
                    window.location.replace(window.location.href)
                })
            }
            G.responseText.evalScripts()
        }
    })
}

function addGroupActionEventHandler(D, F, H, A, I, C, G, E) {
    Event.observe(D, F, function(J) {
        Event.stop(J);
        openGroupActionDialog(H, A, I, C, G, E)
    })
}

function hideGroupActionDialog(A) {
    $("group-action-dialog").remove();
    if (A != null && A.widgetId != null && A.widgetId != 0) {
        Overlay.hide()
    } else {
        Overlay.move("9000")
    }
}

function showGroupSettingsConfirmation(D) {
    if ($("group-settings-update-button").hasClassName("disabled")) {
        return
    }
    $("group-settings-update-button").addClassName("disabled");
    var E = Form.getInputs($("group-settings-form"), "radio", "group_type").find(function(J) {
        return J.checked
    }).value;
    var A = Form.getInputs($("group-settings-form"), "radio", "forum_type").find(function(J) {
        return J.checked
    }).value;
    var I = Form.getInputs($("group-settings-form"), "radio", "new_topic_permission").find(function(J) {
        return J.checked
    }).value;
    var C = $F("initial_group_type");
    var H = $F("group_url_edited");
    var G = $F("group_url");
    var H = $F("group_url_edited");
    var F = {
        url: G,
        groupId: D
    };
    if (G == "" || H == 0) {
        confirmAndUpdateGroupSettings(D)
    } else {
        new Ajax.Request(habboReqPath + "/groups/actions/check_group_url", {
            method: "post",
            parameters: F,
            onComplete: function(N, M) {
                var O = Dialog.createDialog("group-url-confirmation", L10N.get("group.settings.title.text"), "9003", 0, -1000, cancelGroupSettingsConfirmation);
                var L = Builder.node("a", {
                    href: "#",
                    className: "new-button"
                }, [Builder.node("b", L10N.get("myhabbo.groups.confirmation_ok")), Builder.node("i")]);
                var P = Builder.node("a", {
                    href: "#",
                    className: "new-button"
                }, [Builder.node("b", L10N.get("myhabbo.groups.confirmation_cancel")), Builder.node("i")]);
                var K = N.responseText;
                var J = K.match(/(^ERROR\s)(.+$)/);
                if (J == null) {
                    Dialog.appendDialogBody(O, Builder.node("p", K));
                    Dialog.appendDialogBody(O, P);
                    Dialog.appendDialogBody(O, L)
                } else {
                    K = J[2];
                    Dialog.appendDialogBody(O, Builder.node("p", K));
                    Dialog.appendDialogBody(O, P)
                }
                Event.observe(P, "click", function(Q) {
                    Event.stop(Q);
                    Element.remove("group-url-confirmation");
                    $("group-settings-update-button").removeClassName("disabled");
                    Overlay.move("9001")
                }, false);
                Event.observe(L, "click", function(Q) {
                    Element.remove("group-url-confirmation");
                    confirmAndUpdateGroupSettings(D)
                });
                Overlay.move("9002");
                O.style.zIndex = "9003";
                Dialog.moveDialogToCenter(O)
            }
        })
    }
}

function cancelGroupSettingsConfirmation() {
    Element.remove("group-settings-confirmation");
    $("group-settings-update-button").removeClassName("disabled");
    Overlay.move("9001")
}

function confirmAndUpdateGroupSettings(C) {
    var D = Form.getInputs($("group-settings-form"), "radio", "group_type").find(function(F) {
        return F.checked
    }).value;
    var A = $("initial_group_type").value;
    if (D != A) {
        var E = ["normal", "exclusive", "closed", "large"];
        Dialog.showConfirmDialog(L10N.get("group.settings.group_type_change_warning." + E[parseInt(D)]), {
            okHandler: function() {
                Element.remove($(this.dialogId));
                Overlay.hide();
                updateGroupSettings(C)
            },
            cancelHandler: function() {
                $("group-settings-update-button").removeClassName("disabled")
            },
            headerText: L10N.get("group.settings.title.text"),
            buttonText: L10N.get("myhabbo.groups.confirmation_ok"),
            cancelButtonText: L10N.get("myhabbo.groups.confirmation_cancel")
        })
    } else {
        updateGroupSettings(C)
    }
}

function updateGroupSettings(A) {
    new Ajax.Request(habboReqPath + "/groups/actions/update_group_settings", {
        parameters: {
            name: $F("group_name"),
            description: $F("group_description"),
            groupId: A,
            type: Form.getInputs($("group-settings-form"), "radio", "group_type").find(function(C) {
                return C.checked
            }).value,
            url: $F("group_url"),
            forumType: Form.getInputs($("group-settings-form"), "radio", "forum_type").find(function(C) {
                return C.checked
            }).value,
            newTopicPermission: Form.getInputs($("group-settings-form"), "radio", "new_topic_permission").find(function(C) {
                return C.checked
            }).value,
            roomId: Form.getInputs($("group-settings-form"), "radio", "roomId").find(function(C) {
                return C.checked
            }).value
        },
        onComplete: function(D) {
            var C = $("dialog-group-settings");
            if (D.responseText.indexOf("group-settings-form") < 0) {
                Overlay.move("9002");
                C = Dialog.createDialog("group_settings_result", L10N.get("group.settings.title.text"), "9003", 0, -1000, closeGroupSettings);
                C.style.zIndex = "9003"
            } else {
                Overlay.move("9001")
            }
            Dialog.setDialogBody(C, D.responseText);
            Dialog.moveDialogToCenter(C)
        }
    })
}

function closeGroupSettings() {
    var A = $("dialog-group-settings");
    A.style.left = "-1500px";
    A.hide();
    Element.wait($("dialog-group-settings-body"));
    Overlay.hide()
}

function openGroupSettings(C) {
    var A = $("dialog-group-settings");
    A.show();
    A.style.zIndex = "9001";
    new Ajax.Updater("dialog-group-settings-body", habboReqPath + "/groups/actions/group_settings", {
        parameters: {
            groupId: C
        },
        evalScripts: true,
        method: "post"
    });
    Overlay.show();
    Dialog.moveDialogToCenter(A);
    Event.observe("group-settings-link-group", "click", function(D) {
        switchGroupSettingsTab(D, "group")
    });
    Event.observe("group-settings-link-forum", "click", function(D) {
        switchGroupSettingsTab(D, "forum")
    });
    Event.observe("group-settings-link-room", "click", function(D) {
        switchGroupSettingsTab(D, "room")
    })
}

function switchGroupSettingsTab(D, A) {
    if (!!D) {
        Event.stop(D)
    }
    var C = $("group-settings-link-" + A);
    if (!C.hasClassName("selected")) {
        $A(["group", "forum", "room"]).without(A).each(function(E) {
            $("group-settings-link-" + E).removeClassName("selected");
            $(E + "-settings").hide()
        });
        C.addClassName("selected");
        $(A + "-settings").show()
    }
}
var MembersList = {
    init: function(A, C) {
        MembersList.groupId = A;
        MembersList.myUserId = C;
        MembersList.selected = "members";
        MembersList.targetPageNumber = 1;
        MembersList.dialog = $("group-memberlist");
        MembersList.membersDiv = $("group-memberlist-members");
        MembersList.pendingDiv = $("group-memberlist-pending");
        MembersList.memberButtonsDiv = $("group-memberlist-members-buttons");
        MembersList.pendingButtonsDiv = $("group-memberlist-pending-buttons");
        MembersList.searchButton = $("group-memberlist-members-search-button");
        MembersList.largeGroup = MembersList.searchButton.hasClassName("large-group");
        Element.hide(MembersList.dialog);
        Element.hide(MembersList.membersDiv);
        if (MembersList.pendingDiv) {
            Element.hide(MembersList.pendingDiv)
        }
        Element.hide(MembersList.memberButtonsDiv);
        if (MembersList.pendingButtonsDiv) {
            Element.hide(MembersList.pendingButtonsDiv)
        }
        MembersList.loadingMembers = false;
        MembersList.loadingPending = false;
        MembersList.loadedMembers = 0;
        MembersList.loadedPending = 0;
        Event.observe("group-memberlist-link-members", "click", function(D) {
            Event.stop(D);
            if (MembersList.selected != "members") {
                MembersList.switchToMembers();
                if (new Date().getTime() - MembersList.loadedMembers > 10000) {
                    MembersList.loadMembers(true, 1)
                }
            }
        });
        if (MembersList.pendingDiv) {
            Event.observe("group-memberlist-link-pending", "click", function(D) {
                Event.stop(D);
                if (MembersList.selected != "pending") {
                    MembersList.switchToPending();
                    if (new Date().getTime() - MembersList.loadedPending > 10000) {
                        MembersList.loadPending(true)
                    }
                }
            })
        }
        Event.observe(MembersList.memberButtonsDiv, "click", function(D) {
            Event.stop(D);
            MembersList.processButtons(D)
        });
        if (MembersList.pendingButtonsDiv) {
            Event.observe(MembersList.pendingButtonsDiv, "click", function(D) {
                Event.stop(D);
                MembersList.processButtons(D)
            })
        }
        Event.observe($("group-memberlist-exit"), "click", function(D) {
            Event.stop(D);
            MembersList.close()
        });
        Event.observe(MembersList.searchButton, "click", function(D) {
            Event.stop(D);
            MembersList.processSearch(D)
        });
        Event.observe("group-memberlist-members-search-string", "keypress", function(D) {
            if (D.keyCode == Event.KEY_RETURN) {
                MembersList.processSearch(D)
            }
        })
    },
    open: function() {
        Overlay.show();
        Element.show(MembersList.dialog);
        Dialog.moveDialogToCenter(MembersList.dialog);
        if (MembersList.selected == "pending") {
            MembersList.switchToPending();
            MembersList.loadPending(true)
        } else {
            MembersList.switchToMembers();
            MembersList.loadMembers(true, 1)
        }
    },
    close: function() {
        MembersList.dialog.style.left = "-1500px";
        Element.hide(MembersList.dialog);
        Overlay.hide()
    },
    switchToMembers: function() {
        Element.hide("group-memberlist-" + MembersList.selected);
        Element.hide("group-memberlist-" + MembersList.selected + "-buttons");
        Element.removeClassName("group-memberlist-link-" + MembersList.selected, "selected");
        Element.show("group-memberlist-members");
        Element.show("group-memberlist-members-buttons");
        Element.addClassName("group-memberlist-link-members", "selected");
        MembersList.selected = "members"
    },
    switchToPending: function() {
        Element.hide("group-memberlist-" + MembersList.selected);
        Element.hide("group-memberlist-" + MembersList.selected + "-buttons");
        Element.removeClassName("group-memberlist-link-" + MembersList.selected, "selected");
        Element.show("group-memberlist-pending");
        Element.show("group-memberlist-pending-buttons");
        Element.addClassName("group-memberlist-link-pending", "selected");
        MembersList.selected = "pending"
    },
    loadMembers: function(C, D) {
        if (!MembersList.loadingMembers) {
            Element.wait(MembersList.membersDiv);
            MembersList.loadingMembers = true;
            var A = $F("group-memberlist-members-search-string");
            if (A == null) {
                A = ""
            }
            new Ajax.Updater("group-memberlist-members", habboReqPath + "/myhabbo/groups/memberlist", {
                method: "post",
                parameters: {
                    pageNumber: D,
                    groupId: MembersList.groupId,
                    searchString: A
                },
                onComplete: function(F, E) {
                    if (C) {
                        MembersList.updateTitles(E.members, E.pending)
                    }
                    MembersList.loadingMembers = false;
                    MembersList.loadedMembers = new Date().getTime();
                    if ($("member-list-paging")) {
                        Event.observe($("member-list-paging"), "click", function(G) {
                            Event.stop(G);
                            MembersList.processSearch(G)
                        })
                    }
                    Event.observe(MembersList.membersDiv, "click", function(H) {
                        var G = Event.element(H);
                        if (G.nodeName.toLowerCase() == "input") {
                            MembersList.clickCheckbox();
                            return
                        }
                        G = Event.findElement(H, "li");
                        if (G && G.id && G.id.lastIndexOf("-") != -1) {
                            var I = parseFloat(G.id.substring(G.id.lastIndexOf("-") + 1));
                            if (I > 0) {
                                MembersList.loadAvatarInfo(I)
                            }
                            return
                        }
                    })
                }
            })
        }
    },
    loadPending: function(A) {
        if (!MembersList.loadingPending) {
            Element.wait(MembersList.pendingDiv);
            MembersList.loadingPending = true;
            new Ajax.Updater("group-memberlist-pending", habboReqPath + "/myhabbo/groups/memberlist", {
                method: "post",
                parameters: {
                    groupId: MembersList.groupId,
                    pending: "true"
                },
                onComplete: function(D, C) {
                    if (A) {
                        MembersList.updateTitles(C.members, C.pending)
                    }
                    MembersList.loadingPending = false;
                    MembersList.loadedPending = new Date().getTime();
                    Event.observe(MembersList.pendingDiv, "click", function(F) {
                        var E = Event.element(F);
                        if (E.nodeName.toLowerCase() == "input") {
                            MembersList.clickCheckbox();
                            return
                        }
                        E = Event.findElement(F, "li");
                        if (E && E.id && E.id.lastIndexOf("-") != -1) {
                            var G = parseFloat(E.id.substring(E.id.lastIndexOf("-") + 1));
                            if (G > 0) {
                                MembersList.loadAvatarInfo(G)
                            }
                            return
                        }
                    })
                }
            })
        }
    },
    loadAvatarInfo: function(A) {
        var D = $("group-memberlist-avatarinfo-" + A);
        var C = D.parentNode;
        if (D.innerHTML == "") {
            Element.wait(D);
            Element.show(D);
            Element.addClassName(C, "group-memberlist-opened");
            new Ajax.Request(habboReqPath + "/myhabbo/groups/memberlist_avatarinfo", {
                method: "post",
                parameters: {
                    theAccountId: A,
                    groupId: MembersList.groupId
                },
                onComplete: function(F, E) {
                    D.innerHTML = F.responseText;
                    D.style.display = "block";
                    Element.addClassName($("group-memberlist-member-" + A), "group-memberlist-opened")
                }
            })
        } else {
            if (!Element.visible(D)) {
                D.style.display = "block";
                Element.addClassName(C, "group-memberlist-opened")
            } else {
                D.style.display = "none";
                Element.removeClassName(C, "group-memberlist-opened")
            }
        }
    },
    updateTitles: function(C, A) {
        ($("group-memberlist-link-members").getElementsByTagName("a"))[0].innerHTML = C;
        if ($("group-memberlist-link-pending")) {
            ($("group-memberlist-link-pending").getElementsByTagName("a"))[0].innerHTML = A
        }
    },
    processButtons: function(C) {
        var A = Event.findElement(C, "a");
        if (A) {
            if (!Element.hasClassName(A, "group-memberlist-button-disabled")) {
                var D = A.id;
                if (D.indexOf("-close") != -1) {
                    MembersList.close()
                } else {
                    if (D == "group-memberlist-button-remove") {
                        MembersList.confirm("remove")
                    } else {
                        if (D == "group-memberlist-button-give-rights") {
                            MembersList.confirm("give_rights")
                        } else {
                            if (D == "group-memberlist-button-revoke-rights") {
                                MembersList.confirm("revoke_rights")
                            } else {
                                if (D == "group-memberlist-button-accept") {
                                    MembersList.confirm("accept")
                                } else {
                                    if (D == "group-memberlist-button-decline") {
                                        MembersList.confirm("decline")
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    processSearch: function(G) {
        var D = Event.element(G);
        if (D.id == "member-list-paging") {
            return
        }
        var C = $F("group-memberlist-members-search-string");
        if (C == null) {
            C = ""
        }
        if (MembersList.largeGroup && (C.length > 0 && C.length < 3)) {
            $("group-memberlist-search-info").addClassName("error")
        }
        var A = parseInt($F("pageNumberMemberList"));
        if (A == null) {
            A = 1
        }
        var F = parseInt($F("totalPagesMemberList"));
        if (F == null) {
            F = 0
        }
        var E = 1;
        if (D.id == "memberlist-search-first") {
            E = 1
        } else {
            if (D.id == "memberlist-search-previous") {
                E = A - 1
            } else {
                if (D.id == "memberlist-search-next") {
                    E = A + 1
                } else {
                    if (D.id == "memberlist-search-last") {
                        E = F
                    }
                }
            }
        }
        MembersList.loadMembers(true, E)
    },
    clickCheckbox: function() {
        if (MembersList.selected == "members") {
            var C = false;
            var A = false;
            var F = MembersList.myUserId;
            var D = false;
            $A(MembersList.membersDiv.getElementsByTagName("input")).each(function(G) {
                if (G.checked) {
                    if (G.id.substring(17, 18) == "a") {
                        C = true
                    } else {
                        A = true
                    }
                    if (G.id.substring(G.id.lastIndexOf("-") + 1) == F) {
                        D = true
                    }
                }
            });
            if (C && A) {
                MembersList.disableButton("give-rights");
                MembersList.disableButton("revoke-rights");
                MembersList.enableButton("remove")
            } else {
                if (!C && !A) {
                    MembersList.disableButton("give-rights");
                    MembersList.disableButton("revoke-rights");
                    MembersList.disableButton("remove")
                } else {
                    if (C) {
                        MembersList.disableButton("give-rights");
                        MembersList.enableButton("revoke-rights");
                        MembersList.enableButton("remove")
                    } else {
                        if (A) {
                            MembersList.enableButton("give-rights");
                            MembersList.disableButton("revoke-rights");
                            MembersList.enableButton("remove")
                        }
                    }
                }
            }
            if (D) {
                MembersList.disableButton("revoke-rights");
                MembersList.disableButton("remove")
            }
        } else {
            if (MembersList.selected == "pending") {
                var E = false;
                $A(MembersList.pendingDiv.getElementsByTagName("input")).each(function(G) {
                    if (G.checked) {
                        E = true;
                        throw $break
                    }
                });
                if (E) {
                    MembersList.enableButton("accept");
                    MembersList.enableButton("decline")
                } else {
                    MembersList.disableButton("accept");
                    MembersList.disableButton("decline")
                }
            }
        }
    },
    enableButton: function(A) {
        Element.removeClassName($("group-memberlist-button-" + A), "group-memberlist-button-disabled");
        Element.addClassName($("group-memberlist-button-" + A), "group-memberlist-button")
    },
    disableButton: function(A) {
        Element.removeClassName($("group-memberlist-button-" + A), "group-memberlist-button");
        Element.addClassName($("group-memberlist-button-" + A), "group-memberlist-button-disabled")
    },
    confirm: function(C) {
        var E = [];
        var A = (MembersList.selected == "pending") ? MembersList.pendingDiv : MembersList.membersDiv;
        $A(A.getElementsByTagName("input")).each(function(F) {
            if (F.checked) {
                E.push(F.id.substring(F.id.lastIndexOf("-") + 1))
            }
        });
        if (E.length > 0) {
            Overlay.move("9002");
            var D = Dialog.createDialog("group-memberlist-action-dialog", "", "9003");
            Dialog.moveDialogToCenter(D);
            Dialog.setAsWaitDialog(D);
            new Ajax.Request(habboReqPath + "/myhabbo/groups/batch/confirm_" + C, {
                method: "post",
                parameters: {
                    groupId: MembersList.groupId,
                    targetIds: E
                },
                onComplete: function(G, F) {
                    Dialog.setDialogBody(D, G.responseText);
                    if ($("error-dialog-cancel")) {
                        Event.observe($("error-dialog-cancel"), "click", function(H) {
                            Event.stop(H);
                            MembersList.closeConfirmationDialog()
                        })
                    }
                    if ($("group-action-cancel")) {
                        Event.observe($("group-action-cancel"), "click", function(H) {
                            Event.stop(H);
                            MembersList.closeConfirmationDialog()
                        })
                    }
                    if ($("group-action-ok")) {
                        Event.observe($("group-action-ok"), "click", function(H) {
                            Event.stop(H);
                            Dialog.setAsWaitDialog(D);
                            new Ajax.Request(habboReqPath + "/myhabbo/groups/batch/" + C, {
                                method: "post",
                                parameters: {
                                    groupId: MembersList.groupId,
                                    targetIds: E
                                },
                                onComplete: function(J, I) {
                                    if (J.responseText == "OK") {
                                        MembersList.closeConfirmationDialog();
                                        if (MembersList.selected == "pending") {
                                            MembersList.loadPending(true)
                                        } else {
                                            MembersList.loadMembers(true, 1)
                                        }
                                    } else {
                                        Dialog.setDialogBody(D, J.responseText);
                                        Event.observe($("error-dialog-cancel"), "click", function(K) {
                                            Event.stop(K);
                                            MembersList.closeConfirmationDialog()
                                        })
                                    }
                                }
                            })
                        })
                    }
                }
            })
        }
    },
    closeConfirmationDialog: function() {
        Element.remove("group-memberlist-action-dialog");
        Overlay.move("9000")
    }
};

function openGroupBadgeEditor(C) {
    var A = Dialog.createDialog("badge-editor-dialog", "", "9003", null, null, closeBadgeEditor);
    Dialog.makeDialogDraggable(A);
    Overlay.show();
    Overlay.hideIfMacFirefox();
    Dialog.moveDialogToCenter(A);
    Dialog.setAsWaitDialog(A);
    A.show();
    A.style.zIndex = "9001";
    new Ajax.Updater("badge-editor-dialog-body", habboReqPath + "/groups/actions/show_badge_editor", {
        parameters: {
            groupId: C
        },
        evalScripts: true,
        method: "post",
        onComplete: function(E, D) {
            Dialog.setDialogBody(A, E.responseText)
        }
    })
}

function closeBadgeEditor(A) {
    Overlay.hide();
    if (A != null) {
        Event.stop(A)
    }
    Element.remove("badge-editor-dialog")
}

function loadWebStore(A) {
    ScriptLoader.load("myhabbo-store", {
        callback: A || null
    })
}

function initDraggableDialogs() {
    $$(".topdialog").each(function(A) {
        var C = "title";
        if (!A.down("." + C, 0)) {
            C = "box-tabs"
        }
        new Draggable(A, {
            handle: C,
            starteffect: Prototype.emptyFunction,
            endeffect: Prototype.emptyFunction,
            zindex: 9100
        })
    })
}

function isNotWithinPlayground(C) {
    var G = $("playground");
    if (!G) {
        return false
    }
    var F = G.cumulativeOffset();
    var D = Element.getDimensions(G);
    var A = C.cumulativeOffset();
    var E = Element.getDimensions(C);
    return !(Position.within(G, A[0], A[1]) && Position.within(G, A[0] + E.width, A[1] + E.height))
}

function offsetToPlayground(C) {
    var G = $("playground");
    if (!G) {
        return 0
    }
    var F = G.cumulativeOffset();
    var D = Element.getDimensions(G);
    var A = C.cumulativeOffset();
    var E = Element.getDimensions(C);
    return F[0] + D.width - A[0] - E.width
}

function getElementsInInvalidPositions() {
    var A = [];
    $("playground").select(".movable").each(function(C) {
        if (isNotWithinPlayground(C)) {
            A.push(C)
        }
    });
    return A
}

function repositionInvalidItems() {
    var H = $("playground");
    if (!H) {
        return
    }
    var F = H.getDimensions();
    var A = getElementsInInvalidPositions();
    for (var E = 0; E < A.length; E++) {
        var D = A[E].cumulativeOffset();
        var G = A[E].getDimensions();
        if (D.top + G.height > F.height) {
            var C = F.height - G.height;
            A[E].setStyle({
                top: C + "px"
            })
        }
    }
}
var Discussions = {
    initialized: false,
    groupdId: null,
    groupUrl: null,
    topicId: null,
    baseParams: null,
    redirectLocation: null,
    captchaPublicKey: "none",
    captchaUrl: null,
    captchaTemplate: '<img id="captcha" src="" alt="" width="200" height="50" />',
    initialize: function(D, A, C) {
        if (!Discussions.initialized) {
            Discussions.initialized = true;
            Discussions.groupdId = D;
            if (Discussions.groupdId) {
                Discussions.baseParams = "groupId=" + Discussions.groupdId;
                Discussions.redirectLocation = habboReqPath + "/groups/" + Discussions.groupdId + habboReqPath + "/id/discussions"
            }
            Discussions.groupUrl = A;
            if (Discussions.groupUrl) {
                Discussions.redirectLocation = habboReqPath + "/groups/" + Discussions.groupUrl + "/discussions"
            }
            Discussions.topicId = C;
            if (Discussions.topicId) {
                Discussions.baseParams += "&topicId=" + Discussions.topicId
            }
            if ($("group-postlist-container")) {
                Event.observe($("group-postlist-container"), "click", Discussions.handleActions)
            }
            if ($("group-topiclist-container")) {
                Event.observe($("group-topiclist-container"), "click", Discussions.handleActions)
            }
        }
    },
    handleActions: function(I) {
        var F = Event.element(I);
        if (F.up("a.new-button")) {
            F = F.up("a.new-button")
        }
        if (F.className == "delete-button delete-post") {
            Event.stop(I);
            var E = F.id.substring("delete-post-".length);
            Discussions.removeEntry(E)
        } else {
            if (F.hasClassName("report-post")) {
                Event.stop(I);
                var E = F.id.substring("report-post-".length);
                ReportDialogManager.show("discussionpost", E, F, {
                    setWidth: false,
                    setHeight: false,
                    offsetTop: 0,
                    offsetLeft: -120
                })
            } else {
                if (F.id == "edit-topic-settings") {
                    Event.stop(I);
                    Discussions.openTopicSettings()
                } else {
                    if (F.id == "post-form-preview") {
                        Event.stop(I);
                        Discussions.previewPost()
                    } else {
                        if (F.id == "post-form-save" || F.id == "post-form-save-preview") {
                            Event.stop(I);
                            if (!F.hasClassName("disabled-button")) {
                                Discussions.savePost()
                            }
                        } else {
                            if (F.id == "post-form-cancel" || F.id == "post-form-cancel-preview") {
                                Event.stop(I);
                                Discussions.cancelPost()
                            } else {
                                if (F.id == "topic-form-preview") {
                                    Event.stop(I);
                                    Discussions.previewTopic()
                                } else {
                                    if (F.id == "topic-form-save" || F.id == "topic-form-save-preview") {
                                        Event.stop(I);
                                        if (!F.hasClassName("disabled-button")) {
                                            Discussions.saveTopic()
                                        }
                                    } else {
                                        if (F.id == "topic-form-cancel" || F.id == "topic-form-cancel-preview") {
                                            Event.stop(I);
                                            Discussions.cancelTopic()
                                        } else {
                                            if (F.id == "captcha-reload-link" || F.id == "recaptcha-reload-link") {
                                                Event.stop(I);
                                                Discussions.reloadCaptcha()
                                            } else {
                                                if (F.className.search("verify-email") > -1) {
                                                    Event.stop(I);
                                                    var C = F.id;
                                                    var G = $("email-verfication-ok").value;
                                                    var H = $("postentry-verifyemail-dialog");
                                                    var D = function(J) {
                                                        Event.stopObserving($("postentry-verifyemail-dialog-exit"), "click", D);
                                                        Element.hide("postentry-verifyemail-dialog");
                                                        Overlay.hide()
                                                    };
                                                    if (G == 0) {
                                                        Overlay.show();
                                                        Dialog.moveDialogToCenter($("postentry-verifyemail-dialog"));
                                                        Element.show("postentry-verifyemail-dialog");
                                                        Event.observe($("postentry-verifyemail-dialog-exit"), "click", D);
                                                        Event.observe($("postentry-verifyemail-ok"), "click", D)
                                                    } else {
                                                        if (F.id.search("quote-post") > -1) {
                                                            var A = F.id.substring("quote-post-".length, F.id.length - "-message".length);
                                                            Discussions.quotePost(A)
                                                        } else {
                                                            if (F.id.search("edit-post") > -1) {
                                                                var A = F.id.substring("edit-post-".length, F.id.length - "-message".length);
                                                                Discussions.editPost(A)
                                                            } else {
                                                                if (F.id.search("create-post") > -1) {
                                                                    Discussions.createPost()
                                                                } else {
                                                                    if (F.id == "newtopic-upper" || F.id == "newtopic-lower") {
                                                                        Discussions.createTopic()
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    showEditElements: function() {
        if ($("new-topic-entry-label")) {
            Element.show("new-topic-entry-label")
        }
        if ($("new-post-entry-message")) {
            Element.show("new-post-entry-message");
            $("post-message").focus();
            Element.scrollTo("post-message")
        }
        Discussions.showCaptcha()
    },
    hideEditElements: function() {
        if ($("new-topic-entry-label")) {
            Element.hide("new-topic-entry-label")
        }
        Element.hide("new-post-entry-message")
    },
    showCaptcha: function() {
        if ($("recaptcha_challenge")) {
            Utils.showRecaptcha("recaptcha_challenge", Discussions.captchaPublicKey)
        } else {
            if ($("captcha-container")) {
                var A = $$("img#captcha");
                if (A.length == 0) {
                    $("captcha-container").update(Discussions.captchaTemplate);
                    A = $$("img#captcha");
                    A[0].setAttribute("src", Discussions.captchaUrl + new Date().getTime())
                }
            }
        }
        Discussions.swapCaptcha($("discussion-captcha-preview"), $("discussion-captcha"))
    },
    showCaptchaPreview: function() {
        Discussions.swapCaptcha($("discussion-captcha"), $("discussion-captcha-preview"))
    },
    swapCaptcha: function(C, A) {
        if (C && C.innerHTML != "" && A) {
            A.innerHTML = C.innerHTML;
            C.innerHTML = "";
            Discussions.reloadCaptcha();
            $("captcha-code-error").update()
        }
    },
    removeEntry: function(G) {
        offsets = $("delete-post-" + G).cumulativeOffset();
        var E = $("postentry-delete-dialog");
        E.absolutize();
        var C = $("group-postlist-list").scrollTop;
        E.style.top = (offsets[1] - C) + "px";
        E.style.left = (offsets[0] - 250) + "px";
        var A = function(H) {
            Event.stopObserving($("postentry-delete-cancel"), "click", A);
            Element.hide("postentry-delete-dialog")
        };
        Event.observe($("postentry-delete-cancel"), "click", A);
        var D = function(H) {
            Event.stopObserving($("postentry-delete-dialog-exit"), "click", D);
            Element.hide("postentry-delete-dialog")
        };
        Event.observe($("postentry-delete-dialog-exit"), "click", D);
        var F = function(H) {
            Event.stopObserving($("postentry-delete"), "click", F);
            Discussions.deletePost(G);
            Element.hide("postentry-delete-dialog")
        };
        Event.observe($("postentry-delete"), "click", F);
        Element.show("postentry-delete-dialog")
    },
    editPost: function(A) {
        Discussions.showEditElements();
        var C = $(A + "-message");
        var D = $("post-message");
        $("edit-type").value = "update";
        $("post-id").value = A;
        D.value = C.value
    },
    quotePost: function(A) {
        Discussions.showEditElements();
        var D = $(A + "-message");
        var C = $("post-message");
        C.value = "[quote]" + D.value + "[/quote]";
        $("edit-type").value = "new"
    },
    cancelPost: function() {
        Discussions.hideEditElements();
        if ($("create-post-message")) {
            Element.show("create-post-message")
        }
        if ($("create-post-message-lower")) {
            Element.show("create-post-message-lower")
        }
        if ($("new-post-preview")) {
            Element.hide("new-post-preview")
        }
        Pinger.stop()
    },
    cancelTopic: function() {
        location.href = Discussions.redirectLocation
    },
    createPost: function() {
        $("post-message").value = "";
        $("post-id").value = null;
        Discussions.showEditElements();
        if ($("create-post-message")) {
            Element.hide("create-post-message")
        }
        if ($("create-post-message-lower")) {
            Element.hide("create-post-message-lower")
        }
        Pinger.start()
    },
    createTopic: function() {
        var A = Discussions.baseParams;
        new Ajax.Updater("group-topiclist-container", habboReqPath + "/discussions/actions/newtopic", {
            method: "post",
            evalScripts: true,
            parameters: A,
            onComplete: function(D, C) {
                if (C && C.forbidden == "true") {
                    $("discussionbox").innerHTML = D.responseText;
                    return
                }
                Discussions.showEditElements();
                if ($("new-topic-name")) {
                    $("new-topic-name").focus()
                }
                Pinger.start()
            }
        })
    },
    previewPost: function() {
        Discussions.preview(null)
    },
    previewTopic: function() {
        $("topic-name-error").update();
        var A = encodeURIComponent($("new-topic-name").value);
        Discussions.preview(A)
    },
    preview: function(C) {
        var D = encodeURIComponent($("post-message").value);
        var E = Discussions.baseParams + "&message=" + D;
        var A = "post";
        if (C != null) {
            A = "topic";
            E += "&topicName=" + C
        }
        new Ajax.Updater("new-" + A + "-preview", habboReqPath + "/discussions/actions/preview" + A, {
            method: "post",
            parameters: E,
            onComplete: function(G, F) {
                Discussions.hideEditElements();
                Discussions.showCaptchaPreview();
                Element.show("new-" + A + "-preview");
                if (F && F.forbidden == "true") {
                    return
                }
                Event.observe("edit-post-message", "click", function(H) {
                    Event.stop(H);
                    Element.hide("new-" + A + "-preview");
                    Discussions.showEditElements()
                }, false)
            }
        })
    },
    reloadCaptcha: function() {
        if ($("recaptcha_challenge")) {
            Utils.reloadRecaptcha();
            $("recaptcha_response_field").value = ""
        } else {
            Utils.reloadCaptcha();
            $("captcha-code").value = ""
        }
    },
    checkCaptcha: function() {
        var C;
        if ($("recaptcha_challenge")) {
            C = $("recaptcha_response_field")
        } else {
            C = $("captcha-code")
        }
        if (!C) {
            return true
        }
        var A = C.value;
        if (A.length == 0) {
            Discussions.showErrorBubble("captcha-code-error", L10N.get("register.error.security_code"));
            C.focus();
            return false
        }
        return true
    },
    savePost: function() {
        if (!Discussions.checkCaptcha()) {
            return
        }
        Element.hide("post-form-save");
        Discussions.save(null)
    },
    saveTopic: function() {
        var A = encodeURIComponent($("new-topic-name").value.replace(/^\s+|\s+$/, ""));
        if (A.length == 0) {
            Element.hide("new-topic-preview");
            Discussions.showEditElements();
            Discussions.showErrorBubble("topic-name-error", L10N.get("myhabbo.discussion.error.topic_name_empty"));
            return
        }
        if (!Discussions.checkCaptcha()) {
            return
        }
        Element.hide("topic-form-save");
        Discussions.save(A)
    },
    save: function(F) {
        var H = "";
        if ($("recaptcha_challenge")) {
            H = "&recaptcha_challenge_field=" + $("recaptcha_challenge_field").value + "&recaptcha_response_field=" + $("recaptcha_response_field").value
        } else {
            if ($("captcha-code")) {
                H = "&captcha=" + $("captcha-code").value
            }
        }
        var G = encodeURIComponent($("post-message").value);
        var I = Discussions.baseParams + "&message=" + G + H;
        var E = "post";
        var C;
        if (F != null) {
            E = "topic";
            I += "&topicName=" + F;
            C = habboReqPath + "/discussions/actions/savetopic"
        } else {
            var A = $("edit-type").value;
            var D = $("current-page").value;
            if (A == "update") {
                C = habboReqPath + "/discussions/actions/updatepost";
                I += "&postId=" + $("post-id").value
            } else {
                C = habboReqPath + "/discussions/actions/savepost";
                D = -1
            }
            I += "&page=" + D
        }
        new Ajax.Request(C, {
            method: "post",
            parameters: I,
            onComplete: function(L, K) {
                var M = $("spam-message").value;
                if (K && K.spam == "true") {
                    L.responseText.evalScripts();
                    Element.hide("new-" + E + "-preview");
                    Discussions.showEditElements()
                } else {
                    if (K && K.forbidden == "true") {
                        $("discussionbox").innerHTML = L.responseText;
                        return
                    } else {
                        if (K && K.captchaError == "true") {
                            Discussions.reloadCaptcha();
                            if (E == "post") {
                                Element.show("post-form-save")
                            } else {
                                Element.show("topic-form-save")
                            }
                            Discussions.showErrorBubble("captcha-code-error", L10N.get("register.error.security_code"));
                            if ($("recaptcha_challenge")) {
                                $("recaptcha_response_field").focus()
                            } else {
                                $("captcha-code").focus()
                            }
                        } else {
                            if (E == "post") {
                                $("group-postlist-container").innerHTML = L.responseText;
                                L.responseText.evalScripts()
                            } else {
                                if (E == "topic") {
                                    var J = L.responseText;
                                    if (J != null && J.startsWith(habboReqPath + "/groups")) {
                                        document.location = J
                                    } else {
                                        $("group-topiclist-container").innerHTML = L.responseText
                                    }
                                }
                            }
                        }
                    }
                }
                Pinger.stop()
            }
        })
    },
    deletePost: function(A) {
        var D = Discussions.baseParams + "&postId=" + A;
        var C = $("current-page").value;
        D += "&page=" + C;
        new Ajax.Request(habboReqPath + "/discussions/actions/deletepost", {
            method: "post",
            parameters: D,
            onComplete: function(F, E) {
                if (E && E.forbidden == "true") {
                    $("discussionbox").innerHTML = F.responseText;
                    F.responseText.evalScripts();
                    return
                } else {
                    if (F.responseText == "TOPIC_DELETED") {
                        document.location = Discussions.redirectLocation;
                        return
                    }
                }
                $("group-postlist-container").innerHTML = F.responseText
            }
        })
    },
    deleteTopic: function(A) {
        Event.stop(A);
        var C = Discussions.baseParams;
        new Ajax.Request(habboReqPath + "/discussions/actions/deletetopic", {
            method: "post",
            parameters: C,
            onComplete: function(E, D) {
                if (D && D.forbidden == "true") {
                    $("discussionbox").innerHTML = E.responseText;
                    return
                }
                if (E.responseText == "SUCCESS") {
                    document.location = Discussions.redirectLocation
                }
            }
        })
    },
    openTopicSettings: function() {
        var D = Discussions.baseParams;
        var A = $("settings_dialog_header").value;
        var C = Dialog.createDialog("topic_settings_dialog", A, 9001, 0, -1000, Discussions.closeTopicSettings);
        Dialog.appendDialogBody(C, '<p style="text-align:center"><img src="' + habboStaticFilePath + '/images/progress_bubbles.gif" alt="" width="29" height="6" /></p><div style="clear"></div>', true);
        Dialog.moveDialogToCenter(C);
        Overlay.show();
        new Ajax.Request(habboReqPath + "/discussions/actions/opentopicsettings", {
            method: "post",
            parameters: D,
            onComplete: function(F, E) {
                Dialog.setDialogBody(C, F.responseText);
                $("topic_settings_dialog").style.width = "305px";
                if (E && E.forbidden == "true") {
                    Event.observe("general-info-dialog-button", "click", Discussions.closeTopicSettings);
                    return
                }
                if ($("save-topic-settings")) {
                    Event.observe("save-topic-settings", "click", Discussions.saveTopicSettings);
                    Event.observe("cancel-topic-settings", "click", Discussions.closeTopicSettings);
                    Event.observe("delete-topic", "click", Discussions.deleteTopicConfirmation)
                }
            }
        })
    },
    closeTopicSettings: function(A) {
        if (typeof(A) != "undefined") {
            Event.stop(A)
        }
        Element.remove("topic_settings_dialog");
        Overlay.hide()
    },
    deleteTopicConfirmation: function(D) {
        Event.stop(D);
        Discussions.closeTopicSettings(D);
        var A = $("settings_dialog_header").value;
        var C = Dialog.createDialog("delete-topic-confirmation", A, 9001, 0, -1000);
        Dialog.moveDialogToCenter(C);
        Overlay.show();
        Dialog.setAsWaitDialog(C);
        new Ajax.Request(habboReqPath + "/discussions/actions/confirm_delete_topic", {
            method: "post",
            onComplete: function(F, E) {
                Dialog.setDialogBody(C, F.responseText);
                Event.observe($("discussion-action-cancel"), "click", function(G) {
                    Event.stop(G);
                    Element.remove("delete-topic-confirmation");
                    Overlay.hide()
                });
                Event.observe($("discussion-action-ok"), "click", function(G) {
                    Event.stop(G);
                    Element.remove("delete-topic-confirmation");
                    Overlay.hide();
                    Discussions.deleteTopic(G)
                })
            }
        })
    },
    saveTopicSettings: function(I) {
        Event.stop(I);
        var C = $("topic_name").value.replace(/^\s+|\s+$/, "");
        if (C.length == 0) {
            Discussions.showErrorBubble("topic-name-error", L10N.get("myhabbo.discussion.error.topic_name_empty"));
            return
        }
        var D = 0;
        var G = 0;
        var A = $("topic-settings-form");
        var J = A.topic_type;
        for (var F = 0; F < J.length; F++) {
            if (J[F].checked) {
                D = J[F].value
            }
        }
        var K = A.topic_sticky;
        for (var F = 0; F < K.length; F++) {
            if (K[F].checked) {
                G = K[F].value
            }
        }
        var E = Discussions.baseParams + "&topicName=" + encodeURIComponent(C) + "&topicClosed=" + D + "&topicSticky=" + G;
        var H = $("current-page").value;
        E += "&page=" + H;
        Discussions.closeTopicSettings(I);
        new Ajax.Updater("group-postlist-container", habboReqPath + "/discussions/actions/savetopicsettings", {
            method: "post",
            parameters: E,
            onComplete: function(M, L) {
                if (L && L.forbidden == "true") {
                    return
                }
                M.responseText.evalScripts()
            }
        })
    },
    showErrorBubble: function(D, C) {
        if ($(D).empty()) {
            var A = Builder.node("div", {
                className: "rounded-red"
            }, C);
            $(D).appendChild(A);
            Rounder.addCorners(A, 8, 8)
        }
    }
};
var Pinger = {
    invokeCount: 0,
    timer: null,
    alreadyNotified: false,
    start: function() {
        if (Pinger.timer == null) {
            Pinger.timer = new PeriodicalExecuter(Pinger.onTimerEvent, 240);
            Pinger.timer.execute()
        }
    },
    onTimerEvent: function() {
        new Ajax.Request(habboReqPath + "/discussions/actions/pingsession", {
            onSuccess: function(A, C) {
                if (C && C.privilegeLevel != 1) {
                    if (!Pinger.alreadyNotified) {
                        if ($("linktool-inline")) {
                            $("linktool-inline").insert({
                                after: "<br/>" + A.responseText
                            })
                        }
                        if ($("post-form-save")) {
                            $("post-form-save").addClassName("disabled-button")
                        }
                        if ($("topic-form-save")) {
                            $("topic-form-save").addClassName("disabled-button")
                        }
                    }
                    Pinger.alreadyNotified = true;
                    Pinger.stop()
                }
            }
        });
        Pinger.invokeCount++;
        if (Pinger.invokeCount > 5) {
            Pinger.stop()
        }
    },
    stop: function() {
        if (Pinger.timer != null) {
            Pinger.timer.stop();
            Pinger.timer = null
        }
    }
};
var WidgetRegistry = {
    _widgetsById: [],
    _widgetsByType: [],
    add: function(A, D, C) {
        WidgetRegistry._widgetsById[A + ""] = C;
        if (!WidgetRegistry._widgetsByType[D]) {
            WidgetRegistry._widgetsByType[D] = []
        }
        WidgetRegistry._widgetsByType[D].push(C)
    },
    getWidgetById: function(A) {
        return WidgetRegistry._widgetsById[A + ""]
    },
    getWidgetsByType: function(A) {
        return WidgetRegistry._widgetsByType[A]
    }
};
var FriendsWidget = Class.create({
    options: {
        searchUrl: "/myhabbo/avatarlist/friendsearchpaging",
        ownerParameter: "&_mypage.requested.account="
    },
    initialize: function(A, C) {
        this.searchString = "";
        this.pageNumber = 1;
        this.ownerId = A;
        this.widgetId = C;
        this.widgetEl = $("widget-" + C);
        this.containerEl = $("avatarlist-content");
        this.listElement = $("avatar-list-list");
        this.pagingElement = $("avatar-list-paging");
        if (this.listElement) {
            this.containerEl.onclick = this._processClick.bindAsEventListener(this);
            this.infoEl = this.widgetEl.select(".avatar-list-info")[0];
            this.infoContentEl = this.infoEl.select(".avatar-list-info-container")[0];
            this.closeLink = this.infoEl.select(".avatar-list-info-close")[0];
            this.closeLink.onclick = this.hideAccountDetails.bindAsEventListener(this);
            Event.observe("avatarlist-search-button", "click", function(D) {
                Event.stop(D);
                this._processSearch(D)
            }.bind(this));
            Event.observe("avatarlist-search-string", "keypress", function(D) {
                if (D.keyCode == Event.KEY_RETURN) {
                    this._processSearch(D)
                }
            }.bind(this))
        }
    },
    showAccountDetails: function(A) {
        this.infoEl = $("avatar-list-info");
        this.listElement = $("avatar-list-list");
        this.pagingElement = $("avatar-list-paging");
        this.searchElement = $("avatar-list-search");
        Element.show(this.infoEl);
        Element.hide(this.listElement);
        Element.hide(this.pagingElement);
        Element.hide(this.searchElement);
        this.infoEl.style.display = "block";
        Element.wait(this.infoEl);
        this.showId = A;
        new Ajax.Request(habboReqPath + "/myhabbo/avatarlist/avatarinfo", {
            method: "post",
            parameters: this._getInfoParameters(),
            onComplete: function(E, D) {
                this.infoEl.innerHTML = E.responseText;
                var C = this.infoEl.select(".avatar-list-info-close")[0];
                C.onclick = this.hideAccountDetails.bindAsEventListener(this);
                this._addLinkObservers()
            }.bind(this)
        })
    },
    hideAccountDetails: function(A) {
        Event.stop(A);
        this.infoContentEl.innerHTML = "";
        Element.hide(this.infoEl);
        Element.show(this.listElement);
        Element.show(this.pagingElement);
        Element.show(this.searchElement)
    },
    leaveFromGroup: function(A) {
        Event.stop(A)
    },
    removeFromGroup: function(A) {
        Event.stop(A)
    },
    revokeRights: function(A) {
        Event.stop(A)
    },
    _parseAccountIdFromElementId: function(A) {
        return A.substring(A.lastIndexOf("-") + 1)
    },
    _getInfoParameters: function() {
        return "ownerAccountId=" + encodeURIComponent(this.ownerId) + "&anAccountId=" + encodeURIComponent(this.showId)
    },
    _processClick: function(C) {
        var A = Event.element(C);
        if (A.nodeName.toLowerCase() == "a" && A.className == "avatar-list-open-link") {
            Event.stop(C);
            this._processOpenClick(C)
        } else {
            if (A.nodeName.toLowerCase() == "a" && A.className == "avatar-list-paging-link") {
                Event.stop(C);
                this._processSearch(C)
            }
        }
    },
    _processOpenClick: function(C) {
        var A = Event.element(C);
        if (A.nodeName.toLowerCase() == "a" && A.className == "avatar-list-open-link") {
            var D = this._parseAccountIdFromElementId(A.parentNode.parentNode.id);
            this.showAccountDetails(D)
        }
    },
    _addLinkObservers: function() {},
    _processSearch: function(F) {
        var C = Event.element(F);
        var A = parseInt($F("pageNumber"));
        var E = parseInt($F("totalPages"));
        var D = 1;
        if (C.id == "avatarlist-search-first") {
            D = 1
        } else {
            if (C.id == "avatarlist-search-previous") {
                D = A - 1
            } else {
                if (C.id == "avatarlist-search-next") {
                    D = A + 1
                } else {
                    if (C.id == "avatarlist-search-last") {
                        D = E
                    } else {
                        if (C.parentNode.id == "avatarlist-search-button" || C.id == "avatarlist-search-string") {
                            this.searchString = $F("avatarlist-search-string");
                            D = 1
                        }
                    }
                }
            }
        }
        "";
        new Ajax.Updater("avatarlist-content", habboReqPath + this.options.searchUrl, {
            method: "post",
            parameters: "pageNumber=" + encodeURIComponent(D) + "&searchString=" + encodeURIComponent(this.searchString) + "&widgetId=" + this.widgetId + this.options.ownerParameter + this.ownerId
        })
    }
});
var MemberWidget = Class.create(FriendsWidget, {
    options: {
        searchUrl: "/myhabbo/avatarlist/membersearchpaging",
        ownerParameter: "&_groupspage.requested.group="
    },
    leaveFromGroup: function($super, A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_leave", "/groups/actions/leave", this.showId, this.ownerId, this)
    },
    removeFromGroup: function($super, A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_remove", "/groups/actions/remove", this.showId, this.ownerId, this)
    },
    giveRights: function($super, A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_give_rights", "/groups/actions/give_rights", this.showId, this.ownerId, this)
    },
    revokeRights: function($super, A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_revoke_rights", "/groups/actions/revoke_rights", this.showId, this.ownerId, this)
    },
    _getInfoParameters: function($super) {
        return "groupId=" + encodeURIComponent(this.ownerId) + "&anAccountId=" + encodeURIComponent(this.showId)
    },
    _addLinkObservers: function($super) {
        this.infoEl.select(".avatar-info-rights-leave").each(function(A) {
            A.onclick = this.leaveFromGroup.bindAsEventListener(this)
        }.bind(this));
        this.infoEl.select(".avatar-info-rights-remove").each(function(A) {
            A.onclick = this.removeFromGroup.bindAsEventListener(this)
        }.bind(this));
        this.infoEl.select(".avatar-info-rights-give").each(function(A) {
            A.onclick = this.giveRights.bindAsEventListener(this)
        }.bind(this));
        this.infoEl.select(".avatar-info-rights-revoke").each(function(A) {
            A.onclick = this.revokeRights.bindAsEventListener(this)
        }.bind(this))
    }
});
var ScrollWatcher = Class.create();
ScrollWatcher.prototype = {
    initialize: function(C, A, D) {
        this.widgetId = C;
        this.className = A;
        this.callBack = D;
        this.noticed = [];
        this.listItems();
        this.lastUpdate = 0;
        this.lastScrollTop = 0;
        new PeriodicalExecuter(function() {
            this.update(this)
        }.bind(this), 0.8)
    },
    update: function(A) {
        this.widgetEl = $("widget-" + this.widgetId);
        this.scrollDiv = this.widgetEl.select(".avatar-widget-list-container")[0];
        this.scrollDivHeight = Element.getHeight(this.scrollDiv);
        if (this.scrollDiv.scrollTop != this.lastScrollTop) {
            this.listItems();
            this.items.each(function(C) {
                if (C.offsetTop + Element.getHeight(C) >= this.scrollDiv.scrollTop && C.offsetTop < this.scrollDiv.scrollTop + this.scrollDivHeight) {
                    if (this.callBack) {
                        this.callBack(C)
                    }
                    this.noticed.push(C);
                    C.className = ""
                }
            }.bind(this));
            this.listItems()
        }
        this.lastScrollTop = this.scrollDiv.scrollTop
    },
    listItems: function() {
        this.items = this.scrollDiv.select("." + this.className)
    }
};
var UpdateQueue = Class.create();
UpdateQueue.prototype = {
    initialize: function() {
        this.queue = []
    },
    push: function(A) {
        this.queue.push(A)
    },
    flush: function() {
        var A = this.queue;
        this.queue = [];
        return A
    }
};
var GuestbookWidget = Class.create();
GuestbookWidget.prototype = {
    initialize: function(F, E, D) {
        this.accountId = F;
        this.widgetId = E;
        this.maxMessageLength = D;
        if ($("guestbook-open-dialog")) {
            Event.observe("guestbook-open-dialog", "click", function(I) {
                Event.stop(I);
                var G = $("guestbook-open-dialog").cumulativeOffset();
                var H = $("guestbook-form-dialog");
                H.absolutize();
                H.style.top = G[1] + "px";
                H.style.left = (G[0] - 80) + "px";
                Element.hide($("guestbook-preview-tab"));
                Element.show($("guestbook-form-tab"));
                Element.show("guestbook-form-dialog");
                if (Prototype.Browser.IE) {
                    $$("#guestbook-form-dialog .new-button").each(function(J) {
                        Element.show(J)
                    })
                }
                $("guestbook-message").value = "";
                $("guestbook-form-preview").disabled = "true";
                Element.addClassName($("guestbook-form-preview"), "disabled-button");
                Field.activate($("guestbook-message"))
            });
            var A = function(G) {
                Event.stop(G);
                Element.hide($("guestbook-form-dialog"))
            };
            Event.observe("guestbook-form-dialog-exit", "click", A);
            Event.observe("guestbook-form-cancel", "click", A);
            Event.observe("guestbook-form-preview", "click", function(G) {
                Event.stop(G);
                if ("true" == $("guestbook-form-preview").disabled) {
                    return
                }
                if ($F("guestbook-message").length > 0) {
                    Element.hide($("guestbook-form-tab"));
                    Element.wait($("guestbook-preview-tab"));
                    Element.show($("guestbook-preview-tab"));
                    new Ajax.Updater($("guestbook-preview-tab"), habboReqPath + "/myhabbo/guestbook/preview", {
                        method: "post",
                        parameters: Form.serialize($("guestbook-form")) + "&widgetId=" + encodeURIComponent(this.widgetId),
                        evalScripts: true,
                        onComplete: function() {
                            Event.observe("guestbook-form-post", "click", function(H) {
                                Event.stop(H);
                                new Ajax.Updater($("guestbook-entry-container"), habboReqPath + "/myhabbo/guestbook/add", {
                                    method: "post",
                                    parameters: Form.serialize($("guestbook-form")) + "&widgetId=" + encodeURIComponent(this.widgetId),
                                    evalScripts: true,
                                    insertion: "top",
                                    onComplete: function(J, I) {
                                        if (I && I.spam == "true") {
                                            return
                                        }
                                        if ($("guestbook-empty-notes")) {
                                            Element.hide("guestbook-empty-notes")
                                        }
                                        if (Prototype.Browser.IE) {
                                            $$("#guestbook-form-dialog .new-button").each(function(L) {
                                                Element.hide(L)
                                            })
                                        }
                                        Element.hide("guestbook-form-dialog");
                                        $("guestbook-entry-container").scrollTop = 0;
                                        var K = $$("#guestbook-entry-container .guestbook-entry").first();
                                        new Effect.Pulsate(K, {
                                            afterFinish: function() {
                                                Element.setOpacity(K, 1)
                                            }
                                        });
                                        this.incrementSize()
                                    }.bind(this)
                                })
                            }.bind(this));
                            Event.observe("guestbook-form-continue", "click", function(H) {
                                Event.stop(H);
                                Element.hide($("guestbook-preview-tab"));
                                Element.show($("guestbook-form-tab"));
                                Field.focus($("guestbook-message"))
                            })
                        }.bind(this)
                    })
                }
            }.bind(this));
            new Form.Element.Observer($("guestbook-message"), 0.5, (function(H) {
                var G = $F("guestbook-message").length;
                if (G > 0 && G <= this.maxMessageLength) {
                    $("guestbook-form-preview").disabled = "";
                    Element.removeClassName($("guestbook-form-preview"), "disabled-button")
                } else {
                    $("guestbook-form-preview").disabled = "true";
                    Element.addClassName($("guestbook-form-preview"), "disabled-button")
                }
            }).bind(this))
        }
        if ($("guestbook-delete-dialog")) {
            Event.observe($("guestbook-delete"), "click", function(G) {
                Event.stop(G);
                this.doRemoveEntry($("guestbook-delete-id").value);
                this.hideRemoveConfirmation()
            }.bind(this));
            var C = function(G) {
                Event.stop(G);
                this.hideRemoveConfirmation()
            }.bind(this);
            Event.observe($("guestbook-delete-dialog-exit"), "click", C);
            Event.observe($("guestbook-delete-cancel"), "click", C)
        }
        Event.observe($("guestbook-entry-container"), "click", this.handleActions.bindAsEventListener(this));
        this.monitorEventListener = this.monitorScrollPosition.bind(this)
    },
    handleActions: function(E) {
        var D = Event.element(E);
        if (D.className == "gbentry-delete") {
            Event.stop(E);
            var C = D.id.substring("gbentry-delete-".length);
            this.removeEntry(C)
        }
        if (D.className == "gbentry-report") {
            Event.stop(E);
            var C = D.id.substring("gbentry-report-".length);
            var A = 0;
            if (Prototype.Browser.IE) {
                A = $("guestbook-entry-container").scrollTop
            }
            ReportDialogManager.show("guestbook", C, D, {
                setWidth: false,
                setHeight: false,
                offsetTop: A,
                offsetLeft: -120
            })
        }
    },
    monitorScrollPosition: function() {
        var C = $("guestbook-entry-container");
        if (!$("gb-progress")) {
            var A = Builder.node("div", {
                id: "gb-progress",
                style: "margin: 20px 0 60px 0; visibility: hidden"
            });
            $("guestbook-entry-container").appendChild(A);
            Element.wait(A)
        }
        if (C.scrollTop > 0 && (C.scrollTop + C.clientHeight == C.scrollHeight)) {
            C.scrollTop = C.scrollHeight - C.clientHeight;
            var D = $$("#guestbook-entry-container .guestbook-entry").last().id.substring("guestbook-entry-".length);
            $("gb-progress").style.visibility = "";
            new Ajax.Updater($("guestbook-entry-container"), habboReqPath + "/myhabbo/guestbook/list", {
                method: "post",
                parameters: "ownerId=" + this.accountId + "&lastEntryId=" + D + "&widgetId=" + encodeURIComponent(this.widgetId),
                evalScripts: true,
                insertion: "bottom",
                onComplete: function(F, E) {
                    $("gb-progress").remove();
                    if (E.lastPage == "false") {
                        setTimeout(this.monitorEventListener, 300)
                    }
                }.bind(this)
            })
        } else {
            setTimeout(this.monitorEventListener, 300)
        }
    },
    removeEntry: function(E) {
        var C = $("gbentry-delete-" + E).cumulativeOffset();
        var D = $("guestbook-delete-dialog");
        D.absolutize();
        var A = $("guestbook-entry-container").scrollTop;
        D.style.top = (C[1] - A) + "px";
        D.style.left = (C[0] - 250) + "px";
        Element.show(D);
        $("guestbook-delete-id").value = E
    },
    hideRemoveConfirmation: function() {
        $("guestbook-delete-id").value = "";
        Element.hide($("guestbook-delete-dialog"))
    },
    doRemoveEntry: function(A) {
        new Ajax.Request(habboReqPath + "/myhabbo/guestbook/remove", {
            parameters: "entryId=" + encodeURIComponent(A) + "&widgetId=" + encodeURIComponent(this.widgetId),
            onSuccess: function(C) {
                new Effect.Fade($("guestbook-entry-" + A), {
                    afterFinish: function() {
                        $("guestbook-entry-" + A).remove()
                    }
                });
                this.decrementSize()
            }.bind(this)
        })
    },
    incrementSize: function() {
        var C = $("guestbook-size");
        if (C) {
            var A = parseInt(C.innerHTML) + 1;
            C.innerHTML = A
        }
    },
    decrementSize: function() {
        var C = $("guestbook-size");
        if (C) {
            var A = parseInt(C.innerHTML) - 1;
            C.innerHTML = A
        }
    },
    updateOptionsList: function(C) {
        var A = $("guestbook-privacy-options");
        $A(A.options).each(function(D) {
            if (D.value == C) {
                A.selectedIndex = D.index
            }
        })
    }
};
var RatingObserver = Class.create();
RatingObserver.prototype = {
    initialize: function(D, C, E, A) {
        this.commonAjaxParams = D;
        this.elementToObserve = C;
        this.urlToCall = E;
        this.elementToObserve = C;
        this.innerHtmlParamName = A;
        Event.observe(C, "click", this.handleEvent.bindAsEventListener(this))
    },
    handleEvent: function(A) {
        var C;
        Event.stop(A);
        if (this.innerHtmlParamName != null) {
            C = this.commonAjaxParams.parameters + "&" + this.innerHtmlParamName + "=" + $(this.elementToObserve).innerHTML
        } else {
            C = this.commonAjaxParams.parameters
        }
        $(this.commonAjaxParams.elementToUpdate).innerHTML = "";
        new Ajax.Updater(this.commonAjaxParams.elementToUpdate, habboReqPath + this.urlToCall, {
            method: "get",
            parameters: C,
            evalScripts: false,
            insertion: "bottom",
            onComplete: this.commonAjaxParams.onCompleteFunction
        })
    }
};
var CommonRatingObserverParams = Class.create();
CommonRatingObserverParams.prototype = {
    initialize: function(D, C, A) {
        this.elementToUpdate = D;
        this.parameters = C;
        this.onCompleteFunction = A
    }
};
var RatingWidget = Class.create();
RatingWidget.prototype = {
    initialize: function(A, C) {
        this.idParams = "ownerId=" + A + "&ratingId=" + C + "&_mypage.requested.account=" + A;
        this.mainDiv = "rating-main";
        this.givenRate = "rating-rate";
        this.resetLink = "ratings-reset-link";
        this.ratingStarClassName = "rater";
        this.commonObserverParams = new CommonRatingObserverParams(this.mainDiv, this.idParams, this.refreshObservers.bind(this));
        this.refreshObservers()
    },
    refreshObservers: function() {
        if ($(this.resetLink) && this.resetLinkObserver == null) {
            this.resetLinkObserver = new RatingObserver(this.commonObserverParams, this.resetLink, "/myhabbo/rating/reset_ratings", null)
        }
        var C = $$("." + this.ratingStarClassName);
        for (var A = 0; A < C.length; ++A) {
            new RatingObserver(this.commonObserverParams, C[A], "/myhabbo/rating/rate", "givenRate")
        }
    }
};
var GroupsWidget = Class.create();
GroupsWidget.prototype = {
    initialize: function(A, C) {
        this.ownerId = A;
        this.widgetId = C;
        this.widgetEl = $("widget-" + C);
        this.containerEl = this.widgetEl.select(".groups-list-container")[0];
        if (typeof this.containerEl == "undefined") {
            return
        }
        this.listEl = this.containerEl.select(".groups-list")[0];
        this.loadingEl = this.widgetEl.select(".groups-list-loading")[0];
        this.infoEl = this.widgetEl.select(".groups-list-info")[0];
        this.closeLink = this.loadingEl.select(".groups-loading-close")[0];
        this.closeLink.onclick = this.hideGroupDetails.bindAsEventListener(this);
        this._addOpenEventHandlers()
    },
    showGroupDetails: function(C) {
        if (Event.element(C).nodeName.toLowerCase() == "a") {
            return
        }
        Event.stop(C);
        var A = Event.findElement(C, "li");
        this.groupId = this._parseGroupIdFromElementId(A.id);
        GroupFavoriteSelector.init(this, this.ownerId, this.groupId, this.onCompleteCallback.bind(this));
        Element.hide(this.containerEl);
        this.loadingEl.style.display = "block";
        new Ajax.Request(habboReqPath + "/myhabbo/groups/groupinfo", {
            method: "post",
            parameters: "ownerId=" + encodeURIComponent(this.ownerId) + "&groupId=" + encodeURIComponent(this.groupId),
            onComplete: function(E, D) {
                this.infoEl.innerHTML = E.responseText;
                Element.hide(this.loadingEl);
                this.infoEl.style.display = "block";
                this.closeLink = this.infoEl.select(".groups-info-close")[0];
                this.closeLink.onclick = this.hideGroupDetails.bindAsEventListener(this);
                this.infoEl.select(".groups-info-select-favorite").each(function(F) {
                    F.onclick = GroupFavoriteSelector.selectFavorite.bindAsEventListener(this)
                }.bind(this));
                this.infoEl.select(".groups-info-deselect-favorite").each(function(F) {
                    F.onclick = GroupFavoriteSelector.deselectFavorite.bindAsEventListener(this)
                }.bind(this))
            }.bind(this)
        })
    },
    hideGroupDetails: function(A) {
        if (A) {
            Event.stop(A)
        }
        Element.hide(this.loadingEl);
        Element.hide(this.infoEl);
        this.infoEl.innerHTML = "";
        Element.show(this.containerEl)
    },
    refreshGroupList: function() {
        Element.wait(this.containerEl);
        new Ajax.Updater(this.containerEl, habboReqPath + "/myhabbo/groups/grouplist", {
            method: "post",
            parameters: "id=" + encodeURIComponent(this.ownerId) + "&widgetId=" + encodeURIComponent(this.widgetId),
            onComplete: function(C, A) {
                this.listEl = this.containerEl.select(".groups-list")[0];
                this._addOpenEventHandlers()
            }.bind(this)
        })
    },
    onCompleteCallback: function(C, A) {
        if (C.responseText == "OK") {
            hideGroupActionDialog(this);
            this.hideGroupDetails();
            this.refreshGroupList();
            return false
        }
        return true
    },
    _addOpenEventHandlers: function() {
        if (this.listEl) {
            this.listEl.onclick = this.showGroupDetails.bindAsEventListener(this)
        }
    },
    _parseGroupIdFromElementId: function(A) {
        return A.substring(A.lastIndexOf("-") + 1)
    }
};
var TagWidgetPartial = Class.create();
TagWidgetPartial.prototype = {
    initialize: function(A) {
        this.parentWidget = A;
        TagHelper.init(this.parentWidget.loggedInAccountId);
        this.btnAddTag = $("profile-add-tag");
        if (this.btnAddTag) {
            this.eventAddTag = this.handleAddTag.bindAsEventListener(this);
            Event.observe(this.btnAddTag, "click", this.eventAddTag)
        }
        Event.observe("profile-tag-list", "click", function(C) {
            this.handleClickTag(C)
        }.bind(this));
        if ($("profile-add-tag-input")) {
            Event.observe($("profile-add-tag-input"), "keypress", function(C) {
                if (C.keyCode == Event.KEY_RETURN) {
                    this.handleAddTag(C)
                }
            }.bind(this))
        }
    },
    handleAddTag: function(D) {
        Event.stop(D);
        var C = $F("profile-add-tag-input");
        var A = $("profile-add-tag-input");
        if (this.parentWidget.tagType == "group") {
            this.addGroupTag(C, this.parentWidget.groupId)
        } else {
            if (this.parentWidget.tagType == "avatar") {
                this.addAvatarTag(C, this.parentWidget.accountId)
            }
        }
        A.value = ""
    },
    handleClickTag: function(D) {
        var C = Event.element(D);
        var E = Element.up(C, ".tag-search-rowholder");
        if (!E) {
            return
        }
        var A = TagHelper.findTagNameForContainer(E);
        if (C.className.indexOf("tag-delete-link") >= 0) {
            Event.stop(D);
            this.errorMessage("valid");
            if (this.parentWidget.tagType == "group") {
                new Ajax.Updater("profile-tag-list", habboReqPath + "/myhabbo/tag/removegrouptag", {
                    parameters: "groupId=" + encodeURIComponent(this.parentWidget.groupId) + "&tagName=" + encodeURIComponent(A),
                    evalScripts: true
                })
            } else {
                if (this.parentWidget.tagType == "avatar") {
                    new Ajax.Updater("profile-tag-list", habboReqPath + "/myhabbo/tag/remove", {
                        parameters: "accountId=" + encodeURIComponent(this.parentWidget.accountId) + "&tagName=" + encodeURIComponent(A),
                        evalScripts: true
                    })
                }
            }
        } else {
            if (C.className.indexOf("tag-add-link") >= 0) {
                Event.stop(D);
                TagHelper.addThisTagToMe(A, false, {
                    onSuccess: function() {
                        if ($("tag-img-added")) {
                            var F = $("tag-img-added").cloneNode(false);
                            F.removeAttribute("id");
                            C.replace(F);
                            $(F).show()
                        }
                    }
                })
            }
        }
    },
    errorMessage: function(C) {
        var E = $("profile-tags-status-field");
        if (E) {
            var D = $("tag-limit-message");
            var A = $("tag-invalid-message");
            if (C == "invalidtag") {
                E.style.display = "block";
                A.style.display = "block";
                D.style.display = "none"
            } else {
                if (C == "taglimit") {
                    E.style.display = "block";
                    D.style.display = "block";
                    A.style.display = "none"
                } else {
                    if (C == "valid") {
                        E.style.display = "none"
                    }
                }
            }
        }
    },
    addAvatarTag: function(A, C) {
        C = encodeURIComponent(C);
        new Ajax.Request(habboReqPath + "/myhabbo/tag/add", {
            parameters: "accountId=" + C + "&tagName=" + encodeURIComponent(A),
            onSuccess: function(E) {
                var D = E.responseText;
                if (D == "valid" && $("profile-tags-status-field")) {
                    new Ajax.Updater("profile-tag-list", habboReqPath + "/myhabbo/tag/list", {
                        parameters: "tagMsgCode=" + encodeURIComponent("valid") + "&accountId=" + C
                    })
                }
                this.errorMessage(D)
            }.bind(this)
        })
    },
    addGroupTag: function(C, A) {
        A = encodeURIComponent(A);
        new Ajax.Request(habboReqPath + "/myhabbo/tag/addgrouptag", {
            parameters: "groupId=" + A + "&tagName=" + encodeURIComponent(C),
            onSuccess: function(E) {
                var D = E.responseText;
                if (D == "valid" && $("profile-tags-status-field")) {
                    new Ajax.Updater("profile-tag-list", habboReqPath + "/myhabbo/tag/listgrouptags", {
                        parameters: "tagMsgCode=" + encodeURIComponent("valid") + "&groupId=" + A
                    })
                }
                this.errorMessage(D)
            }.bind(this)
        })
    }
};
var ProfileWidget = Class.create();
ProfileWidget.prototype = {
    tagType: "avatar",
    initialize: function(C, A) {
        this.options = Object.extend({
            messageText: "Add as friend?",
            headerText: "Are you sure?",
            loginText: ""
        }, arguments[2] || {});
        this.accountId = C;
        if (A) {
            this.loggedInAccountId = A
        }
        this.btnAddFriend = $("add-friend");
        if (this.btnAddFriend) {
            this.eventAddFriend = this.handleAddFriend.bindAsEventListener(this);
            Event.observe(this.btnAddFriend, "click", this.eventAddFriend)
        }
        this.tags = new TagWidgetPartial(this)
    },
    handleAddFriend: function(A) {
        if (Element.hasClassName(this.btnAddFriend, "disabled")) {
            Event.stop(A);
            return
        }
        if (this.loggedInAccountId) {
            Event.stop(A);
            this.dialog = Dialog.showConfirmDialog(this.options.messageText, {
                okHandler: this.doSendFriendRequest.bind(this),
                headerText: this.options.headerText,
                buttonText: this.options.buttonText,
                cancelButtonText: this.options.cancelButtonText
            })
        } else {
            Event.stop(A);
            Dialog.showInfoDialog("friend-req.login-info", this.options.loginText, this.options.buttonText, null)
        }
    },
    doSendFriendRequest: function() {
        Dialog.setAsWaitDialog(this.dialog);
        new Ajax.Request(habboReqPath + "/myhabbo/friends/add", {
            parameters: "accountId=" + encodeURIComponent(this.accountId),
            onSuccess: function() {
                Element.addClassName(this.btnAddFriend, "disabled");
                Element.remove(this.dialog);
                Overlay.hide()
            }.bind(this)
        })
    }
};
var GroupInfoWidget = Class.create();
GroupInfoWidget.prototype = {
    tagType: "group",
    initialize: function(C, A) {
        this.groupId = C;
        if (A) {
            this.loggedInAccountId = A
        }
        this.tags = new TagWidgetPartial(this)
    }
};
var HighscoreListWidget = Class.create();
Object.extend(HighscoreListWidget, {
    handleEditMenu: function(C) {
        if (chosenElement && chosenElement.id) {
            var A = WidgetRegistry.getWidgetById(chosenElement.id);
            if (A) {
                var D = Event.element(C);
                A.setGameId(D.options[D.selectedIndex].value)
            }
        }
    }
});
HighscoreListWidget.prototype = {
    initialize: function(D, A, C) {
        this.widgetId = D;
        this.gameId = A;
        this.type = C;
        this.period = null;
        this.scoresEl = $("highscorelist-scores-" + this.widgetId);
        if (this.scoresEl) {
            this.scoresEl.onclick = this.handleScoresClick.bindAsEventListener(this)
        }
    },
    selectGameId: function() {
        var A = $("highscorelist-game");
        $A(A.options).each(function(C) {
            if (C.value == this.gameId) {
                A.selectedIndex = C.index
            }
        }.bind(this))
    },
    handleScoresClick: function(E) {
        var C = Event.element(E);
        if (C.nodeName.toLowerCase() == "li" && C.id) {
            var A = this.type;
            var F = this.period;
            var D = -1;
            if (C.id.indexOf("highscorelist-period") != -1) {
                F = C.id.substring(("highscorelist-period-" + this.widgetId).length + 1)
            } else {
                if (C.id.indexOf("highscorelist-type") != -1) {
                    A = C.id.split("-").last();
                    if (A == this.type) {
                        return
                    }
                } else {
                    if (C.id.indexOf("highscorelist-page") != -1) {
                        D = C.id.split("-").last()
                    }
                }
            }
            this._loadScores(A, F, D)
        }
    },
    setGameId: function(A) {
        if (A != "" && A != this.gameId) {
            closeEditMenu();
            Element.wait(this.scoresEl);
            new Ajax.Request(habboReqPath + "/myhabbo/highscorelist/setGameId", {
                method: "post",
                parameters: {
                    widgetId: this.widgetId,
                    gameId: A
                },
                onComplete: function(C) {
                    this.scoresEl.innerHTML = C.responseText;
                    this.gameId = A
                }.bind(this)
            })
        }
    },
    _loadScores: function(C, E, D) {
        var A = habboReqPath + "/myhabbo/highscorelist/scores";
        if (D != -1) {
            A = habboReqPath + "/myhabbo/highscorelist/page"
        } else {
            Element.wait(this.scoresEl)
        }
        new Ajax.Request(habboReqPath + A, {
            method: "post",
            parameters: {
                widgetId: this.widgetId,
                gameId: this.gameId,
                type: C,
                period: E,
                page: ((D != -1) ? D : 0)
            },
            onComplete: function(F) {
                if (D != -1) {
                    $("highscorelist-page-" + this.widgetId).innerHTML = F.responseText
                } else {
                    this.scoresEl.innerHTML = F.responseText;
                    this.type = C;
                    this.period = E
                }
            }.bind(this)
        })
    }
};
var GroupFavoriteSelector = {
    init: function(E, A, C, D) {
        GroupFavoriteSelector.widget = E;
        GroupFavoriteSelector.ownerId = A;
        GroupFavoriteSelector.groupId = C;
        GroupFavoriteSelector.onCompleteCallback = D || Prototype.emptyFunction
    },
    selectFavorite: function(A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_select_favorite", "/groups/actions/select_favorite", GroupFavoriteSelector.ownerId, GroupFavoriteSelector.groupId, GroupFavoriteSelector.widget, GroupFavoriteSelector.onCompleteCallback)
    },
    deselectFavorite: function(A) {
        Event.stop(A);
        openGroupActionDialog("/groups/actions/confirm_deselect_favorite", "/groups/actions/deselect_favorite", GroupFavoriteSelector.ownerId, GroupFavoriteSelector.groupId, GroupFavoriteSelector.widget, GroupFavoriteSelector.onCompleteCallback)
    }
};
var HallOfFameWidget = Class.create();
HallOfFameWidget.prototype = {
    initialize: function(A) {
        this.widgetId = A;
        this.containerEl = $("hall-of-fame-list-container-" + A);
        this._setupGameLinks()
    },
    _setupGameLinks: function() {
        Event.observe($("hall-of-fame-games-" + this.widgetId), "click", function(A) {
            Event.stop(A);
            this._handleGameLinkClick(A)
        }.bind(this))
    },
    _handleGameLinkClick: function(D) {
        var C = Event.findElement(D, "a");
        if (Element.hasClassName(C, "hall-of-fame-game-link")) {
            var A = C.id.split("-").last();
            this._updateContent(A, 0)
        }
    },
    _updateContent: function(A) {
        new Ajax.Updater(this.containerEl, habboReqPath + "/myhabbo/halloffame/ajax", {
            method: "post",
            parameters: {
                game: A,
                widgetId: this.widgetId
            },
            onComplete: function() {
                this._setupGameLinks()
            }.bind(this)
        })
    }
};
var BestExpsWidget = Class.create();
BestExpsWidget.prototype = {
    initialize: function(A) {
        this.widgetId = A;
        this.containerEl = $("best-exps-list-container-" + A);
        this._setupTypeLinks();
        this._setupOffsetLinks()
    },
    _setupTypeLinks: function() {
        Event.observe($("best-exps-types-" + this.widgetId), "click", function(A) {
            Event.stop(A);
            this._handleTypeLinkClick(A)
        }.bind(this))
    },
    _setupOffsetLinks: function() {
        var A = $F(this.widgetId + "-type");
        if (A == "alltime") {
            return
        }
        Event.observe($("best-exps-offset-" + this.widgetId), "click", function(C) {
            Event.stop(C);
            this._handleOffsetLinkClick(C)
        }.bind(this))
    },
    _handleTypeLinkClick: function(D) {
        var C = Event.findElement(D, "a");
        if (Element.hasClassName(C, "best-exps-type-link")) {
            var A = C.id.split("-").last();
            this._updateContent(A, 0)
        }
    },
    _handleOffsetLinkClick: function(D) {
        var C = Event.findElement(D, "a");
        if (Element.hasClassName(C, "best-exps-offset-link")) {
            var E = C.id.split("-").last();
            var A = $F(this.widgetId + "-type");
            this._updateContent(A, -E)
        }
    },
    _updateContent: function(A, C) {
        new Ajax.Updater(this.containerEl, habboReqPath + "/myhabbo/bestexps/ajax", {
            method: "post",
            parameters: {
                widgetId: this.widgetId,
                type: A,
                offset: C
            },
            onComplete: function(D) {
                this._setupTypeLinks();
                this._setupOffsetLinks()
            }.bind(this)
        })
    }
};
var BadgesWidget = Class.create({
    options: {
        searchUrl: habboReqPath + "/myhabbo/badgelist/badgepaging",
        ownerParameter: "&_mypage.requested.account="
    },
    initialize: function(A, C) {
        this.ownerId = A;
        this.widgetId = C;
        this.containerElement = $("badgelist-content");
        this.listHeight = null;
        if (this.containerElement) {
            this.listHeight = $(this.containerElement).down("ul").getHeight();
            Event.observe(this.containerElement, "click", function(D) {
                Event.stop(D);
                this._processSearch(D)
            }.bind(this))
        }
    },
    _processSearch: function(F) {
        var C = Event.element(F);
        var A = parseInt($F("badgeListPageNumber"));
        var E = parseInt($F("badgeListTotalPages"));
        var D = null;
        if (C.id == "badge-list-search-first") {
            D = 1
        } else {
            if (C.id == "badge-list-search-previous") {
                D = A - 1
            } else {
                if (C.id == "badge-list-search-next") {
                    D = A + 1
                } else {
                    if (C.id == "badge-list-search-last") {
                        D = E
                    }
                }
            }
        }
        if (null == D) {
            return
        }
        new Ajax.Updater(this.containerElement, habboReqPath + this.options.searchUrl, {
            method: "post",
            parameters: "pageNumber=" + encodeURIComponent(D) + "&widgetId=" + this.widgetId + this.options.ownerParameter + this.ownerId,
            onComplete: function(H) {
                if (this.listHeight) {
                    var G = $(this.containerElement).down("ul");
                    $(G).setStyle({
                        height: this.listHeight + "px"
                    })
                }
            }.bind(this)
        })
    }
});