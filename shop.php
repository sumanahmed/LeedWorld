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
						
						<ul class="pagination text-center">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

<?php include 'inc/footer.php'; ?>