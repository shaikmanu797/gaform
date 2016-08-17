<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$PostID = trim($_GET['id']);
$PostedByUID = trim($_POST['postedbyuid']);
$CandUID = trim($_GET['canduid']);
$CandResume = trim($_POST['userresume']);
$Status = "Applied";
$stmt = $conn->prepare("INSERT INTO Applications(PostID, PostedByUID, CandUID, CandResume, AppliedOn, Status) 
                VALUES(?, ?, ?, ?, CURRENT_DATE, ?)");
$stmt->bind_param("sssss", $PostID, $PostedByUID, $CandUID, $CandResume, $Status);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<script>alert('Your have successfully applied for posting!');
        window.location.href='../view/home.php';</script>";

?>