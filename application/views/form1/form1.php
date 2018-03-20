<div class="container content">
    <div class="row">
        <div class="col-md-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
            <!-- General Unify Forms -->
            <form action="" class="sky-form">
                <header>General Unify Forms</header>

                <fieldset>
                    <section>
                        <label class="label">Text input</label>
                        <label class="input">
                            <input type="text">
                        </label>
                    </section>

                    <section>
                        <label class="label">Muliple File Upload</label>
                        <label for="file" class="input input-file">
                            <span class="btn button" style="line-height: 32px !important;">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Add files</span>
                                <input data-url="Form1/UploadFile" id="multiple_fileupload" type="file" name="multiple_fileupload" multiple>
                            </span>
                        </label>
                        <div id="files" class="files" style="line-height: 32px;border: 1px solid #999;padding-left: 5px;padding-right: 90px;">Allowed extensions: gif | jpg | png | doc | txt | pdf | zip| docx | pages<br></div>
                    </section>

                    <section>
                        <label class="label">Input with autocomlete</label>
                        <label class="toggle"><input type="checkbox" name="checkbox-toggle-1" checked><i></i>Canada</label>
                        <label class="toggle"><input type="checkbox" name="checkbox-toggle-2" checked><i></i>Canada1</label>
                        <label class="toggle"><input type="checkbox" name="checkbox-toggle-3" checked><i></i>Canada2</label>
                    </section>

                    <section>

                        <div class="row margin-bottom-40">
                            <div class="col-md-12">
                                <div id="testimonials-9" class="testimonials testimonials-v1 testimonials-bg-default">

                                    <div class="item active">
                                        <p class="rounded-4x">
                                            <span style="padding-right: 50px;text-align: justify;">Dignissimos similique sunt in ducimus qui blanditiis praesentium voui blanditiis praesentium voluptatum delvoe molestias..</span>
                                            <span class="text-right" style="position: absolute;top: 10px;right: 15px;font-style: normal;"><a class="reply" id="222">Reply</a></span>
                                        </p>
                                        <div class="testimonial-info">
                                            <span class="testimonial-author">
                                                Raydel Ojeda
                                                <em>Web Developer, Mactutor Inc.</em>
                                            </span>
                                        </div>

                                        <br>

                                        <div id="comment_222"></div>
                                    </div>

                                    <br>

                                    <div class="item active col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">

                                        <p class="rounded-4x">
                                            <span style="padding-right: 50px;text-align: justify;">
                                                <span style="font-style: normal;font-weight: bold;">This is my subject from a last comment</span>
                                                <br>
                                                Dignissimos similique sunt in ducimus qui blanditiis praesentium voluptatumsimilique sunt in ducimus qui blanditiis praesentium voluptatumsimilique sunt in ducimus qui blanditiis praesentium voluptatumsimilique sunt in ducimus qui blanditiis praesentium voluptatumsimilique sunt in ducimus qui blanditiis praesentium voluptatum delvoe molestias..</span>
                                            <span class="text-right" style="position: absolute;top: 10px;right: 15px;font-style: normal;"><a class="reply" id="111">Reply</a></span>
                                        </p>
                                        <div class="testimonial-info">
                                            <span class="testimonial-author">
                                                Raydel Ojeda
                                                <em>Web Developer, Mactutor Inc.</em>
                                            </span>
                                        </div>

                                        <br>

                                        <div id="comment_111"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <a class="add_comment" id=""><button type="button" class="btn-u"><i class="glyphicon glyphicon-plus"></i> Add comment</button></a>

                        <div style="margin-top: 10px;" id="comment_"></div>
                    </section>

                    <section>
                        <audio controls>
                            <source src="https://mtdev.mactutor.net/Streaming_SSL/MainDB/DA3C7E1FDCC555C98331E0A08DADB030ADA958E7E445CCD5E5518B40394A2037.mp3?RCType=EmbeddedRCFileProcessor" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <iframe width="100%" height="305" scrolling="no" frameborder="no" src=""></iframe>
                    </section>

                    <section>
                        <audio width="100%" controls>
                            <source src="https://mtdev.mactutor.net/Streaming_SSL/MainDB/DA3C7E1FDCC555C98331E0A08DADB030ADA958E7E445CCD5E5518B40394A2037.mp3?RCType=EmbeddedRCFileProcessor" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <iframe width="100%" height="305" scrolling="no" frameborder="no" src=""></iframe>
                    </section>

                </fieldset>


                <footer>
                    <button type="submit" class="btn-u">Submit</button>
                    <button type="button" class="btn-u btn-u-default" onclick="window.history.back();">Back</button>
                </footer>
            </form>
            <!-- General Unify Forms -->

        </div>
    </div>
</div>

<script>

    function DeleteFile(id, folder, name)
    {
        var target = document.getElementById('main-view');
        var spinner = new Spinner(opts).spin(target);

        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: 'Form1/DeleteFile',
            data:{folder:folder, name:name}
        }).done(function(response, textStatus, jqXHR)
        {//alert(response);
            if(response=='DELETED')
            {
                jQuery('#'+id).hide('slow',function() {
                    jQuery('#'+id).remove();
                });

            }
            spinner.stop();
        }).fail(function(jqHTR, textStatus, thrown)
        {
            alertify.error('Something is wrong with AJAX:' + textStatus);
            spinner.stop();
        });
    }

    jQuery(function ()
    {
        var random=Math.floor((Math.random() * 900000000000) + 1);

        jQuery('#multiple_fileupload').fileupload(
        {
            dataType: 'json',
            formData: {random:random},
            done: function (e, data)
            {
                var files=jQuery("#files").html();

                //alert(files);
                //alert(files.indexOf(data.result.file_name));

                if(files.indexOf(data.result.file_name) == -1)
                {
                    var id_random=Math.floor((Math.random() * 900000000000) + 1);

                    if (data.result.status == 'error')
                    {
                        alertify.error(data.result.msg);
                        jQuery('<span class="badge badge-red rounded" style="padding:5px; margin:5px;line-height: 32px;">' +
                            data.result.file_name + ' ('+data.result.file_size+' kb)'+
                            '</span>').appendTo('#files');
                    }
                    else
                    {
                        jQuery('<span id="'+ id_random +'" class="badge rounded" style="padding:5px; margin:5px;line-height: 32px;">' +
                            data.result.file_name + ' ('+data.result.file_size+' kb)'+
                            '<a onclick="DeleteFile(\''+ id_random +'\',\''+ random+'\',\''+data.result.file_name +'\')"><i class="fa fa-trash-o" style="font-size:15px;color:red; margin-left:5px;cursor: pointer;"></i></a></span>').appendTo('#files');
                    }
                }
            }
        }).prop('disabled', !jQuery.support.fileInput).parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');

        jQuery('.reply, .add_comment').on('click', function ()
        {
            var id=jQuery(this).attr('id');
            //alert(id);
            LoadCommentInputs(id);
        });

        function LoadCommentInputs(id)
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'AddCommentInputs',view_url:'form1/AddCommentInputs',id:id}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {

                    jQuery('#frm_comment').remove();
                    jQuery('#comment_'+id).hide();
                    jQuery('#comment_'+id).html(response);
                    jQuery('#comment_'+id).show('slow');
                    goToByScroll('comment_'+id);
                }
                spinner.stop();
            });
        }

        function goToByScroll(div)
        {//alert(div);
            jQuery('html, body').animate({scrollTop: jQuery("#"+div).offset().top-100},'slow');
        }
    });
</script>