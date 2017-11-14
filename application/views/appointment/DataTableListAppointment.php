<thead>
<tr style="line-height:15px;">
    <th class="hidden-xs hidden-sm text-center" style="width: 1%">#</th>
    <th class="hidden-xs hidden-sm" style="width: 20%">Title</th>
    <th class="hidden-xs hidden-sm" style="width: 10%">Date</th>
    <th class="hidden-xs hidden-sm" style="width: 10%">Start</th>
    <th class="hidden-xs hidden-sm" style="width: 10%">End</th>
    <th class="hidden-xs hidden-sm" style="width: 20%">Service</th>
    <th class="hidden-xs hidden-sm">Doctor</th>
    <th class="hidden-xs hidden-sm text-center" style="width: 2%"><input name='select_all' id='select_all' type='checkbox'></th>
</tr>
</thead>


<tbody>

<?php
if(isset($data))
{


    if ($data['my_appointments']['error'] == '0')
    {
        for($i=0;$i<count($data['my_appointments']['data']);$i++)
        {
            $go_to="";
            ?>

            <tr id="<?php echo "tr" . $i;?>">

                <td class="row_upd text-center" data-goto="<?php echo $go_to;?>"><?php echo $i+1;?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo $data['my_appointments']['data'][$i]['APT_Title'];?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo $data['my_appointments']['data'][$i]['APT_Date'];?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo $data['my_appointments']['data'][$i]['APT_Time'];?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo $data['my_appointments']['data'][$i]['APT_TimeEnd'];?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo $data['my_appointments']['data'][$i]['Service'];?></td>
                <td data-goto="<?php echo $go_to;?>"><?php echo '<img class="doc_img" style="width: 20px;" src="'.$data['my_appointments']['data'][$i]['Photo'].'"/>'.'&nbsp;&nbsp;&nbsp;'.$data['my_appointments']['data'][$i]['FirstName'].' '.$data['my_appointments']['data'][$i]['LastName'];?></td>
                <td class="text-center">
                    <input name='<?php echo 'cbx_'.$data['my_appointments']['data'][$i]['_RecordID'];?>' type='checkbox' value='<?php echo $data['my_appointments']['data'][$i]['_RecordID'];?>' class="cbx">
                </td>

            </tr>

            <?php
        }
    }
}
?>
</tbody>