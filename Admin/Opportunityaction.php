<?php
include('../db.php');
?>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$("#submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Opportunityvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Opportunityaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
else
	{
	alert(html);
	}
}  
});

return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$("#Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Opportunityvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Opportunityaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
else
	{
	alert(html);
	}
}  
});

return false;
});
});
</script>

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
url: "Opportunityaction.php",
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
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Opportunityaction.php",
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
url: "Opportunityaction.php",
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
$manager->executeBulkWrite('tpp.Opportunity', $bulkWrite); 
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
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
<div id="cp_contact_form">
<div id="cp_contact_form">
<form  method="post" name="form" id="form" action="">

				<div class="row">
                  <input type="hidden" name="ucontent" value="<?php echo $row['_id']; ?>" >
                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Company Name</label>
                    <select name="ucontent1" class="form-control" id="firstName" > 
									<option value="<?php echo $row['Company']; ?>" select><?php echo $row['Company']; ?></option>
									<option value="">Select Company Name</option>
									<option value="TCS">TCS</option>
									<option value="Infosys">Infosys</option>
									<option value="Tech mahindra">Tech mahindra</option>
									<option value="Wipro">Wipro</option>
					</select>
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Opportunity Type</label>
                    <select name="ucontent2"  class="form-control" id="lastName" >  
									<option value="<?php echo $row['OpportunityType']; ?>" select><?php echo $row['OpportunityType']; ?></option>
									<option value="">Opportunity Type</option>
									<option value="Job" select>Job</option>
									<option value="Internship">Internship</option>
									</select>					
                  </div>
				  
                </div>

				<div class="row">                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Company Type</label>
                    <select name="ucontent3" class="form-control" id="firstName" > 
									<option value="<?php echo $row['CompanyType']; ?>" select><?php echo $row['CompanyType']; ?></option>
									<option value="">Select Company Type</option>
									<option value="IT" select>IT</option>
									<option value="Civil">Civil</option>
					</select>
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Job Structure</label>
                    <select name="ucontent4"  class="form-control" id="lastName" >  
									<option value="<?php echo $row['JobType']; ?>" select><?php echo $row['JobType']; ?></option>
									<option value="">Select Job Structure</option>
									<option value="Full-Time" select>Full-Time</option>
									<option value="Part-Time">Part-Time</option>
									</select>					
                  </div>
				  
                </div>
				
								<div class="row">                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Post</label>
                    <select name="ucontent5" class="form-control" id="firstName" > 
									<option value="<?php echo $row['Post']; ?>" select><?php echo $row['Post']; ?></option>
									<option value="">Select Post</option>
									<option value="Trainee Engineers" select>Trainee Engineers</option>
									<option value="Software Engineer">Software Engineer</option>
					</select>
                  </div>
				 
				 
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Criteria(%)</label>
                    <input type="text" name="ucontent9" class="form-control" id="firstName" Placeholder="Criteria" value="<?php echo $row['Criteria']; ?>">           
                  </div>
				  
                </div>
				
                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Information</label>
                    <input type="text" name="ucontent6" class="form-control" id="firstName" Placeholder="Information" value="<?php echo $row['Infodata']; ?>">           
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Date</label>
                    <input type="text" name="ucontent7" class="form-control" id="firstName" Placeholder="Date" value="<?php echo $row['dateof']; ?>">           
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Time</label>
                    <input type="text" name="ucontent8" class="form-control" id="firstName" Placeholder="Time" value="<?php echo $row['timein']; ?>">           
                  </div>
                </div>
				
                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Eligible Courses In Detail</label>
                    <input type="text" name="ucontent10" class="form-control" id="firstName" Placeholder="Eligible Courses" value="<?php echo $row['Courses']; ?>">           
                  </div>
                </div>
				
				                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Eligibility Criteria In Detail</label>
                    <input type="text" name="ucontent11" class="form-control" id="firstName" Placeholder="Eligibility Criteria" value="<?php echo $row['Criteriadetail']; ?>">           
                  </div>
                </div>
				
				
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Selection Process Details</label>
                    <input type="text" name="ucontent12" class="form-control" id="firstName" Placeholder="Selection Process Details" value="<?php echo $row['SelectionProcess']; ?>">           
                  </div>
                </div>
				
								<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Salary</label>
                    <input type="text" name="ucontent13" class="form-control" id="firstName" Placeholder="Salary" value="<?php echo $row['Salary']; ?>">           
                  </div>
                </div>
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12"><br>

<button type="button" id="Updatesubmit_button" class="btn btn-info">Update</button>				  

                </div>
              </div>
</form>
</div>
</div>
<?php
}
}
}
else
{
?>
<div class="form-w3layouts">
<form name="form" id="form">

                <div class="row">
                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Company Name</label>
                    <select name="content" class="form-control" id="firstName" > 
									<option value="">Select Company Name</option>
									<option value="TCS">TCS</option>
									<option value="Infosys">Infosys</option>
									<option value="Tech mahindra">Tech mahindra</option>
									<option value="Wipro">Wipro</option>
					</select>
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Opportunity Type</label>
                    <select name="content1"  class="form-control" id="lastName" >  
									<option value="">Opportunity Type</option>
									<option value="Job" select>Job</option>
									<option value="Internship">Internship</option>
									</select>					
                  </div>
				  
                </div>

				<div class="row">                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Company Type</label>
                    <select name="content2" class="form-control" id="firstName" > 
									<option value="">Select Company Type</option>
									<option value="IT" select>IT</option>
									<option value="Civil">Civil</option>
					</select>
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Job Structure</label>
                    <select name="content3"  class="form-control" id="lastName" >  
									<option value="">Select Job Structure</option>
									<option value="Full-Time" select>Full-Time</option>
									<option value="Part-Time">Part-Time</option>
									</select>					
                  </div>
				  
                </div>
				
								<div class="row">                  
				  <div class="col-md-6 margin-bottom-15">		
					 <label for="firstName" class="control-label">Post</label>
                    <select name="content4" class="form-control" id="firstName" > 
									<option value="">Select Post</option>
									<option value="Trainee Engineers" select>Trainee Engineers</option>
									<option value="Software Engineer">Software Engineer</option>
					</select>
                  </div>
				 
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Criteria</label>
                    <input type="text" name="content8" class="form-control" id="firstName" Placeholder="Criteria" >           
                  </div>
				  
                </div>
				
                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Information</label>
                    <input type="text" name="content5" class="form-control" id="firstName" Placeholder="Information" >           
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Date</label>
                    <input type="text" name="content6" class="form-control" id="firstName" Placeholder="Date" >           
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Time</label>
                    <input type="text" name="content7" class="form-control" id="firstName" Placeholder="Time" >           
                  </div>
                </div>
				
				                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Eligible Courses In Detail</label>
                    <input type="text" name="content9" class="form-control" id="firstName" Placeholder="Eligible Courses" >           
                  </div>
                </div>
				
				                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Eligibility Criteria In Detail</label>
                    <input type="text" name="content10" class="form-control" id="firstName" Placeholder="Eligibility Criteria" >           
                  </div>
                </div>
				
				
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Selection Process Details</label>
                    <input type="text" name="content11" class="form-control" id="firstName" Placeholder="Selection Process Details" >           
                  </div>
                </div>
				
								<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Salary</label>
                    <input type="text" name="content12" class="form-control" id="firstName" Placeholder="Salary" >           
                  </div>
                </div>
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12"><br>
<button type="button" id="submit_button" class="btn btn-info">Save</button>				  
                </div>
              </div>

</form>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{

$content=$_POST['content'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];
$content5=$_POST['content5'];
$content6=$_POST['content6'];
$content7=$_POST['content7'];
$content8=$_POST['content8'];

$content9=$_POST['content9'];
$content10=$_POST['content10'];
$content11=$_POST['content11'];
$content12=$_POST['content12'];

$RD=date('Y-m-d');

$bulkWrite = new MongoDB\Driver\BulkWrite;

$doc = [ 'Oid' => '1', 'Company' => $content, 'OpportunityType' => $content1, 'CompanyType' => $content2, 'JobType' => $content3, 'Post' => $content4, 'Infodata' => $content5, 'dateof' => $content6, 'timein' => $content7, 'Criteria' => $content8, 'Courses' => $content9, 'Criteriadetail' => $content10, 'SelectionProcess' => $content11, 'Salary' => $content12];

$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.Opportunity', $bulkWrite);

echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=$_POST['ucontent'];
$ucontent1=$_POST['ucontent1'];
$ucontent2=$_POST['ucontent2'];
$ucontent3=$_POST['ucontent3'];
$ucontent4=$_POST['ucontent4'];
$ucontent5=$_POST['ucontent5'];
$ucontent6=$_POST['ucontent6'];
$ucontent7=$_POST['ucontent7'];
$ucontent8=$_POST['ucontent8'];
$ucontent9=$_POST['ucontent9'];

$ucontent10=$_POST['ucontent10'];
$ucontent11=$_POST['ucontent11'];
$ucontent12=$_POST['ucontent12'];
$ucontent13=$_POST['ucontent13'];

$bulkWrite = new MongoDB\Driver\BulkWrite;
$filter = ['_id' => new MongoDB\BSON\ObjectID($ucontent)];
$update = ['$set' => [ 'Oid' => '1', 'Company' => $ucontent1, 'OpportunityType' => $ucontent2, 'CompanyType' => $ucontent3, 'JobType' => $ucontent4, 'Post' => $ucontent5, 'Infodata' => $ucontent6, 'dateof' => $ucontent7, 'timein' => $ucontent8, 'Criteria' => $ucontent9, 'Courses' => $ucontent10, 'Criteriadetail' => $ucontent11, 'SelectionProcess' => $ucontent12, 'Salary' => $ucontent13]];
$options = ['multi' => true, 'upsert' => false];   //All update
$bulkWrite->update($filter, $update, $options);
$manager->executeBulkWrite('tpp.Opportunity', $bulkWrite); 

echo "<font style='color:#0000FF;'>Record Modify</font><br><br><br>";

}
?>

<div class="table-agile-info">
<div class="panel panel-default">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
<thead><tr>
<th>Id</th>
<th>Company Name</th>
<th>Opportunity Type</th>
<th>Company Type</th>
<th>Job Structure</th>
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
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
$cursor1 =$manager->executeQuery('tpp.Opportunity', $query);
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
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
$rowcc=0;
foreach ($cursor as $document) 
{
$rowcc+=1;	
$row = (array)$document;	
?>
<TR>
<TD><?php echo $rowcc; ?></TD>
<TD><?php echo $row['Company']; ?></TD>
<TD><?php echo $row['OpportunityType']; ?></TD>
<TD><?php echo $row['CompanyType']; ?></TD>
<TD><?php echo $row['JobType']; ?></TD>
<TD><?php echo $row['Post']; ?></TD>
<TD><?php echo $row['dateof']; ?></TD>
<TD><?php echo $row['timein']; ?></TD>
<TD><?php echo $row['Criteria']; ?></TD>
<TD>
<a class="Edit" id="<?php echo $row['_id']; ?>">
        <span class='glyphicon glyphicon-edit'></a>
		
<a class="ABCD" id="<?php echo $row['_id']; ?>">
<span class='glyphicon glyphicon-remove'></a>
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