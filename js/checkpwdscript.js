/**
 * Created by Mansoor Baba Shaik on 6/25/2016.
 */

function checkpwds(form) {
    var a=document.getElementById('p1').value;
    var b=document.getElementById('p2').value;
    if(a==b){
        document.register.action='model/register.php';
        document.register.submit();
    }
    else{
        alert('Passwords have not matched');
    }
}