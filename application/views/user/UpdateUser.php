<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <fieldset class="myfieldset">
                <legend class="mylegend">Update User</legend>



                    <section class="col col-12" style="padding: 10px;">

                        <form class='fill-up validatable' role='form' name='frm' id='frm' action="">
                            <div id="data_User"></div>
                        </form>

                    </section>


            </fieldset>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataUser();
        }

        function LoadDataUser()
        {
            var id=<?php print $id;?>;
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dataUpdateUser',view_url:'user/InputsUpdateUser', id:id}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    jQuery('#data_User').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>