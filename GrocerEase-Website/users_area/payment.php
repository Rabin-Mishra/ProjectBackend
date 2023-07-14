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
</head>

<style>
    img {
        width: 100%;
    }

    .offlinepayment {
        /* font-weight: bold; */
        font-size: 50px;
    }

    .text-success {
        font-size: 60px;
    }

    /* .paymentcontainer {
        position: relative;
        top: 20px;
    } */

    .row {
        top: 30px;
    }
</style>

<body>
    <!-- PHP CODE TO ACCESS THE USER ID  -->
    <?php
    $user_ip = getIPAddress();

    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>


    <div class="container paymentcontainer">
        <!-- Container class won't take 100 % of the width, it will only take some ot the portion  -->
        <h2 class="text-center text-info text-success"> <span class="text-success">Payment Options</span>
        </h2>


        <!-- Both of the things we want side by side, so we wrap it by row  -->
        <div class="row d-flex justify-content-center align-items-center">


            <!-- It means for the medium screen, we are giving six column size for the image  -->
            <div class="col-md-6">
                <a href="https://esewa.com.np" tartget="_blank">
                </a>

                <img src="../image/onlinebankingimages.jpg" alt="esewa link">
            </div>

            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user ?>">
                    <span class="text-success offlinepayment">Pay offline</span>
                </a>
            </div>


            </a>
        </div>
    </div>
</body>


</html>