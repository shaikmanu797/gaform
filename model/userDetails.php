<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('config.php');
$uid = $_SESSION['uid'];
$stmt = $conn->prepare("SELECT FName, LName, Email FROM UserInfo WHERE UID=? LIMIT 1");
$stmt->bind_param("s",$uid);
$stmt->execute();
$stmt->bind_result($dbFName,$dbLName,$dbEmail);
$stmt->fetch();
$stmt->close();
$dbFullName = $dbFName." ".$dbLName;
$_SESSION['userName'] = $dbFullName;

//School names for drop-down
$query1 = "SELECT SchoolName, SchoolId FROM School";
$school = mysqli_query($conn,$query1);

//Program names for drop-down
$query2 = "SELECT ProgramCode, ProgramName FROM Programs";
$program = mysqli_query($conn,$query2);

//query to display user skills
$query3 = "SELECT Skill FROM userskills WHERE UID='$uid'";
$userskills = mysqli_query($conn,$query3);
while ($row = mysqli_fetch_array($userskills)){
    $uSkills[] = $row["Skill"];
}

?>


<script type='text/javascript'>
    function getItDone(){
        var display=document.getElementById("displaySkills");
        for (i = 0; i <= (skillsPosted.length - 1); i++) {
            var tag = document.createElement('span');
            if (i % 2 == 0) {
                tag.setAttribute("class", "label label-default");
            }
            else {
                tag.setAttribute("class", "label label-warning");
            }
            j = parseInt(i) + 1;
            tag.setAttribute("id", j);
            display.appendChild(tag);
            document.getElementById(j).innerHTML = skillsPosted[i] + " <a style='color: white;' href='javascript:deleteSkill(" + j + ",&#39;" + skillsPosted[i] + "&#39;);'><sup>X</sup></a>";
            document.getElementById("displaySkills").innerHTML += "&nbsp;";
        }
    }

</script>
