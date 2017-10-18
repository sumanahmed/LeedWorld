<?php include 'inc/header.php'; ?>
<?php
use App\classes\Member;
if(!isset($_SESSION['id'])) {
    header("Location:login.php");
}

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
if(isset($_POST['update'])){
    $check = Member::updatePassword($_POST, $id);
}
?>

    <section style="margin-top: 30px; min-height: 430px;">
        <div class="container">
            <div class="row">
                <?php include 'inc/member-menu.php'; ?>
                <div class="col-sm-9 col-md-9">
                    <form class="form-horizontal" action="" method="POST" >
                        <div class="form-group">
                            <label for="old_password" class="col-sm-2 col-sm-offset-1">Old Password</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="old_password" id="old_password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-sm-2 col-sm-offset-1">New Password</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="new_password" id="new_password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-offset-1"></label>
                            <div class="col-sm-9">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php include 'inc/footer.php'; ?>