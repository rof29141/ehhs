<thead>
    <tr>
        <th style="width: 1%" class="text-center">#</th>
        <th style="width: 3%" class="text-center">&nbsp;</th>
        <th style="width: 18%">Name</th>
        <th style="width: 15%">Last Name</th>
        <th style="width: 10%" class="hidden-xs hidden-sm">Birth</th>
        <th style="width: 8%" class="hidden-xs hidden-sm">Gender</th>
        <th style="width: 15%">Email</th>
        <th style="width: 10%">Phone</th>
        <th style="width: 8%">Rol</th>
        <th style="text-align: center;">Active</th>
        <th class="text-center" style="width: 2%"><input name='select_all' id='select_all' type='checkbox'></th>
    </tr>
</thead>


<tbody>

<?php
if(isset($data['client']['data']))
{
    $i=0;

    foreach ($data['client']['data'] as $row)
    {
        if($row->rol=='admin')$role='Administrator';
        if($row->rol=='asist')$role='Asistant';
        if($row->rol=='worker')$role='Caregiver';
        if($row->rol=='patient')$role='Patient';

        if($row->gender=='male')$gender='Male';
        if($row->gender=='female')$gender='Female';

        if($row->status=='1')$status='<span class="fa fa-check"></span>';else $status='<span class="brankic-cancel2"></span>';
        ?>


        <tr id="<?php print "tr" . $i;?>">

            <td class="row_update text-center" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $i+1;?></td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>">

                <?php if(isset($row->id_user)){?>
                    <img class="photo_person_row" src="<?php print base_url('/assets/upload/person_photo/photo_'.$row->id_person.'.jpg');?>" alt="<?php if(isset($row->first_name)) print $row->first_name;?>" />
                <?php }else{?>
                    <img class="photo_person_row" src="<?php print base_url('/assets/images/male.png');?>" alt="" />
                <?php }?>

            </td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $row->first_name.' '.$row->second_name;?></td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $row->last_name;?></td>
            <td class="row_update hidden-xs hidden-sm" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $row->birthday;?></td>
            <td class="row_update hidden-xs hidden-sm" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $gender;?></td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $row->email;?></td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $row->cel;?></td>
            <td class="row_update" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $role;?></td>
            <td class="row_update text-center" data-goto="client-UpdateClient&<?php print $row->id_user.'-'.$row->id_person;?>"><?php print $status;?></td>
            <td class="text-center"><input name='<?php print 'cbx_'.$row->id_user;?>' type='checkbox' value='<?php print $row->id_user;?>' class="cbx"></td>

        </tr>

        <?php

        $i++;
    }
}
?>
</tbody>

<script>
    jQuery('.row_update').on('click', function (e)
    {
        var id='';
        var string=jQuery(this).attr("data-goto");
        var result=string.split('&');

        Update(result[0],result[1]);
    });

    function Update(go_view, id)
    {
        if(id)
        {//alert(id);
            var go_function='Client/GoUpdateClient';
            var go_back=jQuery('#view').val();

            UpdateContent(go_function, go_view, go_back, id);
        }
        else
            alertify.error('You have to select a row.');
    }
</script>