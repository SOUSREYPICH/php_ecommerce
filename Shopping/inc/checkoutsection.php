<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$pass = "Pich1111";
$db = "ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$billing = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'city' => '',
    'state' => '',
    'postcode' => '',
    'country' => '',
];

// Prefill billing if email in GET query
if (!empty($_GET['email'])) {
    $user_email = mysqli_real_escape_string($conn, $_GET['email']);
    $sql = "SELECT * FROM orders WHERE email='$user_email' ORDER BY order_date DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $billing = mysqli_fetch_assoc($result);
    }
}

// Helper: get cart total
function getCartTotal() {
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
    }
    return $total;
}

// Helper: generate cart items HTML list
function getCartSummaryHtml() {
    if (empty($_SESSION['cart'])) {
        return '<li>Your cart is empty</li>';
    }
    $html = '';
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['qty'];
        $html .= '<li>' . intval($item['qty']) . ' x ' . htmlspecialchars($item['product_name']) . '<br><span>$' . number_format($subtotal, 2) . '</span></li>';
    }
    return $html;
}

$order_total = getCartTotal();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name'] ?? '');
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
    $address1 = mysqli_real_escape_string($conn, $_POST['address1'] ?? '');
    $address2 = mysqli_real_escape_string($conn, $_POST['address2'] ?? '');
    $address = trim($address1 . ' ' . $address2);
    $city = mysqli_real_escape_string($conn, $_POST['city'] ?? '');
    $state = mysqli_real_escape_string($conn, $_POST['state'] ?? '');
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode'] ?? '');
    $country = mysqli_real_escape_string($conn, $_POST['country'] ?? '');
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method'] ?? '');
    $order_total_post = floatval($_POST['order_total'] ?? 0);
    $order_status = 'Pending';
    $order_date = date('Y-m-d H:i:s');

    // Optional: You could verify $order_total_post matches $order_total to avoid tampering

    $sql = "INSERT INTO orders 
        (first_name, last_name, email, phone, address, city, state, postcode, country, payment_method, order_total, order_status, order_date) 
        VALUES 
        ('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$state', '$postcode', '$country', '$payment_method', $order_total_post, '$order_status', '$order_date')";

    if (mysqli_query($conn, $sql)) {
        $order_id = mysqli_insert_id($conn);

        // Clear the cart session after order placed
        unset($_SESSION['cart']);

        echo "
        <div style='max-width:600px; margin:20px auto; padding:20px; border: 2px solid #4f46e5; border-radius:12px; background:#f3f4fd; font-family: Arial, sans-serif; color:#333;'>
            <h2 style='color:#4f46e5; margin-bottom:1rem;'>Thank you for your order, {$first_name}!</h2>
            <p>Your order has been received and is now being processed. Your order ID is: <strong>#{$order_id}</strong></p>
            <hr style='border:none; border-top:1px solid #ddd; margin:1rem 0;'/>
            <h3>Billing Information</h3>
            <p><strong>Name:</strong> {$first_name} {$last_name}<br>
               <strong>Email:</strong> {$email}<br>
               <strong>Phone:</strong> {$phone}<br>
               <strong>Address:</strong> {$address1}" . ($address2 ? ", {$address2}" : "") . "<br>
               {$city}, {$state}, {$postcode}<br>
               {$country}
            </p>
            <h3>Payment Method</h3>
            <p>{$payment_method}</p>
            <h3>Order Total</h3>
            <p><strong>Amount:</strong> \$" . number_format($order_total_post, 2) . "</p>
            <p style='margin-top:2rem; font-style: italic; color:#666;'>We appreciate your business!</p>
        </div>
        ";
    } else {
        echo "<p style='color:red; max-width:600px; margin:20px auto;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>

<section class="checkout spad">
    <div class="container">
        <form action="" method="post" class="checkout__form">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" name="first_name" required value="<?= htmlspecialchars($billing['first_name']) ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span>*</span></p>
                                <input type="text" name="last_name" required value="<?= htmlspecialchars($billing['last_name']) ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Country <span>*</span></p>
                                <input type="text" name="country" required value="<?= htmlspecialchars($billing['country']) ?>">
                            </div>
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <?php 
                                $addrParts = explode(' ', $billing['address'], 2);
                                $address1 = $addrParts[0] ?? '';
                                $address2 = $addrParts[1] ?? '';
                                ?>
                                <input type="text" name="address1" placeholder="Street Address" required value="<?= htmlspecialchars($address1) ?>">
                                <input type="text" name="address2" placeholder="Apartment, suite, unit, etc. (optional)" value="<?= htmlspecialchars($address2) ?>">
                            </div>
                            <div class="checkout__form__input">
                                <p>Town/City <span>*</span></p>
                                <input type="text" name="city" required value="<?= htmlspecialchars($billing['city']) ?>">
                            </div>
                            <div class="checkout__form__input">
                                <p>Country/State <span>*</span></p>
                                <input type="text" name="state" required value="<?= htmlspecialchars($billing['state']) ?>">
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="postcode" required value="<?= htmlspecialchars($billing['postcode']) ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="phone" required value="<?= htmlspecialchars($billing['phone']) ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="email" name="email" required value="<?= htmlspecialchars($billing['email']) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Total</span>
                                </li>
                                <?= getCartSummaryHtml() ?>
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Subtotal <span>$<?= number_format($order_total, 2) ?></span></li>
                                <li>Total <span>$<?= number_format($order_total, 2) ?></span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget">
                            <label for="check-payment-cheque">
                                Cheque payment
                                <input type="radio" id="check-payment-cheque" name="payment_method" value="Cheque" required>
                                <span class="checkmark"></span>
                            </label>
                            <label for="check-payment-paypal">
                                PayPal
                                <input type="radio" id="check-payment-paypal" name="payment_method" value="PayPal" required>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <input type="hidden" name="order_total" value="<?= $order_total ?>">
                        <button type="submit" class="site-btn">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
