<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$PostedByUID = $_POST['PostedByUID'];
$PostID = $_POST['PostID'];
$CandUID = $_POST['CandUID'];
$Status = $_POST['Status'];
$PosNum = $_POST['PosNum'];

$stmt = $conn->prepare("UPDATE Applications SET Status=? WHERE PostedByUID=? AND PostID=? AND CandUID=?");
$stmt->bind_param("ssss", $Status, $PostedByUID, $PostID, $CandUID);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<script type='text/javascript'>window.location.href='../view/appsperpost.php?PID=".$PostID."&PNum=".$PosNum."';</script>";

?>