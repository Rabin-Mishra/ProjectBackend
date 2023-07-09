<!-- connecting to the databaase -->
<?php
//connecting to local server
include('./includes/connect.php');
//including the common function 
include('functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website Using PHP and MYsql</title>
    <!-- boootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <!-- boootstrap fontawesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file link -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- creating the nav bar -->
    <!-- container-fluid is a bootstrap class and on using it will take the 100% of width -->
    <!-- giving padding 0 so  that ii would take 100% of the width -->
    <div class="container-fluid p-0">
        <!-- creating the nav bar inside of the container -->
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <img src="./image/UnsplashImages/cat-1.png" alt="image" class="logo">
            <!-- here thsi button code will make our site to be responsive
         -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="index.php"><b>Home</b> <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="display_all.php"><b>Products</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./users_area/user_registration.php"><b>Register</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><b>Contact</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="cart.php"><i
                                class="fa-sharp fa-solid fa-cart-plus"></i><sup>
                                <?php
                                cart_item();
                                ?>
                            </sup></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#"><b>Total Price
                                <?php
                                total_cart_price();
                                ?>/-
                            </b></a>
                    </li>

                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>
        <!-- calling the cart function -->
        <?php
        cart();
        ?>

        <!--Second child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./users_area/user_login.php"> <img src="./Icons/user.png" alt="User Login"
                            class="userLogin"><sup>Login</sup></a>
                </li>
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h2 class="text-center">GrocerEase</h2>
            <h3 class="text-center">Ease Your Shopping Experiece Where Quality and Convenience Meet</h3>
        </div>
        <!-- fourth child -->
        <!-- inside of this class row wil contain 8 cards with eahc row containng 4 cards each -->

        <div class="row px-1">
            <div class="col-md-10">
                <!-- for displaying all the products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    //callling the functions
                    get_all_products();
                    get_unique_categories();
                    get_unique_brands();

                    ?>
                    <!--row end  -->
                </div>
                <!-- column end -->
            </div>
            <!-- Brands to be dsiplayed -->
            <div class="col-md-2 bg-light p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-success">
                        <a href="#" class="nav-link  text-light">
                            <h4>Retailers and Wholesalers</h4>
                        </a>
                    </li>
                    <?php
                    //calling the brands from common functions
                    getBrands();


                    ?>
                </ul>
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-success">
                        <a href="#" class="nav-link  text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    /*calling the functions to import the catgories from data base from common_function.php*/
                    getCategories();
                    ?>

                </ul>
            </div>
        </div>


        <!-- last child  -->
        <!-- creating the footer section -->
        <!-- use of padding of 3 in the  footer section and the text-center class to align the text to the center  -->
        <!-- include footer -->
        <?php
        include("./includes/footer.php");
        ?>
    </div>


    <!-- boootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>


</body>

</html>