<?php 
    require_once 'includes/head.php';
    active_status_product();
    $value = view_products();
?>

<div class="wrapper">
	<?php include "includes/nav.php" ?>

	<div class="main">
		<?php include "includes/header.php"  ?>		
            <div class="content">
            <div class="page-heading">
                <h2 class="page-title">Manage Product</h2>
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
                                <th>Product ID</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>MRP</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th colspan="3" class="text-center">Operations</th>
                                </tr>
                                <tr>
                                <?php
                                    while($row=mysqli_fetch_assoc($value))
                                    {
                                        ?>
                                    <td><?php echo $row['p_id']; ?></td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><img src="img/<?php echo $row['img'] ?>" width="50px" hieght="50px" ></td>
                                    <td><?php echo $row['MRP']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['desciption']; ?></td>
                                    <td><?php echo $row['statuss']; ?></td>
                                    
                                    <td>
                                        <?php 
                                            if($row['statuss']=='1')
                                            {
                                                echo "Active";
                                            }
                                            else
                                            {
                                                echo "deactive";
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            
                                            if($row['statuss']=='1')
                                            {
                                                echo "<a href='manage_product.php?opr=deactive&id=".$row['p_id']."' class='btn btn-success'>Deactive</a>";
                                            }
                                            else
                                            {
                                                echo "<a href='manage_product.php?opr=active&id=".$row['p_id']."' class='btn btn-success'>Active</a>";
                                            }
                                        ?>
                                        
                                        <a href="edit_product.php?id=<?php echo $row['p_id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="del_product.php?id=<?php echo $row['p_id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 (or change version if needed) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
