<?php include 'inc/header.php'; ?>
<?php
use App\classes\Member;
use App\classes\Cart;
if(!isset($_SESSION['id'])) {
    header("Location:login.php");
}

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}

if(isset($_POST['update'])){
    $update = Member::updateUserInfo($_POST, $id);
}
?>

	<section id="cart_items" style="margin-top:30px;">
		<div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-condensed table-bordered">
                        <?php if(isset($updatecart)){ echo $updatecart;} ?>
                        <?php if(isset($delete)){ echo $delete;} ?>
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">SL</td>
                            <td class="image">Product Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
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
                                    <td class="image"><?php echo $value['product_name']; ?></td>                                    <td class="cart_price">
                                        <p>Tk <?php echo $value['product_price']; ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <form action="" method="POST">
                                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['quantity']; ?>" autocomplete="off" size="2" readonly >
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">Tk <?php echo $total=$value['product_price']*$value['quantity']; ?></p>
                                    </td>
                                </tr>
                            <?php } }?>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <?php
                    $user = Member::getUserBySessionId($id);
                    if($user){
                        while ($value = mysqli_fetch_assoc($user)){
                            ?>
                            <form class="form-horizontal" action="" method="POST" >
                                <?php if(isset($update)) {echo $update; } ?>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-sm-offset-1">Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $value['name']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_no" class="col-sm-2 col-sm-offset-1">Mobile No</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="mobile_no" id="mobile_no" value="<?php echo $value['mobile_no']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-sm-offset-1">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $value['email']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 col-sm-offset-1">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="6" name="address" id="address" style="resize: vertical;"><?php echo $value['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-sm-2 col-sm-offset-1">City</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="city" id="city" value="<?php echo $value['city']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="zip" class="col-sm-2 col-sm-offset-1">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="zip" id="zip" value="<?php echo $value['zip']; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-1"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="update" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        <?php } } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="place-order">
                        <button type="submit" class="btn btn-default check_out btn-block">Place Order</button>
                    </div>

                </div>
            </div>
		</div>
	</section> <!--/#cart_items-->

	

<?php include 'inc/footer.php'; ?>