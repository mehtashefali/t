</br></br></br>
<div class="col-sm-12">
</br>
<style>
.mybtn {
	font-size:30px;
    height:50px;
    border:none;
    background:#00a6b2;
    color:#fff;
    padding:0px 20px;
    border-radius:4px;
    -webkit-border-radius:4px 4px 4px 4px;
}

</style>
<div style="text-align:center">
<h3>Test Result</h3>

<script type="text/javascript" src="jquery-2.js"></script>
<script type="text/javascript" src="jquery.js"></script>

<br><a class="mybtn" href="Main.php?page=2">Home</a>

</div>		



<div style="padding:0;background:#eef9f0;">
<form action="Main.php?page=14" method="POST" id="Qset">   


<section class="wrapper">

<h1>Quantative Aptitude</h1><br>
<?php
$Quantativemark=0;

if(isset($_POST['Quantative1']))
{
	for ($x = 1; $x <= 17; $x++) {

	if(isset($_POST['Quantative'.$x]))
	{
		if($_POST['Quantative'.$x] == $_POST['Quantative_C'.$x])
		{
			$Quantativemark=$Quantativemark+1;
			echo "Pass";
		}
		else
		{
			echo "Fail";
		}
	}

	} 
}

echo "Quantative Aptitude Result $Quantativemark Out Of 17.";
?>
		
		<br><br>
		
	  
<h1>Verbel Ability</h1><br>
<?php
$Verbelmark=0;

if(isset($_POST['Verbel1']))
{

	for ($x = 1; $x <= 20; $x++) {

	if(isset($_POST['Verbel'.$x]))
	{
		if($_POST['Verbel'.$x] == $_POST['Verbel_C'.$x])
		{
			$Verbelmark=$Verbelmark+1;
			echo "Pass";
		}
		else
		{
			echo "Fail";
		}
	}

	} 

echo "Verbel Ability Aptitude Result $Verbelmark Out Of 20.";


}
?>

		<br><br>

<h1>Logical Resoning</h1><br>
<?php
$Logicalmark=0;

if(isset($_POST['Logical1']))
{
	for ($x = 1; $x <= 15; $x++) {

	if(isset($_POST['Logical'.$x]))
	{
		if($_POST['Logical'.$x] == $_POST['Logical_C'.$x])
		{
			$Logicalmark=$Logicalmark+1;
			echo "Pass";
		}
		else
		{
			echo "Fail";
		}
	}

	} 

echo "Logical Resoning Aptitude Result $Logicalmark Out Of 15.";


}
?>

		<br><br>

<h1>Total</h1><br>
<?php
if(isset($_POST['Quantative1']))
{
	$tresult=$Quantativemark+$Verbelmark+$Logicalmark;
echo "Aptitude Result $tresult Out Of 52.";

}
?>
		
 </section>	
 
</form>   
</div>
</div>		


