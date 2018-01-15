<?php if(isset($data['doctor']['data'])){?>
<label>Provider</label>
<select class="my_select2_doc" id="sel_doctor" name="sel_doctor" <?php if(isset($data['id_doctor']) && $data['id_doctor']!=''){print 'disabled';}?>>
    <option value="-1"></option>
    <?php for ($i=0;$i<sizeof($data['doctor']['data']);$i++){?>
        <option <?php if(isset($data['id_doctor']) && $data['id_doctor']==$data['doctor']['data'][$i]['_kf_DoctorID']){print 'selected';}?> value="<?php print $data['doctor']['data'][$i]['_kf_DoctorID'];?>" title="<?php print $data['doctor']['data'][$i]['Photo'];?>">
            <?php print $data['doctor']['data'][$i]['FirstName'].' '.$data['doctor']['data'][$i]['LastName'];?>
        </option>
    <?php }?>
</select>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        function formatData (data)
        {
            if (data.id==0) { return data.text; }

            var $result= jQuery('<span><img class="doctor_img" src="'+data.title+'"/> ' + data.text + '</span>');
            return $result;
        };

        function formatData1 (data)
        {
            if (data.id==0) { return data.text; }

            var $result= jQuery(
                '<span>' + data.text + '</span>'
            );
            if(data.title)jQuery('#doc_photo').html('<img class="doc_img" src="'+data.title+'"/>');
            else jQuery('#doc_photo').html('<img class="doc_img" src="<?php print base_url('assets/images/male.png');?>"/>');
            return $result;
        };

        jQuery(".my_select2_doc").select2({
            placeholder: {
                id: '-1', // the value of the option
                text: 'Select a Provider'
            },
            templateResult: formatData,
            templateSelection: formatData1
        });

        jQuery('#sel_doctor').on('change', function ()
        {
            var id_service = jQuery('#sel_service').val();
            var id_doctor = jQuery(this).val();

            GetAppointments(id_service, id_doctor)
        });

        jQuery(function ()
        {
            var id_doctor = "<?php if(isset($data['id_doctor'])) print $data['id_doctor'];else print 'NO_DOC'?>";

            if (id_doctor != 'NO_DOC')
            {
                var id_service = jQuery('#sel_service').val();

                if (id_service != 'NO_SERV')
                {
                    GetAppointments(id_service, id_doctor)
                }
            }
        });

        function GetAppointments(id_service, id_doctor)
        {
            var target = document.getElementById('container');
            var spinner = new Spinner(opts).spin(target);

            jQuery.ajax({
                url: 'Dashboard/GetAppointments',
                type: 'POST',
                data: {id_service:id_service,id_doctor:id_doctor}
            }).done(function(response, textStatus, jqXHR)
            {
                //alert(response);
                if(response=='NOT_SETTINGS')
                {alertify.error('There is not availability for this Service and Provider (settings). Please, call the office at 513-351-FACE(3223).');}
                else if(response)
                {jQuery('#calendar_app').html(response);}
                spinner.stop();
            });
        }
    });
</script>

<?php }else print 'NOT_DOCTOR';?>