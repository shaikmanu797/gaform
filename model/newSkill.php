<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 7/25/2016
 * Time: 11:32 AM
 */

require_once('config.php');
$output1 = "";
$output2 = "";
$nSkill = strtoupper($_REQUEST["nSkill"]);
$uid = strtoupper($_REQUEST["uid"]);
$query1 = "SELECT DISTINCT SkillName FROM skills_desc WHERE SkillName = '$nSkill'";
$result1 = mysqli_query($conn,$query2);
while ($row1 = mysqli_fetch_array($result1)){
    $output1 = $row1["SkillName"];
}
if($output1 != $nSkill && !Empty($uid)){
    $stmt1 = $conn->prepare("INSERT INTO skills_desc(SkillName,AddedBy) VALUES(?,?)");
    $stmt1->bind_param("ss",$nSkill,$uid);
    $stmt1->execute();
    $stmt1->close();
}

$query2 = "SELECT DISTINCT Skill FROM userskills WHERE Skill = '$nSkill' AND UID='$uid'";
$result2 = mysqli_query($conn,$query2);
while ($row2 = mysqli_fetch_array($result2)){
    $output2 = $row2["Skill"];
}
if(Empty($output2) && !Empty($uid)) {
    $stmt2 = $conn->prepare("INSERT INTO userskills(UID,Skill) VALUES(?,?)");
    $stmt2->bind_param("ss", $uid, $nSkill);
    $stmt2->execute();
    $stmt2->close();
}
?>

