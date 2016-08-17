<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
$_SESSION['loggedin']='no';
session_destroy();
header('Location:../index.php');
?>

