<?php
include('./db.php');


$id=$_GET['oid'];
$uid=$_SESSION['userid'];
$RD=date('Y-m-d');

$bulkWrite = new MongoDB\Driver\BulkWrite;

$doc = [ 'Aid' => '1', 'Oid' => $id, 'Uid' => $uid, 'DateofApplication' => $RD, 'Approve' => '', 'Offer' => ''];

$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.Application', $bulkWrite);

echo "<script> alert('Student Application Successfully Submited.!');  location.href='Main.php?page=3'; </script>";


?>