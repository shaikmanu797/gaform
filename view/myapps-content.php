<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../model/myapps.php');
require_once('../includes/tablebootstrap/tablereqs.html');
?>
<body>
<table id="manageposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Position Number</th>
        <th>Position Title</th>
        <th>Status</th>
        <th>Department</th>
        <th>Campus</th>
        <th>Attachments</th>
        <th>Applied On</th>
        <th>Application Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row1 = mysqli_fetch_array($myapp)){
        require_once('../model/config.php');
        //Retreiving the names from coded numbers
        $PD=$row1["PosDept"];
        $querydept= "SELECT DeptName,DeptCode  FROM Departments WHERE DeptID=$PD";
        $dept = mysqli_query($conn,$querydept);
        $deptDef  = mysqli_fetch_array($dept);

        $CPS = $row1["PosCampus"];
        $querycampus = "SELECT CampusName FROM Campus WHERE CampusID=$CPS";
        $campus = mysqli_query($conn,$querycampus);
        $campusDef = mysqli_fetch_array($campus);

        $PID = $row1['PostID'];
        $CID= $_SESSION['uid'];
        $queryApp = "SELECT PostID, AppliedOn, CandResume, Status FROM Applications WHERE CandUID='$CID' AND PostID='$PID'";
        $Applied = mysqli_query($conn,$queryApp);
        if(mysqli_num_rows($Applied)>0) {
            echo '<tr>
                <td>' . $row1["PosNumber"] . '</td>' .
                '<td>' . $row1["PosName"] . '</td>';
            if ($row1["PosStatus"] == "FT") {
                $Status = "Full Time";
            } else {
                $Status = "Part Time";
            }
            echo '<td>' . $Status . '</td>' .
                '<td>' . $deptDef["DeptName"] . ' (' . $deptDef["DeptCode"] . ')' . '</td>' .
                '<td>' . $campusDef["CampusName"] . '</td>';
            while ($status = mysqli_fetch_array($Applied)) {
                echo '<td><a href="../uploads/resume/' . $status["CandResume"] . '" target="_blank">Resume</a></td>';
                echo '<td>' . $status["AppliedOn"] . '</td>';
                echo '<td>' . $status["Status"] . '</td>';
            }
            echo '</tr>';
        }
    }?>
    </tbody>
</table>
</body>
</html>


