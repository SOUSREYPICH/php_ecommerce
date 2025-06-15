<?php
    require_once 'includes/head.php';
    if(isset($_GET['id']))
    {
        $del_id= $_GET['id'];
        $query= "DELETE FROM products where p_id='$del_id'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header('location: manage_product.php');
        }
    }
    
?>