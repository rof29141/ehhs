<script type="text/javascript">
	function ValidateFrm(frm)
	{
		jQuery.validator.setDefaults(
		{
			//errorElement: "span",
			//errorClass: "help-block",
			//	validClass: 'stay',
			highlight: function (element, errorClass, validClass) {//alert(element.name);
				jQuery(element).addClass(errorClass); //.removeClass(errorClass);
				jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				
				jQuery(element).parent().parent().parent().last().removeClass('has-success').addClass('has-error');
				
			},
			unhighlight: function (element, errorClass, validClass) {///alert('unhigh');
				jQuery(element).removeClass(errorClass); //.addClass(validClass);
				jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			errorPlacement: function (error, element)
			{//alert('ojn');
				if(element.parent('.input-group').length)
				{
					error.insertAfter(element.parent());
				}
				else if(element.hasClass('my_select2'))
				{
					error.insertAfter(element.next('span'));
					//error.insertAfter(element.parent());
				}

				else if(element.hasClass('error_fieldset'))
				{
					error.insertAfter(element.next('span'));
				}
				else if(element.hasClass('required_file'))
				{//alert(element.name);
					//error.insertAfter(element.next('div'));
					error.insertAfter(element.parent().parent().parent());
				}
				else
				{
					error.insertAfter(element);
				}
			}
		});

		jQuery("#"+frm).validate(
		{
			ignore: [],
			focusInvalid: false,
			invalidHandler: function(form, validator) {

				if (!validator.numberOfInvalids())
					return;

				jQuery('html, body').animate({
					scrollTop: jQuery(validator.errorList[0].element).offset().top-100
				}, 2000);
			}
		});

		jQuery.validator.addMethod("select", function(value, element, arg)
		{
			return arg !== value;
		}, "This field is required. Please, select an option.");

		jQuery("#"+frm).find('.required').each(function()
		{
			jQuery(this).rules( "add",{required: true});
		});

		jQuery("#"+frm).find('.required_select').each(function()
		{
			jQuery(this).rules( "add",{select: "-1"});
		});
	}

    jQuery(document).ready(function()
    {
        
        /*jQuery('body').on('change', '.my_select2', function () {
            ValidateFrm();
            jQuery(this).valid();
        });*/

     

        jQuery('body').on('change', '#select_all', function ()
        {
            var status = this.checked; // "select all" checked status
            jQuery('.cbx').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        jQuery('body').on('change', '#select_all_sub', function ()
        {
            var status = this.checked; // "select all" checked status
            jQuery('.cbx_sub').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        jQuery('body').on('click', '#btn_insert1', function (e)
        {
            var go_function='Main/GoObject';
            var go_view=jQuery(this).attr("data-goto");
            var go_back=jQuery('#view').val();

            UpdateContent(go_function, go_view, go_back);

        });

        jQuery('body').on('click', '#btn_update1', function (e)
        {
            var id='';
            jQuery('.cbx:checked').each(
                function()
                {
                    if(id=='')
                    {id = jQuery(this).val();}
                }
            );

            Update(jQuery(this).attr("data-goto"), id);
        });

        jQuery('body').on('click', '#btn_update_sub', function (e)
        {
            var id='';
            jQuery('.cbx_sub:checked').each(
                function()
                {
                    if(id=='')
                    {id = jQuery(this).val();}
                }
            );

            Update(jQuery(this).attr("data-goto"), id);
        });

        jQuery('body').on('click', '.row_upd', function (e)
        {
            var id='';
            var string=jQuery(this).attr("data-goto");
            var result=string.split('-');

            Update(result[0],result[1]);
        });

        function Update(go_view, id)
        {
            if(id)
            {//alert(id);
                var go_function='Main/GoObject';
                var go_back=jQuery('#view').val();

                UpdateContent(go_function, go_view, go_back, id);
            }
            else
                alertify.error('You have to select a row.');
        }

        jQuery('body').on('click', '#btn_save', function ()
        {
            if (jQuery("#frm").valid()) {
                var table=jQuery('#btn_save').attr('datafld');
                var type=jQuery('#btn_save').attr('datatype');
                var array_inputs=jQuery('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                var url = 'Main/SaveObject';
                var data = array_inputs+'&table='+table+'&type='+type;

                SaveContent(url, data);
            }
        });

        jQuery('body').on('click', '#btn_delete1', function (e)
        {
            var id='';
            jQuery('.cbx:checked').each(
                function()
                {
                    if(id=='')
                        id = jQuery(this).val();
                    else
                        id = id + '-' + jQuery(this).val();
                }
            );

            if(id!='')
            {
                var go_function='Main/DeleteObject';
                var go_table=jQuery(this).attr("datafld");

                alertify.confirm("Do you confirm the action?", function (e)
                {
                    DeleteContent(go_function, go_table, id);
                }
                ,function()
                {
                    alertify.error('Declined.');
                });
            }
            else
                alertify.error('You have to select a row.');
        });

        jQuery('body').on('click', '#btn_delete_sub', function (e)
        {
            var id='';
            jQuery('.cbx_sub:checked').each(
                function()
                {
                    if(id=='')
                        id = jQuery(this).val();
                    else
                        id = id + '-' + jQuery(this).val();
                }
            );

            if(id!='')
            {
                var go_function='Main/DeleteObject';
                var go_table=jQuery(this).attr("datafld");

                alertify.confirm("Do you confirm the action?", function (e)
                {
                    DeleteContent(go_function, go_table, id);
                }
                ,function()
                {
                    alertify.error('Declined.');
                });
            }
            else
                alertify.error('You have to select a row.');
        });

        /*-------------------DO NOT CHANGE THE CODE-------------------*/
    });

    var opts = {
        lines: 10, // The number of lines to draw
        length: 20, // The length of each line
        width: 9, // The line thickness
        radius: 30, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#000', // #rgb or #rrggbb or array of colors
        speed: 1.1, // Rounds per second
        trail: 91, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: '50%', // Top position relative to parent
        left: '50%' // Left position relative to parent
    };

    function check(id)
    {
        if(document.getElementById(id).checked==1)
        {
            document.getElementById(id).checked=0;
        }
        else
        {
            document.getElementById(id).checked=1;
        }
    }

</script>
