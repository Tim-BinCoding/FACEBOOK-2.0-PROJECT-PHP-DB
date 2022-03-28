<?php
require_once("../models/database.php");
$file_name = uploadImage($_FILES['upload_img_profile']);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $file_name!=""){
    $_SESSION["id"] = $_POST["id"];
    echo $_SESSION["id"];
    // date_default_timezone_set("Asia/Bangkok");
    // $myDate = date("d/m/y h:i:s");
    upload_profile_users($_SESSION["id"], $file_name);
    echo "OK";
    header("location: ../views/profile.php");
}else{
    header("location: ../views/profile.php");
    echo "BAD";
}

?>
<?php
function uploadImage($photo){
    if (isset($photo)){
        $img_name = $photo['name'];
        $tmp_name = $photo['tmp_name'];
        $error = $photo['error'];
        if ($error === 0){
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
                header("Location: ../views/profile.php?error=$massage");
            }
        }
    }else{
        $em = "unknown error occurred!";
        header("Location:  ../views/profile.php?error=$massage");
    }
}


// <?php
// require_once("../models/database.php");
// $file_name = uploadImage($_FILES['upload_img_profile']);
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && $file_name!=""){
//     $_SESSION["id"] = $_POST["id"];
//     $title = $_POST["title"];
//     date_default_timezone_set("Asia/Bangkok");
//     $myDate = date("d/m/y h:i:s");
//     upload_profile_users($_SESSION["id"], $file_name, $title, $myDate);
//     echo "OK";
//     echo $file_name;
//     header("location: ../views/profile.php");
// }else{
//     header("location: ../views/profile.php");
//     echo "BAD";
// }

// function uploadImage($photo){
//     if (isset($photo)){
//         $img_name = $photo['name'];
//         $tmp_name = $photo['tmp_name'];
//         $error = $photo['error'];
//         if ($error === 0){
//             $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//             $img_ex_lc = strtolower($img_ex);
//             $allowed_exs = array("jpg", "jpeg", "png"); 
//             if (in_array($img_ex_lc, $allowed_exs)) {
//                 $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
//                 $img_upload_path = '../images/uploads/'.$new_img_name;
//                 move_uploaded_file($tmp_name, $img_upload_path);
//                 return $new_img_name;
//             }else {
//                 $massage = "You can't upload files of this type";
//                 // header("Location: ../views/profile.php?error=$massage");
//             }
//         }
//     }else{
//         $em = "unknown error occurred!";
//         // header("Location:  ../views/profile.php?error=$massage");
//     }
// }