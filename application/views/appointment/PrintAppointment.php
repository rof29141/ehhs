<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$position='left';
require_once(APPPATH."views/includes/header.php");
ini_set('memory_limit', '2048M');
?>
<link href="<?php echo base_url('assets/css/application.css') ?>" rel="stylesheet">
<?php
if(isset($data['my_next_appointments']['data']))
{
for($i=0;$i<count($data['my_next_appointments']['data']);$i++)
{
    
?>
    <div class="row" style="margin-bottom: 10px;" id="<?php echo $i;?>">
        <article class="col-sm-12 col-md-6 col-lg-4">
            <div style="border:1px solid;display: table;width: 100%;height: 90px;">
                <div style="display: table-row;">

                    <div  style="display: table-cell;background-color: #ccc;position:relative;vertical-align:middle;text-align:center;width: 30%;padding: 10px;">
                        <?php
                            echo '<img class="doc_img" style="width: 80%;" src="'; if($data['my_next_appointments']['data'][$i]['Photo'])echo $data['my_next_appointments']['data'][$i]['Photo'];else echo base_url('assets/images/male.png');echo'"/><br><br>';
                            echo $data['my_next_appointments']['data'][$i]['FirstName'].' '.$data['my_next_appointments']['data'][$i]['LastName'];
                        ?>
                    </div>
                    <div class="" style="text-align:center; display: table-cell;background-color: #eee;color:#000;padding: 10px;width: 70%;">
                        <div class="" style="text-align:center;font-weight: bold; font-size: 11px;"><?php echo $data['my_next_appointments']['data'][$i]['APT_Title'];?></div>
                        <br>
                        <div class="" style="text-align:center;font-weight: bold; font-size: 12px;"><?php echo $data['my_next_appointments']['data'][$i]['Service'];?></div>
                        <br>
                        <div class="" style="text-align:center;font-weight: bold; font-size: 15px;"><?php echo $data['my_next_appointments']['data'][$i]['APT_Date'].' '.$data['my_next_appointments']['data'][$i]['APT_Time'];?></div>

                        <br>

                        <?php if($data['my_next_appointments']['data'][$i]['TokenConfirmApp']!=''){?>
                            <div class="text-warning" style="text-align:center;font-weight: bold; font-size: 15px;">Status: Not Confirmed <span class="brankic-warning"></span></div>
                        <?php }else {?>
                            <div class="text-success" style="text-align:center;font-weight: bold; font-size: 15px;">Status: Confirmed <span class="brankic-checkmark"></span></div>
                        <?php }?>

                        <hr style="border-top: 1px solid #8c8b8b;border-bottom: 1px solid #fff;margin-top: 7px; margin-bottom: 0px;">
                        <?php
                            $cancel_note='To Cancel or Reschedule less than 24 hours, <br>call the office 513-351-FACE(3223)';
                        ?>
                        <div style="text-align:center;">
                            <div style="text-align: center;padding-left:10px;padding-right:10px;top: 10px;position: relative;display: inline-block;"
                                 class="note"><?php echo $cancel_note; ?></div>
                        </div>

                    </div>
                </div1
            </div>
        </article>
    </div>

<?php }}else echo '<div class="text-center"><h3>You don\'t have any future appointments.</h3></div>' ;?>

<script type="text/javascript">
    $(document).ready(function()
    {
        window.print();
    });
</script>