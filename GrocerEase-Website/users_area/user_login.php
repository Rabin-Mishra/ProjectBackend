<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
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
            User Login
        </h2>
        <div class="row d-flex aligh-items-center justify-content-center">
            <!-- lg=large and xl for extra large -->
            <!-- for storing the images we will be using enctype as multipart form-data -->
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- bootstrap class for form -->
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control " placeholder="Enter your username"
                            autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control "
                            placeholder="Enter your Password" autocomplete="off" required="required"
                            name="user_password">
                    </div>

                    <div>
                        <input type="submit" value="Login" class="bg-success py-2 px-3 border-0" name="user_login">
                        <p class="small font-weight-bold mt-3 pt-1 mb-0">Dont have an account?
                            <a href="user_registration.php" class="text-success"> Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    //query for selecting the username from the user_table
    $select_query = "select * from `user_table` where username='$user_username'";
    $result_login = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result_login);
    $row_data = mysqli_fetch_assoc($result_login);
    $user_ip = getIPAddress();

    //cart items
    $select_cart_query = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_query);
    $row_count_cart = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        //accesssing the session variables 
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Logged in Successfully')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                echo "<script>alert('Logged in successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('User logged in successfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }

        } else {
            echo "<script>alert('Invalid login credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }

}

?>