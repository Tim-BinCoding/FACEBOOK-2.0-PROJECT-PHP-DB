

<?php 
require_once("../templates/header.php");
require_once("../models/post.php");
$profiles = profile_user();
?>

<nav class="navbar_facebook">
    <div class="container-fluid">
        <!-- LOGO FB -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="../images/icon-facebook.webp" alt="" width="25%"></a>
        </div>
        <!-- HOME PAGE -->
        <div class="nav_pages">
            <a href="../index.php"> <li class="fa fa-home" style="font-size:25px"></li></a>
            <a id="active" href=""><li class="fa fa-group" style="font-size:22px"></li></a>
        </div>      
        <!-- ICON USER NAME -->
        <div class="nav_icons">
            <div class="user_profile"><a href="profile.php" ><img src="../images/uploads/<?=$profiles["image"]?>" alt="" width=" 100%"></a> <span ><?=$profiles["first_name"]?></span></div>
            <a href="logout.php"><img src="../images/log-out.png" alt="" width="10%"></a>
        </div>
    </div>
</nav>

<!-- FREINDSHIP -->

<div class="group_friendship">
    <div class="friendship">
        <div class="profile_friendship">
            <span class="profile_img"><img src="../images/uploads/cover.jpg" alt=""></span>
            <span class="friend_name">username</span>
        </div>
        <div class="btn_request_acept">
            <div class="btn_reques">Add friend</div>
            <div class="btn_reques">Delete</div>
        </div>
    </div>
</div>
<?php require_once("../templates/footer.php") ?>