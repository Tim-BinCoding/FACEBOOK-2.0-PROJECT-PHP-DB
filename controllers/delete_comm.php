<?php
/**
 * Your code here
 */
require_once('../models/database.php');
$id= $_GET['id']; 
delete_comment($id);



header("location: /index.php");