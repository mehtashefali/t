<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("./db.php");

$filter = ['Email' => $_POST["Email"],'Password' => $_POST["Password"]]; 
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Student', $query);
$cursor1 =$manager->executeQuery('tpp.Student', $query);
$arr = $cursor1->toArray();


if(count($arr)>=1)
{
	
foreach ($cursor as $document) 
{	
$row = (array)$document;
$_SESSION['userid']= $row['_id'];
$_SESSION['username']= $row['FirstName'].' '.$row['LastName'];
$_SESSION['useremail']= $row['Email'];
$_SESSION['userpic']= $row['photo'];
}
}
	

if($_SESSION['userid']!="" and $_SESSION['username']!="")
	{
		echo "<script> location.href='Main.php';</script>";
	}
	else
	{
	    echo "<font color='#990000' >Login Fail plz Check User Id and Password.!</font>";
	}

?>
