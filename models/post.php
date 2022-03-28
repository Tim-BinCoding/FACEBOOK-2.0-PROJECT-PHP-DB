<?php


$db = new PDO("mysql:host=localhost;dbname=facebook_pnc", "root", "");

// * Get a single item
//  * @param integer $id : the item id
 
//  * @return associative_array: the item related to given USER ID
//  */

function information_users(){
    global $db;
    $statement = $db->query("SELECT*FROM data_users WHERE data_users.logined=true;");
    return $statement->fetchAll(); 
}

function profile_user(){
    global $db;
    $statement = $db->query("SELECT*FROM users WHERE users.login=true;");
    return $statement->fetch(); 
}

/**
 * Get a single item
 * @param integer $id : the item id
 
 * @return associative_array: the item related to given item id
 */
function getItemById($id)
{
    global $db; 
    $statement = $db->prepare("SELECT first_name, last_name, file_img, description FROM posts INNER JOIN users on posts.user_id=users.id where posts.id=:id;");
    $statement->execute([
        ':id'=> ($id)
    ]);
    $item = $statement->fetch();
    return $item;
}

function getCommentById(){
    global $db; 
    $statement = $db->query("SELECT * FROM comment_post;");
    $contents = $statement->fetchAll();
    return $contents;
}


function likes_posts(){
    global $db; 
    $statement = $db->query("SELECT*FROM likes;");
    $likes = $statement->fetchAll();
    return $likes;
}

function log_out($logout,$user_id){
    global $db; 
    $statement = $db->prepare("UPDATE users SET login=:logout where id=:user_id");
    $statement->execute([
        ':logout' => $logout,
        ':user_id' =>  $user_id,
    ]);
    return ($statement->rowCount() == 1);

}
