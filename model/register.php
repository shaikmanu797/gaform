<?php
/*Created by 
Mansoor Baba Shaik
*/
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$uid = trim($_POST['uid']);
$email = trim($_POST['emailid']);
$pwd = trim($_POST['pwd']);
$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

if(password_verify($pwd,$hashpwd)){
    require_once('config.php');

// prepare and bind
//check if user is already registered
    $query = "SELECT * FROM UserInfo WHERE UID=UPPER('$uid')";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        echo "<script>alert('User record already exists. Please login to continue!');
        window.location.href='../index.php';</script>";
    }
    else{
        $stmt = $conn->prepare("INSERT INTO UserInfo (UID, FName, LName, Email, Pwd) VALUES (UPPER(?), UPPER(?), UPPER(?), ?, ?)");
        $stmt->bind_param("sssss", $uid, $fname, $lname, $email, $hashpwd);
        $stmt->execute();
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO UserRoles (UID, Role) VALUES (UPPER(?), 10)");
        $stmt->bind_param("s", $uid);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Registered Successfully!! Please login to continue!');
        window.location.href='../index.php';</script>";
    }
    $conn->close();
}
else{
    header('location:../index.php');
}

?>