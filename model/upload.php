<?php
/*Created by 
Mansoor Baba Shaik
*/
// Upload and Rename File
define("UPLOAD_DIR", "../uploads/resume/");

if (!empty($_FILES["resume"])) {
    $resume = $_FILES["resume"];

    if ($resume["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = $_SESSION['uid'].'_'.preg_replace("/[^A-Z0-9._-]/i", "_", $resume["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($resume["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}
?>