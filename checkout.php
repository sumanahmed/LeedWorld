<?php include 'inc/header.php'; ?>
<?php
use App\classes\Member;
use App\classes\Cart;
if(!isset($_SESSION['id'])) {
    echo "<script>window.location='login.php'</script>";
}

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}

if(isset($_POST['update'])){
    $update = Member::updateUserInfo($_POST, $id);
}

if(isset($_POST['submit'])){
    $cmrId = $_SESSION['id'];
    $agent_id =(int)$_POST['agent_id'];
    $insertOrder = Cart::orderProduct($cmrId, $agent_id);
    $delData = Cart::delCustomerCart();
}
?>

	<section id="cart_items" style="margin-top:30px; min-height: 430px;">
		<div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-success text-center">Product Detials</h3>
                    <form action="" method="POST">
                    <table class="table table-condensed table-bordered">
                        <?php if(isset($insertOrder)){ echo $insertOrder;} ?>
                        <thead>
                        <tr class="cart_menu text-center">
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
                            while ($value = mysqli_fetch_assoc($getPro)){
                                ?>
                                <tr class="text-center">
                                    <td class="image"><?php echo $value['product_name']; ?></td>
                                    <td class="cart_price">
                                        <p>Tk <?php echo $value['product_price']; ?></p>
                                    </td>
                                    <td class="cart_quantity "><?php echo $value['quantity']; ?></td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">Tk <?php echo $total=$value['product_price']*$value['quantity']; ?></p>
                                    </td>
                                </tr>
                                <?php } }?>
                                <tr>
                                    <td class="text-danger">Pick Product From</td>
                                    <td colspan="3">
                                        <select name="agent_id" id="agent_id" class="form-control">
                                            <option value="">--Select Location to Pick up product--</option>
                                            <?php
                                                $agent = Member::getAgentNameWithAddress();
                                                if($agent){
                                                    while ($value = mysqli_fetch_assoc($agent)){
                                            ?>
                                            <option value="<?php echo $value['id']; ?>">Name: <?php echo $value['name']; ?> | Address :  <?php echo $value['address']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" name="submit" class="btn btn-success">Place Order</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <?php
                    $user = Member::getUserBySessionId($id);
                    if($user){
                        while ($value = mysqli_fetch_assoc($user)){
                            ?>
                            <h3 class="text-success text-center">Customer Detials</h3>
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
                                        <textarea class="form-control" rows="3" name="address" id="address" style="resize: vertical;"><?php echo $value['address']; ?></textarea>
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

		</div>
	</section> <!--/#cart_items-->

	

<?php include 'inc/footer.php'; ?>