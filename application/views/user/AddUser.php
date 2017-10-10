<div class="container" >
    <div class="row" style="margin: 20px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <fieldset class="myfieldset">
                <legend class="mylegend">Add User</legend>



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

    $(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataUser();
        }

        function LoadDataUser()
        {
            var id_company='<?php echo $id_company;?>';
            var company_name='<?php echo $company_name;?>';
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dataAddUser',view_url:'user/InputsAddUser', id_company:id_company, company_name: company_name}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_User').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>