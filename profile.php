<?php include 'inc/header.php'; ?>
<?php
use App\classes\Member;

if(!isset($_SESSION['id'])) {
    header("Location:login.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = Member::getUserBySessionId($id);
}

if (isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}

if(isset($_POST['update'])){
   $update = Member::updateUserInfo($_POST, $userid);
}

?>

    <section style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <?php include 'inc/member-menu.php'; ?>
                <div class="col-sm-9 col-md-9">
                        <?php
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
        </div>
    </section>

<?php include 'inc/footer.php'; ?>