<?php include('..\admin\partials\menu.php'); ?>
      <!-----::::::::::::::SECTIOn:::::::::::::-->
      <div class="container">
      <style>
        .success{
          color: green;
        }

        .error{
          color: red;
        }
      </style>
      <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }

        if(isset($_SESSION['delete'])){
          echo $_SESSION['delete'];
          unset ($_SESSION['delete']);
        }

        if(isset($_SESSION['update'])){
          echo $_SESSION['update'];
          unset ($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found'])){
          echo $_SESSION['user-not-found'];
          unset ($_SESSION['user-not-found']);
      }

      if(isset($_SESSION['password-changed'])){
        echo $_SESSION['password-changed'];
        unset($_SESSION['password-changed']);
      }

      if(isset($_SESSION['password-not-changed'])){
        echo $_SESSION['password-not-changed'];
        unset($_SESSION['password-not-changed']);
      }

      if(isset($_SESSION['password-not-match'])){
        echo $_SESSION['password-not-match'];
        unset($_SESSION['password-not-match']);
      }

      if(isset($_SESSION['password-incorrect'])){
        echo $_SESSION['password-incorrect'];
        unset($_SESSION['password-incorrect']);
      }
      ?>
      <hr>
        <h1>Manage Admin</h1>
        <div>
          <a href="add-admin.php"><button class="btn btn-primary">Add Admin</button></a>
        </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //run a query to get all data
    $sql= "SELECT * FROM `admin_tbl`"; 

    //execute the query
    $res = mysqli_query($conn, $sql);
    //check for the query execution and run it
    if($res==TRUE){
      //run through the list
      $count = mysqli_num_rows($res);
      $sn=1;

      if ($count>0){
        //we have data in databse
        while($rows=mysqli_fetch_assoc($res)){
          //using while loop to get all the data in the database  
          //get individual data

          $id = $rows['id'];
          $fullname=$rows['fullname'];
          $username =$rows['username'];
          $email=$rows['email'];

          
          ?>
            <tr>
            <td><?php echo $sn++ ?></th>
            <td><?php echo $fullname ?></td>
            <td><?php echo $username ?></td>
            <td><?php echo $email ?></td>
            <td>
              <a href="<?php echo HOMEPAGE;?>admin/update-admin.php?id=<?php echo $id; ?>"class="btn btn-success">Update Info</a>
              <a href="<?php echo HOMEPAGE;?>admin/change-password.php?id=<?php echo $id; ?>"class="btn btn-info">Change Password</a>
              <a href="<?php echo HOMEPAGE;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete Admin</a>
                            </td>
          </tr>


          <?php

        }
      }else{
        //we do not have database
      }
    }else{

    }


  ?>
  </tbody>
</table>
</div>
</body>