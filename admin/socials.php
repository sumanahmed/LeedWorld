<?php include 'inc/header.php'; ?>
<?php
use App\classes\Contact;
$social = Contact::getSocialInfo();
if(isset($_POST['update'])){
    $update_social = Contact::updateSocialInfo($_POST);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Socials Information
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                if($social){
                                    ?>
                                    <form class="form-horizontal" action="" method="POST" role="form">
                                        <?php if(isset($update_social)) {echo $update_social; } ?>
                                        <div class="form-group">
                                            <label for="fb" class="col-sm-3">Facebook</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="fb" id="fb" value="<?php echo $social['fb']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tw" class="col-sm-3">Twitter</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="tw" id="tw" value="<?php echo $social['tw']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ln" class="col-sm-3">Linked In</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="ln" id="ln" value="<?php echo $social['ln']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gp" class="col-sm-3">Google Plus</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="gp" id="gp" value="<?php echo $social['gp']; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
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