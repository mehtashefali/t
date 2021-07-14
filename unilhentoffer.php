<?php
if(isset($_GET['application']))
{
	/*
$id=$_GET['oid'];
$uid=$_SESSION['userid'];
$RD=date('Y-m-d');

$bulkWrite = new MongoDB\Driver\BulkWrite;

$doc = [ 'Aid' => '1', 'Oid' => $id, 'Uid' => $uid, 'DateofApplication' => $RD];

$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.Application', $bulkWrite);

echo "<script> alert('Student Application Successfully Submited.!'); </script>";
	*/
}
?>
	
<?php
if(isset($_GET['oid']))
{
$id=$_GET['oid'];
$filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
$cursor1 =$manager->executeQuery('tpp.Opportunity', $query);
$arr = $cursor1->toArray();
if(count($arr)>=1)
{
foreach ($cursor as $document) 
{
$row = (array)$document;
?>

</br>
<div class="col-sm-12">
</br>


<div class="table-agile-info">


<div class="panel panel-default" id="mydiv"><div class="">
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
<span id="mybutton"><?php echo $row['Salary']; ?>/-</span>



</div>  <br>

<p><h3>Description</h3>
<hr>
<?php echo $row['Infodata']; ?>
<br>
</div>
</div>


<div class="panel panel-default" id="mydiv">
<div class="">
<p><h3>Eligible Courses</h3></p>
<hr>
<?php echo $row['Courses']; ?>
</div>
</div>



<div class="panel panel-default" id="mydiv">
<div class="">
<p><h3>Eligibility Criteria</h3></p>
<hr>
<?php echo $row['Criteriadetail']; ?>
 </div>
</div>

<div class="panel panel-default" id="mydiv">
<div class="">
<p><h3>Selection Process Details</h3></p>
<hr>
<?php echo $row['SelectionProcess']; ?>
</div>
</div>


</div> </div>
<style>


#mydiv
{
padding-left: 10px;
padding-right: 10px;
padding-top: 10px;
padding-bottom: 10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
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

.mybtn {
	float:right;
	font-size:20px;
	margin-right:10px;
    height:40px;
    border:none;
    background:#00a6b2;
    color:#fff;
    padding:0px 50px;
    border-radius:4px;
    -webkit-border-radius:0 4px 4px 0;
}

</style>

<?php
}
}
}
?>