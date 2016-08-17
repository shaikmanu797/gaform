<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../includes/tablebootstrap/tablereqs.html');
require_once('../model/config.php');
$PostedByUID = trim($_SESSION['uid']);
$PostID = trim($_GET['PID']);
$PosNumber = trim($_GET['PNum']);
$query1 = "SELECT CandUID, CandResume, Status FROM Applications WHERE PostedByUID='$PostedByUID' AND PostID='$PostID'";
$cand = mysqli_query($conn,$query1);
?>

<body>
<table id="manageposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Position Applied</th>
        <th>Applicant's UID</th>
        <th>Applicant's Resume</th>
        <th>Application Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while($candDetails = mysqli_fetch_array($cand)){
            echo "<tr>".
                "<form name='status' method='post' action='../model/changestatus.php' onSubmit='javascript: return confirm(\"Please confirm the status change!\");' >".
                "<input type='hidden' name='PostedByUID' value='".$PostedByUID."'/>".
                "<input type='hidden' name='PostID' value='".$PostID."'/>".
                "<input type='hidden' name='PosNum' value='".$_GET['PNum']."'/>".
                "<input type='hidden' name='CandUID' value='".$candDetails['CandUID']."'/>".
                "<td>".$PosNumber."</td>".
                "<td><a href='../view/appdetails.php?uid=".$candDetails['CandUID']."' target='_blank'>".$candDetails['CandUID']."</a></td>".
                "<td><a href='../uploads/resume/".$candDetails['CandResume']."' target='_blank'>Resume</a></td>".
                "<td><select name='Status' required />";
                $query2 = "SELECT Status FROM ApplicationStatus";
                $status = mysqli_query($conn, $query2);
                while($appStatus = mysqli_fetch_array($status)){
                   echo"<option value='".$appStatus['Status']."' ";if($candDetails["Status"]==$appStatus["Status"]){ echo "selected";} echo ">".$appStatus['Status']."</option>";
                }
            echo "</select></td>".
                "<td>"."<input type='submit' value='Confirm' />"."</td>".
                "</form></tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>
