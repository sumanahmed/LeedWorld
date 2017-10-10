<?php include 'inc/header.php'; ?>
<?php
use App\classes\Product;

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
}
?>

    <section style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php include 'inc/sidebar.php'; ?>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        <?php
                        $products = Product::productByCat($id);
                        if($products){
                            while($value = mysqli_fetch_assoc($products)){
                                ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="details.php?id=<?php echo $value['id']; ?>">
                                                    <img src="admin/<?php echo $value['product_image']; ?>" alt="Product Image" />
                                                    <h2><?php echo $value['product_price']; ?> Tk</h2>
                                                    <p><?php echo $value['product_name']; ?></p>
                                                </a>
                                                <a href="details.php?id=<?php echo $value['id']; ?>" class="btn btn-default cart">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>

<?php include 'inc/footer.php'; ?>