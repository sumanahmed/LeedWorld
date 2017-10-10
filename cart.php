<?php include 'inc/header.php'; ?>
<?php
use App\classes\Cart;


if(isset($_GET['delId'])){
    $delid = (int)$_GET['delId'];
    $delete = Cart::deleteCart($delid);
}

if(isset($_POST['update'])){
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updatecart = Cart::updateCartQty($cartId, $quantity);
    if ($quantity <= 0){
        $delete = Cart::deleteCart($cartId);
    }
}
?>

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
                    <?php if(isset($updatecart)){ echo $updatecart;} ?>
                    <?php if(isset($delete)){ echo $delete;} ?>
					<thead>
						<tr class="cart_menu">
							<td class="image">SL</td>
							<td class="image">Product Name</td>
							<td class="image">Image</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Action</td>
						</tr>
					</thead>
					<tbody>
                <?php
                    $getPro = Cart::getCartProduct();
                    if($getPro){
                        $i=1; $sum=0;
                        while ($value = mysqli_fetch_assoc($getPro)){
                ?>
						<tr>
							<td class="image"><?php echo $i++; ?></td>
							<td class="image"><?php echo $value['product_name']; ?></td>
							<td class="cart_product">
								<a href=""><img src="admin/<?php echo $value['product_image']; ?>" alt="" width="50px;" height="50px"></a>
							</td>
                            <td class="cart_price">
                                <p>Tk <?php echo $value['product_price']; ?></p>
                            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <form action="" method="POST">
                        <input type="hidden" name="cartId" value="<?php echo $value['cart_id']; ?>" autocomplete="off" size="2">
                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['quantity']; ?>" autocomplete="off" size="2">
                        <input type="submit" name="update" value="Update">
                    </form>
                </div>
            </td>
							<td class="cart_total">
								<p class="cart_total_price">Tk <?php echo $total=$value['product_price']*$value['quantity']; ?></p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Are you sure to Delete ?');" class="cart_quantity_delete" href="?delId=<?php echo $value['cart_id']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php $sum = $sum+$total; ?>
                <?php } }?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 pull-right">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Tk <?php echo $sum; ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>Tk <?php echo $sum; ?></span></li>
						</ul>
							<a href="checkout.php" class="btn btn-default check_out" >Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include 'inc/footer.php'; ?>