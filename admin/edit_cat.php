<?php 
    include "includes/head.php"; 
    if(isset($_GET['id']))
    {
        $id = safe_value($con,$_GET['id']);
        $sql = "SELECT * FROM categories where id='$id'";
        $result = mysqli_query($con,$sql);

        
        while($row=mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $cat_name = $row['cat_name'];
                $status = $row['statuss'];
            }
        
        
    }
    update_cart();
?>
    
	<div class="wrapper">
		<?php include "includes/nav.php" ?>
		<div class="main">
			<?php include "includes/header.php" ?>
            <div class="content">
                <!-- start page content -->
                
                <div class="page-content fade-in-up"> 
                    
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title" style="font-size: 20px; color: blue;">Category</div>
                            <hr>
                            <div class="ibox-tools">
                                <a class="ibox-collapse" data-toggle="collapse" href="#ibox-content" aria-expanded="true">
                                    <i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        
                        <div class="ibox-body">
                            
                            <form class="form-horizotal" id="form-sample-1" method="POST" novalidate="novalidate">
                                <div class="form-group row mb-2">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="category_up" value="<?php echo $cat_name; ?>">
                                        <input type="hidden" name="cat_id" value="<?php echo $id; ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto" style="margin-left: 200px;">
                                        <button class="btn btn-info" type="submit" name="cat_btn_up">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>    
                </div>
            </div>
		</div>
	</div>
    
    <?php include "includes/footer.php" ?>

	<?php include "includes/script.php" ?>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


