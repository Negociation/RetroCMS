/*
  Class, version 2.2
  Copyright (c) 2006, Alex Arnell <alex@twologic.com>
  Licensed under the new BSD License. See end of file for full license terms.
*/

var Class = {
  extend: function(parent, def) {
    if (arguments.length == 1) def = parent, parent = null;
    var func = function() {
      if (!Class.extending) this.initialize.apply(this, arguments);
    };
    if (typeof(parent) == 'function') {
      Class.extending = true;
      func.prototype = new parent();
      delete Class.extending;
    }
    var mixins = [];
    if (def && def.include) {
      if (def.include.reverse) {
        // methods defined in later mixins should override prior
        mixins = mixins.concat(def.include.reverse());
      } else {
        mixins.push(def.include);
      }
      delete def.include; // clean syntax sugar
    }
    if (def) Class.inherit(func.prototype, def);
    for (var i = 0; (mixin = mixins[i]); i++) {
      Class.mixin(func.prototype, mixin);
    }
    return func;
  },
  mixin: function (dest) {
    for (var i = 1; (src = arguments[i]); i++) {
      if (typeof(src) != 'undefined' && src !== null) {
        for (var prop in src) {
          if (!dest[prop] && typeof(src[prop]) == 'function') {
            // only mixin functions, if they don't previously exist
            dest[prop] = src[prop];
          }
        }
      }
    }
    return dest;
  },
  inherit: function(dest, src, fname) {
    if (arguments.length == 3) {
      var ancestor = dest[fname], descendent = src[fname], method = descendent;
      descendent = function() {
        var ref = this.parent; this.parent = ancestor;
        var result = method.apply(this, arguments);
        ref ? this.parent = ref : delete this.parent;
        return result;
      };
      // mask the underlying method
      descendent.valueOf = function() { return method; };
      descendent.toString = function() { return method.toString(); };
      dest[fname] = descendent;
    } else {
      for (var prop in src) {
        if (dest[prop] && typeof(src[prop]) == 'function') {
          Class.inherit(dest, src, prop);
        } else {
          dest[prop] = src[prop];
        }
      }
    }
    return dest;
  }
};

// finally remap Class.create for backward compatability with prototype
Class.create = function() {
  return Class.extend.apply(this, arguments);
}
