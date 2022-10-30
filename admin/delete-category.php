<?php require('config.php');?>



<?php
//check if the value is passed or not because of security


//check if id and image name is set

if(isset($_SESSION['delete-category'])){
    echo $_SESSION['delete-category'];
    unset($_SESSION['delete-category']);
}


if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //use get method to get the values
    
    //GET THE ID OF THE CATEGORY
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove o=image from the image folder;

    if($image_name != ''){

        $path = "../admin/img/category/".$image_name;

        $remove = unlink($path);

        //check if image was removed or not;
        if($remove==FALSE){
            $_SESSION['delete-image'] = "<div class='bg-danger'>Failed to remove image</div>";
            //redirect to home page
            header('location:'.HOMEPAGE.'/admin/manage-category.php');
            die();
        }
    }

    //run sql that will identify catgory by id

    $sql = "DELETE FROM category_tbl WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    if($query==TRUE){
        //echo "Burger succesfully deleted";
        $_SESSION['delete-category'] = "<div class='bg-primary'>Category removed succcessfuly;</div>";
        header('location:'.HOMEPAGE.'admin/manage-category.php');
    }

}else{
    //redirect to the manage category page
    $_SESSION['delete-category'] = "<div class='bg-danger'>Failed to remove category</div>";
    header('location:'.HOMEPAGE.'admin/manage-category.php');
    
}

//DELTE THE CATEGORY

























?>