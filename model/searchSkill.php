<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 8/10/2016
 * Time: 3:34 PM
 */
require_once('config.php');
$skill = $_GET['term']."%";
$query = "SELECT DISTINCT SkillName FROM skills_desc WHERE SkillName LIKE '$skill' ORDER BY SkillName ASC";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($result)){
    $data[] = $row["SkillName"];
}
echo json_encode($data);
?>