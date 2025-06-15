<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $host = 'localhost';
    $dbname = 'ecommerce';
    $user = 'root';
    $pass = 'Pich1111';

    $messageSent = '';
    $errorMsg = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['msg'])) {
            $conn = new mysqli($host, $user, $pass, $dbname);
            if ($conn->connect_error) {
                $errorMsg = "Database connection failed: " . $conn->connect_error;
            } else {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $msg = $_POST['msg'];

                $stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, text) VALUES (?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ssss", $first_name, $last_name, $email, $msg);
                    if ($stmt->execute()) {
                        $messageSent = "Message sent successfully.";
                    } else {
                        $errorMsg = "Error sending message: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $errorMsg = "Prepare failed: " . $conn->error;
                }
                $conn->close();
            }
        } else {
            $errorMsg = "Please fill in all fields.";
        }
    }
?>

<?php include 'inc/header.php'; ?>

<body>
    <!-- Page Preloader -->
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

    <div class="container" style="margin-top: 55px;">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb-option">
                    <ol class="breadcrumb-option">
                        <li class="breadcrumb-item">
                            <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>Phnom Penh , Cambodia</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>855</span><span>12 345 567</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>AsiaStore@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>

                            <?php if ($messageSent): ?>
                                <p style="color:green; font-weight:bold;"><?php echo $messageSent; ?></p>
                            <?php elseif ($errorMsg): ?>
                                <p style="color:red; font-weight:bold;"><?php echo $errorMsg; ?></p>
                            <?php endif; ?>

                            <form action="" method="POST">
                                <input type="text" name="first_name" placeholder="First Name" required>
                                <input type="text" name="last_name" placeholder="Last Name" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <textarea name="msg" placeholder="Message" required></textarea>
                                <button type="submit" class="site-btn" id="btn_cnt">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                            height="780" style="border:0" allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <?php include 'inc/footer.php'; ?>

</body>

</html>
