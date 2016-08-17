<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$appUID = trim($_GET['uid']);

$stmt1 = $conn->prepare("SELECT FName, LName, Email FROM UserInfo WHERE UID=? LIMIT 1");
$stmt1->bind_param("s",$appUID);
$stmt1->execute();
$stmt1->bind_result($appFName,$appLName,$appEmail);
$stmt1->fetch();
$stmt1->close();

$stmt2 = $conn->prepare("SELECT PhoneNum, AdmitTerm, AdmitYear, CurrentTerm, CurrentYear, Campus,
                        School, Program, GPA, IELTS, TOEFL, GRE, Quant, Verb, AWA FROM UserProfile WHERE UID=? LIMIT 1");
$stmt2->bind_param("s",$appUID);
$stmt2->execute();
$stmt2->bind_result($appPhoneNum,$appATerm,$appAYear,$appCTerm,$appCYear,$appCampus,$appSchool,
                    $appProgram,$appGPA,$appIELTS,$appTOEFL,$appGRE,$appQuant,$appVerb,$appAWA);
$stmt2->fetch();
$stmt2->close();
//School names for drop-down
$query1 = "SELECT SchoolName, SchoolId FROM School WHERE SchoolId='$appSchool'";
$schooldetails = mysqli_query($conn,$query1);
$school = mysqli_fetch_array($schooldetails);

//Program names for drop-down
$query2 = "SELECT ProgramCode, ProgramName FROM Programs WHERE ProgramCode='$appProgram'";
$programdetails = mysqli_query($conn,$query2);
$program = mysqli_fetch_array($programdetails);

if($appIELTS!=0){
    $appEn = "IELTS";
    $appEnScore = $appIELTS;
}
else{
    $appEn = "TOEFL";
    $appEnScore = $appTOEFL;
}

?>
