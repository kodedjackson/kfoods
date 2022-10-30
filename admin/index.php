<?php include('../admin/partials/menu.php');?>  

<div class="container-fluid">
    <div class="container text-center">
        <h1 class="text-center">DASHBOARD</h1>
        <?php 
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }


        ?>

        <a href="logout.php"><button class="btn btn-danger">LOGOUT</button></a>
    </div>
    <div class="row text-center">
        <div class="col text-center">
            <h3>5</h3>
            <h5>Category</h5>
        </div>
        <div class="col">
            <h3>5</h3>
            <h5>Category</h5>
        </div>
        <div class="col">
        <h3>5</h3>
            <h5>Category</h5>
        </div>
        <div class="col">
            <h3>5</h3>
            <h5>Category</h5>
        </div>

    </div>

</div>