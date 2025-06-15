<?php 
    require_once 'includes/head.php';
    
    $value = contact();
?>

<div class="wrapper">
	<?php include "includes/nav.php" ?>

	<div class="main">
		<?php include "includes/header.php"  ?>		
            <div class="content">
            <div class="page-heading">
                <h1 class="page-title">Contact</h1>
                <hr>
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item" type="none">
                        <a href="dashboard.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title" style="font-size: 18px;">Data Table</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Contact ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th conlspan="4">Details</th>
                                    
                                </tr>
                                <tr>
                                    <?php
                                        while($row=mysqli_fetch_assoc($value))
                                        {
                                            ?>
                                            <td><?php echo $row['contact_id'] ?></td>
                                            <td><?php echo $row['first_name'] ?></td>
                                            <td><?php echo $row['last_name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['text'] ?></td>
                                            <td><a href="del_con.php?id=<?php echo $row['contact_id'] ?>" class="btn btn-danger">Delete</a></td>
                                            
                                </tr>    
                                    <?php
                                        }
                                    ?>
                                
                            </thead> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<?php include "includes/footer.php" ?>
<?php include "includes/script.php" ?>
