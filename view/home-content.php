<?php
/*Created by 
Mansoor Baba Shaik
*/

echo '<br/><br/>';
echo '<h4>Welcome, '.$dbFullName.'!</h4>';
echo '<br/><br/>';
echo '<p style="font-size: medium">This is a web application to apply for available Graduate Assistant positions at Pace University.';
echo '<br/><br/>';
if($_SESSION['role']=='10') {
    echo 'In order to create your profile to apply for available vacant positions, please navigate to Profile section on the top navigation bar.';
    echo '<br/><br/>';
    echo 'You can find vacant positions from Jobs section on the top navigation bar.';
    echo '<br/><br/>';
    echo 'You can find your submitted applications at My Applications section on the top navigation bar.';
    echo '<br/><br/><br/><br/>';
}

if($_SESSION['role']=='1' || $_SESSION['role']=='5') {
    echo 'In order to create postings for available vacant positions, please navigate to Post a Job section on the top navigation bar.';
    echo '<br/><br/>';
    echo '<br/><br/>';
}
echo 'Last logged in on '.$_SESSION['lastlogin'];
echo '<br/><br/><br/><br/><br/><br/><br/>';
?>