<?php
/*Created by
Mansoor Baba Shaik
*/
$database = 'gaform_db';
$username = 'gaform_admin';
$password = '$gaform_pwd$';
$hostname = 'localhost';

$conn=mysqli_connect($hostname,$username,$password,$database);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>