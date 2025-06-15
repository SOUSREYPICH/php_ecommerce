<?php require_once('includes/head.php'); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="row">
    <div class="col-lg-4 m-auto">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div>
                
            </div>
            <?php 
                login_system();
                display_message();
            ?>
            <div class="card-body">
                <form method="POST">
                    <input type="text" class="form-control mb-2" placeholder="User Name or Email" name="username">
                    <input type="password" class="form-control" placeholder="Password" name="password"> 
            </div>
            <div class="card-footer">
                <button class="btn btn-success" name="btn_login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>