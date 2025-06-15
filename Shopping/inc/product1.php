<section class="product-details spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt" href="#product-4">
                            <img src="../admin/img/<?php echo $result['img']; ?>" alt="">
                        </a>
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">     
                            <img class="product__big__img" src="../admin/img/<?php echo $result['img']; ?>" alt="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3><?php echo $result['product_name']; ?> <span>Brand: SKMEIMore</span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    <div class="product__details__price">
                        $ <?php echo $result['price']; ?> 
                        <span>$ <?php echo $result['MRP']; ?></span>
                    </div>

                    <p><?php echo $result['desciption']; ?></p>

                    <div class="product__details__button">
                        <form action="shop-cart.php" method="GET" style="display: flex; align-items: center; gap: 15px;">
                            <input type="hidden" name="add_to_cart" value="1">
                            <input type="hidden" name="p_id" value="<?php echo $result['p_id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $result['product_name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $result['price']; ?>">
                            <input type="hidden" name="img" value="<?php echo $result['img']; ?>">

                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="number" name="qty" value="1" min="1" style="width: 60px;">
                                </div>
                            </div>

                            <button type="submit" class="cart-btn">
                                <span class="icon_bag_alt"></span> Add to cart
                            </button>
                        </form>

                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>

                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        In Stock
                                        <input type="checkbox" id="stockin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                            
                            <li>
                                <span>Promotions:</span>
                                <p>Free shipping</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <p><?php echo nl2br($result['desciption']); ?></p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Specification</h6>
                            <p>No specification available.</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews (2)</h6>
                            <p>No reviews yet.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <?php for ($i = 1; $i <= 6; $i++): ?>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-<?php echo $i; ?>.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <!-- Instagram End -->
</section>
