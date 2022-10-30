<?php include('../admin/partials/menu.php');?>
<?php
$id =$_GET['id'];

//query to get the details of the id selected

$sql= "SELECT * FROM admin_tbl WHERE id='$id'";

$rel = mysqli_query($conn, $sql);
if($rel==true){
    //check if the data is available or not
    $count= mysqli_num_rows($rel);
    //check if the id has data or not
    if($count==1){
        //get the details and display it
        $rows= mysqli_fetch_assoc($rel);

        $fullname= $rows['fullname'];
        $username = $rows['username'];
        $email= $rows['email'];
        $password = $rows['password'];

    }else {
        //redirect to the manage admin page with an error
        header("location:".HOMEPAGE.'admin/manage-admin.php');
    }
}else{
    echo "could not connect to server, please try again or contact site admin";
}



?>

    <link rel="stylesheet" href="../css/signinandsignupp.css">
    <title>Update Admin </title>
    
    <div class="container">
        <div class="card align-items-center">
            <img class="card-image-top align-content-center" src="../img/open.jpg">
            <div class="card-body">
                <h5 class="card-title mb-3" >Update Admin</h5>
                <form method="POST" action="">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $fullname?>">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo $username?>">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $email?>">

                                        
                    <input type="text" name="id" value='<?php echo $id?>' hidden>

                    <button type="submit" name="submit" class="btn btn-primary mt-2" >Update <?php echo  $username?></button>
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
            $fullname = $_POST['fullname']; 
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = hash('SHA512', $_POST['password']);   
        
            $sql = "UPDATE add_admin SET
            fullname = '$fullname',
            username = '$username',
            email = '$email',
            password = '$password'
            WHERE id='$id'            
            ";

            $rel = mysqli_query($conn, $sql);
            if($rel==true){
                //sucessfully added admin
                $_SESSION['update']= "<label class='success'>$fullname Updated successfully.</label>";
                header('location:'.HOMEPAGE.'admin/manage-admin.php');

            }else
            //failed to add admin
            $_SESSION['update']= "<label class='error'>$fullname Failled to update, please try again or contact site admin.</label>";
            header('location:'.HOMEPAGE.'admin/manage-admin.php');
        }



?>