<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../model/userDetails.php');
$currentyear = date("Y");
echo '<br/><br/><script type="text/javascript" src="../js/toggle.js"></script>';
echo '<div class="form-group">
        <form name="myprofile" action="../model/myprofile.php" method="post" enctype="multipart/form-data" autocomplete="off">
         <fieldset>
            <legend>Academic Profile </legend>
            <table width="70%">
                <tr>
                    <td><label>First Name: </label></td>
                    <td>'.$dbFName.'</td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Last Name: </label></td>
                    <td>'.$dbLName.'</td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>UID: </label></td>
                    <td>'.$_SESSION['uid'].'</td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Email: </label></td>
                    <td>'.$dbEmail.'</td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Phone Number: </label></td> 
                    <td>
                        <input type="text" name="pnum" id="TelephoneNumber"  onkeyup="telephone();" placeholder="(555) 555-5555" maxlength="14" required/>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Admitted Term:<label></td>
                    <td>
                        <select name="admitterm" onchange="admitfn();" required>
                            <option value="">Choose </option>
                            <option value="Fall">Fall</option>
                            <option value="Spring">Spring</option>
                            <option value="Summer I">Summer I</option>
                            <option value="Summer II">Summer II</option>
                        </select>&nbsp;
                        <select name="admityear" id="ayear" disabled required>
                            <option value="">Choose </option>
                            <option value="'.($currentyear-2).'">'.($currentyear-2).'</option>
                            <option value="'.($currentyear-1).'">'.($currentyear-1).'</option>
                            <option value="'.($currentyear).'">'.($currentyear).'</option>
                        </select>&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Current Term:<label></td>
                    <td>
                        <select name="currentterm" onchange="currentfn();" required>
                            <option value="">Choose </option>
                            <option value="Fall">Fall</option>
                            <option value="Spring">Spring</option>
                            <option value="Summer I">Summer I</option>
                            <option value="Summer II">Summer II</option>
                        </select>&nbsp;
                        <select name="currentyear" id="cyear" disabled required>
                            <option value="">Choose </option>
                            <option value="'.($currentyear-2).'">'.($currentyear-2).'</option>
                            <option value="'.($currentyear-1).'">'.($currentyear-1).'</option>
                            <option value="'.($currentyear).'">'.($currentyear).'</option>
                        </select>&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Campus: </label></td>
                    <td>
                        <input type="radio" name="campus" value="New York" checked/> New York&nbsp;
                        <input type="radio" name="campus" value="Westchester" /> Westchester
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>School: <label></td>
                    <td>
                        <select name="school" onchange="schprogfn();" required>
                             <option value="">Choose School</option>';
                             while($row1 = mysqli_fetch_array($school)){
                                echo '<option value='.$row1["SchoolId"].'>'.$row1["SchoolName"].'</option>';
                             }
                   echo '</select>
                    </td>
                </tr>
                <tr><td><br/></td></tr>';
         echo   '<tr>
                    <td><label>Program: </label></td>
                    <td>
                        <select name="program" id="prog" disabled required>
                            <option value="">Choose Graduate Subject</option>';
                            while($row2 = mysqli_fetch_array($program)){
                                echo '<option value='.$row2["ProgramCode"].'>'.$row2["ProgramName"].'</option>';
                            }
                 echo   '</select>
                    </td>
                 </tr>
                 <tr><td><br/></td></tr>
                 <tr>
                    <td><label>Current GPA: <label></td>
                    <td>
                        <input type="number" name="gpa"  min="0.1" max="4.0" step="0.01" maxlength="4" size="6" placeholder="4.0 scale" required/>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>IELTS/TOEFL: </label></td>
                    <td>
                        <select name="en" style="height:2em;" onchange="enfn(this);" required>
                            <option value="">Choose </option>
                            <option value="IELTS">IELTS</option>
                            <option value="TOEFL">TOEFL</option>
                        </select>&nbsp;
                        <input type="number" name="enscore"  id="enmarks" maxlength="3" size="6" placeholder="Score" disabled required />
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>GRE: </label></td>
                    <td>
                        Total: <input type="number"  name="gre" id="tot" maxlength="3" min="260" max="340" placeholder="260-340" required />&nbsp;
                        Quantitative: <input type="number"  name="quant" id="q" maxlength="3" min="130" max="170" placeholder="130-170" required />&nbsp;
                        Verbal: <input type="number"  name="verb" id="v" maxlength="3" min="130" max="170" placeholder="130-170" required />&nbsp;
                        AWA: <input type="number"  name="awa" step="0.1" maxlength="3" min="1.0" max="6.0" placeholder="1.0-6.0" required />&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Resume: (PDF) </label></td>
                    <td>
                        <input type="file" name="resume" id="resume" accept="application/pdf" required />
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td></td>
                    <td>
                        <center>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg" onclick="return checkTotal(this.form);"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg"/>
                        </center>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr><td><br/></td></tr>
            </table>
         </fieldset>
      </form>
     </div>';
?>