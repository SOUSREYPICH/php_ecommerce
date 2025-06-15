<?php

    require_once 'db.php';
    
    //display categories
    function display_cat()
    {
        global $con;
        $query = "SELECT * FROM categories where statuss='0'";
        return $result = mysqli_query($con,$query);
    }

    //get products
    function get_product($cat_id='',$product_id='')
    {
        global $con;
        $query = "SELECT * FROM products where statuss=1 order by p_id desc";
        if($cat_id!='')
        {
             $query = "SELECT * FROM products WHERE category_name='$cat_id'";
        }
        if($product_id!='')
        {
             $query = "SELECT * FROM products WHERE p_id = '$product_id'";

        }
        return $result = mysqli_query($con, $query );
    }

    //display products
    function display_product()
    {
        global $con;
        $query = "SELECT * FROM products where statuss=1";

        return $result = mysqli_query($con,$query);
    }
    
    //display cat links
    function display_cat_links($category_id="")
    {
        global $con;
        $query = "SELECT products.p_id, products.category_name,categories.cat_name FROM 
        products INNER JOIN categories on products.category_name=categories.id WHERE products.category_name= '$category_id' ";
        return $result = mysqli_query($con,$query);
    }
    
  
    









?>