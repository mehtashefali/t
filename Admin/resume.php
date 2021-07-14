<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
var myApp= angular.module("AngularApp",[]);
myApp.controller("HelloController", function($scope, $http,$sce){

var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "resumeaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});


});	

</script>
	<br>
        <div class="row">
            <div class="col-lg-12">

				<div ng-app="AngularApp">
				<div class="row" ng-controller="HelloController">
                        <header class="panel-heading">
          <h1>Student Resume</h1>
		<hr>
                        </header>
</div>			
</div>	
						






<div id="flash" class="flash"></div>
<div id="show" class="show"></div>



</div>			
</div>		
					
					