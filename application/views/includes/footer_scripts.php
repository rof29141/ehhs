<script type="text/javascript">

    $(document).ready(function()
    {
        function ValidateFrm()
        {
            $.validator.setDefaults(
            {
                //errorElement: "span",
                //errorClass: "help-block",
                //	validClass: 'stay',
                highlight: function (element, errorClass, validClass) {//alert('high');
                    $(element).addClass(errorClass); //.removeClass(errorClass);
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function (element, errorClass, validClass) {//alert('unhigh');
                    $(element).removeClass(errorClass); //.addClass(validClass);
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                errorPlacement: function (error, element)
                {alert('ojn');
                    if(element.parent('.input-group').length)
                    {
                        error.insertAfter(element.parent());
                    }
                    else if(element.hasClass('my_select2'))
                    {
                        error.insertAfter(element.next('fieldset'));
                    }

                    else if(element.hasClass('error_fieldset'))
                    {
                        error.insertAfter(element.next('span'));
                    }
                    else
                    {
                        error.insertAfter(element);
                    }
                }
            });

            $("#frm").validate(
            {
                ignore: [],
                focusInvalid: false,
                invalidHandler: function(form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top-100
                    }, 2000);
                }
            });

            $.validator.addMethod("select", function(value, element, arg)
            {
                return arg !== value;
            }, "This field is required. Please, select an option.");

            $("#frm").find('.required').each(function()
            {
                $(this).rules( "add",{required: true});
            });

            $("#frm").find('.required_select').each(function()
            {
                $(this).rules( "add",{select: "-1"});
            });
        }

        /*$('body').on('change', '.my_select2', function () {
            ValidateFrm();
            $(this).valid();
        });*/

        var msg = $("#msg").val();
        if (msg != '' && msg != null) alertify.message(msg);

        var success = $("#success").val();
        if (success != '' && success != null) alertify.success(success);

        var warning = $("#warning").val();
        if (warning != '' && warning != null) alertify.warning(warning);

        var error = $("#error").val();
        if (error != '' && error != null) alertify.error(error);

        $('body').on('change', '#select_all', function ()
        {
            var status = this.checked; // "select all" checked status
            $('.cbx').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('body').on('change', '#select_all_sub', function ()
        {
            var status = this.checked; // "select all" checked status
            $('.cbx_sub').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('body').on('click', '#btn_insert', function (e)
        {
            var go_function='Main/GoObject';
            var go_view=$(this).attr("data-goto");
            var go_back=$('#view').val();

            UpdateContent(go_function, go_view, go_back);

        });

        $('body').on('click', '#btn_update', function (e)
        {
            var id='';
            $('.cbx:checked').each(
                function()
                {
                    if(id=='')
                    {id = $(this).val();}
                }
            );

            Update($(this).attr("data-goto"), id);
        });

        $('body').on('click', '#btn_update_sub', function (e)
        {
            var id='';
            $('.cbx_sub:checked').each(
                function()
                {
                    if(id=='')
                    {id = $(this).val();}
                }
            );

            Update($(this).attr("data-goto"), id);
        });

        $('body').on('click', '.row_upd', function (e)
        {
            var id='';
            var string=$(this).attr("data-goto");
            var result=string.split('-');

            Update(result[0],result[1]);
        });

        function Update(go_view, id)
        {
            if(id)
            {//alert(id);
                var go_function='Main/GoObject';
                var go_back=$('#view').val();

                UpdateContent(go_function, go_view, go_back, id);
            }
            else
                alertify.error('You have to select a row.');
        }

        $('body').on('click', '#btn_save', function ()
        {
            if ($("#frm").valid()) {
                var layout=$('#btn_save').attr('datafld');
                var type=$('#btn_save').attr('datatype');
                var array_inputs=$('#frm').find('input[datafld!=ignore], select[datafld!=ignore]').serialize();
                var url = 'Main/SaveObject';
                var data = array_inputs+'&layout='+layout+'&type='+type;

                SaveContent(url, data);
            }
        });

        $('body').on('click', '#btn_delete', function (e)
        {
            var id='';
            $('.cbx:checked').each(
                function()
                {
                    if(id=='')
                        id = $(this).val();
                    else
                        id = id + '-' + $(this).val();
                }
            );

            if(id!='')
            {
                var go_function='Main/DeleteObject';
                var go_layout=$(this).attr("datafld");

                alertify.confirm("Do you confirm the action?", function (e)
                {
                    DeleteContent(go_function, go_layout, id);
                }
                ,function()
                {
                    alertify.error('Declined.');
                });
            }
            else
                alertify.error('You have to select a row.');
        });

        $('body').on('click', '#btn_delete_sub', function (e)
        {
            var id='';
            $('.cbx_sub:checked').each(
                function()
                {
                    if(id=='')
                        id = $(this).val();
                    else
                        id = id + '-' + $(this).val();
                }
            );

            if(id!='')
            {
                var go_function='Main/DeleteObject';
                var go_layout=$(this).attr("datafld");

                alertify.confirm("Do you confirm the action?", function (e)
                {
                    DeleteContent(go_function, go_layout, id);
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