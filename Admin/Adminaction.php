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
url: "Adminvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Adminaction.php",
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
url: "Adminvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Adminaction.php",
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
url: "Adminaction.php",
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
url: "Adminaction.php",
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
url: "Adminaction.php",
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
$manager->executeBulkWrite('tpp.admin', $bulkWrite); 
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.admin', $query);
$cursor1 =$manager->executeQuery('tpp.admin', $query);
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
                    <label for="lastName" class="control-label">User Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['Uname']; ?>" class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">User Email</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['Email']; ?>" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">User Password</label>
                    <input type="Password" name="ucontent3"  value="<?php echo $row['Pass']; ?>" class="form-control" id="lastName" Placeholder="Password">        
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Job Type</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['JobType']; ?>" class="form-control" id="firstName" Placeholder="Job Type">           
                  </div>

				   <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">User Type</label>
                    <select name="ucontent5" class="form-control" id="firstName">
					<option value="<?php echo $row['Utyp']; ?>"><?php echo $row['Utyp']; ?></option>
					<option value="Admin">Admin</option>
					<option value="HOD">HOD</option>
					<option value="Teacher">Teacher</option>
					<option value="Staff">Staff</option>
					</select>
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
                    <label for="firstName" class="control-label">User Name</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="First and Last Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">User Email</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">User Password</label>
                    <input type="Password" name="content2" class="form-control" id="firstName" Placeholder="Password">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Job Type</label>
                    <input type="text" name="content3"  class="form-control" id="lastName" Placeholder="Job Type">  
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">User Type</label>
                    <select name="content4" class="form-control" id="firstName">
					<option value="Admin">Admin</option>
					<option value="HOD">HOD</option>
					<option value="Teacher">Teacher</option>
					<option value="Staff">Staff</option>
					</select>
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
$RD=date('Y-m-d');

$bulkWrite = new MongoDB\Driver\BulkWrite;
$doc = [ 'Uid' => '1', 'Uname' => $content, 'Email' => $content1, 'Utyp' => $content4, 'JobType' => $content3, 'Pass' => $content2];
$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.admin', $bulkWrite);

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

$bulkWrite = new MongoDB\Driver\BulkWrite;
$filter = ['_id' => new MongoDB\BSON\ObjectID($ucontent)];
$update = ['$set' => ['Uname' => $ucontent1, 'Email'=> $ucontent2, 'Utyp' => $ucontent5, 'JobType' => $ucontent4, 'Pass' => $ucontent3]];
$options = ['multi' => true, 'upsert' => false];   //All update
$bulkWrite->update($filter, $update, $options);
$manager->executeBulkWrite('tpp.admin', $bulkWrite); 

echo "<font style='color:#0000FF;'>Record Modify</font><br><br><br>";

}
?>

<div class="table-agile-info">
<div class="panel panel-default">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
<thead><tr>
<td><b> ID</b></td>
<td><b> Name</b></td>
<td><b> Email</b></td>
<td><b> Type</b></td>
<td><b>Job Type</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$per_page = 5; 
$filter = array();
$query = new MongoDB\Driver\Query($filter);
$cursor =$manager->executeQuery('tpp.admin', $query);
$cursor1 =$manager->executeQuery('tpp.admin', $query);
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
$cursor =$manager->executeQuery('tpp.admin', $query);

$rowcc=0;
foreach ($cursor as $document) 
{
$rowcc+=1;
$row = (array)$document;	
?>
<TR>
<TD><?php echo $rowcc; ?></TD>
<TD><?php echo $row['Uname']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD><?php echo $row['Utyp']; ?></TD>
<TD><?php echo $row['JobType']; ?></TD>

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