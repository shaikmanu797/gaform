<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$PostedByUID = $_SESSION['uid'];

$queryapps = "SELECT DISTINCT PostID FROM Applications WHERE PostedByUID='$PostedByUID'";
$apps = mysqli_query($conn,$queryapps);


?>

