

<?php 
session_start();
if (isset($_SESSION['login']) && ($_SESSION['login'] == true)){  
        header("location: index.php");
    }
    else{
        require_once("templates/login_header.php");
        require_once("views/login_view.php");
    }

?>


<?php require_once("templates/login_footer.php");