<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- boootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
    <!-- container fluid will take complete 100% of the width whatever the width we are having of our system-->
    <div class="container-fluid my-3">
        <h2 class="text-center">
            New User Registration
        </h2>
        <div class="row d-flex aligh-items-center justify-content-center">
            <!-- lg=large and xl for extra large -->
            <!-- for storing the images we will be using enctype as multipart form-data -->
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- bootstrap class for form -->
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control " placeholder="Enter your username"
                            autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control " placeholder="Enter your email"
                            autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_image" class="form-control " required="required" name="user_image">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control "
                            placeholder="Enter your Password" autocomplete="off" required="required"
                            name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label"> Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control "
                            placeholder="Confirm your Password" autocomplete="off" required="required"
                            name="conf_user_password">
                    </div>
                    <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_adress" class="form-label">Address</label>
                        <input type="text" id="user_adress" class="form-control " placeholder="Enter your adress"
                            autocomplete="off" required="required" name="user_adress">
                    </div>
                    <!-- Contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control "
                            placeholder="Enter your mobile number" autocomplete="off" required="required"
                            name="user_contact">
                    </div class="mt-4 pt-2">
                    <div>
                        <input type="submit" value="Register" class="bg-success py-2 px-3 border-0"
                            name="user_register">
                        <p class="small font-weight-bold mt-3 pt-1 mb-0">Alredy have an account?
                            <a href="user_login.php" class="text-success"> Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- php code for data insertion -->
<?php
//chek id the button is clicked to insert the value inside the database
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_adress'];
    $user_contact = $_POST['user_contact'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    // $user_ip = getIPAddress();
    $user_ip = $_SERVER['REMOTE_ADDR'];


    move_uploaded_file($user_image_temp, "./user_images/$user_image");

    //select query
    $select_query = "select * from `user_table` where username=' $user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username Or email already exists ')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Passwords dont match form not registered ')</script>";
    } else {
        //inserting the data inside the database
        $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hashed_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
    //selecting the cart items
    $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>