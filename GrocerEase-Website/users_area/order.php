<?php
include('../includes/connect.php');
include('../functions/common_function.php');

/*<<----------We have to accesss the user id, so for that we gonna use the get method---------------->>*/
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}



?>