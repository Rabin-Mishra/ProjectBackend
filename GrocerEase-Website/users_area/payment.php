<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- boootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    img {
        width: 400px;
        height: 200px;
        margin: auto;
        display: block;
    }
</style>

<body>

    <!--    <?php
    $user_ip = getIPAddress();
    $get_user = "select * from `user_table` where user_ip='user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];

    ?>  -->
    <div class="container">
        <h2 class="text-center text-success font-weight-bold">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6"> <a href="https://esewa.com.np" target="_blank"><img src="../image/Payment/esewa.jpg"
                        alt="Esewa"></a>
                <a href="https://khalti.com/" target="_blank"><img src="../image/Payment/khalti.jpg" alt="Khalti"></a>
                <a href="https://www.imepay.com.np/"><img src="../image/Payment/imepay.png" alt="IMEPAY"></a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <h2 class="text-center text-success text-decoration-none">Cash On Delivery</h2>
                </a>
            </div>

        </div>
    </div>


</body>

</html>