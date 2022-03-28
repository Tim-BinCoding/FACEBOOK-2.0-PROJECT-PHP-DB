<?php
require_once('../templates/header.php');
require_once('../models/post.php');
   // TO DO:
   // Get the id of the item to update in query
$id = $_GET['id'];
$posts = getItemById($id);
$FirstName=$posts["first_name"];
$get_image = profile_user();
?>


<nav class="navbar_facebook opacity">
        <div class="container-fluid">
            <!-- LOGO FB -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="../images/icon-facebook.webp" alt="" width="25%"></a>
            </div>
            <!-- PAGES -->
            <div class="nav_pages">
                <li id="active" class="fa fa-home" style="font-size:25px"></li>
                <li class="fa fa-group" style="font-size:22px"></li>
            </div>      
            <!-- ICON USER NAME -->
            <div class="nav_icons">
                <div class="user_profile"><a href="views/profile.php" ><img src="../images/uploads/<?= $get_image["image"] ?>" alt="" width=" 100%"></a> <span ><?=$FirstName?></span></div>
                <a href="logout.php"><img src="../images/log-out.png" alt="" width="10%">Sign Out</a>
            </div>
        </div>
  </nav>

<div class="container" style="display:block">
    <div class="wrapper">
    <section class="post">
        <form action="../controllers/edit_post.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <header class="create-post-header" style="display:flex">
        <h2>Update post</h2>
        <div class="cancel-post">
            <a href="../index.php">
            <li><img src="../images/Cancel.png" alt="gallery" width="100%" ></li>
            </a> 
        </div>
        </header>
        <hr>
        <form action="models/post.php" method="post" id ="update">
        <div class="content">
            <img src="../../images/uploads/<?= $get_image["image"] ?>" alt="logo" class="icon_user">
            <div class="details">
                <p><?= $posts["first_name"] . " " . $posts["last_name"] ?></p>
                <div class="privacy">
                    <i class="fas fa-user-friends"></i>
                    <span> Friends</span>
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
        </div>


        <div class="update_post">
            <textarea name="description" class= "title" spellcheck="false" style="color:black" ><?= $posts["description"];?></textarea>
            <div class="add-gallery">
                <label for="click_img">
                    <div class="options add-icon" >
                        <input type="hidden" name="update_photo" value="<?= $posts["file_img"]?>">
                        <img id="image-post" src="../images/uploads/<?= $posts["file_img"]?>" alt="" width="100%">
                        <input type="file" name="update_img"  onchange="uploadImage(event)" id="click_img" style="display:none">
                        <div class="add-image">
                            <img src="../images/add-photo.png" alt="" width= "10%"> <br> Update Photo 
                        </div>
                    </div>
                </label>
            </div>
        </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
    </div>
</div>
<script>
// UPLOAD PHOTO--------------
    var uploadImage = function(event){
        var image = document.getElementById("image-post");
        image.src = URL.createObjectURL(event.target.files[0]);
        displayImage();
    }
</script>
<?php
require_once('../templates/footer.php');
?>
