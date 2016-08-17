<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$stmt = $conn->prepare("SELECT FName, LName, Email FROM UserInfo WHERE UID=? LIMIT 1");
$stmt->bind_param("s",$_SESSION['uid']);
$stmt->execute();
$stmt->bind_result($dbFName,$dbLName,$dbEmail);
$stmt->fetch();
$stmt->close();
$dbFullName = $dbFName." ".$dbLName;
$_SESSION['userName'] = $dbFullName;

//School names for drop-down
$query1 = "SELECT SchoolName, SchoolId FROM School";
$school = mysqli_query($conn,$query1);

//Program names for drop-down
$query2 = "SELECT ProgramCode, ProgramName FROM Programs";
$program = mysqli_query($conn,$query2);

?>