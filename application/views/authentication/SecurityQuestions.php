<?php 
$Sec1=$data->sec1;
$Sec2=$data->sec2;
$Sec3=$data->sec3;
?>

<div class="col-md-12 input-group margin-bottom-5">
	<strong>
		<?php
		if($Sec1==1)print 'What is the first name of the person you first kissed?';
		if($Sec1==2)print 'What time of the day were you born?';
		if($Sec1==3)print 'In what city or town does your nearest sibling live?';
		if($Sec1==4)print 'What is the last name of the teacher who gave you your first failing grade?';
		if($Sec1==5)print 'What was your childhood nickname?';
		if($Sec1==6)print 'What is the name of your favorite childhood friend?';
		if($Sec1==7)print 'In what city or town did your mother and father meet?';
		if($Sec1==8)print 'What is your favorite team?';
		if($Sec1==9)print 'What is your favorite movie?';
		if($Sec1==10)print 'What was your favorite sport in high school?';
		if($Sec1==12)print 'What was your favorite food as a child?';
		if($Sec1==13)print 'What was the make and model of your first car?';
		if($Sec1==14)print 'What was the name of the hospital where you were born?';
		if($Sec1==15)print 'What was the last name of your third grade teacher?';
		?>

		<input name="ans1" id="ans1" class="form-control" type="text" placeholder="Enter a Answer 1" autocomplete="off"/>
	</strong>
</div>

<div class="col-md-12 input-group margin-bottom-5">
	<strong>

		<?php
		if($Sec2==1)print 'What is the first name of the person you first kissed?';
		if($Sec2==2)print 'What time of the day were you born?';
		if($Sec2==3)print 'In what city or town does your nearest sibling live?';
		if($Sec2==4)print 'What is the last name of the teacher who gave you your first failing grade?';
		if($Sec2==5)print 'What was your childhood nickname?';
		if($Sec2==6)print 'What is the name of your favorite childhood friend?';
		if($Sec2==7)print 'In what city or town did your mother and father meet?';
		if($Sec2==8)print 'What is your favorite team?';
		if($Sec2==9)print 'What is your favorite movie?';
		if($Sec2==10)print 'What was your favorite sport in high school?';
		if($Sec2==12)print 'What was your favorite food as a child?';
		if($Sec2==13)print 'What was the make and model of your first car?';
		if($Sec2==14)print 'What was the name of the hospital where you were born?';
		if($Sec2==15)print 'What was the last name of your third grade teacher?';
		?>

		<input name="ans2" id="ans2" class="form-control" type="text" placeholder="Enter a Answer 2" autocomplete="off"/>
	</strong>
</div>

<div class="col-md-12 input-group margin-bottom-5">
	<strong>
		<?php
		if($Sec3==1)print 'What is the first name of the person you first kissed?';
		if($Sec3==2)print 'What time of the day were you born?';
		if($Sec3==3)print 'In what city or town does your nearest sibling live?';
		if($Sec3==4)print 'What is the last name of the teacher who gave you your first failing grade?';
		if($Sec3==5)print 'What was your childhood nickname?';
		if($Sec3==6)print 'What is the name of your favorite childhood friend?';
		if($Sec3==7)print 'In what city or town did your mother and father meet?';
		if($Sec3==8)print 'What is your favorite team?';
		if($Sec3==9)print 'What is your favorite movie?';
		if($Sec3==10)print 'What was your favorite sport in high school?';
		if($Sec3==12)print 'What was your favorite food as a child?';
		if($Sec3==13)print 'What was the make and model of your first car?';
		if($Sec3==14)print 'What was the name of the hospital where you were born?';
		if($Sec3==15)print 'What was the last name of your third grade teacher?';
		?>

		<input name="ans3" id="ans3" class="form-control" type="text" placeholder="Enter a Answer 3" autocomplete="off"/>
	</strong>
</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        jQuery("#frm_auth").validate(
        {
            rules : {
                ans1:{required:true},
                ans2:{required:true},
                ans3:{required:true}
            },
            messages : {
                ans1:{required:'Please enter the Answer 1'},
                ans2:{required:'Please enter the Answer 2'},
                ans3:{required:'Please enter the Answer 3'}
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });

</script>