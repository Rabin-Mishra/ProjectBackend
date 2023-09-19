<?php
/*including the connect file
since the includes and functions folders are in the same level so a single . is being used*/
//include('../includes/connect.php');

//including the functions


//getting products
if (!function_exists('getProducts')) {
    function getProducts()
    {

        global $con;

        //conditon to check is set or not
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {

                $select_query = "select * from `products` order by rand() limit 0,12";
                $result_query = mysqli_query($con, $select_query);
                // echo ($result_query);


                while ($row = mysqli_fetch_assoc($result_query)) {

                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    // $product_keywords = $row['product_keywords'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo " <div class='col-md-3 mb-2'>
             <div class='card ' >
                 <img src='./admin_area/product_images/$product_image1' class='card-img-top ' alt='Apple'>
                 <div class='card-body'>
                     <h5 class='card-title'>$product_title</h5>
                     <p class='card-text'>$product_description</p>
                     <p class='card-text'>Price:Rs.$product_price/-</p>
                     <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                 </div>
             </div>
         </div>";
                }
            }
        }
    }
}

//getting all the products
function get_all_products()
{
    global $con;
    //conditon to check is set or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() ";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                // $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo " <div class='col-md-3 mb-2'>
          <div class='card ' >
              <img src='./admin_area/product_images/$product_image1' class='card-img-top ' alt='Apple'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price:Rs.$product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
          </div>
      </div>";
            }
        }
    }
}
//getting uniuqe categories
function get_unique_categories()
{
    global $con;

    //condition to check if category is set
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
        }


        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];

            echo "<div class='col-md-3 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                 <p class='card-text'>Price:Rs.$product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}
//getting and grouping in terms of wholesalers and retailers
function get_unique_brands()
{
    global $con;

    //condition to check if category is set
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>This Particular (Retailers OR Wholesalers) is not  available for the service</h2>";
        }


        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];

            echo "<div class='col-md-3 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='Product Image'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                 <p class='card-text'>Price:Rs.$product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}







//displayin the wholesalers and retailers in side nav
function getBrands()
{
    global $con;

    $select_brands = "SELECT * FROM `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-dark font-weight-bold'>$brand_title</a></li>";
    }
}

//displaying the product categories in sidenav
function getCategories()
{
    global $con;
    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-dark font-weight-bold'>$category_title</a></li>";
    }
}

//searching products
function search_product()
{
    //making the global connection so as to include the file
    global $con;
    if (isset($_GET['search_data_product'])) {

        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords LIKE '%$search_data_value%'  ";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Results Match.No Products found On This Category  </h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo " <div class='col-md-3 mb-2'>
         <div class='card ' >
             <img src='./admin_area/product_images/$product_image1' class='card-img-top ' alt='Apple'>
             <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                 <p class='card-text'>$product_description</p>
                 <p class='card-text'>Price:Rs.$product_price/-</p>
                 <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                 <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
             </div>
         </div>
     </div>";
        }
    }
}


//view details function
function view_details()
{
    global $con;

    //conditon to check is set or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];

                $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";

                $result_query = mysqli_query($con, $select_query);


                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    // $product_keywords = $row['product_keywords'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_image4 = $row['product_image4'];


                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo " <div class='col-md-3 mb-2'>
         <div class='card ' >
             <img src='./admin_area/product_images/$product_image1' class='card-img-top ' alt='Apple'>
             <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                 <p class='card-text'>$product_description</p>
                 <p class='card-text'>Price:Rs.$product_price/-</p>
                 <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                 <a href='index.php' class='btn btn-secondary'>Go Home</a>
             </div>
         </div>
     </div>
     <div class='col-md-9'>
    <!-- related images -->
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-success mb-5 font-weight-bold'>Related Products</h4>
        </div>
        <div class='col-md-3'>
            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='Apple'>
        </div>
        <div class='col-md-3'>
            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='Apple'>
        </div>
        <div class='col-md-3'>
            <img src='./admin_area/product_images/$product_image4' class='card-img-top' alt='Apple'>
        </div>
    </div>
</div>

     
     ";
                }
            }
        }
    }

}

//get Ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//  $ip = getIPAddress();
//  echo 'User Real IP Address - ' . $ip;


//cart functions
function cart()
{
    /*if same product id but different ip address it will not fetch the data as it will check for both of the conditions if anyone fails then it will not work for both the conditions*/
    if (isset($_GET['add_to_cart'])) {
        /*connection variable is stored in a separate file so it needs to be global so as to be included*/
        global $con;
        $get_ip_add = getIPAddress(); //::1
        //accessing the value
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' and product_id= $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "Insert into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0) ";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
    }

}

//function to get cart item numbers
function cart_item()
{
    // including the connect file
    //include('./includes/connect.php');

    if (isset($_GET['add_to_cart'])) {
        /*connection variable is stored in a separate file so it needs to be global so as to be included*/
        global $con;
        $get_ip_add = getIPAddress(); //::1
        //accessing the value

        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

    } else {
        global $con;
        $get_ip_add = getIPAddress(); //::1
        //accessing the value

        $select_query_cart = "select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query_cart = mysqli_query($con, $select_query_cart);
        $count_cart_items = mysqli_num_rows($result_query_cart);
    }
    echo $count_cart_items;
}

//total price function
//total price function
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}




?>