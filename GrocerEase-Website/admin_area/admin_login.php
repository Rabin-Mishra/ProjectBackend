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
    <title>Admin Login</title>
    <!-- boootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boootstrap fontawesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 ">Admin Login</h2>
        <div class="row d-flex justify-content-center  ">
            <div class="col-lg-6  col-xl-5 py-20">
                <img src="../image/admin_login.avif" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 py-5">
                <form action="_self" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your user name" required
                            class="form-control">
                    </div>

                    <div class="form-outline mb-4 ">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                            class="form-control">
                    </div>


                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 text-light font-weight-bold"
                            name="admin_login" value="Login">
                        <p class="small text-dark font-weight-bold py-3">
                            Dont you have an account?
                            <a href="admin_registration.php" class="font-weight-bold text-danger">Register</a>
                        </p>
                    </div>
                </form>

            </div>


        </div>

    </div>
</body>

</html>

<!-- php code for admin  -->
<?php
if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    //query

    $select_query = "select * from `admin_table` where admin_name='$admin_username'";
    $result_login = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result_login);
    $row_data = mysqli_fetch_assoc($result_login);
    $user_ip = getIPAddress();

    //accessing the session variables
    if ($row_count > 0) {
        $_SESSION['admin_name'] = $admin_username;
        if (password_verify($admin_password, $row_data['password'])) {
            if ($row_count == 1) {
                if ($result_login) {
                    echo "<script>
                    alert('Data Inserted successfully')
                    </script>";
                    echo "<script>
                    window.open('index.php','_self')</script>";
                } else {
                    die(mysqli_error($con));
                }
            }
        } else {
            echo "<script>alert('Invalid login credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid login credentials')</script>";
    }

}
?>