<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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

$scope.show_password1 = function(event)
{
	var test = angular.element("#show-password1");
	
    if (test.attr("id")=='show-password1') {
		//$("#" + passwordId).attr("type", "text");						
		$("#showpassword1").attr("type", "text");
		$("#showpasswordeye1").attr("class", "fa fa-eye-slash");
		$("#show-password1").attr("id", "hide-password1");
    } else {
      //$("#" + passwordId).attr("type", "password");
	  	$("#showpassword1").attr("type", "password");
		$("#showpasswordeye1").attr("class", "fa fa-eye");
		$("#hide-password1").attr("id", "show-password1");
    }
};

$scope.Reg_button = function(event)
{

$("#previewreg").html('');
$("#previewreg").html('<img src="loader.gif" alt="Uploading...."/>');

				$("#Regform").ajaxForm({
						target: '#previewreg'
					}).submit();
					
};
	
	
});	
</script>


<div class="reg-w3" ng-app="AngularApp" ng-controller="HelloController">
<div class="w3layouts-main">
<img src="logo.png" width="120px" class="center">
</br></br>
	<h2>Student Register</h2>
		<form id="Regform" action="Regpage.php" method="post" class="wpcf7-form" novalidate="novalidate">


			<select class="ggg" name="Campus" required="">
			<option value="">Select College Name</option>
			<option value="DYP Salunkenagar">DYP Salunkenagar</option>
			<option value="DYP Talsande">DYP Talsande</option>
			<option value="DYP KasbaBawada">DYP KasbaBawada</option>
			</select>
			<select class="ggg" name="Course" required="">
			<option value="">Select Course</option>
			<option value="CSC">CSE</option>
			<option value="ENTC">ENTC</option>
			<option value="MECH">MECH</option>
			<option value="Civil">Civil</option>
			</select>
			<input type="text" class="ggg" name="Graduation" placeholder="Enter Graduation Year" required="">

			<input type="Course" class="ggg" name="FName" placeholder="Enter First Name" required="">
			<input type="Course" class="ggg" name="MName" placeholder="Enter Middle Name" required="">
			<input type="Course" class="ggg" name="LName" placeholder="Enter Last Name" required="">

			<input type="Course" class="ggg" name="Email" placeholder="Enter Email" required="">
			<input type="Course" class="ggg" name="Mobile" placeholder="Enter Mobile No" required="">
			
			
			<div class="col-md-10">
			<input type="password" id="showpassword" class="ggg" name="Password" placeholder="Enter Password" required="" style="margin: 15px 500px 0px 15px;">
			</div>
			<div class="icon-box col-md-1" id="show-password" data-ng-click="show_password($event)" style="margin: 14px 0px;padding: 12px 12px 12px 12px;"><a class="agile-icon" ><i class="fa fa-eye" id="showpasswordeye"></i></a></div>
			
			<div class="col-md-10">
			<input type="password" id="showpassword1" class="ggg" name="RPassword" placeholder="Re-Enter Password" required="" style="margin: 15px 500px 0px 15px;">
			</div>
			<div class="icon-box col-md-1" id="show-password1" data-ng-click="show_password1($event)" style="margin: 14px 0px;padding: 12px 12px 12px 12px;"><a class="agile-icon"  ><i class="fa fa-eye" id="showpasswordeye1" ></i></a></div>
			
			
			<div class="card-heading"><div></div></div>
				<div class="clearfix"></div>
				<input type="button" value="submit" name="register" id="Reg_button" data-ng-click="Reg_button($event)">

		<div id="previewreg"></div>
		
		</form>
		
		
		<p>Already Registered.<a href="index.php">Login</a></p>
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
