<?php
// DB connection
$conn = new mysqli("localhost", "your_user", "your_password", "your_db_name");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$billing = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone' => '',
    'address1' => '',
    'address2' => '',
    'city' => '',
    'state' => '',
    'postcode' => '',
    'country' => '',
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $billing['first_name'] = $conn->real_escape_string($_POST['first_name'] ?? '');
    $billing['last_name'] = $conn->real_escape_string($_POST['last_name'] ?? '');
    $billing['email'] = $conn->real_escape_string($_POST['email'] ?? '');
    $billing['phone'] = $conn->real_escape_string($_POST['phone'] ?? '');
    $billing['address1'] = $conn->real_escape_string($_POST['address1'] ?? '');
    $billing['address2'] = $conn->real_escape_string($_POST['address2'] ?? '');
    $address = trim($billing['address1'] . ' ' . $billing['address2']);
    $billing['city'] = $conn->real_escape_string($_POST['city'] ?? '');
    $billing['state'] = $conn->real_escape_string($_POST['state'] ?? '');
    $billing['postcode'] = $conn->real_escape_string($_POST['postcode'] ?? '');
    $billing['country'] = $conn->real_escape_string($_POST['country'] ?? '');
    $payment_method = $conn->real_escape_string($_POST['payment_method'] ?? '');
    $order_total = floatval($_POST['order_total'] ?? 0);
    $order_status = 'Pending';
    $order_date = date('Y-m-d H:i:s');

    // Insert order
    $sql = "INSERT INTO orders (first_name, last_name, email, phone, address, city, state, postcode, country, payment_method, order_total, order_status, order_date) VALUES (
        '{$billing['first_name']}', '{$billing['last_name']}', '{$billing['email']}', '{$billing['phone']}', '$address', '{$billing['city']}', '{$billing['state']}', '{$billing['postcode']}', '{$billing['country']}', '$payment_method', $order_total, '$order_status', '$order_date')";

    if ($conn->query($sql)) {
        $order_id = $conn->insert_id;
        $conn->close();
        header("Location: confirmation.php?order_id=$order_id");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Checkout</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="" method="post">
    <h3>Billing Details</h3>
    <label>First Name*<br>
        <input type="text" name="first_name" required value="<?= htmlspecialchars($billing['first_name']) ?>">
    </label><br>

    <label>Last Name*<br>
        <input type="text" name="last_name" required value="<?= htmlspecialchars($billing['last_name']) ?>">
    </label><br>

    <label>Email*<br>
        <input type="email" name="email" required value="<?= htmlspecialchars($billing['email']) ?>">
    </label><br>

    <label>Phone*<br>
        <input type="text" name="phone" required value="<?= htmlspecialchars($billing['phone']) ?>">
    </label><br>

    <label>Address 1*<br>
        <input type="text" name="address1" required value="<?= htmlspecialchars($billing['address1']) ?>">
    </label><br>

    <label>Address 2<br>
        <input type="text" name="address2" value="<?= htmlspecialchars($billing['address2']) ?>">
    </label><br>

    <label>City*<br>
        <input type="text" name="city" required value="<?= htmlspecialchars($billing['city']) ?>">
    </label><br>

    <label>State*<br>
        <input type="text" name="state" required value="<?= htmlspecialchars($billing['state']) ?>">
    </label><br>

    <label>Postcode*<br>
        <input type="text" name="postcode" required value="<?= htmlspecialchars($billing['postcode']) ?>">
    </label><br>

    <label>Country*<br>
        <input type="text" name="country" required value="<?= htmlspecialchars($billing['country']) ?>">
    </label><br>

    <h3>Payment Method</h3>
    <label><input type="radio" name="payment_method" value="Cheque" required> Cheque</label><br>
    <label><input type="radio" name="payment_method" value="PayPal" required> PayPal</label><br>

    <input type="hidden" name="order_total" value="750.0">

    <button type="submit">Place Order</button>
</form>
</body>
</html>
