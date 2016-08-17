<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');

$UserRole = trim($_POST['role']);
$UserUID = trim($_POST['useruid']);

$stmt = $conn->prepare("UPDATE UserRoles SET Role=? WHERE UID=?");
$stmt->bind_param("is",$UserRole,$UserUID);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<script type='text/javascript'>window.location.href='../view/grantpriv.php';</script>";
?>