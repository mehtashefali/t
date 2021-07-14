<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("./db.php");


$sid= $_SESSION['userid'];
$rid= $_POST["rid"];
$mess= $_POST["Message"];
$Rdate=date('Y-m-d h:i:s');


$filter = array();
$options =  array();

$query2 = new MongoDB\Driver\Query($filter,$options);
$cursor_c =$manager->executeQuery('tpp.Message', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Message', $query2);
$arr_c = $cursor_c1->toArray();

if(count($arr_c)>=1)
{
foreach ($cursor_c as $document_c) 
{	
$row = (array)$document_c;

if(($row['Sid']==$sid and $row['Rid']==$rid) )
{
?>

<div style="border: 1px solid var(--light);width:400px;float:right;padding: 5px 10px;margin: 5px 10px;border-radius: 20px;">
                    <span class="name"><?php echo $row['Mess']; ?></span> <br>
                    <span class="preview" style="font-size:13px"><?php echo $row['Messdate']; ?></span>
					</div>
					<br>

<?php
}

if(($row['Sid']==$rid and $row['Rid']==$sid))
{
?>

<div style="border: 1px solid var(--light);width:400px;float:left;padding: 5px 10px;margin: 5px 10px;border-radius: 20px;">
                    <span class="name"><?php echo $row['Mess']; ?></span><br>
                    <span class="preview" style="font-size:13px"><?php echo $row['Messdate']; ?></span>
					</div>
					<br>

<?php
}


}

}
?>
