<?php include 'inc/header.php'; ?>
<?php
use App\classes\Category;
use App\classes\Product;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $result = Product::getProductInfoById($id);
}
if(isset($_POST['btn'])){
   $update = Product::updateProductInfo($id, $_POST);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update New Product
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                if($result){
                                ?>
                                <form name="myform" class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">
                                    <?php if(isset($update)){echo $update;} ?>
                                    <div class="form-group">
                                        <label for="product_name" class="col-sm-3">Product Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_name" id="product_name" value="<?php echo $result['product_name']; ?>" >
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
                                                        <option <?php if($value['category_id'] == $result['category_id']){ echo "selected"; } ?> value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name']; ?></option>
                                                    <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description" class="col-sm-3">Product Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="10" name="product_description" id="product_description" style="resize: vertical;" ><?php echo $result['product_description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image" class="col-sm-3">Product Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="product_image" id="product_image" accept="image/*">
                                            <img src="<?php echo $result['product_image']; ?>" alt="Product Image" style="width: 90px; height: 90px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price" class="col-sm-3">Product Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_price" id="product_price" value="<?php echo $result['product_price']; ?>"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_point" class="col-sm-3">Product Point</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="product_point" id="product_point" value="<?php echo $result['product_point']; ?>"  >
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
                                            <button type="submit" name="btn" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
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
    <script>
        document.forms['myform'].elements['publication_status'].value='<?php echo $result['publication_status']; ?>'
    </script>
<?php include 'inc/footer.php'; ?>