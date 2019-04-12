var Builder = {
    NODEMAP: {
        AREA: "map",
        CAPTION: "table",
        COL: "table",
        COLGROUP: "table",
        LEGEND: "fieldset",
        OPTGROUP: "select",
        OPTION: "select",
        PARAM: "object",
        TBODY: "table",
        TD: "table",
        TFOOT: "table",
        TH: "table",
        THEAD: "table",
        TR: "table"
    },
    node: function(A) {
        A = A.toUpperCase();
        var F = this.NODEMAP[A] || "div";
        var B = document.createElement(F);
        try {
            B.innerHTML = "<" + A + "></" + A + ">"
        } catch (E) {}
        var D = B.firstChild || null;
        if (D && (D.tagName.toUpperCase() != A)) {
            D = D.getElementsByTagName(A)[0]
        }
        if (!D) {
            D = document.createElement(A)
        }
        if (!D) {
            return
        }
        if (arguments[1]) {
            if (this._isStringOrNumber(arguments[1]) || (arguments[1] instanceof Array) || arguments[1].tagName) {
                this._children(D, arguments[1])
            } else {
                var C = this._attributes(arguments[1]);
                if (C.length) {
                    try {
                        B.innerHTML = "<" + A + " " + C + "></" + A + ">"
                    } catch (E) {}
                    D = B.firstChild || null;
                    if (!D) {
                        D = document.createElement(A);
                        for (attr in arguments[1]) {
                            D[attr == "class" ? "className" : attr] = arguments[1][attr]
                        }
                    }
                    if (D.tagName.toUpperCase() != A) {
                        D = B.getElementsByTagName(A)[0]
                    }
                }
            }
        }
        if (arguments[2]) {
            this._children(D, arguments[2])
        }
        return D
    },
    _text: function(A) {
        return document.createTextNode(A)
    },
    ATTR_MAP: {
        className: "class",
        htmlFor: "for"
    },
    _attributes: function(A) {
        var B = [];
        for (attribute in A) {
            B.push((attribute in this.ATTR_MAP ? this.ATTR_MAP[attribute] : attribute) + '="' + A[attribute].toString().escapeHTML().gsub(/habboReqPath+"/, "&quot;") + '"')
        }
        return B.join(" ")
    },
    _children: function(B, A) {
        if (A.tagName) {
            B.appendChild(A);
            return
        }
        if (typeof A == "object") {
            A.flatten().each(function(C) {
                if (typeof C == "object") {
                    B.appendChild(C)
                } else {
                    if (Builder._isStringOrNumber(C)) {
                        B.appendChild(Builder._text(C))
                    }
                }
            })
        } else {
            if (Builder._isStringOrNumber(A)) {
                B.appendChild(Builder._text(A))
            }
        }
    },
    _isStringOrNumber: function(A) {
        return (typeof A == "string" || typeof A == "number")
    },
    build: function(B) {
        var A = this.node("div");
        $(A).update(B.strip());
        return A.down()
    },
    dump: function(B) {
        if (typeof B != "object" && typeof B != "function") {
            B = window
        }
        var A = ("A ABBR ACRONYM ADDRESS APPLET AREA B BASE BASEFONT BDO BIG BLOCKQUOTE BODY BR BUTTON CAPTION CENTER CITE CODE COL COLGROUP DD DEL DFN DIR DIV DL DT EM FIELDSET FONT FORM FRAME FRAMESET H1 H2 H3 H4 H5 H6 HEAD HR HTML I IFRAME IMG INPUT INS ISINDEX KBD LABEL LEGEND LI LINK MAP MENU META NOFRAMES NOSCRIPT OBJECT OL OPTGROUP OPTION P PARAM PRE Q S SAMP SCRIPT SELECT SMALL SPAN STRIKE STRONG STYLE SUB SUP TABLE TBODY TD TEXTAREA TFOOT TH THEAD TITLE TR TT U UL VAR").split(/\s+/);
        A.each(function(C) {
            B[C] = function() {
                return Builder.node.apply(Builder, [C].concat($A(arguments)))
            }
        })
    }
};
String.prototype.parseColor = function() {
    var A = "#";
    if (this.slice(0, 4) == "rgb(") {
        var C = this.slice(4, this.length - 1).split(",");
        var B = 0;
        do {
            A += parseInt(C[B]).toColorPart()
        } while (++B < 3)
    } else {
        if (this.slice(0, 1) == "#") {
            if (this.length == 4) {
                for (var B = 1; B < 4; B++) {
                    A += (this.charAt(B) + this.charAt(B)).toLowerCase()
                }
            }
            if (this.length == 7) {
                A = this.toLowerCase()
            }
        }
    }
    return (A.length == 7 ? A : (arguments[0] || this))
};
Element.collectTextNodes = function(A) {
    return $A($(A).childNodes).collect(function(B) {
        return (B.nodeType == 3 ? B.nodeValue : (B.hasChildNodes() ? Element.collectTextNodes(B) : ""))
    }).flatten().join("")
};
Element.collectTextNodesIgnoreClass = function(A, B) {
    return $A($(A).childNodes).collect(function(C) {
        return (C.nodeType == 3 ? C.nodeValue : ((C.hasChildNodes() && !Element.hasClassName(C, B)) ? Element.collectTextNodesIgnoreClass(C, B) : ""))
    }).flatten().join("")
};
Element.setContentZoom = function(A, B) {
    A = $(A);
    A.setStyle({
        fontSize: (B / 100) + "em"
    });
    if (Prototype.Browser.WebKit) {
        window.scrollBy(0, 0)
    }
    return A
};
Element.getInlineOpacity = function(A) {
    return $(A).style.opacity || ""
};
Element.forceRerendering = function(A) {
    try {
        A = $(A);
        var C = document.createTextNode(" ");
        A.appendChild(C);
        A.removeChild(C)
    } catch (B) {}
};
var Effect = {
    _elementDoesNotExistError: {
        name: "ElementDoesNotExistError",
        message: "The specified DOM element does not exist, but is required for this effect to operate"
    },
    Transitions: {
        linear: Prototype.K,
        sinoidal: function(A) {
            return (-Math.cos(A * Math.PI) / 2) + 0.5
        },
        reverse: function(A) {
            return 1 - A
        },
        flicker: function(A) {
            var A = ((-Math.cos(A * Math.PI) / 4) + 0.75) + Math.random() / 4;
            return A > 1 ? 1 : A
        },
        wobble: function(A) {
            return (-Math.cos(A * Math.PI * (9 * A)) / 2) + 0.5
        },
        pulse: function(B, A) {
            A = A || 5;
            return (((B % (1 / A)) * A).round() == 0 ? ((B * A * 2) - (B * A * 2).floor()) : 1 - ((B * A * 2) - (B * A * 2).floor()))
        },
        spring: function(A) {
            return 1 - (Math.cos(A * 4.5 * Math.PI) * Math.exp(-A * 6))
        },
        none: function(A) {
            return 0
        },
        full: function(A) {
            return 1
        }
    },
    DefaultOptions: {
        duration: 1,
        fps: 100,
        sync: false,
        from: 0,
        to: 1,
        delay: 0,
        queue: "parallel"
    },
    tagifyText: function(A) {
        var B = "position:relative";
        if (Prototype.Browser.IE) {
            B += ";zoom:1"
        }
        A = $(A);
        $A(A.childNodes).each(function(C) {
            if (C.nodeType == 3) {
                C.nodeValue.toArray().each(function(D) {
                    A.insertBefore(new Element("span", {
                        style: B
                    }).update(D == " " ? String.fromCharCode(160) : D), C)
                });
                Element.remove(C)
            }
        })
    },
    multiple: function(B, C) {
        var E;
        if (((typeof B == "object") || Object.isFunction(B)) && (B.length)) {
            E = B
        } else {
            E = $(B).childNodes
        }
        var A = Object.extend({
            speed: 0.1,
            delay: 0
        }, arguments[2] || {});
        var D = A.delay;
        $A(E).each(function(G, F) {
            new C(G, Object.extend(A, {
                delay: F * A.speed + D
            }))
        })
    },
    PAIRS: {
        slide: ["SlideDown", "SlideUp"],
        blind: ["BlindDown", "BlindUp"],
        appear: ["Appear", "Fade"]
    },
    toggle: function(B, C) {
        B = $(B);
        C = (C || "appear").toLowerCase();
        var A = Object.extend({
            queue: {
                position: "end",
                scope: (B.id || "global"),
                limit: 1
            }
        }, arguments[2] || {});
        Effect[B.visible() ? Effect.PAIRS[C][1] : Effect.PAIRS[C][0]](B, A)
    }
};
Effect.DefaultOptions.transition = Effect.Transitions.sinoidal;
Effect.ScopedQueue = Class.create(Enumerable, {
    initialize: function() {
        this.effects = [];
        this.interval = null
    },
    _each: function(A) {
        this.effects._each(A)
    },
    add: function(B) {
        var C = new Date().getTime();
        var A = Object.isString(B.options.queue) ? B.options.queue : B.options.queue.position;
        switch (A) {
            case "front":
                this.effects.findAll(function(D) {
                    return D.state == "idle"
                }).each(function(D) {
                    D.startOn += B.finishOn;
                    D.finishOn += B.finishOn
                });
                break;
            case "with-last":
                C = this.effects.pluck("startOn").max() || C;
                break;
            case "end":
                C = this.effects.pluck("finishOn").max() || C;
                break
        }
        B.startOn += C;
        B.finishOn += C;
        if (!B.options.queue.limit || (this.effects.length < B.options.queue.limit)) {
            this.effects.push(B)
        }
        if (!this.interval) {
            this.interval = setInterval(this.loop.bind(this), 15)
        }
    },
    remove: function(A) {
        this.effects = this.effects.reject(function(B) {
            return B == A
        });
        if (this.effects.length == 0) {
            clearInterval(this.interval);
            this.interval = null
        }
    },
    loop: function() {
        var C = new Date().getTime();
        for (var B = 0, A = this.effects.length; B < A; B++) {
            this.effects[B] && this.effects[B].loop(C)
        }
    }
});
Effect.Queues = {
    instances: $H(),
    get: function(A) {
        if (!Object.isString(A)) {
            return A
        }
        return this.instances.get(A) || this.instances.set(A, new Effect.ScopedQueue())
    }
};
Effect.Queue = Effect.Queues.get("global");
Effect.Base = Class.create({
    position: null,
    start: function(options) {
        function codeForEvent(options, eventName) {
            return ((options[eventName + "Internal"] ? "this.options." + eventName + "Internal(this);" : "") + (options[eventName] ? "this.options." + eventName + "(this);" : ""))
        }
        if (options && options.transition === false) {
            options.transition = Effect.Transitions.linear
        }
        this.options = Object.extend(Object.extend({}, Effect.DefaultOptions), options || {});
        this.currentFrame = 0;
        this.state = "idle";
        this.startOn = this.options.delay * 1000;
        this.finishOn = this.startOn + (this.options.duration * 1000);
        this.fromToDelta = this.options.to - this.options.from;
        this.totalTime = this.finishOn - this.startOn;
        this.totalFrames = this.options.fps * this.options.duration;
        eval('this.render = function(pos){ if (this.state=="idle"){this.state="running";' + codeForEvent(this.options, "beforeSetup") + (this.setup ? "this.setup();" : "") + codeForEvent(this.options, "afterSetup") + '};if (this.state=="running"){pos=this.options.transition(pos)*' + this.fromToDelta + "+" + this.options.from + ";this.position=pos;" + codeForEvent(this.options, "beforeUpdate") + (this.update ? "this.update(pos);" : "") + codeForEvent(this.options, "afterUpdate") + "}}");
        this.event("beforeStart");
        if (!this.options.sync) {
            Effect.Queues.get(Object.isString(this.options.queue) ? "global" : this.options.queue.scope).add(this)
        }
    },
    loop: function(C) {
        if (C >= this.startOn) {
            if (C >= this.finishOn) {
                this.render(1);
                this.cancel();
                this.event("beforeFinish");
                if (this.finish) {
                    this.finish()
                }
                this.event("afterFinish");
                return
            }
            var B = (C - this.startOn) / this.totalTime,
                A = (B * this.totalFrames).round();
            if (A > this.currentFrame) {
                this.render(B);
                this.currentFrame = A
            }
        }
    },
    cancel: function() {
        if (!this.options.sync) {
            Effect.Queues.get(Object.isString(this.options.queue) ? "global" : this.options.queue.scope).remove(this)
        }
        this.state = "finished"
    },
    event: function(A) {
        if (this.options[A + "Internal"]) {
            this.options[A + "Internal"](this)
        }
        if (this.options[A]) {
            this.options[A](this)
        }
    },
    inspect: function() {
        var A = $H();
        for (property in this) {
            if (!Object.isFunction(this[property])) {
                A.set(property, this[property])
            }
        }
        return "#<Effect:" + A.inspect() + ",options:" + $H(this.options).inspect() + ">"
    }
});
Effect.Parallel = Class.create(Effect.Base, {
    initialize: function(A) {
        this.effects = A || [];
        this.start(arguments[1])
    },
    update: function(A) {
        this.effects.invoke("render", A)
    },
    finish: function(A) {
        this.effects.each(function(B) {
            B.render(1);
            B.cancel();
            B.event("beforeFinish");
            if (B.finish) {
                B.finish(A)
            }
            B.event("afterFinish")
        })
    }
});
Effect.Tween = Class.create(Effect.Base, {
    initialize: function(C, F, E) {
        C = Object.isString(C) ? $(C) : C;
        var B = $A(arguments),
            D = B.last(),
            A = B.length == 5 ? B[3] : null;
        this.method = Object.isFunction(D) ? D.bind(C) : Object.isFunction(C[D]) ? C[D].bind(C) : function(G) {
            C[D] = G
        };
        this.start(Object.extend({
            from: F,
            to: E
        }, A || {}))
    },
    update: function(A) {
        this.method(A)
    }
});
Effect.Event = Class.create(Effect.Base, {
    initialize: function() {
        this.start(Object.extend({
            duration: 0
        }, arguments[0] || {}))
    },
    update: Prototype.emptyFunction
});
Effect.Opacity = Class.create(Effect.Base, {
    initialize: function(B) {
        this.element = $(B);
        if (!this.element) {
            throw (Effect._elementDoesNotExistError)
        }
        if (Prototype.Browser.IE && (!this.element.currentStyle.hasLayout)) {
            this.element.setStyle({
                zoom: 1
            })
        }
        var A = Object.extend({
            from: this.element.getOpacity() || 0,
            to: 1
        }, arguments[1] || {});
        this.start(A)
    },
    update: function(A) {
        this.element.setOpacity(A)
    }
});
Effect.Move = Class.create(Effect.Base, {
    initialize: function(B) {
        this.element = $(B);
        if (!this.element) {
            throw (Effect._elementDoesNotExistError)
        }
        var A = Object.extend({
            x: 0,
            y: 0,
            mode: "relative"
        }, arguments[1] || {});
        this.start(A)
    },
    setup: function() {
        this.element.makePositioned();
        this.originalLeft = parseFloat(this.element.getStyle("left") || "0");
        this.originalTop = parseFloat(this.element.getStyle("top") || "0");
        if (this.options.mode == "absolute") {
            this.options.x = this.options.x - this.originalLeft;
            this.options.y = this.options.y - this.originalTop
        }
    },
    update: function(A) {
        this.element.setStyle({
            left: (this.options.x * A + this.originalLeft).round() + "px",
            top: (this.options.y * A + this.originalTop).round() + "px"
        })
    }
});
Effect.MoveBy = function(B, A, C) {
    return new Effect.Move(B, Object.extend({
        x: C,
        y: A
    }, arguments[3] || {}))
};
Effect.Scale = Class.create(Effect.Base, {
    initialize: function(B, C) {
        this.element = $(B);
        if (!this.element) {
            throw (Effect._elementDoesNotExistError)
        }
        var A = Object.extend({
            scaleX: true,
            scaleY: true,
            scaleContent: true,
            scaleFromCenter: false,
            scaleMode: "box",
            scaleFrom: 100,
            scaleTo: C
        }, arguments[2] || {});
        this.start(A)
    },
    setup: function() {
        this.restoreAfterFinish = this.options.restoreAfterFinish || false;
        this.elementPositioning = this.element.getStyle("position");
        this.originalStyle = {};
        ["top", "left", "width", "height", "fontSize"].each(function(B) {
            this.originalStyle[B] = this.element.style[B]
        }.bind(this));
        this.originalTop = this.element.offsetTop;
        this.originalLeft = this.element.offsetLeft;
        var A = this.element.getStyle("font-size") || "100%";
        ["em", "px", "%", "pt"].each(function(B) {
            if (A.indexOf(B) > 0) {
                this.fontSize = parseFloat(A);
                this.fontSizeType = B
            }
        }.bind(this));
        this.factor = (this.options.scaleTo - this.options.scaleFrom) / 100;
        this.dims = null;
        if (this.options.scaleMode == "box") {
            this.dims = [this.element.offsetHeight, this.element.offsetWidth]
        }
        if (/^content/.test(this.options.scaleMode)) {
            this.dims = [this.element.scrollHeight, this.element.scrollWidth]
        }
        if (!this.dims) {
            this.dims = [this.options.scaleMode.originalHeight, this.options.scaleMode.originalWidth]
        }
    },
    update: function(A) {
        var B = (this.options.scaleFrom / 100) + (this.factor * A);
        if (this.options.scaleContent && this.fontSize) {
            this.element.setStyle({
                fontSize: this.fontSize * B + this.fontSizeType
            })
        }
        this.setDimensions(this.dims[0] * B, this.dims[1] * B)
    },
    finish: function(A) {
        if (this.restoreAfterFinish) {
            this.element.setStyle(this.originalStyle)
        }
    },
    setDimensions: function(A, D) {
        var E = {};
        if (this.options.scaleX) {
            E.width = D.round() + "px"
        }
        if (this.options.scaleY) {
            E.height = A.round() + "px"
        }
        if (this.options.scaleFromCenter) {
            var C = (A - this.dims[0]) / 2;
            var B = (D - this.dims[1]) / 2;
            if (this.elementPositioning == "absolute") {
                if (this.options.scaleY) {
                    E.top = this.originalTop - C + "px"
                }
                if (this.options.scaleX) {
                    E.left = this.originalLeft - B + "px"
                }
            } else {
                if (this.options.scaleY) {
                    E.top = -C + "px"
                }
                if (this.options.scaleX) {
                    E.left = -B + "px"
                }
            }
        }
        this.element.setStyle(E)
    }
});
Effect.Highlight = Class.create(Effect.Base, {
    initialize: function(B) {
        this.element = $(B);
        if (!this.element) {
            throw (Effect._elementDoesNotExistError)
        }
        var A = Object.extend({
            startcolor: "#ffff99"
        }, arguments[1] || {});
        this.start(A)
    },
    setup: function() {
        if (this.element.getStyle("display") == "none") {
            this.cancel();
            return
        }
        this.oldStyle = {};
        if (!this.options.keepBackgroundImage) {
            this.oldStyle.backgroundImage = this.element.getStyle("background-image");
            this.element.setStyle({
                backgroundImage: "none"
            })
        }
        if (!this.options.endcolor) {
            this.options.endcolor = this.element.getStyle("background-color").parseColor("#ffffff")
        }
        if (!this.options.restorecolor) {
            this.options.restorecolor = this.element.getStyle("background-color")
        }
        this._base = $R(0, 2).map(function(A) {
            return parseInt(this.options.startcolor.slice(A * 2 + 1, A * 2 + 3), 16)
        }.bind(this));
        this._delta = $R(0, 2).map(function(A) {
            return parseInt(this.options.endcolor.slice(A * 2 + 1, A * 2 + 3), 16) - this._base[A]
        }.bind(this))
    },
    update: function(A) {
        this.element.setStyle({
            backgroundColor: $R(0, 2).inject("#", function(B, C, D) {
                return B + ((this._base[D] + (this._delta[D] * A)).round().toColorPart())
            }.bind(this))
        })
    },
    finish: function() {
        this.element.setStyle(Object.extend(this.oldStyle, {
            backgroundColor: this.options.restorecolor
        }))
    }
});
Effect.ScrollTo = function(D) {
    var C = arguments[1] || {},
        B = document.viewport.getScrollOffsets(),
        E = $(D).cumulativeOffset(),
        A = (window.height || document.body.scrollHeight) - document.viewport.getHeight();
    if (C.offset) {
        E[1] += C.offset
    }
    return new Effect.Tween(null, B.top, E[1] > A ? A : E[1], C, function(F) {
        scrollTo(B.left, F.round())
    })
};
Effect.Fade = function(C) {
    C = $(C);
    var A = C.getInlineOpacity();
    var B = Object.extend({
        from: C.getOpacity() || 1,
        to: 0,
        afterFinishInternal: function(D) {
            if (D.options.to != 0) {
                return
            }
            D.element.hide().setStyle({
                opacity: A
            })
        }
    }, arguments[1] || {});
    return new Effect.Opacity(C, B)
};
Effect.Appear = function(B) {
    B = $(B);
    var A = Object.extend({
        from: (B.getStyle("display") == "none" ? 0 : B.getOpacity() || 0),
        to: 1,
        afterFinishInternal: function(C) {
            C.element.forceRerendering()
        },
        beforeSetup: function(C) {
            C.element.setOpacity(C.options.from).show()
        }
    }, arguments[1] || {});
    return new Effect.Opacity(B, A)
};
Effect.Puff = function(B) {
    B = $(B);
    var A = {
        opacity: B.getInlineOpacity(),
        position: B.getStyle("position"),
        top: B.style.top,
        left: B.style.left,
        width: B.style.width,
        height: B.style.height
    };
    return new Effect.Parallel([new Effect.Scale(B, 200, {
        sync: true,
        scaleFromCenter: true,
        scaleContent: true,
        restoreAfterFinish: true
    }), new Effect.Opacity(B, {
        sync: true,
        to: 0
    })], Object.extend({
        duration: 1,
        beforeSetupInternal: function(C) {
            Position.absolutize(C.effects[0].element)
        },
        afterFinishInternal: function(C) {
            C.effects[0].element.hide().setStyle(A)
        }
    }, arguments[1] || {}))
};
Effect.BlindUp = function(A) {
    A = $(A);
    A.makeClipping();
    return new Effect.Scale(A, 0, Object.extend({
        scaleContent: false,
        scaleX: false,
        restoreAfterFinish: true,
        afterFinishInternal: function(B) {
            B.element.hide().undoClipping()
        }
    }, arguments[1] || {}))
};
Effect.BlindDown = function(B) {
    B = $(B);
    var A = B.getDimensions();
    return new Effect.Scale(B, 100, Object.extend({
        scaleContent: false,
        scaleX: false,
        scaleFrom: 0,
        scaleMode: {
            originalHeight: A.height,
            originalWidth: A.width
        },
        restoreAfterFinish: true,
        afterSetup: function(C) {
            C.element.makeClipping().setStyle({
                height: "0px"
            }).show()
        },
        afterFinishInternal: function(C) {
            C.element.undoClipping()
        }
    }, arguments[1] || {}))
};
Effect.SwitchOff = function(B) {
    B = $(B);
    var A = B.getInlineOpacity();
    return new Effect.Appear(B, Object.extend({
        duration: 0.4,
        from: 0,
        transition: Effect.Transitions.flicker,
        afterFinishInternal: function(C) {
            new Effect.Scale(C.element, 1, {
                duration: 0.3,
                scaleFromCenter: true,
                scaleX: false,
                scaleContent: false,
                restoreAfterFinish: true,
                beforeSetup: function(D) {
                    D.element.makePositioned().makeClipping()
                },
                afterFinishInternal: function(D) {
                    D.element.hide().undoClipping().undoPositioned().setStyle({
                        opacity: A
                    })
                }
            })
        }
    }, arguments[1] || {}))
};
Effect.DropOut = function(B) {
    B = $(B);
    var A = {
        top: B.getStyle("top"),
        left: B.getStyle("left"),
        opacity: B.getInlineOpacity()
    };
    return new Effect.Parallel([new Effect.Move(B, {
        x: 0,
        y: 100,
        sync: true
    }), new Effect.Opacity(B, {
        sync: true,
        to: 0
    })], Object.extend({
        duration: 0.5,
        beforeSetup: function(C) {
            C.effects[0].element.makePositioned()
        },
        afterFinishInternal: function(C) {
            C.effects[0].element.hide().undoPositioned().setStyle(A)
        }
    }, arguments[1] || {}))
};
Effect.Shake = function(D) {
    D = $(D);
    var B = Object.extend({
        distance: 20,
        duration: 0.5
    }, arguments[1] || {});
    var E = parseFloat(B.distance);
    var C = parseFloat(B.duration) / 10;
    var A = {
        top: D.getStyle("top"),
        left: D.getStyle("left")
    };
    return new Effect.Move(D, {
        x: E,
        y: 0,
        duration: C,
        afterFinishInternal: function(F) {
            new Effect.Move(F.element, {
                x: -E * 2,
                y: 0,
                duration: C * 2,
                afterFinishInternal: function(G) {
                    new Effect.Move(G.element, {
                        x: E * 2,
                        y: 0,
                        duration: C * 2,
                        afterFinishInternal: function(H) {
                            new Effect.Move(H.element, {
                                x: -E * 2,
                                y: 0,
                                duration: C * 2,
                                afterFinishInternal: function(I) {
                                    new Effect.Move(I.element, {
                                        x: E * 2,
                                        y: 0,
                                        duration: C * 2,
                                        afterFinishInternal: function(J) {
                                            new Effect.Move(J.element, {
                                                x: -E,
                                                y: 0,
                                                duration: C,
                                                afterFinishInternal: function(K) {
                                                    K.element.undoPositioned().setStyle(A)
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            })
        }
    })
};
Effect.SlideDown = function(C) {
    C = $(C).cleanWhitespace();
    var A = C.down().getStyle("bottom");
    var B = C.getDimensions();
    return new Effect.Scale(C, 100, Object.extend({
        scaleContent: false,
        scaleX: false,
        scaleFrom: window.opera ? 0 : 1,
        scaleMode: {
            originalHeight: B.height,
            originalWidth: B.width
        },
        restoreAfterFinish: true,
        afterSetup: function(D) {
            D.element.makePositioned();
            D.element.down().makePositioned();
            if (window.opera) {
                D.element.setStyle({
                    top: ""
                })
            }
            D.element.makeClipping().setStyle({
                height: "0px"
            }).show()
        },
        afterUpdateInternal: function(D) {
            D.element.down().setStyle({
                bottom: (D.dims[0] - D.element.clientHeight) + "px"
            })
        },
        afterFinishInternal: function(D) {
            D.element.undoClipping().undoPositioned();
            D.element.down().undoPositioned().setStyle({
                bottom: A
            })
        }
    }, arguments[1] || {}))
};
Effect.SlideUp = function(C) {
    C = $(C).cleanWhitespace();
    var A = C.down().getStyle("bottom");
    var B = C.getDimensions();
    return new Effect.Scale(C, window.opera ? 0 : 1, Object.extend({
        scaleContent: false,
        scaleX: false,
        scaleMode: "box",
        scaleFrom: 100,
        scaleMode: {
            originalHeight: B.height,
            originalWidth: B.width
        },
        restoreAfterFinish: true,
        afterSetup: function(D) {
            D.element.makePositioned();
            D.element.down().makePositioned();
            if (window.opera) {
                D.element.setStyle({
                    top: ""
                })
            }
            D.element.makeClipping().show()
        },
        afterUpdateInternal: function(D) {
            D.element.down().setStyle({
                bottom: (D.dims[0] - D.element.clientHeight) + "px"
            })
        },
        afterFinishInternal: function(D) {
            D.element.hide().undoClipping().undoPositioned();
            D.element.down().undoPositioned().setStyle({
                bottom: A
            })
        }
    }, arguments[1] || {}))
};
Effect.Squish = function(A) {
    return new Effect.Scale(A, window.opera ? 1 : 0, {
        restoreAfterFinish: true,
        beforeSetup: function(B) {
            B.element.makeClipping()
        },
        afterFinishInternal: function(B) {
            B.element.hide().undoClipping()
        }
    })
};
Effect.Grow = function(C) {
    C = $(C);
    var B = Object.extend({
        direction: "center",
        moveTransition: Effect.Transitions.sinoidal,
        scaleTransition: Effect.Transitions.sinoidal,
        opacityTransition: Effect.Transitions.full
    }, arguments[1] || {});
    var A = {
        top: C.style.top,
        left: C.style.left,
        height: C.style.height,
        width: C.style.width,
        opacity: C.getInlineOpacity()
    };
    var G = C.getDimensions();
    var H, F;
    var E, D;
    switch (B.direction) {
        case "top-left":
            H = F = E = D = 0;
            break;
        case "top-right":
            H = G.width;
            F = D = 0;
            E = -G.width;
            break;
        case "bottom-left":
            H = E = 0;
            F = G.height;
            D = -G.height;
            break;
        case "bottom-right":
            H = G.width;
            F = G.height;
            E = -G.width;
            D = -G.height;
            break;
        case "center":
            H = G.width / 2;
            F = G.height / 2;
            E = -G.width / 2;
            D = -G.height / 2;
            break
    }
    return new Effect.Move(C, {
        x: H,
        y: F,
        duration: 0.01,
        beforeSetup: function(I) {
            I.element.hide().makeClipping().makePositioned()
        },
        afterFinishInternal: function(I) {
            new Effect.Parallel([new Effect.Opacity(I.element, {
                sync: true,
                to: 1,
                from: 0,
                transition: B.opacityTransition
            }), new Effect.Move(I.element, {
                x: E,
                y: D,
                sync: true,
                transition: B.moveTransition
            }), new Effect.Scale(I.element, 100, {
                scaleMode: {
                    originalHeight: G.height,
                    originalWidth: G.width
                },
                sync: true,
                scaleFrom: window.opera ? 1 : 0,
                transition: B.scaleTransition,
                restoreAfterFinish: true
            })], Object.extend({
                beforeSetup: function(J) {
                    J.effects[0].element.setStyle({
                        height: "0px"
                    }).show()
                },
                afterFinishInternal: function(J) {
                    J.effects[0].element.undoClipping().undoPositioned().setStyle(A)
                }
            }, B))
        }
    })
};
Effect.Shrink = function(C) {
    C = $(C);
    var B = Object.extend({
        direction: "center",
        moveTransition: Effect.Transitions.sinoidal,
        scaleTransition: Effect.Transitions.sinoidal,
        opacityTransition: Effect.Transitions.none
    }, arguments[1] || {});
    var A = {
        top: C.style.top,
        left: C.style.left,
        height: C.style.height,
        width: C.style.width,
        opacity: C.getInlineOpacity()
    };
    var F = C.getDimensions();
    var E, D;
    switch (B.direction) {
        case "top-left":
            E = D = 0;
            break;
        case "top-right":
            E = F.width;
            D = 0;
            break;
        case "bottom-left":
            E = 0;
            D = F.height;
            break;
        case "bottom-right":
            E = F.width;
            D = F.height;
            break;
        case "center":
            E = F.width / 2;
            D = F.height / 2;
            break
    }
    return new Effect.Parallel([new Effect.Opacity(C, {
        sync: true,
        to: 0,
        from: 1,
        transition: B.opacityTransition
    }), new Effect.Scale(C, window.opera ? 1 : 0, {
        sync: true,
        transition: B.scaleTransition,
        restoreAfterFinish: true
    }), new Effect.Move(C, {
        x: E,
        y: D,
        sync: true,
        transition: B.moveTransition
    })], Object.extend({
        beforeStartInternal: function(G) {
            G.effects[0].element.makePositioned().makeClipping()
        },
        afterFinishInternal: function(G) {
            G.effects[0].element.hide().undoClipping().undoPositioned().setStyle(A)
        }
    }, B))
};
Effect.Pulsate = function(C) {
    C = $(C);
    var B = arguments[1] || {};
    var A = C.getInlineOpacity();
    var E = B.transition || Effect.Transitions.sinoidal;
    var D = function(F) {
        return E(1 - Effect.Transitions.pulse(F, B.pulses))
    };
    D.bind(E);
    return new Effect.Opacity(C, Object.extend(Object.extend({
        duration: 2,
        from: 0,
        afterFinishInternal: function(F) {
            F.element.setStyle({
                opacity: A
            })
        }
    }, B), {
        transition: D
    }))
};
Effect.Fold = function(B) {
    B = $(B);
    var A = {
        top: B.style.top,
        left: B.style.left,
        width: B.style.width,
        height: B.style.height
    };
    B.makeClipping();
    return new Effect.Scale(B, 5, Object.extend({
        scaleContent: false,
        scaleX: false,
        afterFinishInternal: function(C) {
            new Effect.Scale(B, 1, {
                scaleContent: false,
                scaleY: false,
                afterFinishInternal: function(D) {
                    D.element.hide().undoClipping().setStyle(A)
                }
            })
        }
    }, arguments[1] || {}))
};
Effect.Morph = Class.create(Effect.Base, {
    initialize: function(C) {
        this.element = $(C);
        if (!this.element) {
            throw (Effect._elementDoesNotExistError)
        }
        var A = Object.extend({
            style: {}
        }, arguments[1] || {});
        if (!Object.isString(A.style)) {
            this.style = $H(A.style)
        } else {
            if (A.style.include(":")) {
                this.style = A.style.parseStyle()
            } else {
                this.element.addClassName(A.style);
                this.style = $H(this.element.getStyles());
                this.element.removeClassName(A.style);
                var B = this.element.getStyles();
                this.style = this.style.reject(function(D) {
                    return D.value == B[D.key]
                });
                A.afterFinishInternal = function(D) {
                    D.element.addClassName(D.options.style);
                    D.transforms.each(function(E) {
                        D.element.style[E.style] = ""
                    })
                }
            }
        }
        this.start(A)
    },
    setup: function() {
        function A(B) {
            if (!B || ["rgba(0, 0, 0, 0)", "transparent"].include(B)) {
                B = "#ffffff"
            }
            B = B.parseColor();
            return $R(0, 2).map(function(C) {
                return parseInt(B.slice(C * 2 + 1, C * 2 + 3), 16)
            })
        }
        this.transforms = this.style.map(function(G) {
            var F = G[0],
                E = G[1],
                D = null;
            if (E.parseColor("#zzzzzz") != "#zzzzzz") {
                E = E.parseColor();
                D = "color"
            } else {
                if (F == "opacity") {
                    E = parseFloat(E);
                    if (Prototype.Browser.IE && (!this.element.currentStyle.hasLayout)) {
                        this.element.setStyle({
                            zoom: 1
                        })
                    }
                } else {
                    if (Element.CSS_LENGTH.test(E)) {
                        var C = E.match(/^([\+\-]?[0-9\.]+)(.*)$/);
                        E = parseFloat(C[1]);
                        D = (C.length == 3) ? C[2] : null
                    }
                }
            }
            var B = this.element.getStyle(F);
            return {
                style: F.camelize(),
                originalValue: D == "color" ? A(B) : parseFloat(B || 0),
                targetValue: D == "color" ? A(E) : E,
                unit: D
            }
        }.bind(this)).reject(function(B) {
            return ((B.originalValue == B.targetValue) || (B.unit != "color" && (isNaN(B.originalValue) || isNaN(B.targetValue))))
        })
    },
    update: function(A) {
        var D = {},
            B, C = this.transforms.length;
        while (C--) {
            D[(B = this.transforms[C]).style] = B.unit == "color" ? "#" + (Math.round(B.originalValue[0] + (B.targetValue[0] - B.originalValue[0]) * A)).toColorPart() + (Math.round(B.originalValue[1] + (B.targetValue[1] - B.originalValue[1]) * A)).toColorPart() + (Math.round(B.originalValue[2] + (B.targetValue[2] - B.originalValue[2]) * A)).toColorPart() : (B.originalValue + (B.targetValue - B.originalValue) * A).toFixed(3) + (B.unit === null ? "" : B.unit)
        }
        this.element.setStyle(D, true)
    }
});
Effect.Transform = Class.create({
    initialize: function(A) {
        this.tracks = [];
        this.options = arguments[1] || {};
        this.addTracks(A)
    },
    addTracks: function(A) {
        A.each(function(B) {
            B = $H(B);
            var C = B.values().first();
            this.tracks.push($H({
                ids: B.keys().first(),
                effect: Effect.Morph,
                options: {
                    style: C
                }
            }))
        }.bind(this));
        return this
    },
    play: function() {
        return new Effect.Parallel(this.tracks.map(function(A) {
            var D = A.get("ids"),
                C = A.get("effect"),
                B = A.get("options");
            var E = [$(D) || $$(D)].flatten();
            return E.map(function(F) {
                return new C(F, Object.extend({
                    sync: true
                }, B))
            })
        }).flatten(), this.options)
    }
});
Element.CSS_PROPERTIES = $w("backgroundColor backgroundPosition borderBottomColor borderBottomStyle borderBottomWidth borderLeftColor borderLeftStyle borderLeftWidth borderRightColor borderRightStyle borderRightWidth borderSpacing borderTopColor borderTopStyle borderTopWidth bottom clip color fontSize fontWeight height left letterSpacing lineHeight marginBottom marginLeft marginRight marginTop markerOffset maxHeight maxWidth minHeight minWidth opacity outlineColor outlineOffset outlineWidth paddingBottom paddingLeft paddingRight paddingTop right textIndent top width wordSpacing zIndex");
Element.CSS_LENGTH = /^(([\+\-]?[0-9\.]+)(em|ex|px|in|cm|mm|pt|pc|\%))|0$/;
String.__parseStyleElement = document.createElement("div");
String.prototype.parseStyle = function() {
    var B, A = $H();
    if (Prototype.Browser.WebKit) {
        B = new Element("div", {
            style: this
        }).style
    } else {
        String.__parseStyleElement.innerHTML = '<div style="' + this + '"></div>';
        B = String.__parseStyleElement.childNodes[0].style
    }
    Element.CSS_PROPERTIES.each(function(C) {
        if (B[C]) {
            A.set(C, B[C])
        }
    });
    if (Prototype.Browser.IE && this.include("opacity")) {
        A.set("opacity", this.match(/opacity:\s*((?:0|1)?(?:\.\d*)?)/)[1])
    }
    return A
};
if (document.defaultView && document.defaultView.getComputedStyle) {
    Element.getStyles = function(B) {
        var A = document.defaultView.getComputedStyle($(B), null);
        return Element.CSS_PROPERTIES.inject({}, function(C, D) {
            C[D] = A[D];
            return C
        })
    }
} else {
    Element.getStyles = function(B) {
        B = $(B);
        var A = B.currentStyle,
            C;
        C = Element.CSS_PROPERTIES.inject({}, function(D, E) {
            D[E] = A[E];
            return D
        });
        if (!C.opacity) {
            C.opacity = B.getOpacity()
        }
        return C
    }
}
Effect.Methods = {
    morph: function(A, B) {
        A = $(A);
        new Effect.Morph(A, Object.extend({
            style: B
        }, arguments[2] || {}));
        return A
    },
    visualEffect: function(C, E, B) {
        C = $(C);
        var D = E.dasherize().camelize(),
            A = D.charAt(0).toUpperCase() + D.substring(1);
        new Effect[A](C, B);
        return C
    },
    highlight: function(B, A) {
        B = $(B);
        new Effect.Highlight(B, A);
        return B
    }
};
$w("fade appear grow shrink fold blindUp blindDown slideUp slideDown pulsate shake puff squish switchOff dropOut").each(function(A) {
    Effect.Methods[A] = function(C, B) {
        C = $(C);
        Effect[A.charAt(0).toUpperCase() + A.substring(1)](C, B);
        return C
    }
});
$w("getInlineOpacity forceRerendering setContentZoom collectTextNodes collectTextNodesIgnoreClass getStyles").each(function(A) {
    Effect.Methods[A] = Element[A]
});
Element.addMethods(Effect.Methods);
if (Object.isUndefined(Effect)) {
    throw ("dragdrop.js requires including script.aculo.us' effects.js library")
}
var Droppables = {
    drops: [],
    remove: function(A) {
        this.drops = this.drops.reject(function(B) {
            return B.element == $(A)
        })
    },
    add: function(B) {
        B = $(B);
        var A = Object.extend({
            greedy: true,
            hoverclass: null,
            tree: false
        }, arguments[1] || {});
        if (A.containment) {
            A._containers = [];
            var C = A.containment;
            if (Object.isArray(C)) {
                C.each(function(D) {
                    A._containers.push($(D))
                })
            } else {
                A._containers.push($(C))
            }
        }
        if (A.accept) {
            A.accept = [A.accept].flatten()
        }
        Element.makePositioned(B);
        A.element = B;
        this.drops.push(A)
    },
    findDeepestChild: function(A) {
        deepest = A[0];
        for (i = 1; i < A.length; ++i) {
            if (Element.isParent(A[i].element, deepest.element)) {
                deepest = A[i]
            }
        }
        return deepest
    },
    isContained: function(B, A) {
        var C;
        if (A.tree) {
            C = B.treeNode
        } else {
            C = B.parentNode
        }
        return A._containers.detect(function(D) {
            return C == D
        })
    },
    isAffected: function(A, C, B) {
        return ((B.element != C) && ((!B._containers) || this.isContained(C, B)) && ((!B.accept) || (Element.classNames(C).detect(function(D) {
            return B.accept.include(D)
        }))) && Position.within(B.element, A[0], A[1]))
    },
    deactivate: function(A) {
        if (A.hoverclass) {
            Element.removeClassName(A.element, A.hoverclass)
        }
        this.last_active = null
    },
    activate: function(A) {
        if (A.hoverclass) {
            Element.addClassName(A.element, A.hoverclass)
        }
        this.last_active = A
    },
    show: function(A, C) {
        if (!this.drops.length) {
            return
        }
        var B, D = [];
        this.drops.each(function(E) {
            if (Droppables.isAffected(A, C, E)) {
                D.push(E)
            }
        });
        if (D.length > 0) {
            B = Droppables.findDeepestChild(D)
        }
        if (this.last_active && this.last_active != B) {
            this.deactivate(this.last_active)
        }
        if (B) {
            Position.within(B.element, A[0], A[1]);
            if (B.onHover) {
                B.onHover(C, B.element, Position.overlap(B.overlap, B.element))
            }
            if (B != this.last_active) {
                Droppables.activate(B)
            }
        }
    },
    fire: function(B, A) {
        if (!this.last_active) {
            return
        }
        Position.prepare();
        if (this.isAffected([Event.pointerX(B), Event.pointerY(B)], A, this.last_active)) {
            if (this.last_active.onDrop) {
                this.last_active.onDrop(A, this.last_active.element, B);
                return true
            }
        }
    },
    reset: function() {
        if (this.last_active) {
            this.deactivate(this.last_active)
        }
    }
};
var Draggables = {
    drags: [],
    observers: [],
    register: function(A) {
        if (this.drags.length == 0) {
            this.eventMouseUp = this.endDrag.bindAsEventListener(this);
            this.eventMouseMove = this.updateDrag.bindAsEventListener(this);
            this.eventKeypress = this.keyPress.bindAsEventListener(this);
            Event.observe(document, "mouseup", this.eventMouseUp);
            Event.observe(document, "mousemove", this.eventMouseMove);
            Event.observe(document, "keypress", this.eventKeypress)
        }
        this.drags.push(A)
    },
    unregister: function(A) {
        this.drags = this.drags.reject(function(B) {
            return B == A
        });
        if (this.drags.length == 0) {
            Event.stopObserving(document, "mouseup", this.eventMouseUp);
            Event.stopObserving(document, "mousemove", this.eventMouseMove);
            Event.stopObserving(document, "keypress", this.eventKeypress)
        }
    },
    activate: function(A) {
        if (A.options.delay) {
            this._timeout = setTimeout(function() {
                Draggables._timeout = null;
                window.focus();
                Draggables.activeDraggable = A
            }.bind(this), A.options.delay)
        } else {
            window.focus();
            this.activeDraggable = A
        }
    },
    deactivate: function() {
        this.activeDraggable = null
    },
    updateDrag: function(A) {
        if (!this.activeDraggable) {
            return
        }
        var B = [Event.pointerX(A), Event.pointerY(A)];
        if (this._lastPointer && (this._lastPointer.inspect() == B.inspect())) {
            return
        }
        this._lastPointer = B;
        this.activeDraggable.updateDrag(A, B)
    },
    endDrag: function(A) {
        if (this._timeout) {
            clearTimeout(this._timeout);
            this._timeout = null
        }
        if (!this.activeDraggable) {
            return
        }
        this._lastPointer = null;
        this.activeDraggable.endDrag(A);
        this.activeDraggable = null
    },
    keyPress: function(A) {
        if (this.activeDraggable) {
            this.activeDraggable.keyPress(A)
        }
    },
    addObserver: function(A) {
        this.observers.push(A);
        this._cacheObserverCallbacks()
    },
    removeObserver: function(A) {
        this.observers = this.observers.reject(function(B) {
            return B.element == A
        });
        this._cacheObserverCallbacks()
    },
    notify: function(B, A, C) {
        if (this[B + "Count"] > 0) {
            this.observers.each(function(D) {
                if (D[B]) {
                    D[B](B, A, C)
                }
            })
        }
        if (A.options[B]) {
            A.options[B](A, C)
        }
    },
    _cacheObserverCallbacks: function() {
        ["onStart", "onEnd", "onDrag"].each(function(A) {
            Draggables[A + "Count"] = Draggables.observers.select(function(B) {
                return B[A]
            }).length
        })
    }
};
var Draggable = Class.create({
    initialize: function(B) {
        var C = {
            handle: false,
            reverteffect: function(F, E, D) {
                var G = Math.sqrt(Math.abs(E ^ 2) + Math.abs(D ^ 2)) * 0.02;
                new Effect.Move(F, {
                    x: -D,
                    y: -E,
                    duration: G,
                    queue: {
                        scope: "_draggable",
                        position: "end"
                    }
                })
            },
            endeffect: function(E) {
                var D = Object.isNumber(E._opacity) ? E._opacity : 1;
                new Effect.Opacity(E, {
                    duration: 0.2,
                    from: 0.7,
                    to: D,
                    queue: {
                        scope: "_draggable",
                        position: "end"
                    },
                    afterFinish: function() {
                        Draggable._dragging[E] = false
                    }
                })
            },
            zindex: 1000,
            revert: false,
            quiet: false,
            scroll: false,
            scrollSensitivity: 20,
            scrollSpeed: 15,
            snap: false,
            delay: 0
        };
        if (!arguments[1] || Object.isUndefined(arguments[1].endeffect)) {
            Object.extend(C, {
                starteffect: function(D) {
                    D._opacity = Element.getOpacity(D);
                    Draggable._dragging[D] = true;
                    new Effect.Opacity(D, {
                        duration: 0.2,
                        from: D._opacity,
                        to: 0.7
                    })
                }
            })
        }
        var A = Object.extend(C, arguments[1] || {});
        this.element = $(B);
        if (A.handle && Object.isString(A.handle)) {
            this.handle = this.element.down("." + A.handle, 0)
        }
        if (!this.handle) {
            this.handle = $(A.handle)
        }
        if (!this.handle) {
            this.handle = this.element
        }
        if (A.scroll && !A.scroll.scrollTo && !A.scroll.outerHTML) {
            A.scroll = $(A.scroll);
            this._isScrollChild = Element.childOf(this.element, A.scroll)
        }
        Element.makePositioned(this.element);
        this.options = A;
        this.dragging = false;
        this.eventMouseDown = this.initDrag.bindAsEventListener(this);
        Event.observe(this.handle, "mousedown", this.eventMouseDown);
        Draggables.register(this)
    },
    destroy: function() {
        Event.stopObserving(this.handle, "mousedown", this.eventMouseDown);
        Draggables.unregister(this)
    },
    currentDelta: function() {
        return ([parseInt(Element.getStyle(this.element, "left") || "0"), parseInt(Element.getStyle(this.element, "top") || "0")])
    },
    initDrag: function(A) {
        if (!Object.isUndefined(Draggable._dragging[this.element]) && Draggable._dragging[this.element]) {
            return
        }
        if (Event.isLeftClick(A)) {
            var C = Event.element(A);
            if ((tag_name = C.tagName.toUpperCase()) && (tag_name == "INPUT" || tag_name == "SELECT" || tag_name == "OPTION" || tag_name == "BUTTON" || tag_name == "TEXTAREA")) {
                return
            }
            var B = [Event.pointerX(A), Event.pointerY(A)];
            var D = Position.cumulativeOffset(this.element);
            this.offset = [0, 1].map(function(E) {
                return (B[E] - D[E])
            });
            Draggables.activate(this);
            Event.stop(A)
        }
    },
    startDrag: function(B) {
        this.dragging = true;
        if (!this.delta) {
            this.delta = this.currentDelta()
        }
        if (this.options.zindex) {
            this.originalZ = parseInt(Element.getStyle(this.element, "z-index") || 0);
            this.element.style.zIndex = this.options.zindex
        }
        if (this.options.ghosting) {
            this._clone = this.element.cloneNode(true);
            this.element._originallyAbsolute = (this.element.getStyle("position") == "absolute");
            if (!this.element._originallyAbsolute) {
                Position.absolutize(this.element)
            }
            this.element.parentNode.insertBefore(this._clone, this.element)
        }
        if (this.options.scroll) {
            if (this.options.scroll == window) {
                var A = this._getWindowScroll(this.options.scroll);
                this.originalScrollLeft = A.left;
                this.originalScrollTop = A.top
            } else {
                this.originalScrollLeft = this.options.scroll.scrollLeft;
                this.originalScrollTop = this.options.scroll.scrollTop
            }
        }
        Draggables.notify("onStart", this, B);
        if (this.options.starteffect) {
            this.options.starteffect(this.element)
        }
    },
    updateDrag: function(event, pointer) {
        if (!this.dragging) {
            this.startDrag(event)
        }
        if (!this.options.quiet) {
            Position.prepare();
            Droppables.show(pointer, this.element)
        }
        Draggables.notify("onDrag", this, event);
        this.draw(pointer);
        if (this.options.change) {
            this.options.change(this)
        }
        if (this.options.scroll) {
            this.stopScrolling();
            var p;
            if (this.options.scroll == window) {
                with(this._getWindowScroll(this.options.scroll)) {
                    p = [left, top, left + width, top + height]
                }
            } else {
                p = Position.page(this.options.scroll);
                p[0] += this.options.scroll.scrollLeft + Position.deltaX;
                p[1] += this.options.scroll.scrollTop + Position.deltaY;
                p.push(p[0] + this.options.scroll.offsetWidth);
                p.push(p[1] + this.options.scroll.offsetHeight)
            }
            var speed = [0, 0];
            if (pointer[0] < (p[0] + this.options.scrollSensitivity)) {
                speed[0] = pointer[0] - (p[0] + this.options.scrollSensitivity)
            }
            if (pointer[1] < (p[1] + this.options.scrollSensitivity)) {
                speed[1] = pointer[1] - (p[1] + this.options.scrollSensitivity)
            }
            if (pointer[0] > (p[2] - this.options.scrollSensitivity)) {
                speed[0] = pointer[0] - (p[2] - this.options.scrollSensitivity)
            }
            if (pointer[1] > (p[3] - this.options.scrollSensitivity)) {
                speed[1] = pointer[1] - (p[3] - this.options.scrollSensitivity)
            }
            this.startScrolling(speed)
        }
        if (Prototype.Browser.WebKit) {
            window.scrollBy(0, 0)
        }
        Event.stop(event)
    },
    finishDrag: function(B, E) {
        this.dragging = false;
        if (this.options.quiet) {
            Position.prepare();
            var D = [Event.pointerX(B), Event.pointerY(B)];
            Droppables.show(D, this.element)
        }
        if (this.options.ghosting) {
            if (!this.element._originallyAbsolute) {
                Position.relativize(this.element)
            }
            delete this.element._originallyAbsolute;
            Element.remove(this._clone);
            this._clone = null
        }
        var F = false;
        if (E) {
            F = Droppables.fire(B, this.element);
            if (!F) {
                F = false
            }
        }
        if (F && this.options.onDropped) {
            this.options.onDropped(this.element)
        }
        Draggables.notify("onEnd", this, B);
        var A = this.options.revert;
        if (A && Object.isFunction(A)) {
            A = A(this.element)
        }
        var C = this.currentDelta();
        if (A && this.options.reverteffect) {
            if (F == 0 || A != "failure") {
                this.options.reverteffect(this.element, C[1] - this.delta[1], C[0] - this.delta[0])
            }
        } else {
            this.delta = C
        }
        if (this.options.zindex) {
            this.element.style.zIndex = this.originalZ
        }
        if (this.options.endeffect) {
            this.options.endeffect(this.element)
        }
        Draggables.deactivate(this);
        Droppables.reset()
    },
    keyPress: function(A) {
        if (A.keyCode != Event.KEY_ESC) {
            return
        }
        this.finishDrag(A, false);
        Event.stop(A)
    },
    endDrag: function(A) {
        if (!this.dragging) {
            return
        }
        this.stopScrolling();
        this.finishDrag(A, true);
        Event.stop(A)
    },
    draw: function(A) {
        var F = Position.cumulativeOffset(this.element);
        if (this.options.ghosting) {
            var C = Position.realOffset(this.element);
            F[0] += C[0] - Position.deltaX;
            F[1] += C[1] - Position.deltaY
        }
        var E = this.currentDelta();
        F[0] -= E[0];
        F[1] -= E[1];
        if (this.options.scroll && (this.options.scroll != window && this._isScrollChild)) {
            F[0] -= this.options.scroll.scrollLeft - this.originalScrollLeft;
            F[1] -= this.options.scroll.scrollTop - this.originalScrollTop
        }
        var D = [0, 1].map(function(G) {
            return (A[G] - F[G] - this.offset[G])
        }.bind(this));
        if (this.options.snap) {
            if (Object.isFunction(this.options.snap)) {
                D = this.options.snap(D[0], D[1], this)
            } else {
                if (Object.isArray(this.options.snap)) {
                    D = D.map(function(G, H) {
                        return (G / this.options.snap[H]).round() * this.options.snap[H]
                    }.bind(this))
                } else {
                    D = D.map(function(G) {
                        return (G / this.options.snap).round() * this.options.snap
                    }.bind(this))
                }
            }
        }
        var B = this.element.style;
        if ((!this.options.constraint) || (this.options.constraint == "horizontal")) {
            B.left = D[0] + "px"
        }
        if ((!this.options.constraint) || (this.options.constraint == "vertical")) {
            B.top = D[1] + "px"
        }
        if (B.visibility == "hidden") {
            B.visibility = ""
        }
    },
    stopScrolling: function() {
        if (this.scrollInterval) {
            clearInterval(this.scrollInterval);
            this.scrollInterval = null;
            Draggables._lastScrollPointer = null
        }
    },
    startScrolling: function(A) {
        if (!(A[0] || A[1])) {
            return
        }
        this.scrollSpeed = [A[0] * this.options.scrollSpeed, A[1] * this.options.scrollSpeed];
        this.lastScrolled = new Date();
        this.scrollInterval = setInterval(this.scroll.bind(this), 10)
    },
    scroll: function() {
        var current = new Date();
        var delta = current - this.lastScrolled;
        this.lastScrolled = current;
        if (this.options.scroll == window) {
            with(this._getWindowScroll(this.options.scroll)) {
                if (this.scrollSpeed[0] || this.scrollSpeed[1]) {
                    var d = delta / 1000;
                    this.options.scroll.scrollTo(left + d * this.scrollSpeed[0], top + d * this.scrollSpeed[1])
                }
            }
        } else {
            this.options.scroll.scrollLeft += this.scrollSpeed[0] * delta / 1000;
            this.options.scroll.scrollTop += this.scrollSpeed[1] * delta / 1000
        }
        Position.prepare();
        Droppables.show(Draggables._lastPointer, this.element);
        Draggables.notify("onDrag", this);
        if (this._isScrollChild) {
            Draggables._lastScrollPointer = Draggables._lastScrollPointer || $A(Draggables._lastPointer);
            Draggables._lastScrollPointer[0] += this.scrollSpeed[0] * delta / 1000;
            Draggables._lastScrollPointer[1] += this.scrollSpeed[1] * delta / 1000;
            if (Draggables._lastScrollPointer[0] < 0) {
                Draggables._lastScrollPointer[0] = 0
            }
            if (Draggables._lastScrollPointer[1] < 0) {
                Draggables._lastScrollPointer[1] = 0
            }
            this.draw(Draggables._lastScrollPointer)
        }
        if (this.options.change) {
            this.options.change(this)
        }
    },
    _getWindowScroll: function(w) {
        var T, L, W, H;
        with(w.document) {
            if (w.document.documentElement && documentElement.scrollTop) {
                T = documentElement.scrollTop;
                L = documentElement.scrollLeft
            } else {
                if (w.document.body) {
                    T = body.scrollTop;
                    L = body.scrollLeft
                }
            }
            if (w.innerWidth) {
                W = w.innerWidth;
                H = w.innerHeight
            } else {
                if (w.document.documentElement && documentElement.clientWidth) {
                    W = documentElement.clientWidth;
                    H = documentElement.clientHeight
                } else {
                    W = body.offsetWidth;
                    H = body.offsetHeight
                }
            }
        }
        return {
            top: T,
            left: L,
            width: W,
            height: H
        }
    }
});
Draggable._dragging = {};
var SortableObserver = Class.create({
    initialize: function(B, A) {
        this.element = $(B);
        this.observer = A;
        this.lastValue = Sortable.serialize(this.element)
    },
    onStart: function() {
        this.lastValue = Sortable.serialize(this.element)
    },
    onEnd: function() {
        Sortable.unmark();
        if (this.lastValue != Sortable.serialize(this.element)) {
            this.observer(this.element)
        }
    }
});
var Sortable = {
    SERIALIZE_RULE: /^[^_\-](?:[A-Za-z0-9\-\_]*)[_](.*)$/,
    sortables: {},
    _findRootElement: function(A) {
        while (A.tagName.toUpperCase() != "BODY") {
            if (A.id && Sortable.sortables[A.id]) {
                return A
            }
            A = A.parentNode
        }
    },
    options: function(A) {
        A = Sortable._findRootElement($(A));
        if (!A) {
            return
        }
        return Sortable.sortables[A.id]
    },
    destroy: function(A) {
        var B = Sortable.options(A);
        if (B) {
            Draggables.removeObserver(B.element);
            B.droppables.each(function(C) {
                Droppables.remove(C)
            });
            B.draggables.invoke("destroy");
            delete Sortable.sortables[B.element.id]
        }
    },
    create: function(C) {
        C = $(C);
        var B = Object.extend({
            element: C,
            tag: "li",
            dropOnEmpty: false,
            tree: false,
            treeTag: "ul",
            overlap: "vertical",
            constraint: "vertical",
            containment: C,
            handle: false,
            only: false,
            delay: 0,
            hoverclass: null,
            ghosting: false,
            quiet: false,
            scroll: false,
            scrollSensitivity: 20,
            scrollSpeed: 15,
            format: this.SERIALIZE_RULE,
            elements: false,
            handles: false,
            onChange: Prototype.emptyFunction,
            onUpdate: Prototype.emptyFunction
        }, arguments[1] || {});
        this.destroy(C);
        var A = {
            revert: true,
            quiet: B.quiet,
            scroll: B.scroll,
            scrollSpeed: B.scrollSpeed,
            scrollSensitivity: B.scrollSensitivity,
            delay: B.delay,
            ghosting: B.ghosting,
            constraint: B.constraint,
            handle: B.handle
        };
        if (B.starteffect) {
            A.starteffect = B.starteffect
        }
        if (B.reverteffect) {
            A.reverteffect = B.reverteffect
        } else {
            if (B.ghosting) {
                A.reverteffect = function(F) {
                    F.style.top = 0;
                    F.style.left = 0
                }
            }
        }
        if (B.endeffect) {
            A.endeffect = B.endeffect
        }
        if (B.zindex) {
            A.zindex = B.zindex
        }
        var D = {
            overlap: B.overlap,
            containment: B.containment,
            tree: B.tree,
            hoverclass: B.hoverclass,
            onHover: Sortable.onHover
        };
        var E = {
            onHover: Sortable.onEmptyHover,
            overlap: B.overlap,
            containment: B.containment,
            hoverclass: B.hoverclass
        };
        Element.cleanWhitespace(C);
        B.draggables = [];
        B.droppables = [];
        if (B.dropOnEmpty || B.tree) {
            Droppables.add(C, E);
            B.droppables.push(C)
        }(B.elements || this.findElements(C, B) || []).each(function(H, F) {
            var G = B.handles ? $(B.handles[F]) : (B.handle ? $(H).select("." + B.handle)[0] : H);
            B.draggables.push(new Draggable(H, Object.extend(A, {
                handle: G
            })));
            Droppables.add(H, D);
            if (B.tree) {
                H.treeNode = C
            }
            B.droppables.push(H)
        });
        if (B.tree) {
            (Sortable.findTreeElements(C, B) || []).each(function(F) {
                Droppables.add(F, E);
                F.treeNode = C;
                B.droppables.push(F)
            })
        }
        this.sortables[C.id] = B;
        Draggables.addObserver(new SortableObserver(C, B.onUpdate))
    },
    findElements: function(B, A) {
        return Element.findChildren(B, A.only, A.tree ? true : false, A.tag)
    },
    findTreeElements: function(B, A) {
        return Element.findChildren(B, A.only, A.tree ? true : false, A.treeTag)
    },
    onHover: function(E, D, A) {
        if (Element.isParent(D, E)) {
            return
        }
        if (A > 0.33 && A < 0.66 && Sortable.options(D).tree) {
            return
        } else {
            if (A > 0.5) {
                Sortable.mark(D, "before");
                if (D.previousSibling != E) {
                    var B = E.parentNode;
                    E.style.visibility = "hidden";
                    D.parentNode.insertBefore(E, D);
                    if (D.parentNode != B) {
                        Sortable.options(B).onChange(E)
                    }
                    Sortable.options(D.parentNode).onChange(E)
                }
            } else {
                Sortable.mark(D, "after");
                var C = D.nextSibling || null;
                if (C != E) {
                    var B = E.parentNode;
                    E.style.visibility = "hidden";
                    D.parentNode.insertBefore(E, C);
                    if (D.parentNode != B) {
                        Sortable.options(B).onChange(E)
                    }
                    Sortable.options(D.parentNode).onChange(E)
                }
            }
        }
    },
    onEmptyHover: function(E, G, H) {
        var I = E.parentNode;
        var A = Sortable.options(G);
        if (!Element.isParent(G, E)) {
            var F;
            var C = Sortable.findElements(G, {
                tag: A.tag,
                only: A.only
            });
            var B = null;
            if (C) {
                var D = Element.offsetSize(G, A.overlap) * (1 - H);
                for (F = 0; F < C.length; F += 1) {
                    if (D - Element.offsetSize(C[F], A.overlap) >= 0) {
                        D -= Element.offsetSize(C[F], A.overlap)
                    } else {
                        if (D - (Element.offsetSize(C[F], A.overlap) / 2) >= 0) {
                            B = F + 1 < C.length ? C[F + 1] : null;
                            break
                        } else {
                            B = C[F];
                            break
                        }
                    }
                }
            }
            G.insertBefore(E, B);
            Sortable.options(I).onChange(E);
            A.onChange(E)
        }
    },
    unmark: function() {
        if (Sortable._marker) {
            Sortable._marker.hide()
        }
    },
    mark: function(B, A) {
        var D = Sortable.options(B.parentNode);
        if (D && !D.ghosting) {
            return
        }
        if (!Sortable._marker) {
            Sortable._marker = ($("dropmarker") || Element.extend(document.createElement("DIV"))).hide().addClassName("dropmarker").setStyle({
                position: "absolute"
            });
            document.getElementsByTagName("body").item(0).appendChild(Sortable._marker)
        }
        var C = Position.cumulativeOffset(B);
        Sortable._marker.setStyle({
            left: C[0] + "px",
            top: C[1] + "px"
        });
        if (A == "after") {
            if (D.overlap == "horizontal") {
                Sortable._marker.setStyle({
                    left: (C[0] + B.clientWidth) + "px"
                })
            } else {
                Sortable._marker.setStyle({
                    top: (C[1] + B.clientHeight) + "px"
                })
            }
        }
        Sortable._marker.show()
    },
    _tree: function(E, B, F) {
        var D = Sortable.findElements(E, B) || [];
        for (var C = 0; C < D.length; ++C) {
            var A = D[C].id.match(B.format);
            if (!A) {
                continue
            }
            var G = {
                id: encodeURIComponent(A ? A[1] : null),
                element: E,
                parent: F,
                children: [],
                position: F.children.length,
                container: $(D[C]).down(B.treeTag)
            };
            if (G.container) {
                this._tree(G.container, B, G)
            }
            F.children.push(G)
        }
        return F
    },
    tree: function(D) {
        D = $(D);
        var C = this.options(D);
        var B = Object.extend({
            tag: C.tag,
            treeTag: C.treeTag,
            only: C.only,
            name: D.id,
            format: C.format
        }, arguments[1] || {});
        var A = {
            id: null,
            parent: null,
            children: [],
            container: D,
            position: 0
        };
        return Sortable._tree(D, B, A)
    },
    _constructIndex: function(B) {
        var A = "";
        do {
            if (B.id) {
                A = "[" + B.position + "]" + A
            }
        } while ((B = B.parent) != null);
        return A
    },
    sequence: function(B) {
        B = $(B);
        var A = Object.extend(this.options(B), arguments[1] || {});
        return $(this.findElements(B, A) || []).map(function(C) {
            return C.id.match(A.format) ? C.id.match(A.format)[1] : ""
        })
    },
    setSequence: function(B, C) {
        B = $(B);
        var A = Object.extend(this.options(B), arguments[2] || {});
        var D = {};
        this.findElements(B, A).each(function(E) {
            if (E.id.match(A.format)) {
                D[E.id.match(A.format)[1]] = [E, E.parentNode]
            }
            E.parentNode.removeChild(E)
        });
        C.each(function(E) {
            var F = D[E];
            if (F) {
                F[1].appendChild(F[0]);
                delete D[E]
            }
        })
    },
    serialize: function(C) {
        C = $(C);
        var B = Object.extend(Sortable.options(C), arguments[1] || {});
        var A = encodeURIComponent((arguments[1] && arguments[1].name) ? arguments[1].name : C.id);
        if (B.tree) {
            return Sortable.tree(C, arguments[1]).children.map(function(D) {
                return [A + Sortable._constructIndex(D) + "[id]=" + encodeURIComponent(D.id)].concat(D.children.map(arguments.callee))
            }).flatten().join("&")
        } else {
            return Sortable.sequence(C, arguments[1]).map(function(D) {
                return A + "[]=" + encodeURIComponent(D)
            }).join("&")
        }
    }
};
Element.isParent = function(B, A) {
    if (!B.parentNode || B == A) {
        return false
    }
    if (B.parentNode == A) {
        return true
    }
    return Element.isParent(B.parentNode, A)
};
Element.findChildren = function(D, B, A, C) {
    if (!D.hasChildNodes()) {
        return null
    }
    C = C.toUpperCase();
    if (B) {
        B = [B].flatten()
    }
    var E = [];
    $A(D.childNodes).each(function(G) {
        if (G.tagName && G.tagName.toUpperCase() == C && (!B || (Element.classNames(G).detect(function(H) {
                return B.include(H)
            })))) {
            E.push(G)
        }
        if (A) {
            var F = Element.findChildren(G, B, A, C);
            if (F) {
                E.push(F)
            }
        }
    });
    return (E.length > 0 ? E.flatten() : [])
};
Element.offsetSize = function(A, B) {
    return A["offset" + ((B == "vertical" || B == "height") ? "Height" : "Width")]
};
var Tips = {
    tips: [],
    zIndex: 8999,
    add: function(A) {
        this.tips.push(A)
    },
    remove: function(A) {
        var B = this.get(A);
        if (!B) {
            return
        }
        this.tips = this.tips.reject(function(C) {
            return C == B
        });
        B.deactivate();
        if (B.tooltip) {
            B.wrapper.remove()
        }
        if (B.underlay) {
            B.underlay.remove()
        }
    },
    get: function(A) {
        return this.tips.find(function(B) {
            return B.element == $(A)
        })
    }
};
var Tip = Class.create();
Tip.prototype = {
    initialize: function(B, D) {
        this.element = $(B);
        Tips.remove(this.element);
        this.content = D;
        this.options = Object.extend({
            className: "tooltip",
            duration: 0.3,
            effect: false,
            hook: false,
            offset: (arguments[2] && arguments[2].hook) ? {
                x: 0,
                y: 0
            } : {
                x: 16,
                y: 16
            },
            fixed: false,
            target: this.element,
            title: false,
            viewport: true,
            startEvent: "mousemove",
            endEvent: "mouseout"
        }, arguments[2] || {});
        this.target = $(this.options.target);
        if (this.options.hook) {
            this.options.fixed = true;
            this.options.viewport = false
        }
        if (this.options.effect) {
            this.queue = {
                position: "end",
                limit: 1,
                scope: ""
            };
            var E = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            for (var A = 0; A < 6; A++) {
                var C = Math.floor(Math.random() * E.length);
                this.queue.scope += E.substring(C, C + 1)
            }
        }
        this.buildWrapper();
        Tips.add(this);
        this.activate()
    },
    activate: function() {
        if (this.options.startEvent) {
            this.eventShow = this.showTip.safeBind(this);
            this.element.observe(this.options.startEvent, this.eventShow)
        }
        if (this.options.endEvent) {
            this.eventHide = this.hideTip.safeBind(this);
            this.element.observe(this.options.endEvent, this.eventHide)
        }
    },
    deactivate: function() {
        if (this.options.startEvent) {
            this.element.stopObserving(this.options.startEvent, this.eventShow)
        }
        if (this.options.endEvent) {
            this.element.stopObserving(this.options.endEvent, this.eventHide)
        }
    },
    buildWrapper: function() {
        this.wrapper = document.createElement("div");
        Element.setStyle(this.wrapper, {
            position: "absolute",
            zIndex: Tips.zIndex + 1,
            display: "none"
        });
        if (Prototype.Browser.IE) {
            this.underlay = document.createElement("iframe");
            this.underlay.src = "javascript:false;";
            Element.setStyle(this.underlay, {
                position: "absolute",
                display: "none",
                border: 0,
                margin: 0,
                opacity: 0.01,
                padding: 0,
                background: "none",
                zIndex: Tips.zIndex
            })
        }
    },
    buildTip: function() {
        if (Prototype.Browser.IE) {
            document.body.appendChild(this.underlay)
        }
        this.tooltip = this.wrapper.appendChild(document.createElement("div"));
        this.tooltip.className = this.options.className;
        this.tooltip.style.position = "relative";
        if (this.options.title) {
            this.title = this.tooltip.appendChild(document.createElement("div"));
            this.title.className = "title";
            Element.update(this.title, this.options.title)
        }
        this.tip = this.tooltip.appendChild(document.createElement("div"));
        this.tip.className = "content";
        Element.update(this.tip, this.content);
        document.body.appendChild(this.wrapper);
        var A = this.wrapper.getDimensions();
        this.wrapper.setStyle({
            width: A.width + "px",
            height: A.height + "px"
        });
        if (Prototype.Browser.IE) {
            this.underlay.setStyle({
                width: A.width + "px",
                height: A.height + "px"
            })
        }
        Element.hide(this.tooltip)
    },
    showTip: function(A) {
        if (!this.tooltip) {
            this.buildTip()
        }
        this.positionTip(A);
        if (this.wrapper.visible() && this.options.effect != "appear") {
            return
        }
        if (Prototype.Browser.IE) {
            this.underlay.show()
        }
        this.wrapper.show();
        if (!this.options.effect) {
            this.tooltip.show()
        } else {
            if (this.activeEffect) {
                Effect.Queues.get(this.queue.scope).remove(this.activeEffect)
            }
            this.activeEffect = Effect[Effect.PAIRS[this.options.effect][0]](this.tooltip, {
                duration: this.options.duration,
                queue: this.queue
            })
        }
    },
    hideTip: function(A) {
        if (!this.wrapper.visible()) {
            return
        }
        if (!this.options.effect) {
            if (Prototype.Browser.IE) {
                this.underlay.hide()
            }
            this.tooltip.hide();
            this.wrapper.hide()
        } else {
            if (this.activeEffect) {
                Effect.Queues.get(this.queue.scope).remove(this.activeEffect)
            }
            this.activeEffect = Effect[Effect.PAIRS[this.options.effect][1]](this.tooltip, {
                duration: this.options.duration,
                queue: this.queue,
                afterFinish: function() {
                    if (Prototype.Browser.IE) {
                        this.underlay.hide()
                    }
                    this.wrapper.hide()
                }.bind(this)
            })
        }
    },
    positionTip: function(A) {
        var E = {
            left: this.options.offset.x,
            top: this.options.offset.y
        };
        var F = this.target.cumulativeOffset();
        var B = this.wrapper.getDimensions();
        var I = {
            left: (this.options.fixed) ? F[0] : Event.pointerX(A),
            top: (this.options.fixed) ? F[1] : Event.pointerY(A)
        };
        I.left += E.left;
        I.top += E.top;
        if (this.options.hook) {
            var K = {
                target: this.target.getDimensions(),
                tip: B
            };
            var L = {
                target: this.target.cumulativeOffset(),
                tip: this.target.cumulativeOffset()
            };
            for (var H in L) {
                switch (this.options.hook[H]) {
                    case "topRight":
                        L[H][0] += K[H].width;
                        break;
                    case "bottomLeft":
                        L[H][1] += K[H].height;
                        break;
                    case "bottomRight":
                        L[H][0] += K[H].width;
                        L[H][1] += K[H].height;
                        break
                }
            }
            I.left += -1 * (L.tip[0] - L.target[0]);
            I.top += -1 * (L.tip[1] - L.target[1])
        }
        if (!this.options.fixed && this.element !== this.target) {
            var C = this.element.cumulativeOffset();
            I.left += -1 * (C[0] - F[0]);
            I.top += -1 * (C[1] - F[1])
        }
        if (!this.options.fixed && this.options.viewport) {
            var J = this.getScrollOffsets();
            var G = this.viewportSize();
            var D = {
                left: "width",
                top: "height"
            };
            for (var H in D) {
                if ((I[H] + B[D[H]] - J[H]) > G[D[H]]) {
                    I[H] = I[H] - B[D[H]] - 2 * E[H]
                }
            }
        }
        this.wrapper.setStyle({
            left: I.left + "px",
            top: I.top + "px"
        });
        if (Prototype.Browser.IE) {
            this.underlay.setStyle({
                left: I.left + "px",
                top: I.top + "px"
            })
        }
    },
    viewportWidth: function() {
        if (Prototype.Browser.Opera) {
            return document.body.clientWidth
        }
        return document.documentElement.clientWidth
    },
    viewportHeight: function() {
        if (Prototype.Browser.Opera) {
            return document.body.clientHeight
        }
        if (Prototype.Browser.WebKit) {
            return this.innerHeight
        }
        return document.documentElement.clientHeight
    },
    viewportSize: function() {
        return {
            height: this.viewportHeight(),
            width: this.viewportWidth()
        }
    },
    getScrollLeft: function() {
        return this.pageXOffset || document.documentElement.scrollLeft
    },
    getScrollTop: function() {
        return this.pageYOffset || document.documentElement.scrollTop
    },
    getScrollOffsets: function() {
        return {
            left: this.getScrollLeft(),
            top: this.getScrollTop()
        }
    }
};
Function.prototype.safeBind = function() {
    var A = this,
        C = $A(arguments),
        B = C.shift();
    return function() {
        if (typeof $A == "function") {
            return A.apply(B, C.concat($A(arguments)))
        }
    }
};