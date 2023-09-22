<?php
include('../includes/connect.php');

?>

<!-- Fetching the Products -->

<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id ";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_price = $row['product_price'];

    // Fetching the category
    $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

    // Fetching the brands
    $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}
?>

<div class="container w-50 mt-5 mb-4">
    <h1 class="text-center text-success">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_title" class="form-label font-weight-bold">Product Title</label>
            <input type="text" value="<?php echo $product_title ?>" name="product_title" id="product_title"
                class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="product_desc" class="form-label font-weight-bold">Product Description</label>
            <input type="text" value="<?php echo $product_description ?>" name="product_desc" id="product_desc"
                class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="product_keywords" class="form-label font-weight-bold">Product Keywords</label>
            <input type="text" value="<?php echo $product_keywords ?>" name="product_keywords" id="product_keywords"
                class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="product_category" class="form-label font-weight-bold">Product Categories</label>
            <select name="product_category" class="form-control">
                <option value="<?php echo $category_id ?>">
                    <?php echo $category_title ?>
                </option>
                <?php
                // Fetching all categories
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title_all = $row_category_all['category_title'];
                    $category_id_all = $row_category_all['category_id'];

                    echo "<option value='$category_id_all'>$category_title_all</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="product_brands" class="form-label font-weight-bold">Product Brands</label>
            <select name="product_brands" class="form-control">
                <option value="<?php echo $brand_id ?>">
                    <?php echo $brand_title ?>
                </option>
                <?php
                // Fetching all brands
                $select_brand_all = "SELECT * FROM `brands`";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title_all = $row_brand_all['brand_title'];
                    $brand_id_all = $row_brand_all['brand_id'];

                    echo "<option value='$brand_id_all'>$brand_title_all</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="product_price" class="form-label font-weight-bold">Product Price</label>
            <input type="text" value="<?php echo $product_price ?>" name="product_price" id="product_price"
                class="form-control" required="required">
        </div>
        <div class="w-30 m-auto">
            <input type="submit" value="Update Product" name="edit_product"
                class="btn btn-success px-3 mb-3 font-weight-bold">
        </div>
    </form>
</div>
<!-- editing the products -->
<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    //checking for fields empty or not
    if ($product_title == '' or $product_desc == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '') {
        echo "<script>alert('Please fill all the details then only update')</script>";
    } else {
        //query to update the products
        $update_product = "Update `products` set 
    product_title='$product_title',product_description='$product_desc',product_keywords='$product_keywords',
    category_id='$product_category',brand_id='$product_brands',product_price='$product_price',date=NOW() where product_id='$edit_id'";
        $result_update = mysqli_query($con, $update_product);
        if ($result_update) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

    }
}




?>