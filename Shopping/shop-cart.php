<?php include 'inc/header.php' ;
        
        include 'function/db.php';

        get_product();
?>



<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <?php include 'inc/header1.php' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <?php include 'inc/shopcart.php' ?>
    <!-- Shop Cart Section End -->

    

    <!-- Footer Section Begin -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer Section End -->


   
</body>

</html>