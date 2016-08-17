<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$uid = $_SESSION['uid'];
$query = "SELECT DATE_FORMAT(LastEdited,'%d-%b-%Y %h:%i %p') FROM UserProfile WHERE UID=UPPER('$uid')";
$result = mysqli_query($conn,$query);
$lastedited = mysqli_fetch_row($result);
$_SESSION['lastedited'] = $lastedited[0];

if(mysqli_num_rows($result)==0){
    require('profile-content.php');
}
else{
    $stmt = $conn->prepare("SELECT UID, PhoneNum, AdmitTerm, AdmitYear, 
                        CurrentTerm, CurrentYear, Campus, School, Program, GPA, En, 
                        IELTS, TOEFL, GRE, Quant, Verb, AWA, ResOrgName, ResNewName FROM UserProfile WHERE UID=? LIMIT 1");
    $stmt->bind_param("s",$uid);
    $stmt->execute();
    $stmt->bind_result($uUID,$uPhoneNum, $uAdmitTerm, $uAdmitYear, $uCurrentTerm, $uCurrentYear,
                  $uCampus, $uSchool, $uProgram, $uGPA, $uEn, $uIELTS, $uTOEFL, $uGRE, $uQuant, $uVerb,
                  $uAWA, $uResOrgName, $uResNewName);
    $stmt->fetch();
    $stmt->close();
    $uFileLocation = "../uploads/resume/".$uResNewName;
    require('editprofile-content.php');
}
$conn->close();
?>