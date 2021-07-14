</br></br>
<div class="col-sm-12">
</br>
				
                        <header class="panel-heading">
						<b><h3></br>Assessment and Practice Test</b></h3>
							</header>		
<br>


<?PHP
$id=$_SESSION['userid'];

$filter1 = [];

$query2 = new MongoDB\Driver\Query($filter1);
$cursor_c =$manager->executeQuery('tpp.Company', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Company', $query2);
$arr_c = $cursor_c1->toArray();

if(count($arr_c)>=1)
{

foreach ($cursor_c as $document_c) 
{	
$row_c = (array)$document_c;

?>

<div class="col-sm-3" id="mydiv">
<div class="">
<div id="myimgpage">
<img alt="testThumbnail" class="testThumbnail" src="images/<?php echo $row_c['Cname']; ?>.jpg"></div>
</br></br></br></br></br>
<span class=""><a class="" href="">&nbsp;&nbsp;<?php echo $row_c['Cname']; ?> <br> Mock Test</a></span><br>
<hr>
<div>
<span id="mybutton">Quantitative</span>
<span id="mybutton">Verbel Ability</span><br>
<span id="mybutton">Logical Reasoning</span></div> 
</div> 

<hr>

                        <i class="fa fa-question"></i>&nbsp;&nbsp;<span>52 Question</span></br>
                       <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<span>0 hr 48 min</span></br></br>

                
<div style="text-align: center;">
<a href="Main.php?page=12&key=<?php echo $row_c['Cname']; ?>"  class="mybtn">Start Test</a>
</div>
	  
</div>

<div class="col-sm-3" id="mydiv"><div class="">
<div id="myimgpage"><img alt="testThumbnail" class="testThumbnail" src="images/<?php echo $row_c['Cname']; ?>.jpg"></div></br></br></br></br></br>
<span class=""><a class="" href="">&nbsp;&nbsp;<?php echo $row_c['Cname']; ?> <br> Practice Test</a></span><br>
<hr>
<div>
<span id="mybutton">Quantitative</span>
<span id="mybutton">Verbel Ability</span><br>
<span id="mybutton">Logical Reasoning</span></div> 
</div> 

<hr>

                        <i class="fa fa-question"></i>&nbsp;&nbsp;<span>52 Question</span></br>
                       <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<span>0 hr 48 min</span></br></br>

                
<div style="text-align: center;">
<a href="Main.php?page=12&key=<?php echo $row_c['Cname']; ?>"  class="mybtn">Start Test</a>
</div>
	  
</div>
<?php
}

}
?>

	  
	  
</div></div>



	  
      
</div>		

<style>
#mydiv
{
padding-left: 50px;
padding-right: 30px;
padding-top: 10px;
padding-bottom: 10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
}

#myimgpage
{
	width:80px;
	height:80px;`
	background: #0000ff;
	border-radius: 80%;
	float:left;
	margin-right: 0.625rem;
}

#mybutton
{
color: rgba(0, 0, 0, 0.87);
    border: none;
    cursor: default;
    height: 32px;
    display: inline-flex;
    outline: none;
    padding: 10px;
	margin-right: 10px;
    font-size: 0.8125rem;
    box-sizing: border-box;
    transition: background-color 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    align-items: center;
    font-family: SF Pro Display,"Helvetica Neue",Arial,sans-serif;
    white-space: nowrap;
    border-radius: 16px;
    vertical-align: middle;
    justify-content: center;
    text-decoration: none;
    background-color: #e0e0e0;
	font-size:70%;

}	
.testThumbnail {
    padding: 15px;
    height: 150px;
	width: 200px;
}

a {
    color: black;
    text-decoration: none;
}
.mybtn {
	float:center;
	font-size:20px;
	margin-right:10px;
    height:40px;
    border:none;
    background:#00a6b2;
    color:#fff;
    padding:5px 5px;
    border-radius:4px;
    -webkit-border-radius:4px 4px 4px 4px;
}
.panel-heading {
    position: relative;
    height: 57px;
    line-height: 57px;
    letter-spacing: 0.2px;
    color: black;
    font-size: 18px;
    font-weight: 400;
    padding: 0 16px;
    background:#dea1e2;
   border-top-right-radius: 2px;
   border-top-left-radius: 2px; 
    text-transform: uppercase;
    text-align: center;
}
</style>