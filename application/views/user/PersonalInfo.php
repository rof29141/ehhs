<div class="container" >
    <div class="row" style="margin: 10px;margin-top: 60px;">

        <div class="col-lg-6 col-lg-offset-3">
            <fieldset class="myfieldset">
                <legend class="mylegend">Personal Contact Information</legend>

                <div class="note text-mutted" align="justify">Thank you for completing this form honestly and accurately.  Completing this before your arrival will help save you time and allow us to spend more valuable time with you during your consultation.  We look forward to meeting you soon and are always available at info@351face.com or by phone at (513) 351.3223 (FACE).</div>

                <section class="col col-12" style="padding: 0px;">

                    <form name='frm' id='frm' action="">
                        <div id="data_personal_info"></div>
                    </form>

                </section>

            </fieldset>
        </div>

    </div>
</div>


<script type="text/javascript">

    $(document).ready(function()
    {
        Load();

        function Load()
        {
            LoadDataPersonalInfo();
        }

        function LoadDataPersonalInfo()
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Main/LlenarDataTable',
                type: 'POST',
                data: {data_type:'dataPersonalInfo',view_url:'user/InputsAddPersonalInfo'}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#data_personal_info').html(response);
                    spinner.stop();
                }
            });
        }
    });

</script>