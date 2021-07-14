<?php
include('../db.php');
?>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Offeraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>




<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Offeraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$bulkWrite=new MongoDB\Driver\BulkWrite;
$filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
$bulkWrite->delete($filter, array('limit'=>1));
$manager->executeBulkWrite('tpp.Offertb', $bulkWrite); 
}
?>



<div class="table-agile-info">
<div class="panel panel-default">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
<thead><tr>
<th>Id</th>
<th>Student</th>
<th>Contact</th>
<th>Criteria</th>
<th>Company Name</th>
<th>Opportunity Type</th>
<th>Post</th>
<th>Date</th>
<th>Time</th>
<th>Criteria</th>
<td></td>
</tr></thead>
<tbody>
<?PHP

$per_page = 5; 
$filter = array();
$query = new MongoDB\Driver\Query($filter);
$cursor =$manager->executeQuery('tpp.Offertb', $query);
$cursor1 =$manager->executeQuery('tpp.Offertb', $query);
$arr = $cursor1->toArray();
$count = count($arr);
$pages = ceil($count/$per_page);

$page=0;
$start=0;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
}
$filter = array();
$options = ['skip'=>$start,'limit' => $per_page];
$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Offertb', $query);
$rowcc=0;
foreach ($cursor as $document) 
{
$rowcc+=1;	
$row = (array)$document;	
?>
<TR>
<TD><?php echo $rowcc; ?></TD>
<?php
$id1=$row['Uid'];
$filter1 = ['_id' => new MongoDB\BSON\ObjectID($id1)];
$options1 = ['limit' => 1];

$query1 = new MongoDB\Driver\Query($filter1, $options1);
$cursor_s =$manager->executeQuery('tpp.Student', $query1);
$cursor_s1 =$manager->executeQuery('tpp.Student', $query1);
$arr_s = $cursor_s1->toArray();

if(count($arr_s)>=1)
{
	
foreach ($cursor_s as $document_s) 
{	
$row_s = (array)$document_s;
echo "<TD>".$row_s['FirstName']." ".$row_s['LastName']."</TD>";
echo "<TD>".$row_s['contactno']."</TD>";
echo "<TD>".(($row_s['Teenp']+$row_s['Twelvep']+$row_s['Firstp']+$row_s['Secondp']+$row_s['Thirdp'])/5)."</TD>";
}
}
?>


<?php
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
echo "<TD>".$row_c['Company']."</TD>";
echo "<TD>".$row_c['OpportunityType']."</TD>";
echo "<TD>".$row_c['Post']."</TD>";
echo "<TD>".$row_c['dateof']." ".$row_c['timein']."</TD>";
echo "<TD>".$row_c['Criteria']."</TD>";
}
}
?>

<TD>


<a class="ABCD" id="<?php echo $row['_id']; ?>">
<span class='glyphicon glyphicon-remove' /></a>
</TD>
	
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div></div></div>