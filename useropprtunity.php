</br></br></br>
<div class="col-sm-12">

</br>

<div class="table-agile-info">
  
<header class="panel-heading">
<h3><b></br>Opportunity</b></h3>
</header>		
<form id="form1" method="GET" action="Main.php">		
<input type="hidden" name="page" value="3">
<input type="radio" data-indeterminate="false" Name="Eligible" value="A" onclick="autosubmit();" <?php if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='A'){ echo "checked"; } ?> >&nbsp;&nbsp;All  
<input type="radio" data-indeterminate="false" Name="Eligible" value="E" onclick="autosubmit();" <?php if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='E'){ echo "checked"; } ?>>&nbsp;&nbsp;Eligible  
<input type="radio" data-indeterminate="false" Name="Eligible" value="N" onclick="autosubmit();" <?php if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='N'){ echo "checked"; } ?>>&nbsp;&nbsp;Non-Eligible &nbsp;&nbsp;
</form>
</br>

<script>
function autosubmit()
{
	document.getElementById("form1").submit();
}
</script>	

<?PHP


$filter = array();
$options =  array();
if(isset($_GET["Sort"]) and $_GET["Sort"]=='A')
{
//$options = ['sort'=>['Company'=>1]];
}

if(isset($_GET["Sort"]) and $_GET["Sort"]=='B')
{
//$options = ['sort'=>['Company'=>-1]];
}

//$options = ['skip'=>$start,'limit' => $per_page];
$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
foreach ($cursor as $document) 
{
$row = (array)$document;
$yes=1;

if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='E' and $row['Criteria']<=$_SESSION['avgmark'])
{
$yes=1;
}
else
{
$yes=0;
}

if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='N' and $row['Criteria']>$_SESSION['avgmark'] and $yes==0)
{
$yes=1;
}

if(isset($_GET["Eligible"]) and $_GET["Eligible"]=='A' and $yes==0)
{
$yes=1;
}

if(!isset($_GET["Eligible"]) and $yes==0)
{
$yes=1;
}

if($yes==1)
{
?>

<div class="panel panel-default" id="mydiv">
<div class="">
<div id="myimgpage"><img src="images/<?php echo $row['Company']; ?>.jpg" style="width:80px;height:80px;border-radius: 80%;"></div>
<span class=""><a class="" href=""><?php echo $row['Company']; ?> (<?php echo $row['CompanyType']; ?>).</a></span><br>
<span><?php echo $row['OpportunityType']; ?></span><span>|</span><span><?php echo $row['CompanyType']; ?></span>
<hr>
<div>
<span id="mybutton"><?php echo $row['OpportunityType']; ?></span>
<span id="mybutton"><?php echo $row['dateof']; ?></span> 
<span id="mybutton"><?php echo $row['timein']; ?></span> 
<span id="mybutton"><?php echo $row['Criteria']; ?>%</span> 

<span id="mybutton"><?php echo $row['JobType']; ?></span>
<span id="mybutton"><?php echo $row['Post']; ?></span> 
<span id="mybutton"><?php echo $row['Salary']; ?></span></div>  


<hr>
	  
<div style="text-align: right;">
<a href="Main.php?page=9&oid=<?php echo $row['_id']; ?>" class="btn btn-success">Show Opportunity</a>
</div>

</div></div>
	  

<?php
}

}
?>
</div>
<?php
/*
<div class="panel panel-default" id="mydiv"><div class="">
<div id="myimg"><img src="images/iasys.jpg" style="width:80px;height:80px;border-radius: 80%;"></div>
<span class=""><a class="" href="">IASYS</a></span><br>
<span>Graduate Engineer Trainee</span><span>|</span><span>Kolhapur</span>
<hr>
<div>
<span id="mybutton">Graduate Engineer Trainee</span>
<span id="mybutton">7:00</span>
<span id="mybutton">Full-Time</span>
<span id="mybutton">CTC:4,50,000</span></div>  

<hr>
	  
<div style="text-align: right;">
<a href="Iasys.jsp" class="btn btn-success">Show  Opportunity</a>
</div>
	  
</div>
</div>
*/
?>

	  
	  
        </div>
</div>		

<style>
#mydiv
{
padding-left: 15px;
padding-right: 15px;
padding-top: 10px;
padding-bottom: 10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 30px;
font-size:90%;
}

#myimgpage
{
	width:80px;
	height:80px;
	background: #0000ff;
	border-radius: 80%;
	float:left;
	margin-right: 0.625rem;
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
.panel-heading {
    position: relative;
    height: 57px;
    line-height: 57px;
    letter-spacing: 0.2px;
    color: black;
    font-size: 18px;
    font-weight: 400;
    padding: 0 16px;
    background:#dea1e2;
   border-top-right-radius: 2px;
   border-top-left-radius: 2px; 
    text-transform: uppercase;
    text-align: center;
}
</style>