<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
require_once('config.php');
$PID = trim($_GET['PID']);
$UID = trim($_SESSION['uid']);

$queryPos = "SELECT PosNumber FROM Postings WHERE PostID='$PID'";
$PosNum = mysqli_query($conn,$queryPos);
while($result=mysqli_fetch_array($PosNum)){
    $PosNumber = $result['PosNumber'];
}

$stmt1 = $conn->prepare("DELETE FROM Postings WHERE PostID=? AND PostedByUID=?");
$stmt1->bind_param("ss", $PID, $UID);
$stmt1->execute();
$stmt1->close();


echo "<script>var conf=confirm('The Posting with Position Number: ".$PosNumber." has been deleted successfully!');
        if(conf){window.location.href='../view/manageposts.php';}</script>";

$conn->close();

?>