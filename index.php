<?php
/*Created by
Mansoor Baba Shaik
*/
session_start();
if(!Empty($_SESSION)&&$_SESSION['loggedin']=='yes'){
    header('Location:view/home.php');
}
else{
    require_once('view/login.php');
}
echo '<script type="text/javascript">console.log("Designed and Developed by Mansoor Baba Shaik");</script>';
?>