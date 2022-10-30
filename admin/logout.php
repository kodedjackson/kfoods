<?php include('..\admin\partials\menu.php') ?>
<?php
//destroy the login sesstion
session_destroy();
//unset user
//unset(isset$_['user'];


//redirect to login page
header('location:'.HOMEPAGE.'admin/login.php');


?>