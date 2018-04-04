var Datepicker = function () {

    return {
        
        //Datepickers
        initDatepicker: function () {
	        // Regular datepicker
	        jQuery('#birthday').datepicker({
	            dateFormat: 'mm/dd/yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>'
	        });

            jQuery('#medical_data1').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });

            jQuery('#medical_data2').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });

            jQuery('#medical_data3').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });
	        
	        // Date range
	        jQuery('#start_date').datepicker({
	            dateFormat: 'mm/dd/yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>',
	            onSelect: function( selectedDate )
	            {
	                jQuery('#end_date').datepicker('option', 'minDate', selectedDate);
	            }
	        });
	        jQuery('#end_date').datepicker({
	            dateFormat: 'mm/dd/yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>',
	            onSelect: function( selectedDate )
	            {
	                jQuery('#start_date').datepicker('option', 'maxDate', selectedDate);
	            }
	        });

            jQuery('#date-of-birth').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });

            jQuery('#expiration').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });

            jQuery('#signature-date').datepicker({
                dateFormat: 'mm/dd/yy',
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });











	        
	        // Inline datepicker
	        jQuery('#inline').datepicker({
	            dateFormat: 'dd.mm.yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>'
	        });
	        
	        // Inline date range
	        jQuery('#inline-start').datepicker({
	            dateFormat: 'dd.mm.yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>',
	            onSelect: function( selectedDate )
	            {
	                jQuery('#inline-finish').datepicker('option', 'minDate', selectedDate);
	            }
	        });
	        jQuery('#inline-finish').datepicker({
	            dateFormat: 'dd.mm.yy',
	            prevText: '<i class="fa fa-angle-left"></i>',
	            nextText: '<i class="fa fa-angle-right"></i>',
	            onSelect: function( selectedDate )
	            {
	                jQuery('#inline-start').datepicker('option', 'maxDate', selectedDate);
	            }
	        });


        }

    };
}();