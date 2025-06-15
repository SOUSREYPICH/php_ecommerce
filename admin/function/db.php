<?php
    $con= mysqli_connect("localhost","your_user","your_password","your_db_name");
    if(!$con){

        echo "Connection Field";
        exit();
    }
?>