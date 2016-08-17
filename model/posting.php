<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
require_once('config.php');
if($_POST['formName']=="postjob") {
    $PostID = trim($_GET['id']);
    $UID = trim($_SESSION['uid']);
    $Role = trim($_SESSION['role']);
    $PosNumber = trim($_POST['posnum']);
    $PosName = trim($_POST['posname']);
    $PosStatus = trim($_POST['posstatus']);
    $PosDept = trim($_POST['search_dept']);
    $PosDiv = trim($_POST['search_div']);
    $PosCampus = trim($_POST['poscampus']);
    $PosDesc = trim($_POST['desc']);
    $OpenDate = trim($_POST['opendate']);
    $CloseDate = trim($_POST['closedate']);
    $PostedBy = trim($_SESSION['userName']);
    $PostedByUID = $UID;
    $JDOrgName = "No File Uploaded"; //Default if no file is uploaded
    $JDNewName = "No File Uploaded"; //Default

    //echo var_dump($_FILES["jobdoc"]); //To get file object details

    $stmt = $conn->prepare("INSERT INTO Postings (PostID, PosNumber, PosName,
                        PosStatus, PosDept, PosDiv, PosCampus, PosDesc, OpenDate, CloseDate, PostedBy, PostedByUID, JDOrgName, JDNewName, LastEdited)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("ssssiiisssssss", $PostID, $PosNumber, $PosName, $PosStatus,
        $PosDept, $PosDiv, $PosCampus, $PosDesc, $OpenDate, $CloseDate, $PostedBy, $PostedByUID, $JDOrgName, $JDNewName);
    $stmt->execute();
    $stmt->close();

    if (!empty($_FILES["jobdoc"]["name"])) {
        $JDOrgName = $_FILES["jobdoc"]["name"];
        require_once('uploadjobdoc.php');
        $JDNewName = $name;
        $stmt = $conn->prepare("UPDATE Postings SET JDOrgName=?, JDNewName=? WHERE PostID=?");
        $stmt->bind_param("sss", $JDOrgName, $JDNewName, $PostID);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } else {
        $conn->close();
    }
}

elseif($_POST['formName']=="editpost"){
    $PostID = trim($_GET['id']);
    $UID = trim($_SESSION['uid']);
    $Role = trim($_SESSION['role']);
    $PosNumber = trim($_POST['posnum']);
    $PosName = trim($_POST['posname']);
    $PosStatus = trim($_POST['posstatus']);
    $PosDept = trim($_POST['search_dept']);
    $PosDiv = trim($_POST['search_div']);
    $PosCampus = trim($_POST['poscampus']);
    $PosDesc = trim($_POST['desc']);
    $OpenDate = trim($_POST['opendate']);
    $CloseDate = trim($_POST['closedate']);
    $PostedBy = trim($_SESSION['userName']);
    $PostedByUID = $UID;
    $JDOrgName = "No File Uploaded"; //Default if no file is uploaded
    $JDNewName = "No File Uploaded"; //Default

    //echo var_dump($_FILES["jobdoc"]); //To get file object details

    $stmt = $conn->prepare("UPDATE Postings SET PosNumber=?, PosName=?, PosStatus=?, PosDept=?, PosDiv=?, PosCampus=?, 
                  PosDesc=?, OpenDate=?, CloseDate=?, PostedBy=?, PostedByUID=?, JDOrgName=?, JDNewName=?, 
                  LastEdited=CURRENT_TIMESTAMP WHERE PostID=?");
    $stmt->bind_param("sssiiissssssss", $PosNumber, $PosName, $PosStatus, $PosDept, $PosDiv, $PosCampus,
        $PosDesc, $OpenDate, $CloseDate, $PostedBy, $PostedByUID, $JDOrgName, $JDNewName, $PostID);
    $stmt->execute();
    $stmt->close();

    if (!empty($_FILES["jobdoc"]["name"])) {
        $JDOrgName = $_FILES["jobdoc"]["name"];
        require_once('uploadjobdoc.php');
        $JDNewName = $name;
        $stmt = $conn->prepare("UPDATE Postings SET JDOrgName=?, JDNewName=? WHERE PostID=?");
        $stmt->bind_param("sss", $JDOrgName, $JDNewName, $PostID);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } else {
        $conn->close();
    }
}

else{
    echo "<script>alert('Invalid!');
        window.location.href='../view/home.php';</script>";
}

echo "<script>alert('Your posting uploaded successfully!');
        window.location.href='../view/home.php';</script>";
?>
