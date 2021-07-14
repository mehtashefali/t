</br></br></br>
<div class="col-sm-12">
</br>
						

				

<div class="table-agile-info">

<?PHP
$id=$_SESSION['userid'];

$filter1 = [];

$query2 = new MongoDB\Driver\Query($filter1);
$cursor_c =$manager->executeQuery('tpp.Company', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Company', $query2);
$arr_c = $cursor_c1->toArray();


?>

		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class=""> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Assessments in your community</h4>
					<h3><?php echo count($arr_c); ?></h3>
					<p></p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Practice tests in your community</h4>
						<h3><?php echo count($arr_c); ?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
<?PHP
$Eligible=0;
$Allopp=0;
$filter = array();
$options =  array();

$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
foreach ($cursor as $document) 
{
$row = (array)$document;
$yes=1;

$Allopp=$Allopp+1; 

if($row['Criteria']<=$_SESSION['avgmark'])
{
$Eligible=$Eligible+1; 
}

}
?>
			
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-3 market-update-right">
						<i class=""></i>
					</div>
					<div class="col-md-3 market-update-left">
						<h4>Eligible Opportunities</h4>
						<h3><?php echo $Eligible; ?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="" aria-hidden="true"></i>
					</div>
					<div class="col-md-3 market-update-left">
						<h4>All Opportunities</h4>
						<h3><?php echo $Allopp; ?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
	
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">

				</div>
			</div>
		</div>



<br>
<div class="panel panel-default" id="myresume"><div class="">
<i class="fa fa-plus style=width:12px;height:10px;border-radius:"></i><a href="Main.php?page=8">&nbsp;&nbsp;Generate Resume</a></div> 
	

</div></div>
<br>

<?php
/*
<div class="panel panel-default" id="mydivnotification"><div class="">
<div id="mydelete"> X </div>
<br>
<span>Graduate Engineer Trainee</span><span>|</span><span>Kolhapur</span>
<hr>
New Opportunity - Condé Nast - Conde' Nast Hiring Program. Registrations Open from 09:00 AM, 11 Jan, 2021 to 04:00 PM, 18 Jan, 2021.
</div>
</div>
*/
?>

<script type="text/javascript">
$(function() {
$(".myimg1").click(function() {
var element = $(this);
var del_id = element.attr("id");
if(del_id=='')
{
}
else
{
	
$("#myimg_"+del_id).remove();

}
return false;
});
});
</script>


	
	<?PHP
$divcount=0;

$filter = array();
$options =  array();
$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
foreach ($cursor as $document) 
{
$row = (array)$document;
$divcount=$divcount+1;
?>

<div id="myimg_<?php echo $divcount; ?>">
<div class="panel panel-default" id="mydiv" >
<div class="">
<div id="base">
<div id="date"><h4><br>&nbsp;&nbsp;<?php echo $row['dateof']; ?><br>&nbsp;&nbsp;<?php echo $row['timein']; ?></h4></div>
</div>

<div class="myimg1" id="<?php echo $divcount; ?>"> <i class="fa fa-times style=width:8px;height:8px;font-size:20px"></i></div>

<br>
<div id="myimg"><img src="images/<?php echo $row['Company']; ?>.jpg" style="width:30px;height:30px;border-radius: 30%;"></div>
<span class=""><a class="" href=""><?php echo $row['OpportunityType']; ?> (<?php echo $row['CompanyType']; ?>).</a></span><br>
<span>Graduate Engineer Trainee</span><span>|</span><span><?php echo $row['CompanyType']; ?></span>
<hr>
<div>
<span id="mybutton"><?php echo $row['OpportunityType']; ?></span>
<span id="mybutton"><?php echo $row['dateof']; ?> <?php echo $row['timein']; ?></span>
<span id="mybutton"><?php echo $row['Criteria']; ?>%</span>
<span id="mybutton"><?php echo $row['Post']; ?></span>
<span id="mybutton"><?php echo $row['JobType']; ?></span>
<span id="mybutton"><?php echo $row['Salary']; ?></span></div>  

<hr>
<div class="title1">
<span class="title1">Criteria - <?php echo $row['Criteria']; ?>%</span>
</div>
<div class="title">
 <i class="fa fa-clock-o"></i><span class="title" >Date time On <?php echo $row['dateof']; ?> <?php echo $row['timein']; ?>&nbsp;&nbsp;</span>
</div>
</div>
</div>
</div>
<?php
}
?>
		
		
			
</section>

</div>

<style>
.btn btn-default
{
	width:50px;
	
}
#mydiv
{
padding-left: 6px;
padding-right: 10px;
padding-top:0px;
padding-bottom: 30px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
}

#mydivnotification
{
padding-left: 6px;
padding-right: 10px;
padding-top:0px;
padding-bottom: 30px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
background: #66ccff;
}

#myresume
{
padding-left: 6px;
padding-right: 10px;
padding-top:10px;
padding-bottom:10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 255, 0.5);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
color:black;
}


#mybutton
{
color: rgba(0, 0, 0, 0.87);
    border: none;
    cursor: default;
    height: 32px;
    display: inline-flex;
    outline: none;
    padding: 10px;
	margin-right: 10px;
    font-size: 0.8125rem;
    box-sizing: border-box;
    transition: background-color 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    align-items: center;
    font-family: SF Pro Display,"Helvetica Neue",Arial,sans-serif;
    white-space: nowrap;
    border-radius: 16px;
    vertical-align: middle;
    justify-content: center;
    text-decoration: none;
    background-color: #e0e0e0;
	font-size:70%;
}
#myimg
{
	width:30px;
	height:30px;
	background: #0000ff;
	border-radius: 80%;
	float:left;
	margin-right: 0.625rem;
}

.myimg1
{
	width:27px;
	height:27px;
	background: #0000ff;
	border-radius: 80%;
	float:right;
	margin: 5px;
	padding: 0px 0px 5px 5px;

}

#mydelete
{
	width:15px;
	height:15px;
	border-radius: 80%;
	float:right;
	color:black;

}

.title{
	float:right;
	font-size:15px;
	color:black;
}
.title1{
	float:right;
		font-size:15px;
	color:black;

}
   #base {
      background:  #deeaee;
      display: inline-block;
      height: 50px;
      margin-left: 20px;
      margin-top: 0px;
      position: relative;
      width: 100px;
	  float:right;
	    transform: rotate(180deg);
		

    }
    #base:before {
      border-bottom: 35px solid #deeaee;
      border-left: 50px solid transparent;
      border-right: 50px solid transparent;
      content: "";
      height: 0;
      left: 0;
      position: absolute;
      top: -35px;
      width: 0;
	  float:right;


    }
	.h1
	{
			    transform: rotate(20deg);

	}
	 #date {
    
	    transform: rotate(180deg);
		float:center;
		align:center;
		color:black;
    }
	body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 22px;
    line-height: 1.42857143;
    color: white;
}

</style>