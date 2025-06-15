
<?php 

    include 'inc/header.php'; 
    
?>



<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <?php include 'inc/header1.php'; ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
        <style>
            .breadcrumb-option {
                display: flex;
                flex-wrap: wrap;
                list-style: none;
                padding: 0;
                margin: 0;
                background-color: transparent;
            }
            .breadcrumb-option li + li::before {
                content: "›"; /* arrow separator */
                padding: 0 0.5rem;
                color: #6c757d;
            }
            .breadcrumb-option li a {
                text-decoration: none;
                color: #0d6efd; /* bootstrap primary blue */
            }
            .breadcrumb-option li.active {
                color: #6c757d;
            }
        </style>

        <div class="container" style="margin-top: 55px; ">
            <div class="row">
                <div class="col-lg-12">
                <nav aria-label="breadcrumb-option">
                    <ol class="breadcrumb-option">
                    <li class="breadcrumb-item">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
                </div>
            </div>
        </div>


    <!-- Breadcrumb End -->

    <?php
        $products = get_product();
    ?>
    <!-- Shop Section Begin -->
    <?php include 'inc/shopspad.php'; ?>
    <!-- Shop Section End -->


    
    <!-- Footer Section Begin -->
    <?php include 'inc/footer.php'; ?>
    <!-- Footer Section End -->


    <!-- Search Begin -->
    <?php include 'inc/search.php'; ?>
    <!-- Search End -->


    
</body>

</html>