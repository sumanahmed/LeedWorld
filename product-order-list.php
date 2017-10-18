<?php include 'inc/header.php'; ?>
<?php
use App\classes\Cart;
if(!isset($_SESSION['id'])){
    echo "<script>window.location = 'login.php'</script>";
}
if(isset($_GET['confirm'])){

}
?>
    <div class="container section-padding">
        <div class="row">
            <div class="member-area">
                <?php include 'inc/member-menu.php'; ?>
                <div class="col-sm-9 col-md-9">
                   <table class="table-bordered table-striped table-condensed">
                        <tr>
                            <td>Product Name</td>
                            <td>Product Quantity</td>
                            <td>Product Price</td>
                            <td>Referral ID</td>
                            <td>Member Name</td>
                            <td>Moblie No</td>
                            <td>Order</td>
                        </tr>
                        <?php
                        $get_product = Cart::getOrderProduct();
                        if($get_product){
                            while ($product = mysqli_fetch_assoc($get_product)){
                        ?>
                        <tr>
                            <td><?php echo $product["product_name"]; ?></td>
                            <td><?php echo $product['product_quantity']; ?></td>
                            <td><?php echo $product['product_price']; ?> Tk</td>
                            <td><?php echo $product['referral_id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['mobile_no']; ?></td>
                            <td>
                                <a href="?confirm=<?php echo $product["id"]; ?>" class="btn btn-success btn-xs" title="Confirm Product Order" > Confirm</a>
                                <a href="?delid=<?php echo $product["id"]; ?>" onclick="return confirm('Are you sure to Delete');" class="btn btn-danger btn-xs" title="Delete Product Order" > Delete</a>
                            </td>
                        </tr>
                        <?php } } ?>
                   </table>
                </div>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>