
<!-- <?php 

    if(isset($_GET['id']))
    {
        $cat_id = mysqli_real_escape_string($con,$_GET['id']);
    }

    
    $particular_product = get_product($cat_id);

?> -->
    <?php
    if (isset($_GET['cat_id'])) {
        $cat_id = intval($_GET['cat_id']); 
        $sql = "SELECT * FROM products WHERE category_name = '$cat_id'";
    } else {
        $sql = "SELECT * FROM products"; 
    }

    $result = mysqli_query($con, $sql);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    ?>


<section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>

                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        
                                            <a data-toggle="collapse" data-target="#collapseOne">Women</a>
                                        
                                        
                                    </div>
                                    <div class="card">
                                        
                                            <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                                        
                                    </div>
                                    <div class="card">
                                        
                                        <img src="img/product/banner.png" alt="Product Image" style="max-width: 100%; height: 300px; object-fit: content;">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="col-lg-9 col-md-9">
                    <div class="row">

                        <?php 
                            if(mysqli_num_rows($particular_product))
                            {

                            
                                while($row=mysqli_fetch_assoc($particular_product))
                                {
                                    ?>

                                    

                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item text-center">
                                    <div class="pi-pic">
                                        <a href="product-details.php?p_id=<?php echo $row['p_id']; ?>"><img src="../admin/img/<?php echo $row['img'] ?>" alt=""></a>
                                        
                                        <div class="pi-link">
                                            <a href="product-details.php?p_id=<?php echo $row['p_id']; ?>" class="add-card"><i class="flation-bag"></i><span>ADD TO CART</span></a>
                                            <a href="#" class="wishlist-btn "><i class="flation-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6>$<?php echo $row['price'] ?></h6>
                                        <p><?php echo $row['product_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            else{
                                echo "Record not found";
                            }
                        ?>
                        <div class="text-center w-100 pt-3">
                            <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>