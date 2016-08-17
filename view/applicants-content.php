<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../includes/tablebootstrap/tablereqs.html');
require_once ('../model/applicants.php');
?>

<body>
<table id="manageposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Position Number</th>
        <th>Position Title</th>
        <th>Opening Date</th>
        <th>Closing Date</th>
        <th>Total Applicants</th>
    </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_array($apps)){
              $PostID = $row["PostID"];
              $querycount = "SELECT COUNT(*) AS Total FROM Applications WHERE PostedByUID='$PostedByUID' AND PostID='$PostID'";
              $count = mysqli_query($conn,$querycount);
              $counts = mysqli_fetch_array($count);
              $querydetails = "SELECT PosNumber, PosName, OpenDate, CloseDate FROM Postings WHERE PostedByUID='$PostedByUID' AND PostID='$PostID'";
              $postdetails = mysqli_query($conn,$querydetails);
              $details = mysqli_fetch_array($postdetails);
                echo "<tr>".
                        "<td><a href='appsperpost.php?PID=".$PostID."&PNum=".$details['PosNumber']."'>".$details['PosNumber']."</a></td>".
                        "<td>".$details['PosName']."</td>".
                        "<td>".$details['OpenDate']."</td>".
                        "<td>".$details['CloseDate']."</td>".
                        "<td>".$counts['Total']."</td>".
                     "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>
