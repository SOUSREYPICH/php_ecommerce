<?php 
    require_once 'includes/head.php';
    active_status();
    $value = View_cart();
?>

<div class="wrapper">
	<?php include "includes/nav.php" ?>

	<div class="main">
		<?php include "includes/header.php"  ?>		
            <div class="content">
            <div class="page-heading">
                <h1 class="page-title">Category</h1>
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
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th colspan="3" class="text-center">Operations</th>
                                </tr>
                                <tr>
                                <?php
                                    while($row=mysqli_fetch_assoc($value))
                                    {
                                        ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td>
                                        <?php 
                                            if($row['statuss']=='0')
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
                                            
                                            if($row['statuss']=='0')
                                            {
                                                echo "<a href='manage_category.php?opr=deactive&id=".$row['id']."' class='btn btn-success'>Deactive</a>";
                                            }
                                            else
                                            {
                                                echo "<a href='manage_category.php?opr=active&id=".$row['id']."' class='btn btn-success'>Active</a>";
                                            }
                                        ?>
                                        
                                        <a href="edit_cat.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="del_cat.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
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
