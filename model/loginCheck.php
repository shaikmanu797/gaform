<?php
/*Created by
Mansoor Baba Shaik
*/
session_start();
$email = trim($_POST['emailid']);
$pwd = trim($_POST['pwd']);
date_default_timezone_set("America/New_York");
$today = date("Y-m-d H:i:s");

require_once('config.php');

//Retrieve stored password based on user input Email
$stmt = $conn->prepare("SELECT UID,Pwd FROM UserInfo WHERE Email=? LIMIT 1");
$stmt->bind_param("s",$email);
$stmt->execute();
/* bind variables to prepared statement */
$stmt->bind_result($uid, $unhashpwd);
$stmt->fetch();
$stmt->close();

//Compare user input password with stored password in database if true allow user to login
if(password_verify($pwd,$unhashpwd)){
    $_SESSION['uid']=$uid;
    $_SESSION['random']=uniqid("",TRUE);
    //Retrieve User Role to view pages and posts
    $stmt = $conn->prepare("SELECT Role FROM UserRoles WHERE UID=? LIMIT 1");
    $stmt->bind_param("s",$uid);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->fetch();
    $stmt->close();

    $_SESSION['role']=$role;
    $_SESSION['loggedin']='yes';

    //Track user activity to store last login activity
    $query = "SELECT DATE_FORMAT(LastLogin,'%d-%b-%Y %h:%i %p') FROM UserActivity WHERE UID=UPPER('$uid')";
    $result = mysqli_query($conn,$query);
    $lastlogin = mysqli_fetch_row($result);
    $_SESSION['lastlogin'] = $lastlogin[0];

    if(mysqli_num_rows($result)==0){
        $stmt = $conn->prepare("INSERT INTO UserActivity(UID,RandomKey,LastLogin) VALUES(?,?,?)");
        $stmt->bind_param("sss",$_SESSION['uid'],$_SESSION['random'],$today);
        $stmt->execute();
        $stmt->close();
    }
    else{
        $stmt = $conn->prepare("UPDATE UserActivity SET RandomKey=?,LastLogin=? WHERE UID=?");
        $stmt->bind_param("sss",$_SESSION['random'],$today,$_SESSION['uid']);
        $stmt->execute();
        $stmt->close();
    }
    //If user credentials are verified allow the user to continue
    if($_SESSION['role']=="10") {
        header('Location:../view/home.php');
    }
    elseif($_SESSION['role']=='1' || $_SESSION['role']=='5'){
        header('Location:../view/home.php');
    }
    else{
        echo "<script>alert('Your account is inactive. Please contact Administrator!');
        window.location.href='../index.php';</script>";
    }
}
else{
    echo "<script>alert('Please enter correct password to login!');
        window.location.href='../index.php';</script>";
}
$conn->close();
?>