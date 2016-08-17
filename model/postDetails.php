<?php
/*Created by 
Mansoor Baba Shaik
*/

require_once('config.php');
$UID = trim($_SESSION['uid']);
$querypost= "SELECT PostID, PosNumber, PosName, PosStatus, PosDept, OpenDate, CloseDate, PosCampus  FROM Postings WHERE PostedByUID='$UID'";
$post= mysqli_query($conn,$querypost);


?>