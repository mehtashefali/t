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
$content5=$_POST['content5'];
$content6=$_POST['content6'];
$content7=$_POST['content7'];

$mess.=nullvalid($content,"Select Company Name");
$mess.=nullvalid($content1,"Select Opportunity Type ,");
$mess.=nullvalid($content2,"Select Company Type ,");
$mess.=nullvalid($content3,"Select Job Structure ,");
$mess.=nullvalid($content4,"Select Post,");
$mess.=nullvalid($content5,"Enter Information,");
$mess.=nullvalid($content6,"Enter Date,");
$mess.=nullvalid($content7,"Enter Time,");

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
$ucontent6=$_POST['ucontent6'];
$ucontent7=$_POST['ucontent7'];
$ucontent8=$_POST['ucontent8'];

$mess.=nullvalid($ucontent1,"Select Company Name");
$mess.=nullvalid($ucontent2,"Select Opportunity Type ,");
$mess.=nullvalid($ucontent3,"Select Company Type ,");
$mess.=nullvalid($ucontent4,"Select Job Structure ,");
$mess.=nullvalid($ucontent5,"Select Post,");
$mess.=nullvalid($ucontent6,"Enter Information,");
$mess.=nullvalid($ucontent7,"Enter Date,");
$mess.=nullvalid($ucontent8,"Enter Time,");

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