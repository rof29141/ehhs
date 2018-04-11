<thead>
    <tr>
        <?php if(isset($data['show_client']) && $data['show_client']!=''){?>

            <th style="width: 1%">#</th>
            <th style="width: 3%"></th>
            <th style="width: 15%">Client</th>

        <?php }?>
        <th style="width: 11%">Start Time</th>
        <th style="width: 11%">End Time</th>
        <th style="width: 11%">Start Date</th>
        <th style="width: 11%">End Date</th>
        <th style="">Days</th>
        <th style="width: 8%">N Week</th>

        <?php if($session['rol']=='asist'){?>
            <th style="width: 3%"></th>
        <?php }?>

        <th style="width: 2%"></th>
    </tr>
</thead>


<tbody>

<?php
if(isset($data['care']['data']) && $data['care']['error_code']=='0')
{
    $x=0;

    foreach ($data['care']['data'] as $row)
    {
        $var = explode(",", $row->week_days);

        if(sizeof($var) != 0)
        {
            $cant = sizeof($var);
            $week_days='';

            for ($i = 0; $i < $cant; next($var), $i++)
            {
                if($i==0 && current($var)=='1')$week_days = 'Sun';
                if($i==1 && current($var)=='1')$week_days.= ' Mon';
                if($i==2 && current($var)=='1')$week_days.= ' Tue';
                if($i==3 && current($var)=='1')$week_days.= ' Wen';
                if($i==4 && current($var)=='1')$week_days.= ' Thu';
                if($i==5 && current($var)=='1')$week_days.= ' Fri';
                if($i==6 && current($var)=='1')$week_days.= ' Sat';
            }
        }

        ?>


        <tr id="<?php print "tr" . $x;?>">
            <?php if(isset($data['show_client']) && $data['show_client']!=''){?>

                <td><?php print $x+1;?></td>
                <td>
                    <?php if(isset($row->id_user)){?>
                    <img class="photo_person_row" src="<?php print base_url('/assets/upload/person_photo/photo_'.$row->id_person.'.jpg');?>" alt="<?php if(isset($row->first_name)) print $row->first_name;?>" />
                        <script>ShowPhoto(<?php print $row->id_person;?>);</script>
                    <?php }else{?>
                    <img class="photo_person_row" src="<?php print base_url('/assets/images/male.png');?>" alt="" />
                    <?php }?>
                </td>
                <td><?php print $row->first_name.' '.$row->second_name;?></td>

            <?php }?>
            <td><?php print $row->start_time;?></td>
            <td><?php print $row->end_time;?></td>
            <td><?php print $row->start_date;?></td>
            <td><?php print $row->end_date;;?></td>
            <td><?php print $week_days;?></td>
            <td class="text-center"><?php print $row->repeat_every_week;?></td>

            <?php if($session['rol']=='asist'){?>
                <td class="text-center">
                    <div class="mytooltip"><i id="tooltip_<?php print $row->id_care_schedule;?>" class="icon-users"></i>
                        <span class="mytooltiptext mytooltip-left" style="text-align: left;width: 220px;padding-left: 5px;" id="tooltiptext_<?php print $row->id_care_schedule;?>"></span>
                    </div>
                </td>

            <?php }?>
            <td class="text-center"><input name='cbx' type='checkbox' id="<?php print $row->id_care_schedule;?>" class="cbx_row_care"></td>
        </tr>

        <?php
        $x++;
    }
}
?>
</tbody>

<script>

    jQuery('.icon-users').on('mouseover', function (e)
    {
        var id = jQuery(this).attr('id');
        var id_care_schedule=id.substr(8);

        jQuery.ajax({
            url: 'Main/LlenarDataTable',
            type: 'POST',
            data: {data_type:'data_list_interested_employee',view_url:'job/InterestedEmployee', id_care_schedule:id_care_schedule}
        }).done(function(response, textStatus, jqXHR)
        {
            if(response)
            {
                jQuery('#tooltiptext_'+id_care_schedule).html(response)
            }
            else
                jQuery('#tooltiptext_'+id_care_schedule).html('Nobody is interested.')
        });
    });

    jQuery('#btn_interested').on('click', function (e)
    {
        SaveInterestedOrNotJob(1);
    });

    jQuery('#btn_not_interested').on('click', function (e)
    {
        SaveInterestedOrNotJob(0);
    });

    function SaveInterestedOrNotJob(interest)
    {
        var id_employee='<?php if(isset($data['id_employee']))print $data['id_employee'];?>';

        var id='';
        jQuery('.cbx_row_care:checked').each(
            function()
            {
                if(id=='')
                    id = jQuery(this).attr('id');
                else
                    id = id + '-' + jQuery(this).attr('id');
            }
        );

        if(id!='' && id_employee!='' && id_employee!='-1')
        {
            var table='employee_interested';

            if(interest=='1')
            {

                var date_interested='<?php print date("m/d/Y");?>';

                var url = 'Job/SaveInterestedOrNotJob';
                var data = 'date_interested='+date_interested +'&id='+id+'&id_employee='+id_employee+'&table='+table+'&type=INSERT';

                var target = document.getElementById('container');
                var spinner = new Spinner(opts).spin(target);

                jQuery.ajax({
                    type: "POST",
                    dataType: "html",
                    url: url,
                    data:data
                }).done(function(response, textStatus, jqXHR)
                {
                    if(jQuery.isNumeric(response))
                    {
                        alertify.success('Data Saved.');
                        LoadContent('Main/GoView/job-ListJob');
                    }
                    else{alertify.error('Error: The element could not be Saved. '+ response);}
                    spinner.stop();

                }).fail(function(jqHTR, textStatus, thrown)
                {
                    alertify.error('Something is wrong with AJAX:' + textStatus);
                });
            }
            else if(interest=='0')
            {
                var url='Job/DeleteInterestedJob';
                var data='id_employee='+id_employee +'&id='+id;

                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-success";
                alertify.defaults.theme.cancel = "btn btn-default";
                alertify.confirm("<h4>Do you confirm the action?</h4>", function (e)
                {
                    var target = document.getElementById('container');
                    var spinner = new Spinner(opts).spin(target);

                    jQuery.ajax({
                        type: "POST",
                        dataType: "html",
                        url: url,
                        data:data
                    }).done(function(response, textStatus, jqXHR)
                    {
                        if(jQuery.isNumeric(response))
                        {
                            alertify.success('Data Saved.');
                            LoadContent('Main/GoView/job-ListJob');
                        }
                        else{alertify.error('Error: The element could not be Saved. '+ response);}
                        spinner.stop();

                    }).fail(function(jqHTR, textStatus, thrown)
                    {
                        alertify.error('Something is wrong with AJAX:' + textStatus);
                    });
                }
                ,function()
                {
                    alertify.error('Declined.');
                });
            }
        }
        else
            alertify.error('You have to select a row.');
    }

</script>