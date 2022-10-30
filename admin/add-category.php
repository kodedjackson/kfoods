<?php include('../admin/partials/menu.php');?>


<div class="container-fluid">
    <div class="container">
        <h1 class="text-center">ADD CATEGORY</h1>
    </div>
</div>
 <!--ADD CATEGORY -->

<div class="container">
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);

}

if(isset($_SESSION['upload-error'])){
    echo $_SESSION['upload-error'];
    unset($_SESSION['upload-error']);

}

?>
<hr class="hr">
<div class="form-group">
    <form method="POST" action="#" enctype="multipart/form-data" >
        <table class="table">                                   
        <tbody>
            <tr>
                <td><label for="imSDDageS">IMAGE:</label></td>
                <td><input class="form-control-file" name="image" type="file" accept="image/*"> </td>
            </tr>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input name="title" required minlength="5" type="text"></td>
            </tr>
            <tr>
                <td><label class="form-check-label" for="Active">ACTIVE:</label></td>
                <td><input class="form-check-input" type="radio" name="active" value="YES">YES
                <input class="form-check-input" type="radio" name="active" value="NO">NO</td>
            </tr>
            <tr>
                <td><label class="form-check-label" for="featured">FEATURED:</label></td>
                <td><input class="form-check-input" type="radio" name="featured" value="YES">YES
                <input class="form-check-input" type="radio" name="featured" value="NO">NO</td>
            </tr>
            <tr>
                <td></td>
                </td>
            </tr>
        </tbody>
        </table>
        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
</div>

<?php

if(isset($_POST['submit'])){

    $title = $_POST['title'];

    //for radio input type, we need to check if the button is checked or not
    if(isset($_POST['featured'])){
        //get value from form
        $featured = $_POST['featured'];
    }else{
        //select default NO
        $featured = "NO";
    }

    if(isset($_POST['active'])){
        //get value from form
        $active = $_POST['active'];
    }else{
        //select default NO
        $active = "NO";
    }

    //to check for the name of the file in array
    /* print_r($_FILES['image']);  
    die(); */ 
    
   /*  $image_name = $_FILE['image']['name']; 
    $source_path = $_FILE['image']['tmp_name'];
    $destination_path = "../img/category".$image_name;

    print_r($image_name);   
    die(); */
    
   if(isset($_FILES['image']['name'])){
        //upload image using image name, source path amd destination part
        $image_name = $_FILES['image']['name'];

        //Auto rename image using explode method, end is to get the last value;
        $ext = end(explode('.', $image_name));//Image name will now carry Food_Category_37738 + the extension

        //lets rename image
        $image_name = "Food_Categor y_".rand(000,999).'.'.$ext; //example Food_Category_999.jpg

        //source file path
        $source_path = $_FILES['image']['tmp_name'];

        //where the file will be saved;
        $destination_path = "../admin/img/category/".$image_name;


        //upload image
        $upload = move_uploaded_file($source_path, $destination_path);

        //check if the image is uploaded or not
        if($upload==FALSE){
            //error message
            $_SESSION['upload-error'] = "<div class='bg-primary'>Failed to Upload Image</div>";
            header("location:".HOMEPAGE.'admin/add-category.php');
            die();
        }
 

        //if it doesn't work, stop and show error

    }else{
        //dont upload image and set name to blank
        echo "FAILED";
    }
    //Query to insert data into database
    $sql = "INSERT INTO category_tbl SET 
        title='$title',
        img_name= '$image_name',
        featured ='$featured',
        active = '$active'
    ";


$query = mysqli_query($conn, $sql);

if($query==TRUE){
    //echo "DATA SUCESSFULLY SENT";

    $_SESSION['add'] = "<div class='bg-primary'>$title Added Successfully</div>";
    //redirect to category page
    header("location:".HOMEPAGE.'admin/manage-category.php');
}else{
    //failed to add catgory
    $_SESSION['add'] = "<div class='bg-primary'>Failed to add category, Please contact site admin</div>";
    header("location:".HOMEPAGE.'admin/manage-category.php');

}
    
}




?>