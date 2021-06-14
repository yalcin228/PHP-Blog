<?php
    if(!$_SESSION['admin_username']){
        header("Location:login.php");
    }
?>