<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 8/11/2016
 * Time: 9:14 AM
 */

$datetime->setTimezone(new DateTimeZone('America/New_York'));
print $datetime->format('Y-m-d H:i:s (e)');


// A time in London.
$datetime = new DateTime('2015-06-22T10:40:25', new DateTimeZone('Europe/London'));


$datetime->setTimezone(new DateTimeZone('America/New_York'));
print $datetime->format('Y-m-d H:i:s (e)');
// 2015-06-22 05:40:25 (America/New_York)

$datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
print $datetime->format('Y-m-d H:i:s (e)');
// 2015-06-22 15:10:25 (Asia/Calcutta)
?>
