<?php include 'inc/header.php'; ?>
<?php
use App\classes\Category;
use App\classes\Product;
if(isset($_POST['btn'])){
    $addPro = Product::saveProductInfo($_POST);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Product
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">
                                    <?php if(isset($addPro)){echo $addPro;} ?>
                                    <div class="form-group">
                                        <label for="product_name" class="col-sm-3">Product Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_name" id="product_name" placeholder="Enter Prodcut Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id" class="col-sm-3">Product Category</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" id="category_id" class="form-control">
                                            <?php
                                            $cat = Category::getAllCategory();
                                            if($cat){
                                                while ($value = mysqli_fetch_assoc($cat)){
                                            ?>
                                                <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
                                            <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description" class="col-sm-3">Product Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="10" name="product_description" id="product_description" placeholder="Enter Product description" style="resize: vertical;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image" class="col-sm-3">Product Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="product_image" id="product_image" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price" class="col-sm-3">Product Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_price" id="product_price" placeholder="Enter Product Price" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_point" class="col-sm-3">Product Point</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_point" id="product_point" placeholder="Enter Product Point" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="publication_status" class="col-sm-3">Publication Status</label>
                                        <div class="col-sm-9">
                                            <select name="publication_status" id="publication_status" class="form-control">
                                                <option value="1">Published</option>
                                                <option value="0">Unublished</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" name="btn" class="btn btn-success">Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.col-lg-8 (nested) -->

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
<?php include 'inc/footer.php'; ?>