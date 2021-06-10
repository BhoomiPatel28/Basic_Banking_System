<?php 

$ser = "localhost";
$uname = "root";
$pw = "";
$db = "basic_banking_system";

$conf = mysqli_connect($ser, $uname, $pw, $db);

if (!$conf) {
    die("<script>alert('Connection Failed.')</script>");
}

?>