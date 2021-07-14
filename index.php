<?php
include('./db.php');

if(isset($_GET["Logout"]))
{


$_SESSION['userid']= "";
$_SESSION['username']= "";
$_SESSION['useremail']= "";
$_SESSION['userpic']= "";
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['useremail']);
unset($_SESSION['userpic']);
}

if(isset($_SESSION['userid']) and isset($_SESSION['username']))
{
		header("Location:Main.php");
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
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="angular.min.js"></script>

<style>
 /*--placeholder-color--*/
::-webkit-input-placeholder {
	color:#fff !important;
}
:-moz-placeholder { /* Firefox 18- */
	color:#fff !important; 
}
::-moz-placeholder {  /* Firefox 19+ */
	color:#fff !important;
}
:-ms-input-placeholder {  
	color:#fff !important;
}
/*--//placeholder-color--*/
</style>

</head>

<body id="bodymystyle1">

<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
var myApp= angular.module("AngularApp",[]);
myApp.controller("HelloController", function($scope, $http,$sce){

$scope.show_password = function(event)
{
	var test = angular.element("#show-password");
	
	if (test.attr("id")=='show-password') {
		//$("#" + passwordId).attr("type", "text");						
		$("#showpassword").attr("type", "text");
		$("#showpasswordeye").attr("class", "fa fa-eye-slash");
		$("#show-password").attr("id", "hide-password");
    } else {
      //$("#" + passwordId).attr("type", "password");
	  	$("#showpassword").attr("type", "password");
		$("#showpasswordeye").attr("class", "fa fa-eye");
		$("#hide-password").attr("id", "show-password");
    }
};

$scope.Log_button = function(event)
{

$("#previewlog").html('');
$("#previewlog").html('<img src="loader.gif" alt="Uploading...."/>');

				$("#Logform").ajaxForm({
						target: '#previewlog'
					}).submit();
					
};
	
	
});	
</script>





<div class="log-w3" ng-app="AngularApp" ng-controller="HelloController">
<div class="w3layouts-main">
<img src="logo.png" width="120px" class="center">
</br></br>
	<h2>Student Sign In</h2>
<form id="Logform" action="Logpage.php" method="post" >
			<div class="col-md-12">
			<input type="email" class="ggg" name="Email" placeholder="E-MAIL" required="" style="margin: 15px 20px 0px 15px;">
			</div>
			<div class="col-md-10">
			<input type="password" id="showpassword" class="ggg" name="Password" placeholder="PASSWORD" required="" style="margin: 15px 500px 0px 15px;">
			</div>
			<div class="icon-box col-md-1" id="show-password" data-ng-click="show_password($event)" style="margin: 14px 0px;padding: 12px 12px 12px 12px;"><a class="agile-icon" ><i class="fa fa-eye" id="showpasswordeye"></i></a></div>
                         
						
				<div class="clearfix"></div>
						<input type="button" value="Sign In" name="login" id="Log_button" data-ng-click="Log_button($event)">

		<div id="previewlog"></div>
		</form>
		<p>Don't Have an Account ?<a href="uregistration.php">Create an account</a></p>
		
		<h6><a href="Forgot.php">Forgot Password?</a></h6>
		
<input type="button" value="Click Hear To Admin Sign In" onclick="window.location.href='Admin/index.php'; ;return false;" >

</div>
</div>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
