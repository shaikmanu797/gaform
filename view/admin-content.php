<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../includes/tablebootstrap/tablereqs.html');
require_once('../model/config.php');
$AdminUID = $_SESSION['uid'];

$query1 = "SELECT UID, FName, LName, Email FROM UserInfo WHERE UID<>'$AdminUID'";
$getdetails = mysqli_query($conn,$query1);
?>

<body><h3>Grant Privileges</h3><hr/>
<table id="manageposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>UserID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Current Role</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php
            while($row1=mysqli_fetch_array($getdetails)){
                echo "<tr>".
                     "<form name='rolechange' method='post' action='../model/rolechange.php' onSubmit='javascript: return confirm(\"Please confirm the role change!\");' >".
                     "<input type='hidden' name='useruid' value='".$row1["UID"]."' />";
                echo "<td>".$row1["UID"]."</td>".
                     "<td>".$row1["FName"]."</td>".
                     "<td>".$row1["LName"]."</td>".
                     "<td>".$row1["Email"]."</td>";
                $uuid = $row1["UID"];
                $query2 = "SELECT Role FROM UserRoles WHERE UID='$uuid'";
                $getuserrole = mysqli_query($conn,$query2);
                while($row2=mysqli_fetch_array($getuserrole)){
                    $userrole = $row2["Role"];
                }
                $query3 = "SELECT Title, RoleNum FROM Roles_Desc";
                $getroles = mysqli_query($conn,$query3);
                echo "<td>".
                       "<select name='role' required>";
                    while($row3=mysqli_fetch_array($getroles)){
                       echo  "<option value='".$row3["RoleNum"]."'"; if($userrole==$row3["RoleNum"]){echo "selected";} echo " >".$row3["Title"]."</option>";
                    }
                echo   "</select>".
                     "</td>";
                echo "<td><input type='submit' name='submit' value='Confirm'/></td>".
                     "</form></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
