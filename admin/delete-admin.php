<?php 
include('../admin/config.php');
?>
<?php

//1. get the id of the admin to be deleted
$id = $_GET['id'];


///2. create sql query to delete admin
$sql = "DELETE FROM admin_tbl WHERE id='$id'";


//3. execute the query
$rel = mysqli_query($conn, $sql);
if($rel==true){
    //echo "Admin Deleted";
    $_SESSION['delete'] = "<div class='error'>$fullname Removed  successfully</div>";
    header('location:'.HOMEPAGE.'admin/manage-admin.php');
}else{
    echo "Failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed Removed Admin, Try again Later or contact site admin</div>";
    header('location:'.HOMEPAGE.'admin/manage-admin.php');
}

//3. redeirect to the manage-admin page



?>