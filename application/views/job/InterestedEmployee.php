<?php
if(isset($data['interested_employee']['data']) && $data['interested_employee']['error_code']=='0')
{
    foreach ($data['interested_employee']['data'] as $row)
    {
        print $row->first_name.' '.$row->second_name.'<br>';
    }
}
?>