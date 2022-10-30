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

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="..\css\main.min.css">
<link rel="stylesheet" href="../node_modules/bootstrap-icons">
<link rel="stylesheet" href="style.css">
<div class="container-fluid align-items-start text-danger">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">~KFoods</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../admin/index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../admin/manage-admin.php">Admin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../admin/manage-category.php">Category</a>
                  </li><li class="nav-item">
                    <a class="nav-link" href="../admin/manage-food.php">Food</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../admin/manage-order.php">Orders</a>
                  </li>
              </div>
            </div>
        </nav>
    </div>
</head>
<style>
    .success{
      color: green;
    }
    .error{
      color: red;
    }

    .not-match{
        color: yellow;
    }
</style>
    <div class="container-fluid text-center">
        <div class="card align-items-center" id="cardsignin">
            <img class="card-image-top align-content-center" src="../img/open.jpg" width="20%">
            <div class="card-body">
                <h5 class="card-title mb-3" >Sign In</h5>


                
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }


                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    } 
                ?><form method="POST" action="">
                      <label for="username">Username:</label>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Username">

                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">

                      <button type="submit" name="submit" class="btn btn-primary mt-2">Submits</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



<?php
if (isset($_POST['submit'])){

    $username = $_POST['username'];
    echo $password =hash('SHA512', $_POST['password']);

    $selectquery= "SELECT * FROM admin_tbl where username='$username'AND password='$password'";

    $result = mysqli_query($conn, $selectquery);

    $count = mysqli_num_rows($result);
    if($count==1){
        //echo "You have successfully logged in";
        $_SESSION['login'] = "<div class='success'>Welcome $username</div>";
        $_SESSION['user'] = $username;
        
        
        header('location:'.HOMEPAGE.'admin/');


 
    }else
    {
        //echo "Incorrect Email or password";
        $_SESSION['login'] = "<div class='bg-primary    '>Incorrect Username or Password</div>";
        header('location:'.HOMEPAGE.'admin/login.php');
    }
}

?>