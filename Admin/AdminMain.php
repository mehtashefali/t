<?php
include('../db.php');

if(isset($_POST["signin"]))
{

$filter = ['Email' => $_POST["Email"],'Pass' => $_POST["Password"]]; 
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.admin', $query);
$cursor1 =$manager->executeQuery('tpp.admin', $query);
$arr = $cursor1->toArray();

if(count($arr)>=1)
{
foreach ($cursor as $document) 
{	
$a = (array)$document;
$_SESSION['userid']= $a['_id'];
$_SESSION['username']= $a['Uname'];
$_SESSION['usertype']= $a['Utyp'];

}
}

}

if(!isset($_SESSION['userid']) and !isset($_SESSION['username']))
{
		header("Location:index.php");
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

<?php
echo $_SESSION['username'];
?>                      
                    
                </li>
                <h5>
	
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>



</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <?php
include("Adminmenubar.php")
?> 

</aside>


<section id="main-content">
<section class="wrapper">
<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


if(!isset($_GET['page']) or $_GET['page']=='1' or $_GET['page']=='0')
{
//include("Question.php");
}
elseif($_GET['page']=='2')
{
include("Question.php");
}
elseif($_GET['page']=='3')
{
include("Opportunity.php");
}
elseif($_GET['page']=='4')
{
include("application.php");
}
elseif($_GET['page']=='5')
{
include("Offer.php");
}
elseif($_GET['page']=='6')
{
include("usersresume.php");
}
elseif($_GET['page']=='7')
{
include("resume.php");
}
elseif($_GET['page']=='8')
{
include("menulist.php");
}
elseif($_GET['page']=='9')
{
include("order.php");
}
elseif($_GET['page']=='10')
{
	include("Admin.php");
}
else
{
include("home.php");
}
?>


</br>
</section>
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
