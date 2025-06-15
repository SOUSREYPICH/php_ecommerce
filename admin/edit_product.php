<?php include "includes/head.php"; ?>
    
	<div class="wrapper">
		<?php 
            include "includes/nav.php";
            
            $cat=View_cart();
            $edit_product = edit_record();

            while ($row = mysqli_fetch_assoc($edit_product)) {
                $product_id = $row['p_id'];
                $category_id = $row['category_name'];
                $product_name = $row['product_name'];
                $mrp = $row['MRP'];
                $price = $row['price'];
                $qty = $row['qty'];
                $img = $row['img'];
                $description = $row['desciption']; 
            }
            
            
        ?>
		<div class="main">
			<?php include "includes/header.php" ?>
            <div class="content">
                <!-- start page content -->
                
                <div class="page-content fade-in-up"> 
                    <div >
                        <?php 
                            add_category();
                            display_message();
                         ?>
                         
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title" style="font-size: 20px; color: blue;">Product</div>
                            <hr>
                            <div class="ibox-tools">
                                <a class="ibox-collapse" data-toggle="collapse" href="#ibox-content" aria-expanded="true" >
                                    <i class="fa fa-minus"></i></a>
                                    
                            </div>
                        </div>
                        
                        <div class="ibox-body">
                            <form class="form-horizotal" id="form-sample-1" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group row mb-2">
                                    <label class="col-sm-2 col-form-label">Edit product</label>
                                    <?php 
                                        update_record()
                                    ?>
                                    
                                </div>
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-10">
                                            <select name="cat_id" id="" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php
                                                    while($row=mysqli_fetch_assoc($cat))
                                                    {

                                                        if($category_id==$row['id'])
                                                        {

                                                        

                                                        ?>
                                                        <option selected value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                                        
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="product_id" placeholder="Product ID" value="<?php echo $product_id ?>" /><br>
                                            <input class="form-control" type="text" name="product_name" placeholder="Product Name" value="<?php echo $product_name ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="MRP" placeholder="MRP" value="<?php echo $mrp ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $price ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="qty" placeholder="Quantity" value="<?php echo $qty ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="img" value="<?php echo $img ?>" />
                                            <img src="img/<?php echo $img ?>" width="50px" hieght="50px" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <textarea name="description"  id="" class="form-control" placeholder="Product Description"><?php echo $description ?></textarea>
                                        </div>
                                    </div>
                                 </div>
                                 <button class="btn btn-info my-4 mx-4" type="submit" name="pro_btn_edit">Submit</button>
                                 
                                
                            </form>
                            <div class="container">
                                <div class="row" style="align-item: center;">
                                    <div class="col">
                                        <?php
                                            display_message();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        
	</div>
    
    
    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    display_message();
                ?>
            </div>
        </div>
    </div> -->
    <?php include "includes/footer.php" ?>

	<?php include "includes/script.php" ?>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 (or change version if needed) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


