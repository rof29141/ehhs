<thead>
    <tr>
        <?php if(isset($data['show_employee']) && $data['show_employee']!=''){?>

            <th style="width: 1%">#</th>
            <th style="width: 3%"></th>
            <th style="width: 15%">Client</th>

        <?php }?>

        <th style="width: 3%"></th>
        <th style="width: 15%">Client</th>
        <th style="width: 11%">Start Time</th>
        <th style="width: 11%">End Time</th>
        <th style="width: 11%">Start Date</th>
        <th style="width: 11%">End Date</th>
        <th style="">Days</th>
        <th style="width: 8%">N Week</th>
        <th style="width: 2%"></th>
    </tr>
</thead>

<tbody>

<?php
if(isset($data['job']['error_code']) && $data['job']['error_code']=='0')
{
    $x=0;var_dump($data['job']);

    foreach ($data['job']['data'] as $row)
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

        if($row->HAVE_ASIST_CARE=='0')$can_del='<a id="'.$row->id_employee_care.'" class="btn_del_employee_care"><span class="glyphicon glyphicon-trash"></span></a>';else $can_del='';
        ?>


        <tr id="<?php print "tr" . $x;?>">
            <?php if(isset($data['show_employee']) && $data['show_employee']!=''){?>

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

            <td>
                <?php if(isset($row->id_user)){?>
                <img class="photo_person_row" src="<?php print base_url('/assets/upload/person_photo/photo_'.$row->id_person.'.jpg');?>" alt="<?php if(isset($row->first_name)) print $row->first_name;?>" />
                    <script>ShowPhoto(<?php print $row->id_person;?>);</script>
                <?php }else{?>
                <img class="photo_person_row" src="<?php print base_url('/assets/images/male.png');?>" alt="" />
                <?php }?>
            </td>
            <td><?php print $row->first_name.' '.$row->second_name;?></td>
            <td><?php print $row->start_time;?></td>
            <td><?php print $row->end_time;?></td>
            <td><?php print $row->start_date;?></td>
            <td><?php print $row->end_date;?></td>
            <td><?php print $week_days;?></td>
            <td class="text-center"><?php print $row->repeat_every_week;?></td>
            <td class="text-center"><?php print $can_del;?></td>
        </tr>

        <?php
        $x++;
    }
}
?>
</tbody>

<script>



</script>