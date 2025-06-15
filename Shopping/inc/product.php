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
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".women">Women’s</li>
                    <li data-filter=".men">Men’s</li>
                    <li data-filter=".kid">Kid’s</li>
                    <li data-filter=".accessories">Accessories</li>
                    <li data-filter=".cosmetic">Cosmetics</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php while($row = mysqli_fetch_assoc($products)): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo strtolower($row['category_name']); ?>">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../admin/img/<?php echo $row['img']; ?>"><a href="product-details.php?p_id=<?php echo $row['p_id']; ?>"><img src="../admin/img/<?php echo $row['img'] ?>" alt=""></a>
                            <ul class="product__hover">
                                <li><a href="admin/img/<?php echo $row['img']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="product-details.php?p_id=<?php echo $row['p_id']; ?>"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $row['product_name']; ?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ <?php echo $row['price']; ?></div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
