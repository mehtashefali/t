<div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                
				<li class="sub-menu">
                    <a href="AdminMain.php?page=2">
                        <i class="fa fa-book"></i>
                        <span>Assessments and Practice Test</span>
                    </a>
                </li>
				
                 <li class="sub-menu">
                    <a href="AdminMain.php?page=3">
                        <i class="fa fa-star"></i>
                        <span>Opportunities</span>
                    </a>
                </li>
				
<?php
if(isset($_SESSION['usertype']) and $_SESSION['usertype']=="Admin")
{
?>				
       
				 <li class="sub-menu">
                    <a href="AdminMain.php?page=4">
                        <i class="fa fa-file"></i>
                        <span>Applications</span>
                    </a>
                    
                </li>
				 <li class="sub-menu">
                    <a href="AdminMain.php?page=5">
                        <i class="fa fa-plus"></i>
                        <span>Offers</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="AdminMain.php?page=7">
                        <i class="fa fa-file"></i>
                        <span>Resumes</span>
						
                    </a>
                 </li>
				 
				                    
                 <li class="sub-menu">
                    <a href="AdminMain.php?page=10">
                        <i class="fa fa-file"></i>
                        <span>Admin</span>
                    </a>
                 </li>
				 
<?php
}
?>				
       				 
                <li>
                    <a href="index.php?Logout=Logout">
                        <i class="fa fa-user"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>