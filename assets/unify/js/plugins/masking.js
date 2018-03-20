var Masking = function () {

    return {
        
        //Masking
        initMasking: function () {
	        jQuery("#date1").mask('99/99/9999', {placeholder:'X'});
	        jQuery("#cel").mask('999-999-9999', {placeholder:'X'});
	        jQuery("#ssn").mask('999-99-9999', {placeholder:'X'});
	        jQuery("#card").mask('9999-9999-9999-9999', {placeholder:'X'});
	        jQuery("#serial").mask('***-***-***-***-***-***', {placeholder:'_'});
	        jQuery("#tax").mask('99-9999999', {placeholder:'X'});
        }

    };
    
}();