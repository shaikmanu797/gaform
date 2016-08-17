<?php
/*Created by 
Mansoor Baba Shaik
*/
require_once('../model/appdetails.php');
echo '<br/><legend>Applicant Details</legend><table width="70%">
    <tr>
        <td><label>First Name: </label></td>
        <td>'.$appFName.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Last Name: </label></td>
        <td>'.$appLName.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>UID: </label></td>
        <td>'.$appUID.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Email: </label></td>
        <td>'.$appEmail.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Phone Number: </label></td>
        <td>'.$appPhoneNum.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Admitted Term:<label></td>
        <td>'.$appATerm.' '.$appAYear.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Current Term:<label></td>
        <td>'.$appCTerm.' '.$appCYear.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Campus: </label></td>
        <td>'.$appCampus.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>School: <label></td>
        <td>'.$school["SchoolName"].'</td>
    </tr>
    <tr><td><br/></td></tr>';
echo   '<tr>
        <td><label>Program: </label></td>
        <td>'.$program["ProgramName"].'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>Current GPA: <label></td>
        <td>'.$appGPA.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>'.$appEn.': </label></td>
        <td>'.$appEnScore.'</td>
    </tr>
    <tr><td><br/></td></tr>
    <tr>
        <td><label>GRE: </label></td>
        <td>
            Total: '.$appGRE.'&nbsp;
            Quantitative: '.$appQuant.'&nbsp;
            Verbal: '.$appVerb.'&nbsp;
            AWA: '.$appAWA.'&nbsp;
        </td>
    </tr>
    <tr><td><br/></td></tr>
    <tr><td><br/></td></tr>
    <tr><td><br/></td></tr>
    <tr><td><br/></td></tr>
    <tr><td><br/></td></tr>
</table>
</div>';
?>