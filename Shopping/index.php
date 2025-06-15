<?php include 'inc/header.php' ?>

<body>
   
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    <?php include 'inc/header1.php' ?>
    <!-- Header Section End -->

<?php
    $products = get_product();
   
?>
    

    <!-- Banner Section Begin -->
<?php include 'inc/banner.php'; ?>
<!-- Banner Section End -->


<!-- Product Section Begin -->
<?php include 'inc/product.php'; ?>
<!-- Product Section End -->




<!-- Trend Section Begin -->
<!-- <?php include 'inc/trend.php'; ?> -->
<!-- Trend Section End -->




<!-- Services Section Begin -->
<?php include 'inc/service.php'; ?>
<!-- Services Section End -->

<!-- Discount Section Begin -->
<?php include 'inc/discount.php'; ?>
<!-- Discount Section End -->





<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>
<!-- Footer Section End -->






</body>

</html>
