<?php

include("../includes/connect.php");
//if the particular button insert_cat is set then will act
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    //selecting the data from the database
    $select_query = "SELECT * FROM `brands` WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    //counting the number of rows
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand is already present inside the database')</script>";
    } else {
        //inserting the data into the databases
        $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
    //remember the column name must be matching with my nane input
}
?>
<h2 class="text-center">Insert Brands</h2>




<!-- we must plan to access and control the whole field structure using index.php so no need to import the bootstrap files in each of the .php file extension where the css and js linked are already placed-->

<form action="" method="post" class="mb-2">
    <!-- input-group is a bootstrap class -->
    <div class="input-group w-90 mb-2">

        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>

        <!-- bootstrap class will only be applied after giving  hte form-control class
     -->
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">


        <!-- bootstrap class will only be applied after giving  hte form-control class
     -->
        <input type="submit" class=" bg-success text-light font-weight-bold border-0 p-2 my-3" name="insert_brand"
            value="Insert Sellers">
        <!-- <button class="bg-success text-light font-weight-bold p-2 my-3 border-0">Insert Brands</button> -->
    </div>
</form>