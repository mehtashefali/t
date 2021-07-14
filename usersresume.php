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





<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="resume">

   <div class="resume_left">
     <div class="resume_profile">
       <img src="Admin/upload/<?php echo $row['photo']; ?>" alt="profile_pic">
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold"><?php echo $row['FirstName'].' '.$row['MidName'].' '.$row['LastName']; ?></p>
           <p class="regular"><?php echo $row['Email']; ?></p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
             <div class="data">
               <?php echo $row['Address']; ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-mobile-alt"></i>
             </div>
             <div class="data">
               <?php echo $row['contactno']; ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-envelope"></i>
             </div>
             <div class="data">
               <?php echo $row['Email']; ?>
             </div>
           </li>
          
         </ul>
       </div>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">skill's</p>
         </div>
         <ul>
           
             <div class="skill_name">
               <?php echo $row['skills']; ?>
             </div>
            

           
         </ul>
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
               <p><?php echo $row['Facebook']; ?></p>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-twitter-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Twitter</p>
               <p><?php echo $row['Twitter']; ?></p>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-youtube"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Youtube</p>
               <p><?php echo $row['Youtube']; ?></p>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-linkedin"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Linkedin</p>
               <p><?php echo $row['Linkedin']; ?></p>
             </div>
           </li>
         </ul>
       </div>
     </div>
  </div>
  
  <div class="resume_right">
    <div class="resume_item resume_about">
<a href="Main.php?page=8" class='btn btn-default'>
        <span class='glyphicon glyphicon-edit' />
        </a>&nbsp;

	<a href="uprintresume.php" class='btn btn-default'>
        <span class='glyphicon glyphicon-print' />
        </a>&nbsp;
		
        <div class="title">  
		
		
           <p class="bold">About us</p>
         </div>
        <p><?php echo $row['Aboutus']; ?></p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Work Experience</p>
         </div>
        <ul>
            <li>
                <div class="info">
                  <p><?php echo $row['Experience']; ?></p>
                </div>
            </li>

        </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Education</p>
         </div>
      <ul>
            <li>
                <div class="info">
                  <p><?php echo $row['Education']; ?></p>
                </div>
            </li>

        </ul>
    </div>
	
	    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Hobby</p>
         </div>
      <ul>
            <li>
                <div class="info">
                  <p><?php echo $row['Hobby']; ?></p>
                </div>
            </li>

        </ul>
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
<td><?php echo $row['Teenp']; ?>%</td>
<td><?php echo $row['Teenyeary']; ?></td>
</tr>

<tr>
<td>12th %</td>
<td><?php echo $row['Twelvep']; ?>%</td>
<td><?php echo $row['Twelveyear']; ?></td>
</tr>

<tr>
<td>First Year %</td>
<td><?php echo $row['Firstp']; ?>%</td>
<td><?php echo $row['Firstyear']; ?></td>
</tr>

<tr>
<td>Second Year %</td>
<td><?php echo $row['Secondp']; ?>%</td>
<td><?php echo $row['Secondyear']; ?></td>
</tr>

<tr>
<td>Third Year %</td>
<td><?php echo $row['Thirdp']; ?>%</td>
<td><?php echo $row['Thirdyear']; ?></td>
</tr>

</tbody>
</table>
      
    </div>
	
  </div>
  

  </div>
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