<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$querydept= "SELECT DeptID,DeptName,DeptCode  FROM Departments";
$dept = mysqli_query($conn,$querydept);

$querycampus = "SELECT CampusID,CampusName FROM Campus";
$campus = mysqli_query($conn,$querycampus);

$querydiv = "SELECT DivID,DivName FROM Divisions";
$div = mysqli_query($conn,$querydiv);

$conn->close();

?>