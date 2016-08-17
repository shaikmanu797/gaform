<?php
/*Created by 
Mansoor Baba Shaik
*/
require("../model/applyPostingReqs.php");
$candidate = $_SESSION['uid'];
?>

<br/><br/>
<form name="applypost" method="post" autocomplete="off" action="../model<?php echo '/apply.php?id='.$PID.'&canduid='.$candidate?>" enctype="multipart/form-data">
    <input type="hidden" name="formName" value="applypost" />
    <input type="hidden" name="postedbyuid" value="<?php echo $PostedByUID;?>" />
    <div class="form-group">
        <fieldset>
            <legend>Apply for job posting:</legend>
            <table width="50%">
                <tr>
                    <td><label>Position Number:</label></td>
                    <td>
                        <?php echo $PosNumber?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Position Title:</label></td>
                    <td>
                        <?php echo $PosName?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Position Status:</label></td>
                    <td>
                        <?php if($PosStatus=="FT") echo "Full Time"; ?>
                        <?php if($PosStatus=="PT") echo "Part Time"; ?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Select Department:</label></td>
                    <td>
                        <?php while($row1 = mysqli_fetch_array($dept)){
                            if($row1["DeptID"]=="") echo "All Departments";
                            if($row1["DeptID"]==$PosDept) echo $row1["DeptName"].' ('.$row1["DeptCode"].')';
                        }?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Select Division:</label></td>
                    <td>
                        <?php while($row1 = mysqli_fetch_array($div)){
                            if($row1["DivID"]=="")echo "All Divisions";
                            if($row1["DivID"]==$PosDiv) echo $row1["DivName"];
                            }?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Primary Campus/Site:</label></td>
                    <td>
                        <?php while($row1 = mysqli_fetch_array($campus)){
                            if($row1["CampusID"]=="") echo "Any";
                            if($row1["CampusID"]==$PosCampus) echo $row1["CampusName"];
                        }?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Opening Date:</label></td>
                    <td><?php echo $OpenDate; ?></td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Closing Date:</label></td>
                    <td><?php echo $CloseDate; ?></td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td>
                        <?php echo $PosDesc; ?>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <?php if($OrgDoc != "No File Uploaded"){
                    echo '<tr>
                            <td><label>Uploaded document (PDF): </label></td>
                            <td>
                                <a href="'.$DocFileLoc.'" target="_blank" />'.$OrgDoc.'</a>
                            </td>
                          </tr>
                <tr><td><br/></td></tr>';} ?>
                <tr>
                    <td><label>Attach Resume: (PDF) </label></td>
                    <td>
                        <select class="form-control input-sm" name="userresume" required>
                            <?php
                                if($ResNewName!=NULL){
                                    echo '<option value="">Choose</option>';
                                    echo '<option value="'.$ResNewName.'">'.$ResOrgName.'</option>';
                                }
                            else{
                                echo '<option value="">Please Upload Resume in Profile Section</option>';
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td></td>
                    <td>
                        <center>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="submit" value="Apply" class="btn btn-success btn-lg"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" name="reset" value="Go Back" class="btn btn-primary btn-lg" onclick="javascript: window.location.href='jobs.php'"/>
                        </center>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr><td><br/></td></tr>
            </table>
        </fieldset>
    </div>

</form>
