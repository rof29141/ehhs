<thead>
<tr style="line-height:15px;">
    <th class="text-center" >#</th>
    <th class="">Invoice #</th>
    <th class="">Client ID</th>
    <th class="hidden-xs">Chart</th>
    <th class="hidden-xs">% Discount</th>
    <th class="">Date</th>
    <th class="hidden-xs">Facility</th>
    <th class="hidden-xs">Subtotal</th>
    <th class="hidden-xs">Discount</th>
    <th class="hidden-xs">Tax</th>
    <th class="hidden-xs">Total</th>
    <th class="hidden-xs"></th>
</tr>
</thead>


<tbody>

<?php
if(isset($data))
{


    if ($data['my_invoices']['error'] == '0')
    {
        for($i=0;$i<sizeof($data['my_invoices']['data']);$i++)
        {
            $go_to="";
            ?>

            <tr id="<?php print "tr" . $i;?>">

                <td style="width: 2%"class="row_upd text-center" data-goto="<?php print $go_to;?>"><?php print $i+1;?></td>
                <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['BIL_ID_D'];?></td>
                <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['CLI_ID_L'];?></td>
                <td style="width: 15%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['CLI_ChartID_D_L'];?></td>
                <td style="width: 8%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Discount_Percent'];?></td>
                <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Date'];?></td>
                <td style="width: 15%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Facility'];?></td>
                <td style="width: 7%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Total_PreDiscount'];?></td>
                <td style="width: 7%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Discount'];?></td>
                <td style="width: 7%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Tax'];?></td>
                <td style="width: 7%"data-goto="<?php print $go_to;?>"><?php print $data['my_invoices']['data'][$i]['Total_PostTax'];?></td>

                <td class="text-center">
                    <?php if($data['my_invoices']['data'][$i]['HaveLines']){?>
                        <a class="detail-invoice" id="<?php print $data['my_invoices']['data'][$i]['__zkp_Billing_Rec'].'|'.$data['my_invoices']['data'][$i]['Anchor'].'|'.$data['my_invoices']['data'][$i]['MNI_Category_F'];?>" target="_blank"><i class="entypo-info2"></i>
                    <?php }?>
                </td>

            </tr>

            <?php
        }
    }
}
?>
</tbody>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        jQuery('.detail-invoice').on('click', function (e)
        {
            var id_invoice=jQuery(this).attr("id");
            FillModalApp(id_invoice);
        });


        function FillModalApp(id_invoice)
        {
            //alert(id_invoice);
            var res=id_invoice.split("|");

            jQuery.ajax({
                url: 'Invoice/GetInvoiceLine',
                type: 'POST',
                data: {id_invoice:res[0], anchor:res[1], cat:res[2]}
            }).done(function(response, textStatus, jqXHR)
            {
                if(response!='')
                {//alert(response);
                    jQuery('#modal').html(response);
                    jQuery('#remoteModal').modal('show');
                }
            });

        }
    });

</script>