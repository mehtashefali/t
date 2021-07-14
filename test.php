</br></br></br>
<div class="col-sm-12">
</br>
<style>
.mybtn {
	font-size:30px;
    height:50px;
    border:none;
    background:#00a6b2;
    color:#fff;
    padding:0px 20px;
    border-radius:4px;
    -webkit-border-radius:4px 4px 4px 4px;
}

</style>
<div style="text-align:center">
<h3>Test</h3>

<script type="text/javascript" src="jquery-2.js"></script>
<script type="text/javascript" src="jquery.js"></script>

<?php

$timedata1="00:48:00";
//$timedata1="00:00:10";
$timedata=explode(":",$timedata1); 
?>

<input type="hidden" value="<?php echo $timedata[0]; ?>" name="tval1" id="tval1">
<input type="hidden" value="<?php echo $timedata[1]; ?>" name="tval2" id="tval2">
<input type="hidden" value="<?php echo $timedata[2]; ?>" name="tval3" id="tval3">

<p id="hs_timer"><?php echo $timedata1; ?></p>
<br><a class="mybtn" onclick="submitqueset();" >End Test</a>

                            <script>
                                $(function(){
                                    $('#hs_timer').countdowntimer({
                                        hours :$("#tval1").val(),
										minutes :$("#tval2").val(),
                                        seconds : $("#tval3").val(),
                                        size : "lg"
                                    });
                                });
                            </script>


<script type="text/javascript">
window.jQuery(function(){
	var aa=0;
var y=setInterval(function() {

var str = $('#hs_timer').text();
//alert(str);

var a = str.split(':');
//alert(a[0]);

if (a[0] == "00" && a[1] == "00" && a[2] == "00" && aa==0) {
     aa=1;
	 submitqueset();
	 //location.href="https://localhost/TPP/Main.php?page=12";
	 //alert(a[0]);
}

 }, 2000);
});

function submitqueset()
{
	//Qset
$('#Qset').submit();
}

</script>

</div>		


<script type="text/javascript">

// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".radioclick").click(function() {
	
var v_id = "div"+$(this).attr("id");
$('#'+v_id).css('background-color', '#FFCC99');

});
});
   
</script>

<div style="padding:0;background:#eef9f0;">
<form action="Main.php?page=14" method="POST" id="Qset">   


<section class="wrapper">

<h1>Quantative Aptitude</h1><hr>
<?php
if(isset($_GET['key']))
{
$key=$_GET['key'];
$filter = ['Company' => $key,'QuestionType' => 'Quantative Aptitude'];
$options = ['limit' => 17];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Question', $query);
$cursor1 =$manager->executeQuery('tpp.Question', $query);
$arr = $cursor1->toArray();
$rowcc=0;
if(count($arr)>=1)
{
foreach ($cursor as $document) 
{
$rowcc+=1;	
$row = (array)$document;
?>

<div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading" id="divQuantative<?php echo $rowcc; ?>">
                        Quantative Aptitude <?php echo $rowcc; ?>
						 <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                         </span>
                    </header>
                    <div class="panel-body" style="display: none;">
                            
        Q-<?php echo $rowcc; ?>. <?php echo $row['Question']; ?> <br><br>

         <input type="radio" class="radioclick" id="Quantative<?php echo $rowcc; ?>" name="Quantative<?php echo $rowcc; ?>" value="1"> - <?php echo $row['OptionsA']; ?> <br>
         <input type="radio" class="radioclick" id="Quantative<?php echo $rowcc; ?>" name="Quantative<?php echo $rowcc; ?>" value="2"> - <?php echo $row['OptionsB']; ?> <br>
         <input type="radio" class="radioclick" id="Quantative<?php echo $rowcc; ?>" name="Quantative<?php echo $rowcc; ?>" value="3"> - <?php echo $row['OptionsC']; ?> <br>
         <input type="radio" class="radioclick" id="Quantative<?php echo $rowcc; ?>" name="Quantative<?php echo $rowcc; ?>" value="4"> - <?php echo $row['OptionsD']; ?> <br>

		 <input type="hidden" name="Quantative_C<?php echo $rowcc; ?>" value="<?php echo $row['OptionsCorrect']; ?>">

                    </div>
                </section>

            </div>
        </div>
		
<?php
}
}
}
?>
		
		
		
	  
<h1>Verbel Ability</h1><hr>
<?php
if(isset($_GET['key']))
{
$key=$_GET['key'];
$filter = ['Company' => $key,'QuestionType' => 'Verbel Ability'];
$options = ['limit' => 20];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Question', $query);
$cursor1 =$manager->executeQuery('tpp.Question', $query);
$arr = $cursor1->toArray();
$rowcc=0;
if(count($arr)>=1)
{
foreach ($cursor as $document) 
{
$rowcc+=1;	
$row = (array)$document;
?>

<div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading" id="divVerbel<?php echo $rowcc; ?>">
                        Verbel Ability <?php echo $rowcc; ?>
						 <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                         </span>
                    </header>
                    <div class="panel-body" style="display: none;">
                            
        Q-<?php echo $rowcc; ?>. <?php echo $row['Question']; ?> <br><br>

         <input type="radio" class="radioclick" id="Verbel<?php echo $rowcc; ?>" name="Verbel<?php echo $rowcc; ?>" value="1"> - <?php echo $row['OptionsA']; ?> <br>
         <input type="radio" class="radioclick" id="Verbel<?php echo $rowcc; ?>" name="Verbel<?php echo $rowcc; ?>" value="2"> - <?php echo $row['OptionsB']; ?> <br>
         <input type="radio" class="radioclick" id="Verbel<?php echo $rowcc; ?>" name="Verbel<?php echo $rowcc; ?>" value="3"> - <?php echo $row['OptionsC']; ?> <br>
         <input type="radio" class="radioclick" id="Verbel<?php echo $rowcc; ?>" name="Verbel<?php echo $rowcc; ?>" value="4"> - <?php echo $row['OptionsD']; ?> <br>

		 <input type="hidden" name="Verbel_C<?php echo $rowcc; ?>" value="<?php echo $row['OptionsCorrect']; ?>">

                    </div>
                </section>

            </div>
        </div>
		
<?php
}
}
}
?>


<h1>Logical Resoning</h1><hr>
<?php
 
if(isset($_GET['key']))
{
$key=$_GET['key'];
$filter = ['Company' => $key,'QuestionType' => 'Logical Resoning'];
$options = ['limit' => 15];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Question', $query);
$cursor1 =$manager->executeQuery('tpp.Question', $query);
$arr = $cursor1->toArray();
$rowcc=0;
if(count($arr)>=1)
{
foreach ($cursor as $document) 
{
$rowcc+=1;	
$row = (array)$document;
?>

<div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading" id="divLogical<?php echo $rowcc; ?>">
                        Logical Resoning <?php echo $rowcc; ?>
						 <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                         </span>
                    </header>
                    <div class="panel-body" style="display: none;">
                            
        Q-<?php echo $rowcc; ?>. <?php echo $row['Question']; ?> <br><br>

         <input type="radio" class="radioclick" id="Logical<?php echo $rowcc; ?>" name="Logical<?php echo $rowcc; ?>" value="1"> - <?php echo $row['OptionsA']; ?> <br>
         <input type="radio" class="radioclick" id="Logical<?php echo $rowcc; ?>" name="Logical<?php echo $rowcc; ?>" value="2"> - <?php echo $row['OptionsB']; ?> <br>
         <input type="radio" class="radioclick" id="Logical<?php echo $rowcc; ?>" name="Logical<?php echo $rowcc; ?>" value="3"> - <?php echo $row['OptionsC']; ?> <br>
         <input type="radio" class="radioclick" id="Logical<?php echo $rowcc; ?>" name="Logical<?php echo $rowcc; ?>" value="4"> - <?php echo $row['OptionsD']; ?> <br>

		 <input type="hidden" name="Logical_C<?php echo $rowcc; ?>" value="<?php echo $row['OptionsCorrect']; ?>">

                    </div>
                </section>

            </div>
        </div>
		
<?php
}
}
}
?>

		
 </section>	
 
</form>   
</div>
</div>		


