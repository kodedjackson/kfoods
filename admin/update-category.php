<?php include('../admin/partials/menu.php')?>

<?php 
$id= $_GET['id'];
//run sql to get data from the table

$sql = "SELECT * FROM category_tbl where id='$id'";

$query = mysqli_query($conn, $sql);

$rows = mysqli_fetch_assoc($query);

$old_title = $rows['title'];
$old_image_name = $rows['img_name'];
$old_featured = $rows['featured'];
$old_active = $rows['active']; 



?>

<div class="container-fluid text-center">
    <div class="container">
        <h1 class="text-center">UPDATE <?php echo $old_title;?> CATEGORY</h1>
    </div>
</div>
 <!--ADD CATEGORY -->

<div class="container">
<?php
/* 
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);

}

if(isset($_SESSION['upload-error'])){
    echo $_SESSION['upload-error'];
    unset($_SESSION['upload-error']);

}
 */
?>
<hr class="hr">
<div class="form-group text-center">
    <form method="POST" action="#" enctype="multipart/form-data" >
        <table class="table">                                   
        <tbody>
            <tr>
                <td><label for="imSDDageS">IMAGE:</label></td>
                <td><input class="form-control-file" placeholder="<?php echo $old_image_name ;?>" name="image" type="file" accept="image/*"> </td>
            </tr>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input name="title" required minlength="5" placeholder="<?php echo $old_title ;?>" type="text"></td>
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
        <button type="submit" name="submit" class="btn btn-primary">UPDATE <?php echo $old_title;?> CATEGORY</button>
    </form>
</div>
</div>
<!-- 
<?php 




$sql2 = "UPDATE category_tbl WHERE id='$id' SET 
        title: $title,
        image_name: $image_name,
        featured: $featured,
        active: $active

";

?> -->