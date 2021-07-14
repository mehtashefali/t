<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("./db.php");


$a= $_POST["Campus"];
$a1= $_POST["Course"];
$b= $_POST["Graduation"];

$c= $_POST["FName"];
$c1= $_POST["MName"];
$c2= $_POST["LName"];

$d= $_POST["Email"];
$e= $_POST["Password"];
$F= $_POST["RPassword"];
$g= $_POST["Mobile"];


$mess="";
$mess.=nullvalid($a,"Select College Name");
$mess.=nullvalid($a1,"Select Course Name");
$mess.=nullvalid($b,"Enter Graduation");
$mess.=nullvalid($g,"Enter Mobile No.");

$mess.=Fullnamevalid($c,"Enter First Name");
$mess.=Fullnamevalid($c1,"Enter Mid Name");
$mess.=Fullnamevalid($c2,"Enter Last Name");

$mess.=EmailValid($d,"Plz Enter Email");
$mess.=DatbaseValid($d,"Email All Ready Register");
$mess.=Passvalid($e,"Plz Enter Password",8);
$mess.=EqualValid($e,$F,"Password Conformation Fail");


	//++++++++Full Name Only+++++++++++++++
	function Fullnamevalid($names,$nametital)
	{
         if(!preg_match('/^[_a-z]+$/i',$names))
         {
         return $nametital.", ";
         }
	}

	//++++++++Email Valid+++++++++++++++
	function EmailValid($names,$nametital)
	{
		if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $names))
		{
			 return $nametital.", ";
		}
	}

		//++++++++Not Empty+++++++++++++++
	function nullvalid($names,$nametital)
	{
		if($names=="")
		{
         return $nametital.", ";
		}	
	}

//++++++++Data Base Valid+++++++++++++++
	function DatbaseValid($valuechk,$nametital)
	{
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$filter = ['Email' => $valuechk]; 
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor1 =$manager->executeQuery('tpp.Student', $query);
$arr = $cursor1->toArray();
if(count($arr)>=1)
{
		 return $nametital.", ";
}

	}
	
	
	function Passvalid($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length), ";
		}
	}

//++++++++Equal Valid+++++++++++++++
	function EqualValid($names1,$names2,$nametital)
	{
		if($names1!=$names2 || $names1=="")
		{
			 return $nametital.", ";
		}
	}


if($mess=="")
{



$bulkWrite = new MongoDB\Driver\BulkWrite;
$doc = [ 'Sid' => '1', 'Campus' => $a, 'Course' => $a1, 'Graduation' => $b, 'FirstName' => $c, 'MidName' => $c1, 'LastName' => $c2, 'Email' => $d, 'Password' => $e, 'photo' => 'profileicon.png', 'Aboutus' => '', 'Experience' => '', 'Education' => '', 'Hobby' => '', 'Address' => '', 'contactno' => $g, 'skills' => '', 'Facebook' => '', 'Twitter' => '', 'Youtube' => '', 'Linkedin' => '', 'Teenp' => '0', 'Teenyeary' => '0', 'Twelvep' => '0', 'Twelveyear' => '0', 'Firstp' => '0', 'Firstyear' => '0', 'Secondp' => '0', 'Secondyear' => '0', 'Thirdp' => '0', 'Thirdyear' => '0'];         
$bulkWrite->insert($doc);
$manager->executeBulkWrite('tpp.Student', $bulkWrite);

echo "<script> alert('Student Registration Successfully .!'); location.href='index.php';</script>";
}
else
{
echo "<font color='#990000' >Student Registration Fail :- ".$mess."</font>";
}

?>
