<?php include('../admin/config.php');?>

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