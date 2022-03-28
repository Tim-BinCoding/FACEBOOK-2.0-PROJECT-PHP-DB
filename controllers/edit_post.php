<?php
require_once('../models/database.php');
    $file_name = update_Image($_FILES['update_img']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' || !empty($_POST['description']) || $file_name!=""){
        $id = $_POST['id'];
        $description = $_POST['description'];
        echo $description;
        if($file_name==""){
            $file_name=$_POST['update_photo'];
            echo $file_name . "IN";
        }
        update_post($id, $description, $file_name);
      
    }
    function update_Image($photo){
        $img_name = $photo['name'];
        echo $img_name;
        $tmp_name = $photo['tmp_name'];
        $error = $photo['error'];
        if ($error == 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../images/uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                return $new_img_name;
            }else {
                $massage = "You can't upload files of this type";
                header("Location: ../views/create_post_view?error=$massage");
            }
        }
    }

header('location: ../index.php');