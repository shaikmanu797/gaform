/**
 * Created by mshaik_tmp on 8/10/2016.
 */
$(function(){
    $('#skills').keyup(function()
    {
        var yourInput = $(this).val();
        re = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
        var isSplChar = re.test(yourInput);
        if(isSplChar)
        {
            var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
            $(this).val(no_spl_char);
        }
    });
});

function findSkills(){
    $("#skills").keyup(function() {
        $("#skills").autocomplete({
            source:'../model/searchSkill.php'

        });

    });

}
var skillsPosted = [];
function insertSkill(){
    //if(event.keyCode==13){ //enter key press }
        var a=document.getElementById('skills').value;
        var display=document.getElementById("displaySkills");
        var uid = document.getElementById("userID").value;
        var i;
        if(a.length!=""){
            newSkill(a,uid);
            if(skillsPosted.includes(a.toUpperCase())==false){
                skillsPosted.push(a.toUpperCase());
                document.getElementById("skills").value = "";
                skillsPosted.toString();
                display.innerHTML = "";
                for (i = 0; i <= (skillsPosted.length - 1); i++) {
                    var tag = document.createElement('span');
                    if (i % 2 == 0) {
                        tag.setAttribute("class", "label label-default");
                    }
                    else {
                        tag.setAttribute("class", "label label-warning");
                    }
                    j = parseInt(i) + 1;
                    tag.setAttribute("id", j);
                    display.appendChild(tag);
                    document.getElementById(j).innerHTML = skillsPosted[i] + " <a style='color: white;' href='javascript:deleteSkill(" + j + ",&#39;" + skillsPosted[i] + "&#39;);'><sup>X</sup></a>";
                    document.getElementById("displaySkills").innerHTML += "&nbsp;";
                }
            }

        }
}

function newSkill(nSkill,uid) {
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if(nSkill.length !=""){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText.length>2) {
                    alert(xmlhttp.responseText);
                }
            }
        }

    };
    xmlhttp.open("GET", "../model/newSkill.php?&nSkill="+nSkill+"&uid="+uid, true);
    xmlhttp.send();
}

function deleteSkill(loc,skill){
    var s = skillsPosted.indexOf(skill);
    skillsPosted.splice(s,1);
    document.getElementById(loc).innerHTML="";
    var display = document.getElementById("displaySkills");
    var uid = document.getElementById("userID").value;
    display.innerHTML="";
    for(i=0;i<=(skillsPosted.length-1);i++){
        var tag = document.createElement('span');
        if(i%2==0){
            tag.setAttribute("class", "label label-default");
        }
        else{
            tag.setAttribute("class", "label label-warning");
        }
        j=parseInt(i)+1;
        tag.setAttribute("id", j);
        display.appendChild(tag);
        document.getElementById(j).innerHTML = skillsPosted[i]+" <a style='color: white;' href='javascript:deleteSkill("+j+",&#39;"+skillsPosted[i]+"&#39;);'><sup>X</sup></a>";
        document.getElementById("displaySkills").innerHTML += "&nbsp;";
    }
    deleteUserSkill(skill,uid);
}

function deleteUserSkill(nSkill,uid) {
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if(nSkill.length !=""){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText.length>2) {
                    alert(xmlhttp.responseText);
                }
            }
        }

    };
    xmlhttp.open("GET", "../model/deleteUserSkill.php?&nSkill="+nSkill+"&uid="+uid, true);
    xmlhttp.send();
}