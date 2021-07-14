<br><br><br>
<?php

$filter = ['_id' => new MongoDB\BSON\ObjectID($_SESSION['userid'])];
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
?>


<script type="text/javascript" src="js/jquery.form.js"></script>


<script type="text/javascript">
var myApp= angular.module("AngularApp",[]);
myApp.controller("HelloController", function($scope, $http,$sce){
	
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


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>



<div class="col-sm-12" ng-app="AngularApp" ng-controller="HelloController">

<div id="previewreg">
</div>
<form id="Regform" action="Resumepage.php" method="post" enctype="multipart/form-data">
<div class="resume">
<div class="resume_left">
<div class="resume_profile">

<style>
#dropnew{
background-color: #fff;
    padding: 100px 50px;
    margin-bottom: 30px;
    border: 5px dashed #F1F2F7;
    border-radius: 3px;
    border-image: url(../img/border-image.png) 25 repeat;
    text-align: center;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: bold;
    color: #7f858a;
}
</style>

<script>
   function chooseFile() {
      $("#fileInput").click();
   }
</script>
		
<style>
.choose_file{
    display:inline-block;    
    font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
    color: #7f7f7f;
	width:100%;
    background:white
}

.choose_file:hover{
	color: #000;
    background:#AAA;
}

.choose_file input[type="file"]{
    -webkit-appearance:none; 
    position:absolute;
    top:0; left:0;
    opacity:0; 
}
</style>
	
	
 <div id="dropnew" class="choose_file">
<input type="button" onclick="chooseFile();" value="Select Profile Photo" name="signin" class="form-control" style="background: #3578e5;background-color: #fff;font-size: 14px;height:80px;" id="FE11">
                                <input type="file" name="Profilefile" id="fileInput">
                            </div>     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold">First Name</p>
		   <input type="text" name="FName" placeholder="Enter First Name" value="<?php echo $row['FirstName']; ?>">
		   <p class="bold">Middle Name</p>
		   <input type="text" name="MName" placeholder="Enter Middle Name" value="<?php echo $row['MidName']; ?>">
		   <p class="bold">Last Name</p>
		   <input type="text" name="LName" placeholder="Enter Last Name" value="<?php echo $row['LastName']; ?>">
         </div>
		 
         <ul>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
            			   <input type="text" Name="Address" placeholder="Address" value="<?php echo $row['Address']; ?>">

           </li>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
             			   <input type="text" Name="contactno" placeholder="Contact No" value="<?php echo $row['contactno']; ?>">

           </li>
           <li>
             <div class="icon">
               <i class="fas fa-envelope"></i>
             </div>
             			   <input type="text" Name="Email" placeholder="Email" value="<?php echo $row['Email']; ?>">

           </li>
          
         </ul>
       </div>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">skill's</p>
         </div>
       		        <textarea placeholder="" id="f-name" class="form-control" Name="skills" placeholder="Skills" ><?php echo $row['skills']; ?></textarea>

       </div>
       <div class="resume_item resume_social">
         <div class="title">
           <p class="bold">Social</p>
         </div>
         <ul>
		
		 
           <li>
             <div class="icon">
               <i class="fab fa-facebook-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Facebook</p>
			   <input type="text" Name="Facebook" placeholder="Facebook" value="<?php echo $row['Facebook']; ?>">
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-twitter-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Twitter</p>
			   <input type="text" Name="Twitter" placeholder="Twitter" value="<?php echo $row['Twitter']; ?>">
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-youtube"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Youtube</p>
			   <input type="text" Name="Youtube" placeholder="Youtube" value="<?php echo $row['Youtube']; ?>">
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-linkedin"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Linkedin</p>
			   <input type="text" Name="Linkedin" placeholder="Linkedin" value="<?php echo $row['Linkedin']; ?>">
             </div>
           </li>
         </ul>
       </div>
     </div>
  </div>
  
  <div class="resume_right">
    <div class="resume_item resume_about">
<button type='button' style="Float:right;" id="Reg_button" data-ng-click="Reg_button($event)"  class='btn btn-default'>
        Save
        </button>&nbsp;
		
        <div class="title">  
		
		
           <p class="bold">About us</p>
         </div>
		        <textarea placeholder="" id="f-name" class="form-control" Name="Aboutus" placeholder="About Us" ><?php echo $row['Aboutus']; ?></textarea>

    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Work Experience</p>
         </div>
           <textarea placeholder="" id="f-name" class="form-control" Name="Experience" placeholder="Work Experience" ><?php echo $row['Experience']; ?></textarea>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Education</p>
         </div>
        <textarea placeholder="" id="f-name" class="form-control" Name="Education" placeholder="Education" ><?php echo $row['Education']; ?></textarea>
    </div>
    <div class="resume_item resume_hobby">
      <div class="title">
           <p class="bold">Hobby</p>
		  <textarea placeholder="" id="f-name" class="form-control" Name="Hobby" placeholder="Hobby" ><?php echo $row['Hobby']; ?></textarea>

         </div>
      
    </div>
	
<div class="resume_item resume_hobby">
<div class="table-responsive">
<table class="table table-striped b-t b-light">
<thead><tr>
<th>Class</th>
<th>%</th>
<th>Year</th>
<td></td>
</tr>
</thead>
<tbody>

<tr>
<td>10th %</td>
<td><input type="text" Name="Teenp" placeholder="%" value="<?php echo $row['Teenp']; ?>"></td>
<td><input type="text" Name="Teenyeary" placeholder="Year" value="<?php echo $row['Teenyeary']; ?>"></td>
</tr>

<tr>
<td>12th %</td>
<td><input type="text" Name="Twelvep" placeholder="%" value="<?php echo $row['Twelvep']; ?>"></td>
<td><input type="text" Name="Twelveyear" placeholder="Year" value="<?php echo $row['Twelveyear']; ?>"></td>
</tr>

<tr>
<td>First Year %</td>
<td><input type="text" Name="Firstp" placeholder="%" value="<?php echo $row['Firstp']; ?>"></td>
<td><input type="text" Name="Firstyear" placeholder="Year" value="<?php echo $row['Firstyear']; ?>"></td>
</tr>

<tr>
<td>Second Year %</td>
<td><input type="text" Name="Secondp" placeholder="%" value="<?php echo $row['Secondp']; ?>"></td>
<td><input type="text" Name="Secondyear" placeholder="Year" value="<?php echo $row['Secondyear']; ?>"></td>
</tr>

<tr>
<td>Third Year %</td>
<td><input type="text" Name="Thirdp" placeholder="%" value="<?php echo $row['Thirdp']; ?>"></td>
<td><input type="text" Name="Thirdyear" placeholder="Year" value="<?php echo $row['Thirdyear']; ?>"></td>
</tr>

</tbody>
</table>
</div>
</div>


</div>

</div>
</form>

</div>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: "Montserrat", sans-serif;
}

body {
  background: #585c68;
  font-size: 14px;
  line-height: 22px;
  color: #555555;
}

.bold {
  font-weight: 700;
  font-size: 20px;
  text-transform: uppercase;
}

.semi-bold {
  font-weight: 500;
  font-size: 16px;
}

.resume {
  width: 800px;
  height: auto;
  display: flex;
  margin: 50px auto;
}

.resume .resume_left {
  width: 280px;
  background: #0bb5f4;
}

.resume .resume_left .resume_profile {
  width: 100%;
  height: 280px;
}

.resume .resume_left .resume_profile img {
  width: 100%;
  height: 100%;
}

.resume .resume_left .resume_content {
  padding: 0 25px;
}

.resume .title {
  margin-bottom: 20px;
}

.resume .resume_left .bold {
  color: #fff;
}

.resume .resume_left .regular {
  color: #b1eaff;
}

.resume .resume_item {
  padding: 25px 0;
  border-bottom: 2px solid #b1eaff;
}

.resume .resume_left .resume_item:last-child,
.resume .resume_right .resume_item:last-child {
  border-bottom: 0px;
}

.resume .resume_left ul li {
  display: flex;
  margin-bottom: 10px;
  align-items: center;
}

.resume .resume_left ul li:last-child {
  margin-bottom: 0;
}

.resume .resume_left ul li .icon {
  width: 35px;
  height: 35px;
  background: #fff;
  color: #0bb5f4;
  border-radius: 50%;
  margin-right: 15px;
  font-size: 16px;
  position: relative;
}

.resume .icon i,
.resume .resume_right .resume_hobby ul li i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.resume .resume_left ul li .data {
  color: #b1eaff;
}

.resume .resume_left .resume_skills ul li {
  display: flex;
  margin-bottom: 10px;
  color: #b1eaff;
  justify-content: space-between;
  align-items: center;
}

.resume .resume_left .resume_skills ul li .skill_name {
  width: 25%;
}

.resume .resume_left .resume_skills ul li .skill_progress {
  width: 60%;
  margin: 0 5px;
  height: 5px;
  background: #009fd9;
  position: relative;
}

.resume .resume_left .resume_skills ul li .skill_per {
  width: 15%;
}

.resume .resume_left .resume_skills ul li .skill_progress span {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  background: #fff;
}

.resume .resume_left .resume_social .semi-bold {
  color: #fff;
  margin-bottom: 3px;
}

.resume .resume_right {
  width: 520px;
  background: #fff;
  padding: 25px;
}

.resume .resume_right .bold {
  color: #0bb5f4;
}

.resume .resume_right .resume_work ul,
.resume .resume_right .resume_education ul {
  padding-left: 40px;
  overflow: hidden;
}

.resume .resume_right ul li {
  position: relative;
}

.resume .resume_right ul li .date {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 15px;
}

.resume .resume_right ul li .info {
  margin-bottom: 20px;
}

.resume .resume_right ul li:last-child .info {
  margin-bottom: 0;
}

.resume .resume_right .resume_work ul li:before,
.resume .resume_right .resume_education ul li:before {
  content: "";
  position: absolute;
  top: 5px;
  left: -25px;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  border: 2px solid #0bb5f4;
}

.resume .resume_right .resume_work ul li:after,
.resume .resume_right .resume_education ul li:after {
  content: "";
  position: absolute;
  top: 14px;
  left: -21px;
  width: 2px;
  height: 115px;
  background: #0bb5f4;
}

.resume .resume_right .resume_hobby ul {
  display: flex;
  justify-content: space-between;
}

.resume .resume_right .resume_hobby ul li {
  width: 80px;
  height: 80px;
  border: 2px solid #0bb5f4;
  border-radius: 50%;
  position: relative;
  color: #0bb5f4;
}

.resume .resume_right .resume_hobby ul li i {
  font-size: 30px;
}

.resume .resume_right .resume_hobby ul li:before {
  content: "";
  position: absolute;
  top: 40px;
  right: -52px;
  width: 50px;
  height: 2px;
  background: #0bb5f4;
}

.resume .resume_right .resume_hobby ul li:last-child:before {
  display: none;
}
</style>

<?php
}
}
?>