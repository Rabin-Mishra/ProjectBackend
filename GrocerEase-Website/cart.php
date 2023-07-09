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
    <title>Cart Details</title>
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
    <style>
        .cart_img {
            width: 110px;
            height: 110px;
            object-fit: contain;
        }
    </style>

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

                </ul>

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
        <div class="container">
            <div class="row  ">
                <form action="" method="post">
                    <table class="table table-bordered border border-2  text-center ">

                        <!-- php code to display the dynamic data -->
                        <?php
                        global $con;
                        $get_ip_add = $_SERVER['REMOTE_ADDR'] ?? '';

                        // $get_ip_add = $_SERVER['REMOTE_ADDR'];
                        // $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
    
                            </thead>
                            <tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
                                $result_products = mysqli_query($con, $select_products);

                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $product_title
                                                ?>
                                        </td>
                                        <td><img src="./admin_area/product_images/<?php
                                        echo $product_image1
                                            ?>" alt="" class="cart_img"></td>
                                        <td><input type="text" name="qty" class="form-input  h-20"></td>
                                        <!-- php code to update the quantity -->
                                        <?php
                                        // $get_ip_add = $_SERVER['REMOTE_ADDR'];
                                        $get_ip_add = $_SERVER['REMOTE_ADDR'] ?? '';


                                        // $get_ip_add = getIPAddress();
                                        // if (isset($_POST['update_cart'])) {
                                        //     $quantities = $_POST['qty'];
                                        //     // $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                        //     // $update_cart = "UPDATE `cart_details` SET quantity = $quantities WHERE ip_address = '$get_ip_add'";
                                        //     // $update_cart = "UPDATE `cart_details` SET quantity={$quantities} WHERE ip_address='{$get_ip_add}'";
                                        //     $update_cart = "UPDATE `cart_details` SET quantity=? WHERE ip_address=?";
                                        //     $stmt = mysqli_prepare($con, $update_cart);
                                        //     mysqli_stmt_bind_param($stmt, 'is', $quantities, $get_ip_add);
                                        //     mysqli_stmt_execute($stmt);
                            

                                        //     $result_products_quantity = mysqli_query($con, $update_cart);
                                        //     // $total_price = $total_price * $quantities;
                                        //     // $total_price = intval($total_price) * intval($quantities);
                                        //     $total_price = $total_price * intval($quantities);
                            

                                        // }
                                        // ...
                            
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "UPDATE `cart_details` SET quantity=? WHERE ip_address=?";
                                            $stmt = mysqli_prepare($con, $update_cart);
                                            mysqli_stmt_bind_param($stmt, 'is', $quantities, $get_ip_add);
                                            mysqli_stmt_execute($stmt);
                                            $total_price = intval($total_price) * intval($quantities);
                                        }

                                        // ...
                            

                                        ?>


                                        <td>
                                            <?php
                                            echo $price_table
                                                ?>/-
                                        </td>
                                        <td> <input type="checkbox" name="removeitem[]" value="
                                        <?php echo $product_id
                                            ?>" id=""> </td>
                                        <td>

                                            <input type="submit" value="Update Cart" class="bg-success p-2 m-3 border-0 text-light"
                                                name="update_cart">
                                            <!-- <button class="bg-success p-2 border-0 text-light">Remove Item</button> -->
                                            <input type="submit" value="Remove Item" class="bg-success p-2 m-3 border-0 text-light"
                                                name="remove_cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";

                        }
                        ?>
                        </tbody>
                    </table>

                    <!-- subtotal -->
                    <div class="d-flex mb-3 mt-2">
                        <?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo " <h4 class='px-3'>Subtotal:
                               <strong class='text-success'>
                                   $total_price/- </strong> </h4>
<input type='submit' value='Continue Shopping' class='bg-success p-2 m-3 border-0 text-light'
name='continue_shopping'>
 <button class='bg-secondary px-1 border-0 m-3 text-light'><b><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></b></button>
";
                        } else {
                            echo "<input type='submit' value='Continue Shopping' class='bg-success p-2 m-3 border-0 text-light'
                            name='continue_shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }

                        ?>

                    </div>



            </div>
        </div>
        </form>
        <!-- function to remove items -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                //use of for each loop to acces the product_id
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "delete  from  `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')
                        </script>";
                    }
                }
            }
        }
        echo remove_cart_item();
        // echo $remove_item = remove_cart_item();
        ?>

        <!-- last child  -->
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