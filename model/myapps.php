<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$querymyapp= "SELECT PostID, PosNumber, PosName, PosStatus, PosDept, OpenDate, CloseDate, PosCampus  FROM Postings";
$myapp= mysqli_query($conn,$querymyapp);
?>