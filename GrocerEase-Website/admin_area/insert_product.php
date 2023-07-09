<?php
//..used to come outside of one folder to another folder
include("../includes/connect.php");
if (isset($_POST['insert_product'])) {
    //accessing the values using hthe name values
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = "true";

    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image4 = $_FILES['product_image4']['name'];
    //accessing the image temporary name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    $temp_image4 = $_FILES['product_image4']['tmp_name'];

    //checking for the conditions if the fields provided are filled or not(checking empty conditon)
    if (
        $product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or
        $product_price == '' or $product_brands == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_image4 == ''
    ) {
        echo " <script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        /*now we must create a folder which contains the images of the products that would be stored in the data base*/
        //moving the images inside the folder
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        move_uploaded_file($temp_image4, "./product_images/$product_image4");

        //insert query and use of now() to get exact
        $insert_product = "insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_image4,product_price,date,status ) values('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_image4','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_product);
        if ($result_query) {
            echo " <script>alert('Successfully inserted the product')</script>";
        }

    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
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

<body class="bg-light">
    <div class="container mt-3 ">
        <h1 class="text-center">
            Insert Products
        </h1>
        <!-- form for product insertion -->
        <!-- where  enctype is basically letting insertion of data other than the text-->
        <!-- for and id value should be exactly matching so that the form is more people friendly -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required="required">
            </div> <br>

            <!-- descriptioon -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <label for="descripton" class="form-label">Product Description</label>
                <input type="text" name="description" id="descripton" class="form-control"
                    placeholder="Enter Product Description" autocomplete="off" required>
            </div><br>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placeholder="Enter Product keywords" autocomplete="off" required="required">
            </div><br>

            <!-- now getting the dynamic data from database in the multiple select menu -->
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <select name="product_category" id="product_category" class="form-select" required="required">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo " <option value=' $category_id'>$category_title</option>";
                    }
                    ?>

                </select>
            </div><br>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo " <option value=' $brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div><br>
            <!-- Image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div><br>
            <!-- Image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div><br>
            <!-- Image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div><br>
            <!-- Image4 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image4" class="form-label">Product Image 4</label>
                <input type="file" name="product_image4" id="product_image4" class="form-control" required="required">
            </div><br>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product Price" autocomplete="off" required="required">
            </div><br>
            <div class="form-outline mb-4 w-50 m-auto ">
                <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Insert Products">
            </div><br>

        </form>
    </div>

</body>

</html>