<?php
require_once ("../models/post.php");
session_start();
$_SESSION= [];
session_unset();
session_destroy();
header("location: ../pages.php");
?>