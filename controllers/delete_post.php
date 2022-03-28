<?php
/**
 * Your code here
 */
require_once('../models/database.php');
$id= $_GET['id']; 
remove_post($id);
echo $id;


header("location: /index.php");