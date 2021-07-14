<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("./db.php");


$a= $_POST["FName"];
$a1= $_POST["MName"];
$a2= $_POST["LName"];

$b= $_POST["Address"];
$c= $_POST["contactno"];
$d= $_POST["Email"];
$e= $_POST["skills"];
$f= $_POST["Facebook"];
$g= $_POST["Twitter"];
$h= $_POST["Youtube"];
$i= $_POST["Linkedin"];
$j= $_POST["Aboutus"];
$k= $_POST["Experience"];
$l= $_POST["Education"];
$m= $_POST["Hobby"];

$Teenp=$_POST["Teenp"];
$Teenyeary=$_POST["Teenyeary"];
$Twelvep=$_POST["Twelvep"];
$Twelveyear=$_POST["Twelveyear"];
$Firstp=$_POST["Firstp"];
$Firstyear=$_POST["Firstyear"];
$Secondp=$_POST["Secondp"];
$Secondyear=$_POST["Secondyear"];
$Thirdp=$_POST["Thirdp"];
$Thirdyear=$_POST["Thirdyear"];

$mess="";
$mess.=Fullnamevalid($a,"Enter First Name");
$mess.=Fullnamevalid($a1,"Enter Mid Name");
$mess.=Fullnamevalid($a2,"Enter Last Name");
$mess.=nullvalid($b,"Enter Address");
$mess.=nullvalid($c,"Enter Contact No");
$mess.=EmailValid($d,"Plz Enter Valid Email");
$mess.=nullvalid($e,"Enter skills");
$mess.=nullvalid($j,"Enter About Us Information");
$mess.=nullvalid($l,"Enter Education Information");
$mess.=nullvalid($m,"Enter Hobby");

$mess.=OnlyNumbervalid($Teenp,"Enter Valid 10th %, ");
$mess.=OnlyNumbervalid($Teenyeary,"Enter Valid 10th Passing Year, ");

$mess.=OnlyNumbervalid($Twelvep,"Enter Valid 12th %, ");
$mess.=OnlyNumbervalid($Twelveyear,"Enter Valid 12th Passing Year, ");

$mess.=OnlyNumbervalid($Firstp,"Enter Valid First Year %, ");
$mess.=OnlyNumbervalid($Firstyear,"Enter Valid First Passing Year, ");

$mess.=OnlyNumbervalid($Secondp,"Enter Valid Second Year %, ");
$mess.=OnlyNumbervalid($Secondyear,"Enter Valid Second Passing Year, ");

$mess.=OnlyNumbervalid($Thirdp,"Enter Valid Third Year %, ");
$mess.=OnlyNumbervalid($Thirdyear,"Enter Valid Third Pass Year, ");


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

	function OnlyNumbervalid($names,$nametital)
	{
		if($names!="")
		{
			if(!preg_match('/^[_0-9]+$/i',$names))
			{
				return $nametital;
			}
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
	$pics="profileicon.png";
	
if(isset($_FILES['Profilefile']['name']))
	{
$pics=time()."_".$_FILES['Profilefile']['name'];
move_uploaded_file($_FILES['Profilefile']['tmp_name'],"Admin/upload/".$pics); 
$_SESSION['userpic']=$pics;
	}
	else{
		$pics="profileicon.png";
	}
	
$bulkWrite = new MongoDB\Driver\BulkWrite;
$filter = ['_id' => new MongoDB\BSON\ObjectID($_SESSION['userid'])];
$update = ['$set' => [ 'Sid' => '1', 'FirstName' => $a, 'MidName' => $a1, 'LastName' => $a2, 'Email' => $d, 'photo' => $pics, 'Aboutus' => $j, 'Experience' => $k, 'Education' => $l, 'Hobby' => $m, 'Address' => $b, 'contactno' => $c, 'skills' => $e, 'Facebook' => $f, 'Twitter' => $g, 'Youtube' => $h, 'Linkedin' => $i, 'Teenp' => $Teenp, 'Teenyeary' => $Teenyeary, 'Twelvep' => $Twelvep, 'Twelveyear' => $Twelveyear, 'Firstp' => $Firstp, 'Firstyear' => $Firstyear, 'Secondp' => $Secondp, 'Secondyear' => $Secondyear, 'Thirdp' => $Thirdp, 'Thirdyear' => $Thirdyear ]];
$options = ['multi' => true, 'upsert' => false];   //All update
$bulkWrite->update($filter, $update, $options);
$manager->executeBulkWrite('tpp.Student', $bulkWrite); 

echo "<script> alert('Resume Update Successfully .!');</script>";
}
else
{
echo "<script> alert('Resume Update Fail - ".$mess."');</script>";
}

?>
