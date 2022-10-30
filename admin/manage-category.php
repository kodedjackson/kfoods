<?php include('../admin/partials/menu.php')?>
<?php
$sql = "SELECT * FROM category_tbl";

$query =mysqli_query($conn, $sql);



?>

<div class="container-fluid">
  <h1 class="text-center">MANAGE CATEGORY</h1>
</div>
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);

}


if(isset($_SESSION['delete-category'])){
  echo $_SESSION['delete-category'];
  unset($_SESSION['delete-category']);
}

if(isset($_SESSION['delete-image'])){
  echo $_SESSION['delete-image'];
  unset($_SESSION['delete-image']);
}
?>
<hr class="hr">
<div class="container-fluid text-center">
  <a href="<?php echo HOMEPAGE; ?>admin/add-category.php" class="btn btn-primary">ADD CATEGORY</a>
  <a href="<?php echo HOMEPAGE?>logout.php" class="btn btn-danger">LOGOUT</a>
</div>
<div class="container-fluid">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php 
  $count = mysqli_num_rows($query);
  $SN=1;
  //check for data in the datbase
  if($count>0){
    

    //data is in database
    while($rows = mysqli_fetch_assoc($query)){
      $id = $rows['id'];
      $title = $rows['title'];
      $image_name = $rows['img_name'];
      $featured = $rows['featured'];
      $active = $rows['active'];
?>
  <tr>
    <td><?php echo $SN++; ?></td>
    <td><?php echo $title?></td>
    <td><img src="<?php echo HOMEPAGE; ?>admin/img/category/<?php echo $image_name;?>" width="150px"></td>
    <td><?php echo $featured ?></td>
    <td><?php echo $active ?></td>
    <td><a href="<?php echo HOMEPAGE ;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>"><button class="btn btn-danger">DELETE</button></a>
        <a href="<?php echo HOMEPAGE;?>admin/update-category.php?id=<?php echo $id;?>"><button class="btn btn-primary">UPDATE</button></a>
    </td>
    
  </tr>
  <?php 
    }
  }else{
    //no data found

?>
<tr>
  <td colspan="6"><div class="bg-danger text-center">NO CATEGORY FOUND.</div>

  </td>
</tr>
<?php 
  }
  ?>
  
<tbody>

</div>