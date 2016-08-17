/**
 * Created by Mansoor Baba Shaik on 6/27/2016.
 */
function admitfn(){
    document.getElementById('ayear').removeAttribute('disabled');
}

function currentfn(){
    document.getElementById('cyear').removeAttribute('disabled');
}

function schprogfn(){
    document.getElementById('prog').removeAttribute('disabled');
}

function enfn(obj){
    if(obj.options[obj.selectedIndex].value=='IELTS'){
        document.getElementById('enmarks').removeAttribute('disabled');
        document.getElementById('enmarks').value="";
        document.getElementById('enmarks').setAttribute('name','ielts');
        document.getElementById('enmarks').setAttribute('min','1.0');
        document.getElementById('enmarks').setAttribute('max','9.0');
        document.getElementById('enmarks').setAttribute('step','0.5');
    }
    else if(obj.options[obj.selectedIndex].value=='TOEFL')
    {
        document.getElementById('enmarks').removeAttribute('disabled');
        document.getElementById('enmarks').value="";
        document.getElementById('enmarks').setAttribute('name','toefl');
        document.getElementById('enmarks').setAttribute('min','0');
        document.getElementById('enmarks').setAttribute('max','120');
        document.getElementById('enmarks').setAttribute('step','1');
    }
    else{
        document.getElementById('enmarks').setAttribute('disabled','disabled');
        document.getElementById('enmarks').value="";
        document.getElementById('enmarks').setAttribute('name','enscore');
    }
}

function telephone() {
    $("#TelephoneNumber").on("change keyup paste", function () {
        var output;
        var input = $("#TelephoneNumber").val();
        input = input.replace(/[^0-9]/g, '');
        var area = input.substr(0, 3);
        var pre = input.substr(3, 3);
        var tel = input.substr(6, 4);
        if (area.length < 3) {
            output = "(" + area;
        } else if (area.length == 3 && pre.length < 3) {
            output = "(" + area + ")" + " " + pre;
        } else if (area.length == 3 && pre.length == 3) {
            output = "(" + area + ")" + " " + pre + "-" + tel;
        }
        $("#TelephoneNumber").val(output);
    });
}

function checkTotal(form) {
    var tot = parseInt(document.getElementById('tot').value);
    var q = parseInt(document.getElementById('q').value);
    var v = parseInt(document.getElementById('v').value);
    if(tot!=(q+v) ){
        alert('GRE totals not matching!');
        return false;
    }
    else{
        var confirmPopUp = confirm("By clicking Submit, I acknowledge responsibility to ensure that all details entered are true!");
        if(confirmPopUp){
            document.myprofile.action = "../model/myprofile.php";
            document.myprofile.submit();
        }
        else{
            return false;
        }
    }
}