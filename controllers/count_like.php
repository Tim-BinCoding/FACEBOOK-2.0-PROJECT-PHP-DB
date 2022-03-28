<?php
require_once("../models/database.php");

if (!empty($_POST["post_id"])){
    $userId = $_POST["user_id"];
    $postId = $_POST["post_id"];
    insert_likes($postId, $userId);
}
