<?php
require_once("../models/database.php");
$firstN = $_POST["first-name"];
$lastN = $_POST["last-name"];
$bd = $_POST["birthday"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = $_POST["password"];
$encrypted_pwd = md5($password);
$confirmed = $_POST["comfirmpass"];

if ($password==$confirmed){
    $confirmed=true;
    insert_users($firstN,$lastN,$bd,$gender,$email,$encrypted_pwd, $confirmed);
    header("location:../index.php");
}

?>