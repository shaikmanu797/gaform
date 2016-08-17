<?php
/*Created by
Mansoor Baba Shaik
*/

require_once('../model/postingReqs.php');
require_once ('../includes/calendar/calreqs.html');
?>
<br/><br/>
<form name="postjob" method="post" autocomplete="off" action="../model<?php echo '/posting.php?id='.uniqid()?>" enctype="multipart/form-data">
    <input type="hidden" name="formName" value="postjob" />
    <div class="form-group">
    <fieldset>
        <legend>Post a job</legend>
        <table width="50%">
            <tr>
                <td><label>Position Number:</label></td>
                <td>
                    <input class="form-control input-sm" type="text" size="10" name="posnum" maxlength="30" required/>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Position Title:</label></td>
                <td>
                    <input class="form-control input-sm" type="text" name="posname" maxlength="100" required/>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Position Status:</label></td>
                <td>
                    <input  type="radio" name="posstatus" value="FT" checked/>Full-Time&nbsp;
                    <input  type="radio" name="posstatus" value="PT"/>Part-Time
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Select Department:</label></td>
                <td><select class="form-control input-sm" name="search_dept" id="search_dept" required>
                        <option selected="selected" value="">All Departments</option>
                        <?php while($row1 = mysqli_fetch_array($dept)){
                            echo '<option value='.$row1["DeptID"].'>'.$row1["DeptName"].' ('.$row1["DeptCode"].')'.'</option>';
                        }?>
                    </select>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Select Division:</label></td>
                <td><select class="form-control input-sm" name="search_div" id="search_div" required>
                        <option selected="selected" value="">All Divisions</option>
                        <?php while($row1 = mysqli_fetch_array($div)){
                            echo '<option value='.$row1["DivID"].'>'.$row1["DivName"].'</option>';
                        }?>
                    </select>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Primary Campus/Site:</label></td>
                <td>
                    <select class="form-control input-sm" name="poscampus" required>
                        <option value="" selected="">Any</option>
                        <?php while($row1 = mysqli_fetch_array($campus)){
                            echo '<option value='.$row1["CampusID"].'>'.$row1["CampusName"].'</option>';
                        }?>
                    </select>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Opening Date:</label></td>
                <td><input type="date" name="opendate" id="openDate" required /></td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Closing Date:</label></td>
                <td><input type="date" name="closedate" id="closeDate" required /></td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Job related doc: (PDF) </label></td>
                <td>
                    <input type="file" name="jobdoc" id="jobdoc" accept="application/pdf" />
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td><label>Description:</label></td>
                <td>
                    <textarea class="form-control input-sm"  name="desc" id="desc" placeholder="Enter job description in less than 1000 characters..." maxlength="1000" rows="7" ></textarea>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr><td><br/></td></tr>
            <tr>
                <td></td>
                <td>
                    <center>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg"/>
                    </center>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr><td><br/></td></tr>
            </table>
    </fieldset>
    </div>

</form>
