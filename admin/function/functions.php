<?php 

    // Set session message
    function set_message($msg) {
        if (!empty($msg)) {
            $_SESSION['MESSAGE'] = $msg;
        } else {
            $msg = "";
        }
    }

    // Display Message
    function display_message() {
        if (isset($_SESSION['MESSAGE'])) {
            echo $_SESSION['MESSAGE'];
            unset($_SESSION['MESSAGE']);
        }
    }

    // Error message
    function display_error($error) 
    {
        return "<span class='alert alert-danger text-center'> $error</span>";
    }

    
    //Success Message
    function display_success($success)
    {
        return "<span class='alert alert-success text center'>$success</span>";
    }

    
    // Get safe value
    function safe_value($con, $value) {
        return mysqli_real_escape_string($con, $value);
    }



    //Login Checking
    function login_system()
    {
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_login']))
        {
            global $con;
            $username = isset($_POST['username']) ? safe_value($con, $_POST['username']) : '';
            $password = isset($_POST['password']) ? safe_value($con, $_POST['password']) : '';
        
            if(empty($username) || empty($password))
            {
                set_message(display_error("Please Fill in the Blanks"));
            }
            else
            {
                //query 
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($con,$query);

                if(mysqli_fetch_assoc($result))
                {
                    $_SESSION['ADMIN']=$username;
                    header("location: ./dashboard.php");
                }
                else
                {
                    set_message(display_error("You Have Entered Wrong Password or UserName"));
                }
            }
        }
    }

    //add category function
    function add_category() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn'])) {

            global $con;   
            $category = safe_value($con,$_POST['category']);
    
            if (empty($category)) {
                set_message(display_error("Please Enter Category Name"));
            } 
            else 
            {
                $sql = "SELECT * FROM categories where cat_name='$category'";
                $check = mysqli_query($con,$sql);

                if(mysqli_fetch_assoc($check))
                {
                    set_message(display_success("Category Already Exists: "));
                }
                else
                {
                    $query = "INSERT INTO categories(cat_name,statuss) Values('$category','1')";
                    $result = mysqli_query($con,$query);
                    if($result)
                    {
                        set_message(display_success("Category Has Been Saved in the Database"));
                        echo "<a href='manage_category.php'>View Category </a>";
                    }
                }
            }
        }
    }

    //view Category
    function View_cart()
    {
        global $con;
        $sql = "SELECT * FROM Categories";
        return mysqli_query($con,$sql);
    }
    
    //Active & Deactive
    function active_status()
    {
        global $con;
        if(isset($_GET['opr']) && $_GET['opr']!="")
        {
            $operation = safe_value($con,$_GET['opr']);
            $id = safe_value($con,$_GET['id']);

            if($operation=='active')
            {
                $status = 1;
            }
            else 
            {
                $status = 0;
            }
            $query = "UPDATE categories set statuss='$status' where id='$id'";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location: manage_category.php");
            }
        }
    }

    //Update Category
    function update_cart()
    {
        global $con;
        if(isset($_POST['cat_btn_up']))
        {
            $category_name = safe_value($con, $_POST['category_up']);
            $id = safe_value($con, $_POST['cat_id']);
            if(!empty($category_name))
            {
                $sql = "UPDATE categories set cat_name='$category_name' where id='$id'";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    header("locaton: manage_categories.php");
                }
            }
        }
    }

    //product page
    function save_products()
    {
        global $con;

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pro_btn'])) {
            $cat_id = safe_value($con, $_POST['cat_id']);
            $product_name = safe_value($con, $_POST['product_name']);
            $mrp = safe_value($con, $_POST['MRP']);
            $price = safe_value($con, $_POST['price']);
            $qty = safe_value($con, $_POST['qty']);
            $description = safe_value($con, $_POST['description']);

            $img = $_FILES['img']['name'];
            $typte=$_FILES['img']['type'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $size = $_FILES['img']['size'];

            $img_ext = pathinfo($img, PATHINFO_EXTENSION);
            $img_correct_ext = strtolower($img_ext);
            $allow = array('jpg', 'jpeg', 'png');
            $path = "img/" . $img;

            if(empty($product_name) || empty($mrp) || empty($price) || empty($qty) || empty($img) || empty($description))
            {
                set_message(display_error("Please Fill in the blanks"));
            }
            else
            {
                if(in_array($img_correct_ext,$allow))
                {
                    if($size<500000)
                    {
                        if($cat_id==0)
                        {
                            set_message(display_error("Please select category"));
                        }
                        else
                        {
                            $exit ="SELECT * FROM products WHERE product_name='$product_name'";
                            $sql = mysqli_query($con,$exit);

                            if(mysqli_fetch_assoc($sql))
                            {
                                set_message(display_error("Product Already Exits"));
                            }
                            else
                            {
                                $query = "INSERT INTO products (category_name, product_name, MRP, price, qty, img, desciption,statuss) 
                                VALUES ('$cat_id', '$product_name', '$mrp', '$price', '$qty', '$img', '$description','1')";
                                $result=mysqli_query($con,$query);
                                if($result)
                                {
                                    set_message(display_success("product has been saved in the Database"));
                                    move_uploaded_file($tmp_name,$path);
                                }
                            }
                        }
                    }
                    else
                    {
                        set_message(display_error("Your image size too large"));
                    }
                }
                else
                {
                    set_message(display_error("You can't store this file: ("));
                }
            }
        }
    }

    // view product
    function view_products()
    {
        global $con;
        $query = "SELECT 
            products.p_id,
            categories.cat_name,
            products.product_name,
            products.MRP,
            products.price,
            products.qty,
            products.img,
            products.desciption,  
            products.statuss         
        FROM products
        INNER JOIN categories ON products.category_name = categories.id;";
        return $result=mysqli_query($con,$query);
    }

    // status Active and dective product
    function active_status_product()
    {
        global $con;
        if(isset($_GET['opr']) && $_GET['opr']!="")
        {
            $operation = safe_value($con,$_GET['opr']);
            $id = safe_value($con,$_GET['id']);

            if($operation=='active')
            {
                $status = 1;
            }
            else 
            {
                $status = 0;
            }
            $query = "UPDATE products set statuss='$status' where p_id='$id'";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location: manage_product.php");
            }
        }
    }

    // edit product
    function edit_record()
    {
        global $con;
        if(isset($_GET['id']))
        {
            $edit_id=safe_value($con,$_GET['id']);
            $sql = "SELECT * FROM products WHERE p_id='$edit_id'";

            $res = mysqli_query($con,$sql);
            return $res;
        }
    }

    // update record
    function update_record()
    {
        global $con;
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['pro_btn_edit']))
        {
            $cat_id = safe_value($con, $_POST['cat_id']);
            $product_id = safe_value($con, $_POST['product_id']);
            $product_name = safe_value($con, $_POST['product_name']);
            $mrp = safe_value($con, $_POST['MRP']);
            $price = safe_value($con, $_POST['price']);
            $qty = safe_value($con, $_POST['qty']);
            $description = safe_value($con, $_POST['description']);

            $img = $_FILES['img']['name'];
            $type=$_FILES['img']['type'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $size = $_FILES['img']['size'];

            $img_ext = pathinfo($img, PATHINFO_EXTENSION);
            $img_correct_ext = strtolower($img_ext);
            $allow = array('jpg', 'jpeg', 'png');
            $path = "img/" . $img;

            if(empty($product_name) || empty($mrp) || empty($price) || empty($qty) || empty($description))
            {
                set_message(display_error("Please Fill in the blanks"));
            }
            else
            {
                if(empty($img))
                {
                    if($cat_id==0)
                    {
                        set_message(display_error("Please select category"));
                    }
                    else
                    {
                        $query="UPDATE products set category_name='$cat_id',product_name='$product_name',MRP='$mrp',
                        price='$price',qty='$qty',img='$img',desciption='$description' WHERE p_id='$product_id'";
                                
                        $result=mysqli_query($con,$query);

                        if($result)
                        {
                            set_message(display_success("Record Has Been Updated : )"));
                            move_uploaded_file($tmp_name,$path);
                        }
                    }
                    
                }
                else
                {
                    if($size<500000)
                    {
                        if(in_array($img_correct_ext,$allow))
                        {
                            $query="UPDATE products set category_name='$cat_id',product_name='$product_name',MRP='$mrp',
                            price='$price',qty='$qty',img='$img',desciption='$description' WHERE p_id='$product_id'";
                                    
                            $result=mysqli_query($con,$query);

                            if($result)
                            {
                                set_message(display_success("Record Has Been Updated : )"));
                                move_uploaded_file($tmp_name,$path);
                            }
                        }
                        else
                        {
                            set_message(display_error("You can't store this file: )"));
                        }
                    }
                    else
                    {
                        set_message(display_error("Your image size too large"));
                    }
                    
                }
            }

        }
    }



    // contact
    function contact(){
        global $con;
        $sql = "select * from contact";
        return $query = mysqli_query($con,$sql);
    }
?>
