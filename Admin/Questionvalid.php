<?php
include('../valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=$_POST['content'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];
$content7=$_POST['content7'];

$mess.=nullvalid($content,"Select Company Name");
$mess.=nullvalid($content1,"Select Question Type,");
$mess.=nullvalid($content2,"Enter Question,");
$mess.=nullvalid($content3,"Enter Option 1,");
$mess.=nullvalid($content4,"Enter Option 2,");
$mess.=nullvalid($content7,"Select Correct Answer,");

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=$_POST['ucontent'];
$ucontent1=$_POST['ucontent1'];
$ucontent2=$_POST['ucontent2'];
$ucontent3=$_POST['ucontent3'];
$ucontent4=$_POST['ucontent4'];
$ucontent5=$_POST['ucontent5'];
$ucontent8=$_POST['ucontent8'];

$mess.=nullvalid($ucontent1,"Select Company Name");
$mess.=nullvalid($ucontent2,"Select Question Type,");
$mess.=nullvalid($ucontent3,"Enter Question,");
$mess.=nullvalid($ucontent4,"Enter Option 1,");
$mess.=nullvalid($ucontent5,"Enter Option 2,");
$mess.=nullvalid($ucontent8,"Select Correct Answer,");

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>