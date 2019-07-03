var element_data = [];
var currentElement = false;


function initEditToolbar() {
    Event.observe($("save-button"), "click", saveObserver, false);
    Event.observe($("cancel-button"), "click", cancelObserver, false)
}

var cancelObserver = function(A) {
    Event.stop(A);
    cancelEditing()
};
var saveStart = 0;
var saveObserver = function(A) {
    Event.stop(A);
    if (showSaveOverlay()) {
        saveStart = new Date().getTime();
        new Ajax.Updater("edit-save", habboReqPath + getSaveEditingActionName(), {
            method: "post",
            evalScripts: true,
            postBody: generatePostBody()
        })
    }
};



function getElementsInInvalidPositions() {
    var Elements = [];
    $("playground").select(".movable").each(function(elementObject) {
        if (isNotWithinPlayground(elementObject)) {
            Elements.push(elementObject)
        }
    });
    return Elements
}

function generatePostBody() {
    var E = "";
    var D = "";
    var A = "";
    var B = element_data.background;
    $("playground").select(".movable").each(function(F) {
        if (Element.hasClassName(F, "stickie")) {
            value = element_data[F.id];
            if (value) {
                E += value
            }
        } else {
            if (Element.hasClassName(F, "sticker")) {
                value = element_data[F.id];
                if (value) {
                    D += value
                }
            } else {
                if (Element.hasClassName(F, "widget")) {
                    value = element_data[F.id];
                    if (value) {
                        A += value
                    }
                }
            }
        }
    });
    var C = "";
    if (D.length > 0) {
        C = "stickers=" + D
    }
    if (E.length > 0) {
        if (C.length > 0) {
            C += "&"
        }
        C += "stickienotes=" + E
    }
    if (A.length > 0) {
        if (C.length > 0) {
            C += "&"
        }
        C += "widgets=" + A
    }
    if (B != null) {
        if (C.length > 0) {
            C += "&"
        }
        C += "background=" + B
    }
    return C
}


