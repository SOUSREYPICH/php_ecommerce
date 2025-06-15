<?php
session_start();
include 'function/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $stmt = $con->prepare("SELECT id, name, password FROM user_register WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                // Redirect to index.php after login success
                header('Location: index.php');
                exit;
            } else {
                $message = "<div class='alert alert-danger text-center'>Incorrect password.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger text-center'>No user found with that email.</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='alert alert-warning text-center'>Please enter both email and password.</div>";
    }
}

// Include headers after login logic and possible redirect
include 'inc/header.php'; 
include 'inc/header1.php'; 
?>

<body class="bg-silver-300">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" class="bg-white p-4">
                <h4 class="text-center mb-4">Sign in</h4>

                <?= $message ?? '' ?> <!-- Show message -->

                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-info text-white d-block w-100">Sign in</button>
                </div>

                <div style="display:flex;align-items:center">
                    <hr style="flex:1;border:none;border-top:1px solid #ccc;margin:0">
                    <span style="padding:0 10px;white-space:nowrap"><a href="register.php">Or Sign up with</a></span>
                    <hr style="flex:1;border:none;border-top:1px solid #ccc;margin:0">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
</body>
</html>
