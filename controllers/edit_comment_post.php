<?php
require_once("../models/database.php");
if (!empty($_POST["edit_comment"])){

    $get_comment = $_POST['edit_comment'];
    $get_id = $_GET["id"];
    edit_comment_post($get_comment,$get_id);
}
header('location: ../index.php');
?>
