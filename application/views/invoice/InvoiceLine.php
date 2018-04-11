<div class="container" >
    <div class="row">
        <div class="col-lg-12">

            <section class="col col-12" style="padding: 0px;">

                <table class="table table-condensed table-responsive table-striped table-hover " style="margin-left: auto;margin-right: auto;" width="100%">

                    <thead>
                    <tr style="line-height:15px;">
                        <th class="">Category</th>
                        <th class="">Description</th>
                        <th class="">Code</th>
                        <th class="">Quantity</th>
                        <th class="">Rate</th>
                        <th class="">Extension</th>
                    </tr>
                    </thead>


                    <tbody>

                    <?php
                    if(isset($error))
                    {
                        if ($error == '0')
                        {
                            for($i=0;$i<sizeof($data);$i++)
                            {
                                $go_to="";
                                ?>

                                <tr id="<?php print "tr" . $i;?>">
                                    <td style="width: 25%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['MNI_Category'];?></td>
                                    <td style="width: 35%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['MNI_Name'];?></td>
                                    <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['CPT_Code'];?></td>
                                    <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['Qty'];?></td>
                                    <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['Rate'];?></td>
                                    <td style="width: 10%"data-goto="<?php print $go_to;?>"><?php print $data[$i]['BIL_Total'];?></td>
                                </tr>

                                <?php
                            }
                        }
                    }
                    ?>
                    </tbody>

                </table>

            </section>

        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {

    });

</script>