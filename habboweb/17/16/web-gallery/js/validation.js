/*
 * Really easy field validation with Prototype
 * http://tetlaw.id.au/view/blog/really-easy-field-validation-with-prototype
 * Andrew Tetlaw
 * Version 1.3 (2006-05-15)
 * Thanks:
 *  Mike Rumble http://www.mikerumble.co.uk/ for onblur idea
 *  Analgesia for spotting a typo
 *  Paul Shannon http://www.paulshannon.com for the reset idea
 *  Ted Wise for the focus-on-first-error idea
 * 
 * 
 * http://creativecommons.org/licenses/by-sa/2.5/
 */
Validator = Class.create();

Validator.prototype = {
	initialize : function(className, error, test) {
		this.test = test || function(){ return true };
		this.error = error || 'Validation failed.';
		this.className = className;
	}
}

var Validation = Class.create();

Validation.prototype = {
	initialize : function(form, options){
		this.options = Object.extend({
			stopOnFirst : false,
			immediate : false,
			focusOnError : true,
			skipValidation : false,
			beforeSubmit : false,
			afterSuccesfulValidation : false
		}, options || {});
		this.form = $(form);
		
		Event.observe(this.form,'submit',this.onSubmit.bind(this),false);
		
		//Event.observe(this.form,'button',this.onSubmit.bind(this),false);
		if(this.options.immediate) {
			Form.getElements(this.form).each(function(input) { // Thanks Mike!
				Event.observe(input, 'blur', function(ev) { Validation.validate(Event.element(ev).id) });
			});
		}
	},
	onSubmit :  function(ev){
		if (this.options.skipValidation) {
			if (this.options.skipValidation()) {
				return;
			}
		}
		if (this.options.beforeSubmit) {
			this.options.beforeSubmit();
		}
		if(!this.validate()) {
            Event.stop(ev);
            if(this.options.onFailure){
                this.options.onFailure();
            }
            if(this.options.focusOnError) {
				stepError = 1;
				$$('.validation-failed').first().focus();
			}
		} else {
			stepError = 0;
			if (this.options.afterSuccesfulValidation) {
				stepError = 0;
				this.options.afterSuccesfulValidation();
			}
		}
	},
	validate : function() {
		if(this.options.stopOnFirst) {
			return Form.getElements(this.form).all(Validation.validate);
		} else {
			return Form.getElements(this.form).collect(Validation.validate).all();
		}
	},
	reset : function() {
		Form.getElements(this.form).each(Validation.reset);
	}
}

Object.extend(Validation, {
	validate : function(elm, index, options){ // index is here only because we use this function in Enumerations
		var options = Object.extend({}, options || {}); // options still under development and here as a placeholder only
		elm = $(elm);
		var cn = elm.classNames();
		return result = cn.all(Validation.test.bind(elm));
	},
	test : function(name) {
		var v = Validation.get(name);
		var id = 'advice-' + name + '-' + this.id;
		var prop = '__advice'+name;
		if(Validation.isVisible(this) && !v.test($F(this))) {
			Validation.addError(this, name, v.error);
			
			this[prop] = true;
			this.removeClassName('validation-passed');
			this.addClassName('validation-failed');
			return false;
		} else {
			try {
				$(id).remove();
			} catch(e) {}
			this[prop] = '';
			this.removeClassName('validation-failed');
			this.addClassName('validation-passed');
			return true;
		}
	},
	isVisible : function(elm) {
		while(elm.tagName != 'BODY') {
			if(!$(elm).visible()) return false;
			elm = elm.parentNode;
		}
		return true;
	},
	reset : function(elm) {
		var cn = elm.classNames();
		cn.each(function(value) {
			if(elm['__advice'+value] && $('advice-' + value + '-' + elm.id)) {
				$('advice-' + value + '-' + elm.id).remove();
				elm['__advice'+value] = '';
			}
			elm.removeClassName('validation-failed');
			elm.removeClassName('validation-passed');
		});
	},
	add : function(className, error, test, options) {
		var nv = {};
		nv[className] = new Validator(className, error, test, options);
		Object.extend(Validation.methods, nv);
	},
	addAllThese : function(validators) {
		var nv = {};
		$A(validators).each(function(value) {
				nv[value[0]] = new Validator(value[0], value[1], value[2], (value.length > 3 ? value[3] : {}));
			});
		Object.extend(Validation.methods, nv);
	},
	get : function(name) {
		return  Validation.methods[name] ? Validation.methods[name] : new Validator();
	},
	addError : function(element, name, message) {
		var id = 'advice-' + name + '-' + element.id;
		var prop = '__advice'+name;
		if(!element[prop]) {
			var advice = document.createElement('div');
			advice.appendChild(document.createTextNode(message));
			advice.className = 'validation-advice';
			advice.id = id;
			advice.style.display = 'none';
			element.parentNode.insertBefore(advice, element.nextSibling);
			if(typeof Effect == 'undefined') {
				advice.style.display = 'block';
			} else {
				new Effect.Appear(advice.id, {duration : 1 });
			}
		}
	},
	methods : {}
});

//var $V = Validation.validate;
//var $VG = Validation.get;
//var $VA = Validation.add;

Validation.add('IsEmpty', '', function(v) {
				return  ((v == null) || (v.length == 0) || /^\s+$/.test(v));
			});

Validation.add('indexSelected', '', function(v) {
	if(v.selectedIndex > 0){
		return true;
	}else{
		return false;
	}
});

Validation.addAllThese([
	['required', 'This is a required field.', function(v) {
				return !Validation.get('IsEmpty').test(v);
			}],
	['validate-number', 'Please use numbers only in this field.', function(v) {
				return Validation.get('IsEmpty').test(v) || !isNaN(v);
			}],
	['validate-digits', 'Please use numbers only in this field.', function(v) {
				return Validation.get('IsEmpty').test(v) ||  !/[^\d]/.test(v);
			}],
	['validate-alpha', 'Please use letters only (a-z) in this field.', function (v) {
				return Validation.get('IsEmpty').test(v) ||  /^[a-zA-Z]+$/.test(v)
			}],
	['validate-alphanum', 'Please use only letters (a-z) or numbers (0-9) only in this field. No spaces or other characters are allowed.', function(v) {
				return Validation.get('IsEmpty').test(v) ||  !/\W/.test(v)
			}],
	['validate-date', 'Please enter a valid date.', function(v) {
				var test = new Date(v);
				return Validation.get('IsEmpty').test(v) || !isNaN(test);
			}],
	['validate-email', 'Please enter a valid email address. For example fred@domain.com .', function (v) {
				return Validation.get('IsEmpty').test(v) || /^[\w\-.%]{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(v)
			}],
	['validate-date-au', 'Please use this date format: dd/mm/yyyy. For example 17/03/2006 for the 17th of March, 2006.', function(v) {
				if(!Validation.get('IsEmpty').test(v)) {
					var upper = 31;
					if(/^(\d{2})\/(\d{2})\/(\d{4})$/.test(v)) { // dd/mm/yyyy
						if(RegExp.$2 == '02') upper = 29;
						if((RegExp.$1 <= upper) && (RegExp.$2 <= 12)) {
							return true;
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					return true;
				}
			}],
	['validate-currency-dollar', 'Please enter a valid $ amount. For example $100.00 .', function(v) {
				// [$]1[##][,###]+[.##]
				// [$]1###+[.##]
				// [$]0.##
				// [$].##
				return Validation.get('IsEmpty').test(v) ||  /^\$?\-?([1-9]{1}[0-9]{0,2}(\,[0-9]{3})*(\.[0-9]{0,2})?|[1-9]{1}\d*(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|(\.[0-9]{1,2})?)$/.test(v)
			}]
]);
