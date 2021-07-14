</br></br></br>
<div class="col-sm-12">
</br>
<div class="table-agile-info">

						<header class="panel-heading">
						Offers
						</header>	
</br>
<?PHP
$id=$_SESSION['userid'];

$filter = ['Uid' => new MongoDB\BSON\ObjectID($id)];

if(isset($_GET["Selected"]) and $_GET["Selected"]=="S")
{
$filter = ['Uid' => new MongoDB\BSON\ObjectID($id), 'Approve'=> 'Y'];
}

if(isset($_GET["Selected"]) and $_GET["Selected"]=="N")
{
$filter = ['Uid' => new MongoDB\BSON\ObjectID($id), 'Approve'=> ''];
}

$options =  array();
$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Application', $query);
foreach ($cursor as $document) 
{
$row = (array)$document;

$id2=$row['Oid'];
$filter2 = ['_id' => new MongoDB\BSON\ObjectID($id2)];
$options2 = ['limit' => 1];

$query2 = new MongoDB\Driver\Query($filter2, $options2);
$cursor_c =$manager->executeQuery('tpp.Opportunity', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Opportunity', $query2);
$arr_c = $cursor_c1->toArray();

if(count($arr_c)>=1)
{

foreach ($cursor_c as $document_c) 
{	
$row_c = (array)$document_c;

?>

<div class="panel panel-default" id="mydiv">
<div class="">
<div id="myimgpage"><img src="images/<?php echo $row_c['Company']; ?>.jpg" style="width:80px;height:80px;border-radius: 80%;"></div>
<span class=""><a class="" href=""><?php echo $row_c['Company']; ?> (<?php echo $row_c['CompanyType']; ?>).</a></span><br>
<span><?php echo $row_c['OpportunityType']; ?></span><span>|</span><span><?php echo $row_c['CompanyType']; ?></span>
<hr>
<div>
<span id="mybutton"><?php echo $row_c['OpportunityType']; ?></span>
<span id="mybutton"><?php echo $row_c['dateof']; ?></span> 
<span id="mybutton"><?php echo $row_c['timein']; ?></span> 
<span id="mybutton"><?php echo $row_c['Criteria']; ?>%</span> 

<span id="mybutton"><?php echo $row_c['JobType']; ?></span>
<span id="mybutton"><?php echo $row_c['Post']; ?></span> 
<span id="mybutton"><?php echo $row_c['Salary']; ?></span></div>  


<hr>
	  
<div style="text-align: right;">
<a href="Main.php?page=11&oid=<?php echo $row_c['_id']; ?>" class="btn btn-success">Show Offer</a>
</div>

</div></div>

<?php
}
}
}
?>

</div></div>
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

  background-image: url('bg1.jpg');

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