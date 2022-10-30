<?php 
include('../admin/partials/menu.php');
?>
<?php
$id =$_GET['id'];

//query to get the details of the id selected

$sql= "SELECT * FROM admin_tbl WHERE id=$id";

$rel = mysqli_query($conn, $sql);
if($rel==true){
    //check if the data is available or not
    $count= mysqli_num_rows($rel);
    //check if the id has data or not
    if($count==1){
        //get the details and display it
        $rows= mysqli_fetch_assoc($rel);

        $password = $rows['password'];

    }else {
        //redirect to the manage admin page with an error
        echo "could not connect to server, please try again or contact site admin";
        header("location:".HOMEPAGE.'admin/manage-admin.php');
    }
}else{
    echo "could not connect to server, please try again or contact site admin";
}
?>


<link rel="stylesheet" href="../css/signinandsignupp.css">
    <title>Change Password</title>
    
    <div class="container-fluid">
        <div class="card align-items-center">
            <!-- <img class="card-image-top align-content-center" src="../img/welcome.jpeg"> -->
            <div class="card-body has-bg-img">
            <img class="bg-img" src="../img/welcome.jpeg">
                <h5 class="card-title mb-3" >Change Password</h5>
                <form method="POST" action="">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Old password">
                    <label for="new_password">New Passord</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New password" >
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">

                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <button type="submit" name="submit" class="btn btn-primary mt-2">Change Password</button>
                </form>
            </div>

        </div>
    </div>
    <?php 
    //update database with new data gotten from the form
        if(isset($_POST['submit'])){
            //echo 'button clicked';
            //get new data
            $id= $_POST['id'];
            $current_password = hash('SHA512', $_POST['current_password']);
            $new_password = hash('SHA512', $_POST['new_password']);
            $confrim_password = hash('SHA512', $_POST['confirm_password']);  

            if($current_password==$password){
                if($new_password==$confrim_password)
                {
                    $sql = "UPDATE admin_tbl SET password ='$new_password' WHERE id=$id";

                    $rel = mysqli_query($conn, $sql);
                    if($rel==true)
                    {
                        $_SESSION['update']= "<label class='success'>Password Updated successfully.</label>";
                        header('location:'.HOMEPAGE.'admin/manage-admin.php');
                    }else
                    //failed to add admin
                    $_SESSION['user-not-found']= "<label class='error'>ERROR!! User Not Found</label>";
                    header('location:'.HOMEPAGE.'admin/manage-admin.php');
                }else
                {
                    //password did not match
                    $_SESSION['password-not-match'] = "<div class='error'>ERROR!! Password Did Not Match</div>";
                    header('location:'.HOMEPAGE.'admin/manage-admin.php');
                }
            }else
            {
                //incorrect password
                echo "password was not changed";
                $_SESSION['password-changed'] = "<div class='error'>ERROR!! Incorrect Password</div>";
                header('location:'.HOMEPAGE.'admin/manage-admin.php');
            }    
        }
?>