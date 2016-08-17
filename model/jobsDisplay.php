<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$querypost= "SELECT PostID, PosNumber, PosName, PosStatus, PosDept, OpenDate, CloseDate, PosCampus  FROM Postings
             WHERE OpenDate<=CURRENT_DATE AND CloseDate>=CURRENT_DATE";
$post= mysqli_query($conn,$querypost);

?>