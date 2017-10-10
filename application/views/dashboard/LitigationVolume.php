<thead>
<tr style="line-height:15px;">
    <th class="hidden-xs hidden-sm">Description</th>
    <th class="hidden-xs hidden-sm">Unread</th>
    <th class="hidden-xs">Deadline</th>
    <th>Items</th>
</tr>
</thead>


<tbody>

<tr>

    <td>Service of Process</td>
    <td>0</td>
    <td>0 - 30 Days</td>
    <td>0</td>

</tr>

<tr>

    <td>Garnishments</td>
    <td>0</td>
    <td>0 - 30 Days</td>
    <td>0</td>

</tr>

<tr>

    <td>Furnitures</td>
    <td>0</td>
    <td>0 - 30 Days</td>
    <td>0</td>

</tr>
<?php //var_dump($table_1);//die();
if(isset($table_1))
{
    if ($table_1['error'] == '0')
    {
        foreach ($table_1['data'] as $record)
        { ?>
            <tr id="<?= "tr" . $record['id']; ?>">

                <td><?= $record['station_name']; ?></td>
                <td class="hidden-xs hidden-sm">
                    <?= (strlen($record['station_market']) > 10) ? substr($record['station_market'], 0, 10) . '...' : $record['station_market']; ?>
                </td>
                <td class="hidden-xs"><?= $record['product_id'] . ' - ' . $record['product_name']; ?></td>
                <td><?= $record['adcopy_name']; ?></td>

            </tr>
            <?php
        }
    }
}
?>
</tbody>