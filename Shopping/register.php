<?php 
include 'inc/header.php'; 
include 'inc/header1.php';
include 'function/db.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password === $confirm_password && !empty($email)) {

        $name = trim($first_name . ' ' . $last_name);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $con->prepare("INSERT INTO user_register (name, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo "<div class='alert alert-danger text-center'>Prepare failed: " . htmlspecialchars($con->error) . "</div>";
        } else {
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Registration successful!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Execute failed: " . htmlspecialchars($stmt->error) . "</div>";
            }
            $stmt->close();
        }

    } else {
        echo "<div class='alert alert-warning text-center'>Passwords do not match or email is empty.</div>";
    }
}
?>

<body class="bg-silver-300">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" class="bg-white p-4">
                <h4 class="text-center mb-4">Sign Up</h4>

                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-info text-white d-block w-100">Sign up</button>
                </div>

                <div style="display:flex;align-items:center">
                    <hr style="flex:1;border-top:1px solid #ccc;margin:0">
                    <small style="padding:0 10px">Or Sign up with</small>
                    <hr style="flex:1;border-top:1px solid #ccc;margin:0">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
</body>
</html>
