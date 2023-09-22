<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard
    </title>
    <!-- boootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boootstrap fontawesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- css files link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .product_img {
            width: 100px;
            object-fit: contain;

        }
    </style>
</head>

<body>
    <!-- navbar -->
    <!-- inside of bootstrap classes we will be having the padding and margin and to remove that padding and margin we must give the necessary padding for the class -->
    <div class="container-fluid p-0">
        <!-- these are the bootstrap classes -->
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <img src="../image/UnsplashImages/cat-1.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "  <li class='nav-item'>
                    <a class='nav-link text-light' href='#'> <b>Welcome Guest</b> </a>
                    </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='#'> <b>Welcome " . $_SESSION['admin_name'] . "
                            </b> </a>
                            </li>";
                        }

                        if (!isset($_SESSION['admin_name'])) {
                            echo '<li class="nav-item">
                                    <a class="nav-link text-light font-weight-bold" href="admin_login.php">Login</a>
                                  </li>';
                        } else {
                            echo '<li class="nav-item">
                                    <a class="nav-link text-danger font-weight-bold" href="admin_logout.php">Logout</a>
                                  </li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <!-- we will be having two sections the first section for the image and the second section for the buttons and all the sections will be in horizontal row
         and so to bring this in horizontal row we will wrap it in the row class
     -->
        <!-- whenever we are wrapping to row class there would be columns and whenever we are giving that columns it should always sum up to 12-->
        <div class="row">
            <div class="col-md-12 bg-light p-1 d-flex align-items-center font-weight-bold">
                <div>
                    <a href="#"><img src="../image/pic-1.png" alt="Admin Image" class="admin_Image"></a>
                    <p class="text-success text-center font-weight-bold">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "  <li class='nav-item'>
                    <a class='nav-link text-light' href='#'> <b>Welcome Guest</b> </a>
                    </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link text-success pb-10' href='#'> <b>Welcome " . $_SESSION['admin_name'] . "
                            </b> </a>
                            </li>";
                        }
                        ?>

                    </p>
                </div class="p-5">
                <!-- generatinga an Emmet(Efficient XML-like markup) for a combined class fulfilling all the necessary details as an abbreviated form of shortcuts
         -->
                <div class="button text-center px-4 bg-success ">
                    <button class="my-3"><a href="insert_product.php"
                            class="nav-link text-light bg-success my-1 font-weight-bold ">Insert
                            Products</a></button>
                    <button><a href="index.php?view_products"
                            class="nav-link text-light bg-success my-1 font-weight-bold">View
                            Products</a></button>
                    <button><a href="index.php?insert_category"
                            class="nav-link text-light bg-success my-1 font-weight-bold">Insert
                            Categories</a></button>
                    <button><a href="index.php?view_categories"
                            class="nav-link text-light bg-success my-1 font-weight-bold">View
                            Categories</a></button>
                    <button><a href="index.php?insert_brand"
                            class="nav-link text-light bg-success my-1 font-weight-bold">Insert
                            Brands</a></button>
                    <button><a href="index.php?view_brands"
                            class="nav-link text-light bg-success my-1 font-weight-bold">View
                            Brands</a></button>
                    <!-- <button><a href="" class="nav-link text-light bg-success my-1 font-weight-bold">All
                            Orders</a></button> -->
                    <!-- <button><a href="" class="nav-link text-light bg-success my-1 font-weight-bold">All
                            Payments</a></button> -->
                    <!-- <button><a href="" class="nav-link text-light bg-success my-1 font-weight-bold">List
                            Users</a></button> -->
                    <button><a href="admin_logout.php"
                            class="nav-link text-light bg-success my-1 font-weight-bold">Logout</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- fourth child -->
    <div class="container my-3">
        <!-- inserting the get variable which is insert_category where if the get variable is active then only the file to be redirected will be inserted-->
        <?php

        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }

        ?>

    </div>

    <!-- last child
    <div class="bg-success p-3 text-center footer text-light font-weight-bold">
        <p>All rights reserved &copy;- Designed By Team GrocerEase </p>
    </div> -->
    <?php
    include("../includes/footer.php");
    ?>
    </div>

    <!-- bootstrap js link -->
    <!-- boootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>