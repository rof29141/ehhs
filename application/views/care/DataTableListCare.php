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
        <th style="width: 2%"></th>
        <th style="width: 2%"></th>
    </tr>
</thead>


<tbody>

<?php
if(isset($data['care']['data']))
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

        if($row->aproved=='1')$approve='<span class="fa fa-check"></span>';else $approve='<span class="fa fa-ban"></span>';
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
            <td class="text-center"><?php print $approve;?></td>
            <td class="text-center"><input name='cbx' type='checkbox' id="<?php print $row->id_care_schedule;?>" class="cbx_row"></td>
        </tr>

        <?php
        $x++;
    }
}
?>
</tbody>

<script>

    jQuery('#btn_insert').on('click', function (e)
    {
        var go_function='Client/GoUpdateClient';
        var go_view='general-Update';
        var go_back=jQuery('#view').val();

        UpdateContent(go_function, go_view, go_back);

    });

    jQuery('#btn_delete').on('click', function (e)
    {
        var id='';
        jQuery('.cbx_row:checked').each(
            function()
            {
                if(id=='')
                    id = jQuery(this).attr('id');
                else
                    id = id + '-' + jQuery(this).attr('id');
            }
        );

        if(id!='')
        {
            var go_function='Main/DeleteObject';
            var table='client';
            var field_id='id_client';

            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-success";
            alertify.defaults.theme.cancel = "btn btn-default";
            alertify.confirm("<h4>Do you confirm the action?</h4>", function (e)
            {
                DeleteContent(go_function, table, field_id, id);
            }
            ,function()
            {
                alertify.error('Declined.');
            });
        }
        else
            alertify.error('You have to select a row.');
    });
</script>