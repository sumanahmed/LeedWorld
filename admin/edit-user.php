<?php include 'inc/header.php'; ?>
<?php
use App\classes\Login;
if(isset($_GET['editid'])){
    $id = (int)$_GET['editid'];
}
if(isset($_POST['btn'])){
    $update = Login::adminUpdateUser($id, $_POST);
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update User History
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                $getuser = Login::getUserById($id);
                                if($getuser){
                                    while($user = mysqli_fetch_assoc($getuser)){
                                    ?>
                                    <form class="form-horizontal" action="" method="post" >
                                        <?php if(isset($update)) {echo $update; } ?>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name" id="name" value="<?php echo $user['name']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile_no" class="col-sm-3">Mobile No</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="mobile_no" id="mobile_no" value="<?php echo $user['mobile_no']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-3">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="email" id="email" value="<?php echo $user['email']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-3">City</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="city" id="city" value="<?php echo $user['city']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip" class="col-sm-3">Zip Code</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="zip" id="zip" value="<?php echo $user['zip']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role" class="col-sm-3">User Role</label>
                                            <div class="col-sm-9">
                                                <select name="role" id="role">
                                                    <option <?php if($user['role'] == 'admin'){echo "selected"; } ?> value="admin">Admin</option>
                                                    <option <?php if($user['role'] == 'agent'){echo "selected"; } ?> value="agent">Agent</option>
                                                    <option <?php if($user['role'] == 'user'){echo "selected"; } ?> value="user">User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" name="btn" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } } ?>
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