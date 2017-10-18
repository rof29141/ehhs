<?php if(isset($data['doctor']['data'])){?>
<label>Provider</label>
<select class="my_select2_doc" id="sel_doctor" name="sel_doctor">
    <option value="-1"></option>
    <?php for ($i=0;$i<count($data['doctor']['data']);$i++){?>
        <option value="<?php echo $data['doctor']['data'][$i]['_kf_DoctorID'];?>" title="<?php echo $data['doctor']['data'][$i]['Photo'];?>">
            <?php echo $data['doctor']['data'][$i]['FirstName'].' '.$data['doctor']['data'][$i]['LastName'];?>
        </option>
    <?php }?>
</select>

<script type="text/javascript">

    $(document).ready(function()
    {
        function formatData (data)
        {
            if (data.id==0) { return data.text; }

            var $result= $('<span><img class="doctor_img" src="'+data.title+'"/> ' + data.text + '</span>');
            return $result;
        };

        function formatData1 (data)
        {
            if (data.id==0) { return data.text; }

            var $result= $(
                '<span>' + data.text + '</span>'
            );
            if(data.title)$('#doc_photo').html('<img class="doc_img" src="'+data.title+'"/>');
            return $result;
        };

        $(".my_select2_doc").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select a Provider'
            },
            templateResult: formatData,
            templateSelection: formatData1
        });

        $('#sel_doctor').on('change', function ()
        {
            var id_service = $('#sel_service').val();
            var id_doctor = $(this).val();
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            $.ajax({
                url: 'Dashboard/GetAppointments',
                type: 'POST',
                data: {id_service:id_service,id_doctor:id_doctor}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response)
                {
                    $('#calendar_app').html(response);
                    spinner.stop();
                }
            });
        });
    });
</script>

<?php }else echo 'NOT_DOCTOR';?>