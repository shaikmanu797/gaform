<?php
/*Created by
Mansoor Baba Shaik
*/
session_start();
require_once('config.php');

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
    $TOEFL = 0;
    $IELTS = 0;
}

$GRE = trim($_POST['gre']);
$Quant = trim($_POST['quant']);
$Verb = trim($_POST['verb']);
$AWA = trim($_POST['awa']);


$stmt = $conn->prepare("UPDATE UserProfile SET PhoneNum=?, AdmitTerm=?, AdmitYear=?,
                        CurrentTerm=?, CurrentYear=?, Campus=?, School=?, Program=?, GPA=?, En=?,
                        IELTS=?, TOEFL=?, GRE=?, Quant=?, Verb=?, AWA=?, LastEdited=CURRENT_TIMESTAMP
                        WHERE UID=?");
$stmt->bind_param("ssisisisdsdiiiids", $PhoneNum, $AdmitTerm, $AdmitYear, $CurrentTerm, $CurrentYear,
    $Campus, $School, $Program, $GPA, $En, $IELTS, $TOEFL, $GRE, $Quant, $Verb, $AWA, $UID);
$stmt->execute();
$stmt->close();

if(!empty($_FILES["resume"]["name"])){
    $ResOrgName = $_FILES["resume"]["name"];
    require_once('upload.php');
    $ResNewName = $name;
    $stmt = $conn->prepare("UPDATE UserProfile SET ResOrgName=?, ResNewName=? WHERE UID=?");
    $stmt->bind_param("sss", $ResOrgName, $ResNewName, $UID);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
else{
    $conn->close();
}

echo "<script>alert('Your profile has been updated successfully!');
        window.location.href='../view/home.php';</script>";

?>