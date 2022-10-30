<?php 

    //session start
    session_start();
    //constant to store non repeated value  
    define('HOMEPAGE', 'http://localhost/kfoods/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'kfoods');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    $db_select = mysqli_select_db($conn, DB_NAME);
?>  

<?php 


if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message'] = "<div class='bg-primary'>Please Login to Access Admin Panel</div>";
    header("location:".HOMEPAGE."admin/login.php");
}

?>