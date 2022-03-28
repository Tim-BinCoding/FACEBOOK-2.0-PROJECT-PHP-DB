<?php
/**
 * Your code here 
 */
session_start();
// <!-- CONNECTION DATABASES  -->
$db = new PDO("mysql:host=localhost;dbname=facebook_pnc", "root", "");

function create_post($user_id, $description, $img, $date){
    // you code here 
    global $db;
    $post_statement = $db->prepare("INSERT INTO posts (user_id, description, file_img, post_date) VALUES (:id, :desc, :image, :post_date);");
    $post_statement->execute([
        ':id' => $user_id,
        ':desc' => $description,
        ':image' => $img,
        ':post_date' => $date,
    ]);
    return $post_statement->rowCount()==1;
}


function remove_post($id){
    // you code here 
    global $db;
    $statement = $db->prepare("DELETE FROM posts WHERE id=:id_post;");
    $statement->execute([
        ':id_post' => $id
    ]);
    return ($statement->rowCount() == 1); #Delete one row from database;
    
}

// UPDATE POST ---------------------
function update_post($id, $description, $img){
    global $db;
    $statement = $db->prepare("UPDATE posts SET description=:description, file_img=:image WHERE id=:id");
    $statement->execute([
        ':description' => $description,
        ':id' =>  $id,
        ':image'=> $img
    ]);
    return ($statement->rowCount() == 1);
}


//   UPDATE COUNTER LIKE

function insert_likes($post_id, $user_id){
    global $db;
    $statement = $db->prepare("INSERT INTO likes(likes.post_id, likes.user_id) value (:post, :user)");
    $statement->execute([
        ':post' => $post_id,
        ':user' => $user_id
    ]);
    return ($statement->rowCount() == 1);
}


function comment_post($comment,$post_id,$user_id){
    global $db;
    $statement = $db->prepare("INSERT INTO comments(content,post_id,user_id) value(:comment,:post_id,:user_id)");
    $statement->execute([
        ':comment' => $comment,
        ':post_id' =>  $post_id,
        'user_id'=> $user_id
    ]);
    return ($statement->rowCount() == 1);
}



function delete_comment($id){
    // you code here 
    global $db;
    $statement = $db->prepare("DELETE FROM comments WHERE id=:id_post;");
    $statement->execute([
        ':id_post' => $id
    ]);
    return ($statement->rowCount() == 1); #Delete one row from database;
    
}



function insert_users($firstN,$lastN,$bd,$gender,$email,$password, $comfirm){
    global $db;
    $statement = $db->prepare("INSERT INTO users(first_name, last_name, gender, email, user_password, birthday, users.login) values(:fname, :lname, :gender, :email, :user_password, :birthday, :comfirmed);");
    $statement->execute([
        ':fname' => $firstN,
        ':lname' =>  $lastN,
        ':gender'=>$gender,
        ':email'=>$email,
        ':user_password'=>$password,
        ':birthday'=>$bd,
        ':comfirmed' => $comfirm,
    ]);
    return ($statement->rowCount() == 1);
}



// EDIT COMMENT

function edit_comment_post($get_comment,$get_id){
    global $db;
    $statement = $db->prepare("UPDATE comments SET content=:comment where id=:comment_id");
    $statement->execute([
        ':comment' => $get_comment,
        ':comment_id' =>  $get_id,
    ]);
    return ($statement->rowCount() == 1);
}

function upload_profile_users($user_id, $profile_img){
    global $db;
    $statement = $db->prepare("UPDATE users SET image=:profile_image where users.id=:id");
    $statement->execute([
        ':profile_image' => $profile_img,
        ':id' =>  $user_id,
    ]);
    return ($statement->rowCount() == 1);
}