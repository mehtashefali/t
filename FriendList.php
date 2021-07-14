<?php
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("./db.php");

$a= $_POST["sid"];
//$filter = ['FirstName' => $a]; 

$filter = array();
$options =  array();

$query2 = new MongoDB\Driver\Query($filter,$options);
$cursor_c =$manager->executeQuery('tpp.Student', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Student', $query2);
$arr_c = $cursor_c1->toArray();

if(count($arr_c)>=1)
{
foreach ($cursor_c as $document_c) 
{	
$row = (array)$document_c;

//echo stripos($row['FirstName'].' '.$row['LastName'],$a);

if(stripos($row['FirstName'].' '.$row['LastName'],$a)!="")
{

?>

<a href="Main.php?page=1&uid=<?php echo $row['_id']; ?>"><img src="Admin/upload/<?php echo $row['photo']; ?>" style="border-radius: 50px;width:50px;height:50px" alt="" />
                    <span class="name"><?php echo $row['FirstName'].' '.$row['LastName']; ?></span>
                    <span class="preview"><?php echo $row['Email']; ?></span></a>
					<br><hr>
</a>				
<?php
}

}

}
?>
