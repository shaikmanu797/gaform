<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../model/userDetails.php');
$currentyear = date("Y");
echo '<br/><br/><script type="text/javascript" src="../js/toggle.js"></script>';
echo '<div class="form-group">
        <form name="editprofile" action="../model/editprofile.php" method="post" enctype="multipart/form-data" autocomplete="off">
         <fieldset>
            <legend>Academic Profile: Last Edited on '.$_SESSION['lastedited'].' </legend>
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
                        <input type="text" name="pnum" id="TelephoneNumber" value="'.$uPhoneNum.'" onkeyup="telephone();" placeholder="(555) 555-5555" maxlength="14" required/>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Admitted Term:<label></td>
                    <td>
                        <select name="admitterm" onchange="admitfn();" required>
                            <option value=""';if($uAdmitTerm==""){echo "selected";} echo'>Choose </option>
                            <option value="Fall"';if($uAdmitTerm=="Fall"){echo "selected";} echo'>Fall</option>
                            <option value="Spring"';if($uAdmitTerm=="Spring"){echo "selected";} echo'>Spring</option>
                            <option value="Summer I"';if($uAdmitTerm=="Summer I"){echo "selected";} echo'>Summer I</option>
                            <option value="Summer II"';if($uAdmitTerm=="Summer II"){echo "selected";} echo'>Summer II</option>
                        </select>&nbsp;
                        <select name="admityear" id="ayear" required>
                            <option value=""';if($uAdmitYear==""){echo "selected";} echo'>Choose </option>
                            <option value="'.($currentyear-2).'"';if($uAdmitYear==($currentyear-2)){echo "selected";} echo '>'.($currentyear-2); echo'</option>
                            <option value="'.($currentyear-1).'"';if($uAdmitYear==($currentyear-1)){echo "selected";} echo '>'.($currentyear-1); echo '</option>
                            <option value="'.($currentyear).'"';if($uAdmitYear==($currentyear)){echo "selected";} echo '>'.($currentyear); echo '</option>
                        </select>&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Current Term:<label></td>
                    <td>
                        <select name="currentterm" onchange="currentfn();" required>
                            <option value=""';if($uCurrentTerm==""){echo "selected";} echo'>Choose </option>
                            <option value="Fall"';if($uCurrentTerm=="Fall"){echo "selected";} echo'>Fall</option>
                            <option value="Spring"';if($uCurrentTerm=="Spring"){echo "selected";} echo'>Spring</option>
                            <option value="Summer I"';if($uCurrentTerm=="Summer I"){echo "selected";} echo'>Summer I</option>
                            <option value="Summer II"';if($uCurrentTerm=="Summer II"){echo "selected";} echo'>Summer II</option>
                        </select>&nbsp;
                       <select name="currentyear" id="cyear" required>
                            <option value=""';if($uCurrentYear==""){echo "selected";} echo'>Choose </option>
                            <option value="'.($currentyear-2).'"';if($uCurrentYear==($currentyear-2)){echo "selected";} echo '>'.($currentyear-2); echo'</option>
                            <option value="'.($currentyear-1).'"';if($uCurrentYear==($currentyear-1)){echo "selected";} echo '>'.($currentyear-1); echo '</option>
                            <option value="'.($currentyear).'"';if($uCurrentYear==($currentyear)){echo "selected";} echo '>'.($currentyear); echo '</option>
                        </select>&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Campus: </label></td>
                    <td>
                        <input type="radio" name="campus" value="New York"';if($uCampus=="New York"){echo "checked";} echo'/> New York&nbsp;
                        <input type="radio" name="campus" value="Westchester"';if($uCampus=="Westchester"){echo "checked";} echo'/> Westchester
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>School: <label></td>
                    <td>
                        <select name="school" onchange="schprogfn();" required>
                             <option value=""';if($uSchool==""){echo "checked";} echo'>Choose School</option>';
while($row1 = mysqli_fetch_array($school)){
    echo '<option value="'.$row1["SchoolId"].'"';if($uSchool==$row1["SchoolId"]){echo "selected";} echo'>'; echo $row1["SchoolName"]; echo '</option>';
}
echo '</select>
                    </td>
                </tr>
                <tr><td><br/></td></tr>';
echo   '<tr>
                    <td><label>Program: </label></td>
                    <td>
                        <select name="program" id="prog" required>
                            <option value="">Choose Graduate Subject</option>';
while($row2 = mysqli_fetch_array($program)){
    echo '<option value="'.$row2["ProgramCode"].'"';if($uProgram==$row2["ProgramCode"]){echo "selected";} echo '>'; echo $row2["ProgramName"]; echo '</option>';
}
echo   '</select>
                    </td>
                 </tr>
                 <tr><td><br/></td></tr>
                 <tr>
                    <td><label>Current GPA: <label></td>
                    <td>
                        <input type="number" name="gpa" value="'.$uGPA.'" min="0.1" max="4.0" step="0.01" maxlength="4" size="6" placeholder="4.0 scale" required/>
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>IELTS/TOEFL: </label></td>
                    <td>
                        <select name="en" style="height:2em;" onchange="enfn(this);" required>
                            <option value=""';if($uEn==""){echo "selected";} echo'>Choose </option>
                            <option value="IELTS"';if($uEn=="IELTS"){echo "selected";} echo'>IELTS</option>
                            <option value="TOEFL"';if($uEn=="TOEFL"){echo "selected";} echo'>TOEFL</option>
                        </select>&nbsp;
                        <input type="number"'; if($uEn==""){echo 'name="enscore" value="" id="enmarks"';}
                                                if($uEn=="IELTS"){echo 'name="ielts" value="'.$uIELTS.'" min="1.0" max="9.0" step="0.5"';}
                                                if($uEn=="TOEFL"){echo 'name="toefl" value="'.$uTOEFL.'" min="0" max="120" step="1"';}
                                echo 'maxlength="3" size="6" placeholder="Score" required />
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>GRE: </label></td>
                    <td>
                        Total: <input type="number"  name="gre" value="'.$uGRE.'" id="tot" maxlength="3" min="260" max="340" placeholder="260-340" required />&nbsp;
                        Quantitative: <input type="number"  name="quant" value="'.$uQuant.'" id="q" maxlength="3" min="130" max="170" placeholder="130-170" required />&nbsp;
                        Verbal: <input type="number"  name="verb" value="'.$uVerb.'" id="v" maxlength="3" min="130" max="170" placeholder="130-170" required />&nbsp;
                        AWA: <input type="number"  name="awa" value="'.$uAWA.'" step="0.1" maxlength="3" min="1.0" max="6.0" placeholder="1.0-6.0" required />&nbsp;
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td><label>Resume: (PDF) </label></td>
                    <td>
                        <input type="file" name="resume" id="resume" value="" accept="application/pdf" />
                    </td>
                </tr>
                <tr><td><br/></td></tr>
                <tr>
                    <td>You have uploaded </td>&nbsp;
                    <td><a href="'.$uFileLocation.'" target="_blank">'.$uResOrgName.'</a></td>
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