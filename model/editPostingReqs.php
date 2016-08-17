<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$PID = trim($_GET['PID']);
$UID = trim($_SESSION['uid']);
$queryPost = "SELECT PosNumber, PosName, PosStatus, PosDept, PosDiv, PosCampus, PosDesc,
            OpenDate, CloseDate, PosCampus, JDOrgName, JDNewName, LastEdited  FROM Postings WHERE PostID='$PID'AND PostedByUID='$UID'";
$postdetails = mysqli_query($conn,$queryPost);

while($row = mysqli_fetch_array($postdetails)){
    $PosNumber = $row["PosNumber"];
    $PosName = $row["PosName"];
    $PosStatus = $row["PosStatus"];
    $PosDept = $row["PosDept"];
    $PosDiv = $row["PosDiv"];
    $PosCampus = $row["PosCampus"];
    $PosDesc = $row["PosDesc"];
    $OpenDate = $row["OpenDate"];
    $CloseDate = $row["CloseDate"];
    $PosCampus = $row["PosCampus"];
    $JDOrgName = $row["JDOrgName"];
    $JDNewName = $row["JDNewName"];
    $LastEdited = $row["LastEdited"];
}

$querydept= "SELECT DeptID,DeptName,DeptCode  FROM Departments";
$dept = mysqli_query($conn,$querydept);

$querycampus = "SELECT CampusID,CampusName FROM Campus";
$campus = mysqli_query($conn,$querycampus);

$querydiv = "SELECT DivID,DivName FROM Divisions";
$div = mysqli_query($conn,$querydiv);

$OrgDoc = $JDOrgName;
$DocFileLoc ='../uploads/jobdoc/'.$JDNewName;

?>