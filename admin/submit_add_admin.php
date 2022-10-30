<?php 
include('../admin/config.php');
?>
<?php
$full_name = $_POST['fullname']; 
$username = $_POST['username'];
$email = $_POST['email'];
$password = hash('SHA512', $_POST['password']);


$qry = "INSERT INTO admin_tbl(`fullname`, `username`, `email`, `password`) VALUES ('$full_name','$username','$email','$password')";

$insert = mysqli_query($conn, $qry);
if ($insert==true) {
    //echo "Data submitted";
    $_SESSION['add'] = "<div class='success'>$full_name added Successfully</div>";
    header('location:'.HOMEPAGE.'admin/manage-admin.php');
}
else {
    //echo "There are some error";
    $_SESSION['add'] = "<div class='error'>Failed to add, try again or contact site admin</div>";
    header('location:'.HOMEPAGE.'admin/manage-admin.php');
}
?>