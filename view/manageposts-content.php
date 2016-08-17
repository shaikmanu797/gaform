<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../includes/tablebootstrap/tablereqs.html');
//Keep table id as manageposts only
require_once('../model/postDetails.php');
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
        <th>Opening Date</th>
        <th>Closing Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row1 = mysqli_fetch_array($post)){
        echo '<tr>
                <td>'.$row1["PosNumber"].'</td>'.
                '<td>'.$row1["PosName"].'</td>';
        if($row1["PosStatus"]=="FT") {
           $Status="Full Time";
        }
        else{$Status="Part Time";}
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

         echo   '<td>'.$Status.'</td>'.
                '<td>'.$deptDef["DeptName"].' ('.$deptDef["DeptCode"].')'.'</td>'.
                '<td>'.$campusDef["CampusName"].'</td>'.
                '<td>'.$row1["OpenDate"].'</td>'.
                '<td>'.$row1["CloseDate"].'</td>'.
                '<td><a href="../view/editPosting.php?PID='.$row1['PostID'].'">Edit</a>&nbsp;&nbsp;'.
                     '<a href="../model/deletePosting.php?PID='.$row1['PostID'].'" onClick="javascript: return confirm(\'Please confirm to delete this postition \');">Delete</a></td>'.
              '</tr>';
    }?>
    </tbody>
</table>
</body>
</html>