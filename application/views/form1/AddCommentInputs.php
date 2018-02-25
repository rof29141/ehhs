<form action="assets/php/demo-contacts-process.php" method="post" id="frm_comment" class="sky-form">
    <header>Leave a comment
        <button type="button" class="close" id="close_inputs_comment">
            &times;
        </button>
    </header>

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="label">Name</label>
                <label class="input">
                    <i class="icon-append fa fa-user"></i>
                    <input type="text" disabled name="name" id="name" value="<?php echo $session['bd_FirstName'].' '.$session['bd_LastName'];?>">
                    <input type="hidden" name="id" id="id" value="<?php if(isset($data['id'])) print $data['id'];?>">
                </label>
            </section>
            <section class="col col-6">
                <label class="label">E-mail</label>
                <label class="input">
                    <i class="icon-append fa fa-envelope-o"></i>
                    <input type="email" disabled name="email" id="email" value="<?php echo $session['email'];?>">
                </label>
            </section>
        </div>

        <section>
            <label class="label">Subject</label>
            <label class="input">
                <i class="icon-append fa fa-tag"></i>
                <input type="text" name="subject" id="subject">
            </label>
        </section>

        <section>
            <label class="label">Message</label>
            <label class="textarea">
                <i class="icon-append fa fa-comment"></i>
                <textarea rows="4" name="message" id="message" class="required"></textarea>
            </label>
        </section>

        <section>
            <div class="rating">
                <input type="radio" name="asterisks-rating" id="asterisks-rating-10" value="10">
                <label for="asterisks-rating-10"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-9" value="9">
                <label for="asterisks-rating-9"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-8" value="8">
                <label for="asterisks-rating-8"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-7" value="7">
                <label for="asterisks-rating-7"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-6" value="6">
                <label for="asterisks-rating-6"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-5" value="5">
                <label for="asterisks-rating-5"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-4" value="4">
                <label for="asterisks-rating-4"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-3" value="3">
                <label for="asterisks-rating-3"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-2" value="2">
                <label for="asterisks-rating-2"><i class="fa fa-asterisk"></i></label>
                <input type="radio" name="asterisks-rating" id="asterisks-rating-1" value="1">
                <label for="asterisks-rating-1"><i class="fa fa-asterisk"></i></label>
                How positive is your comment?
            </div>
        </section>

        <section>
            <label class="checkbox"><input type="checkbox" name="copy"><i></i>Send a copy to my e-mail address</label>
        </section>
    </fieldset>

    <footer>
        <button type="button" class="button" id="btn_save_comment" style="line-height: 32px !important;">Submit</button>
    </footer>

    <div class="message">
        <i class="rounded-x fa fa-check"></i>
        <p>Your message was successfully sent!</p>
    </div>
</form>

<script>

    jQuery(function ()
    {
        jQuery('#close_inputs_comment').on('click', function ()
        {
            jQuery('#frm_comment').hide('slow',function() {
                jQuery('#frm_comment').remove();
            });
        });

        jQuery('#btn_save_comment').on('click', function ()
        {
            ValidateFrm();
            if (jQuery("#frm_comment").valid())
            {

            }
        });

        function ValidateFrm()
        {
            jQuery.validator.setDefaults(
                {
                    //errorElement: "span",
                    //errorClass: "help-block",
                    //	validClass: 'stay',
                    highlight: function (element, errorClass, validClass) {//alert('high');
                        jQuery(element).addClass(errorClass); //.removeClass(errorClass);
                        jQuery(element).closest('label').addClass('state-error');

                    },
                    unhighlight: function (element, errorClass, validClass) {//alert('unhigh');


                        jQuery(element).removeClass(errorClass); //.addClass(validClass);
                        jQuery(element).closest('label').removeClass('state-error');
                    },
                    errorPlacement: function (error, element)
                    {
                        if(element.parent('.input-group').length)
                        {
                            error.insertAfter(element.parent());
                        }
                        else if(element.hasClass('my_select2'))
                        {
                            error.insertAfter(element.next('span'));
                        }

                        else if(element.hasClass('error_fieldset'))
                        {
                            error.insertAfter(element.closest('.myfieldset'));
                        }
                        else
                        {
                            error.insertAfter(element);
                        }
                    }
                });

            jQuery("#frm_comment").validate(
                {
                    ignore: [],
                    focusInvalid: false,
                    invalidHandler: function(form, validator) {

                        if (!validator.numberOfInvalids())
                            return;

                        jQuery('html, body').animate({
                            scrollTop: jQuery(validator.errorList[0].element).offset().top-300
                        }, 2000);
                    }
                });

            jQuery.validator.addMethod("select", function(value, element, arg)
            {
                return arg !== value;
            }, "This field is required. Please, select an option.");

            jQuery("#frm_comment").find('.required').each(function()
            {
                jQuery(this).rules( "add",{required: true});
            });

            jQuery("#frm_comment").find('.required_select').each(function()
            {
                jQuery(this).rules( "add",{select: "-1"});
            });
        }
    });
</script>