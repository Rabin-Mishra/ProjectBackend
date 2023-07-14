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
                        <li class="nav-item">
                            <a href="" class="nav-link text-light font-weight-bold">Welcome Guest</a>
                        </li>
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
            <div class="col-md-12 bg-light p-1 d-flex align-items-center">
                <div>
                    <a href="#"><img src="../image/pic-1.png" alt="Admin Image" class="admin_Image"></a>
                    <p class="text-dark text-center font-weight-bold">Admin Name</p>
                </div class="p-5">
                <!-- generatinga an Emmet(Efficient XML-like markup) for a combined class fulfilling all the necessary details as an abbreviated form of shrtcuts
         -->
                <div class="button text-center ">
                    <button class="my-3"><a href="insert_product.php"
                            class="nav-link text-light bg-success my-1 ">Insert
                            Products</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1 ">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-success my-1">Insert
                            Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-success my-1">Insert
                            Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-success my-1">Logout</a></button>
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
        ?>

    </div>

    <!-- last child -->
    <div class="bg-success p-3 text-center footer text-light font-weight-bold">
        <p>All rights reserved &copy;- Designed By Team GrocerEase </p>
    </div>










    <!-- bootstrap js link -->
    <!-- boootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>