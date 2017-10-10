<?php include 'inc/header.php'; ?>
<?php
use App\classes\Product;
use App\classes\Cart;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $product = Product::getProductInfoById($id);
}

if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addtocart = Cart::addToCart($quantity, $id);
}
?>
	
	<section style="margin-top: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    <?php include 'inc/sidebar.php'; ?>
				</div>
				
				<div class="col-sm-9 padding-right">
                    <?php
                    if($product){
                    ?>
					<div class="product-details"><!--product-details-->
                        <?php if(isset($addtocart)){ echo $addtocart; } ?>
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/<?php echo $product['product_image']; ?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
                                <h2><?php echo $product['product_name']; ?></h2>
                                <p class="product-descripton"><?php echo $product['product_description']; ?></p>
								<p>Product ID: <?php echo $product['id']; ?></p>
								<span>
									<span> <?php echo $product['product_price']; ?> Tk</span>
									<form action="" method="POST">
                                        <label>Quantity : </label>
                                        <input type="number" name="quantity" value="1" />
                                        <button type="submit" name="submit" class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </form>
                                    <?php
                                    if(isset($_SESSION['id'])){
                                    ?>
                                    <div class="wlist-compare">
                                        <button type="submit" class="btn btn-info cart2">
                                            <i class="fa fa-plus-square"></i>
                                            Add to wishlist
                                        </button>
                                        <button type="submit" class="btn btn-info cart3">
                                            <i class="fa fa-plus-square"></i>
                                            Add to compare
                                        </button>
                                    </div>
                                    <?php } ?>
								</span>
								<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                    <?php } ?>
                     <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Related Products</h2>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/shop/product12.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/shop/product11.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/shop/product10.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                     </div><!--features_items-->

				</div>
			</div>
		</div>
	</section>

<?php include 'inc/footer.php'; ?>