<?php include 'inc/header.php'; ?>
<?php
use App\classes\Product;
?>
<?php
if (isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $delete = Product::deleteProductInfoById($delid);
}

if(isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status'] == 'unpublished'){
        Product::unPublishedProductInfo($id);
    }else if($_GET['status'] == 'published'){
        Product::publishedProductInfo($id);
    }
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Products
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <?php if (isset($delete)){echo $delete;} ?>
                                <table class="table table-striped table-bordered table-responsive">
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $getPro = Product::getAllProductInfo();
                                    if($getPro){
                                        $i=1;
                                        while ($value = mysqli_fetch_assoc($getPro)){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value['product_name']; ?></td>
                                        <td><img src="<?php echo $value['product_image']; ?>" alt="Product Image" style="width: 80px; height:80px;"></td>
                                        <td><?php echo $value['product_price']; ?></td>
                                        <td><?php echo $value['publication_status'] == 1 ? 'Published' : 'Unpublished'; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" title="View Product Details" href="view-product.php?id=<?php echo $value['id']; ?>">
                                                <span class="glyphicon glyphicon-zoom-in"></span>
                                            </a>
                                            <?php
                                            if($value['publication_status'] == 1){
                                            ?>
                                            <a class="btn btn-success btn-xs" title="Published Product" href="?status=unpublished&id=<?php echo $value['id']; ?>">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                            <?php } else{ ?>
                                            <a class="btn btn-warning btn-xs" title="Unpublished Product" href=?status=published&id=<?php echo $value['id']; ?>">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                            <?php } ?>
                                            <a class="btn btn-info btn-xs" title="Edit Product" href="edit-product.php?id=<?php echo $value['id']; ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a class="btn btn-danger btn-xs" title="Delete Product" href="?delid=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure to delete this Blog ?');">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </table>
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