<?php
    require_once 'includes/head.php';
    if(isset($_GET['id']))
    {
        $del_id= $_GET['id'];
        $query= "DELETE FROM contact where contact_id='$del_id'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header('location: contact.php');
        }
    }
    
?>