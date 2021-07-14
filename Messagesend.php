<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("./db.php");


$sid= $_SESSION['userid'];
$rid= $_POST["rid"];
$mess= $_POST["Message"];
$Rdate=date('Y-m-d h:i:s');


if($mess!="")
{

$bulkWrite = new MongoDB\Driver\BulkWrite;
$doc = [ 'Mid' => '1', 'Sid' => $sid, 'Rid' => $rid, 'Mess' => $mess, 'Messdate' => $Rdate, 'View' => 'N'];         
$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.Message', $bulkWrite);


echo "<font color='#000099' style='font-size:13px'>Message Send</font>";

}
else
{
echo "<font color='#990000' style='font-size:13px'>Enter Message</font>";
}

?>
