<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5 ">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6  col-xl-5">
                <img src="../image/admin_reg1.avif" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your user name" required
                            class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                            class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_password" name="conf_password" placeholder="Enter your password"
                            required class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 text-light font-weight-bold"
                            name="admin_registration" value="Register">
                        <p class="small text-dark font-weight-bold py-3">
                            Already have an account?
                            <a href="admin_login.php" class="font-weight-bold text-danger">Login</a>
                        </p>
                    </div>
                </form>

            </div>


        </div>

    </div>
</body>

</html>
<!-- php code -->
<?php
//checking if the button is clicked to insert the value inside the database
if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $admin_hashP = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_password'];

    //select query
    $admin_select_query = "select * from `admin_table` where admin_name='$admin_username' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $admin_select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username or email already exists')</script>";
    } else if ($admin_password != $conf_admin_password) {
        echo "<script>
        alert('Password dont match form not registered')
        </script>";
    } else {
        //inserting of the data inside of the database
        $insert_query = " Insert into `admin_table` (admin_name,admin_email, admin_password) values ('$admin_username','$admin_email','$admin_hashP')";

        $sql_execute = mysqli_query($con, $insert_query);
    }
    if ($sql_execute) {
        echo "<script>
        alert('Data inserted successfully')
        </script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    } else {
        die(mysqli_error($con));
    }

}
?>