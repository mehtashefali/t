<?php
include('./db.php');

if(!isset($_SESSION['userid']) and !isset($_SESSION['username']))
{
		header("Location:index.php");
}

if(isset($_SESSION['userid']) and isset($_SESSION['username']))
{
$id=$_SESSION['userid'];
$filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
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
$_SESSION['avgmark']= ($row['Teenp']+$row['Twelvep']+$row['Firstp']+$row['Secondp']+$row['Thirdp'])/5;
$_SESSION['userpic']= $row['photo'];
}
}

}

?>
<!DOCTYPE html>
<head>
<title>TPP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script src="angular.min.js"></script>

</head>
<body id="bodymystyle">
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
	                <img alt="" src="Admin/upload/<?php echo $_SESSION['userpic']; ?>" style="border-radius: 50px;width:100px;height:100px;"><br>
<?php echo $_SESSION['username']; ?>                      
                    
                </li>
                
	
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-comment"></i>
                <span class="badge bg-important"></span>
            </a>
            <ul class="dropdown-menu extended inbox">

                <li>
				
<?php

$rid= $_SESSION['userid'];

$filter = array();
$options =  array();

$query2 = new MongoDB\Driver\Query($filter,$options);
$cursor_c =$manager->executeQuery('tpp.Message', $query2);
$cursor_c1 =$manager->executeQuery('tpp.Message', $query2);
$arr_c = $cursor_c1->toArray();

if(count($arr_c)>=1)
{
foreach ($cursor_c as $document_c) 
{	
$row = (array)$document_c;

if(($row['View']=='N' and $row['Rid']==$rid))
{
?>

<div style="border: 1px solid var(--light);width:400px;float:left;padding: 5px 10px;margin: 5px 10px;border-radius: 20px;color:#000;">
                    <span class="name"><?php echo $row['Mess']; ?></span><br>
                    <span class="preview" style="font-size:13px"><?php echo $row['Messdate']; ?></span>
					</div>
					<br>

<?php
$bulkWrite = new MongoDB\Driver\BulkWrite;
$filter = ['_id' => new MongoDB\BSON\ObjectID($row['_id'])];
$update = ['$set' => ['View' => 'Y']];
$options = ['multi' => true, 'upsert' => false];   //All update
$bulkWrite->update($filter, $update, $options);
$manager->executeBulkWrite('tpp.Message', $bulkWrite); 

}


}

}
?>
				
                    <a href="Main.php?page=1">See all messages</a>
                </li>
				
				
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell"></i>
                <span class="badge bg-warning"></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
				<li>
				
					<?PHP
$divcount=0;

$filter = array();
$options =  array();
$query = new MongoDB\Driver\Query($filter,$options);
$cursor =$manager->executeQuery('tpp.Opportunity', $query);
foreach ($cursor as $document) 
{
$row = (array)$document;
$divcount=$divcount+1;
?>

<div id="myimg_<?php echo $divcount; ?>">
<div class="panel panel-default" id="mydiv" >
<div class="">
<br>
<div id="myimg"><img src="images/<?php echo $row['Company']; ?>.jpg" style="width:30px;height:30px;border-radius: 30%;"></div>
<span class=""><a class="" href=""><?php echo $row['OpportunityType']; ?> (<?php echo $row['CompanyType']; ?>).</a></span><br>
<span>Graduate Engineer Trainee</span><span>|</span><span><?php echo $row['CompanyType']; ?></span>
<div class="title1">
<span class="title1">Criteria - <?php echo $row['Criteria']; ?>%</span>
</div>
<div class="title">
 <i class="fa fa-clock-o"></i><span class="title" >Date time On <?php echo $row['dateof']; ?> <?php echo $row['timein']; ?>&nbsp;&nbsp;</span>
</div>
<br><br>
</div>
</div>
</div>
<?php
}
?>
		

                    <a href="Main.php?page=3">See all</a>
                </li>
            </ul>
        </li>               
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="Admin/upload/<?php echo $_SESSION['userpic']; ?>">
                <span class="username"><?php echo $_SESSION['username']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="Main.php?page=7"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="Main.php?page=8"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="index.php?Logout=Logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
<?php
include("menubar.php")
?> 
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


if(!isset($_GET['page']))
{
include("home.php");
}
if($_GET['page']=='1' or $_GET['page']=='0')
{
include("message.php");
}
elseif($_GET['page']=='2')
{
include("userAssessment.php");
}
elseif($_GET['page']=='3')
{
include("useropprtunity.php");
}
elseif($_GET['page']=='4')
{
include("userapplication.php");
}
elseif($_GET['page']=='5')
{
include("uoffers.php");
}
elseif($_GET['page']=='6')
{
include("usersresume.php");
}
elseif($_GET['page']=='7')
{
include("usersresume.php");
}
elseif($_GET['page']=='8')
{
include("ueditresume.php");
}
elseif($_GET['page']=='9')
{
include("unilhent.php");
//include("usermenulist.php");
}
elseif($_GET['page']=='10')
{
include("unilhentapp.php");
//include("ubill.php");
}
elseif($_GET['page']=='11')
{
include("unilhentoffer.php");
//include("ubill.php");
}
elseif($_GET['page']=='12')
{
include("uquantative.php");
}
elseif($_GET['page']=='13')
{
include("test.php");
}
elseif($_GET['page']=='14')
{
include("testresult.php");
}
else
{
//include("home.php");
}
?>

</br>
 <!-- footer -->
		  
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>



<style>
.btn btn-default
{
	width:50px;
	
}
#mydiv
{
padding-left: 6px;
padding-right: 10px;
padding-top:0px;
padding-bottom: 30px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
}

#mydivnotification
{
padding-left: 6px;
padding-right: 10px;
padding-top:0px;
padding-bottom: 30px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
background: #66ccff;
}

#myresume
{
padding-left: 6px;
padding-right: 10px;
padding-top:10px;
padding-bottom:10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 255, 0.5);
margin-bottom: 0.625rem;
border-radius: 20px;
font-size:90%;
color:black;
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
#myimg
{
	width:30px;
	height:30px;
	background: #0000ff;
	border-radius: 80%;
	float:left;
	margin-right: 0.625rem;
}

.myimg1
{
	width:27px;
	height:27px;
	background: #0000ff;
	border-radius: 80%;
	float:right;
	margin: 5px;
	padding: 0px 0px 5px 5px;

}

#mydelete
{
	width:15px;
	height:15px;
	border-radius: 80%;
	float:right;
	color:black;

}


</style>

<style>
ul.sidebar-menu {
    padding-top: 150px;
}

.brand {
    background: #8b5c7e;
    float: left;
    width: 240px;
    height: 90px;
    position: relative;
}
a.logo {
    font-size: 20px;
    color: #fff;
    float: left;
    margin: 30px 0 0 25px;
    
}
.market-update-block h4 {
    font-size: 17px;
    color: black;
    margin: 0.3em 0em;
}
.market-update-block.clr-block-4 {
    background: pink;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
}

 
</style>
