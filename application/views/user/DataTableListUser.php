<thead>
<tr style="line-height:15px;">
    <th class="hidden-xs hidden-sm text-center" style="width: 1%"><a style="font-size: 20px;" class="entypo-arrow-right4"></a></th>
    <th class="hidden-xs hidden-sm text-center" style="width: 1%">#</th>
    <th class="hidden-xs hidden-sm" style="width: 20%">Full name</th>
    <th class="hidden-xs hidden-sm" style="width: 20%">Title</th>
    <th class="hidden-xs hidden-sm" style="width: 20%">Email</th>
    <th class="hidden-xs hidden-sm" style="width: 10%">User ID</th>
    <th class="hidden-xs hidden-sm" style="width: 12%">Account Type</th>
    <th class="hidden-xs hidden-sm">Permissions</th>
    <th class="hidden-xs hidden-sm text-center" style="width: 2%"><input name='select_all' id='select_all' type='checkbox'></th>
</tr>
</thead>


<tbody>

<?php
if(isset($data))
{
    if ($data['user']['error'] == '0')
    {
        for($i=0;$i<count($data['user']['data']);$i++)
        {
            $exist_detail=1;
            ?>

            <tr id="<?php echo "tr" . $i;?>">

                <td <?php if($exist_detail==1){?>data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>" id="<?php echo $data['user']['data'][$i]['id'];?>" class="detail text-center"<?php }?>>
                    <?php if($exist_detail==1){?><a style="font-size: 20px;" class="entypo-arrow-right4"></a><?php }?>
                </td>
                <td class="row_upd text-center" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $i+1;?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $data['user']['data'][$i]['PT_FullName'];?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $data['user']['data'][$i]['PT_Title'];?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $data['user']['data'][$i]['UserEmail'];?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $data['user']['data'][$i]['UserName'];?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"><?php echo $data['user']['data'][$i]['PrivilegeName'];?></td>
                <td class="row_upd" data-goto="user/UpdateUser-<?php echo $data['user']['data'][$i]['id'];?>"></td>
                <td class="text-center"><input name='<?php echo 'cbx_'.$data['user']['data'][$i]['id'];?>' type='checkbox' value='<?php echo $data['user']['data'][$i]['id'];?>' class="cbx"></td>

            </tr>

            <?php
        }
    }
}
?>
</tbody>