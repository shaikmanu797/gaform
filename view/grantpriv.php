<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
if($_SESSION['loggedin']=='yes'&&$_SESSION['role']=='1'){
    require('../model/userDetails.php');
    require('../includes/topbar.php');
    echo '<body style="background-color: #16242F;"><nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://www.pace.edu/" target="_blank">'.$univ.'</a>
        </div>
        <ul class="nav navbar-nav">';
            if($_SESSION['role']=="1"){
                    echo '<li><a href="home.php">Home</a></li>
                            <li><a href="postjobs.php">Post a Job</a></li>
                            <li><a href="manageposts.php">Manage Posts</a></li>
                            <li><a href="applicants.php">Received Applications</a></li>
                            <li  class="active">
                            <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Administrator
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">                             
                            <li><a href="grantpriv.php">Manage Users</a></li>                             
                            <li><a href="#">Another action</a></li>                             
                            <li><a href="#">Something else here</a></li>                             
                            <li role="separator" class="divider"></li>                             
                            <li><a href="#">Separated link</a></li>                             
                            </ul>                             
                            </li>';
    }
            elseif($_SESSION['role']=="5"){
                    echo   '<li><a href="home.php">Home</a></li>
                            <li><a href="postjobs.php">Post a Job</a></li>
                            <li><a href="manageposts.php">Manage Posts</a></li>
                            <li><a href="applicants.php">Received Applications</a></li>';
            }

            else {
                    echo  '<li><a href="home.php">Home</a></li>
                           <li><a href="profile.php">Profile</a></li>
                           <li><a href="jobs.php">Jobs</a></li>
                           <li><a href="myapps.php">My Applications</a></li>';
            }
    echo '</ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>  '.$dbFullName.'</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class = "panel panel-default">
        <div class = "panel-body">';
    require("grantpriv-content.php");
    echo '</div>
    </div>
</div>
</body>';
}
else{
    echo "<script>alert('Please login with Admin credentials to view the homepage!');
        window.location.href='../index.php';</script>";
}

?>