<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 8/11/016
 * Time: 10:00 AM
 */

require_once('config.php');
$output = "";
$nSkill = strtoupper($_REQUEST["nSkill"]);
$uid = strtoupper($_REQUEST["uid"]);

$query = "SELECT DISTINCT Skill FROM userskills WHERE Skill = '$nSkill' AND UID='$uid'";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($result)){
    $output = $row["Skill"];
}
if($output==$nSkill && !Empty($uid)) {
    $stmt = $conn->prepare("DELETE FROM userskills WHERE Skill = ? AND UID=?");
    $stmt->bind_param("ss", $nSkill, $uid);
    $stmt->execute();
    $stmt->close();
}

?>

