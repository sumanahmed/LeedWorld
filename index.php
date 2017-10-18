<?php include 'inc/header.php'; ?>
<?php
use App\classes\Product;
?>

    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php include 'inc/sidebar.php'; ?>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Product Items</h2>
                        <!-- pagination -->
                        <?php
                        $per_page = 3;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        }else{
                            $page=1;
                        }
                        $start_form = ($page-1)*$per_page;
                        ?>
                        <!-- pagination -->
                        <?php
                        $products = Product::getAllProductInfo();
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
                    <!-- pagination -->
                    <?php
                    $get_row = Product::getProductRow();
                    $total_rows = mysqli_fetch_assoc($get_row);
                    $total_rows = count($total_rows);
                    $total_pages = ceil($total_rows/$per_page);
                    echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
                    for ($i=1; $i<=$total_pages; $i++) {
                        echo "<a href='index.php?page=".$i."'>".$i."</a>";
                    }
                    echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"; ?>
                    <!-- pagination -->

                </div>
            </div>
        </div>
    </section>

<?php include 'inc/footer.php'; ?>