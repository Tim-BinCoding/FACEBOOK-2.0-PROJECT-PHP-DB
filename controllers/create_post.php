<?php
/**
 * Your code here
 */

require_once("../models/database.php");
session_start();
$file_name = uploadImage($_FILES['uploadimg']);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['description']) || $file_name!=""){
    $get_desc = $_POST["description"];
    $get_user_id = $_POST["user_id"];
    date_default_timezone_set("Asia/Bangkok");
    $myDate = date("d/m/y h:i:s");
    create_post($get_user_id, $get_desc, $file_name, $myDate);
    header("location: /index.php");
}else{
    header("location: /index.php");
}
?>
<?php
function uploadImage($photo){
    if (isset($photo)){
        $img_name = $photo['name'];
        $tmp_name = $photo['tmp_name'];
        $error = $photo['error'];
        if ($error ===0){
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
    }else{
        $em = "unknown error occurred!";
        header("Location:  ../views/create_post_view.php?error=$massage");
    }
}