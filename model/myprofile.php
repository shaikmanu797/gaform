<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
require_once('config.php');
$ResOrgName = $_FILES["resume"]["name"];
require_once('upload.php');

$UID = trim($_SESSION['uid']);
$PhoneNum = trim($_POST['pnum']);
$AdmitTerm = trim($_POST['admitterm']);
$AdmitYear = trim($_POST['admityear']);
$CurrentTerm = trim($_POST['currentterm']);
$CurrentYear = trim($_POST['currentyear']);
$Campus = trim($_POST['campus']);
$School = trim($_POST['school']);
$Program = trim($_POST['program']);
$GPA = trim($_POST['gpa']);
$En = trim($_POST['en']);

if(trim($_POST['en'])=='IELTS'){
    $IELTS = trim($_POST['ielts']);
    $TOEFL = 0;
}
else if(trim($_POST['en'])=='TOEFL'){
    $TOEFL = trim($_POST['toefl']);
    $IELTS = 0;
}
else{
    $EnScore = trim($_POST['enscore']);
    $TOEFL = 0;
    $IELTS = 0;
}

$GRE = trim($_POST['gre']);
$Quant = trim($_POST['quant']);
$Verb = trim($_POST['verb']);
$AWA = trim($_POST['awa']);
$ResNewName = $name;

$stmt = $conn->prepare("INSERT INTO UserProfile (UID, PhoneNum, AdmitTerm, AdmitYear, 
                        CurrentTerm, CurrentYear, Campus, School, Program, GPA, En, 
                        IELTS, TOEFL, GRE, Quant, Verb, AWA, ResOrgName, ResNewName, LastEdited) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
$stmt->bind_param("sssisisisdsdiiiidss",$UID, $PhoneNum, $AdmitTerm, $AdmitYear, $CurrentTerm, $CurrentYear,
                  $Campus, $School, $Program, $GPA, $En, $IELTS, $TOEFL, $GRE, $Quant, $Verb, 
                  $AWA, $ResOrgName, $ResNewName);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<script>alert('Your profile uploaded successfully!');
        window.location.href='../view/home.php';</script>";
?>