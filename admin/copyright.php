<?php include 'inc/header.php'; ?>
<?php
use App\classes\Contact;
$getCopyright=Contact::getCopyRightText();
if(isset($_POST['btn'])){
    $copyright_text = $_POST['copyright_text'];
    $update = Contact::updateCopyRightText($copyright_text);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update copyright text
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php if($getCopyright){ ?>
                                <form class="form-horizontal" action="" method="post" role="form">
                                    <?php if(isset($update)) {echo $update; } ?>
                                    <div class="form-group">
                                        <label for="category_name" class="col-sm-3">Copyright Text</label>
                                        <div class="col-sm-9">
                                            <textarea name="copyright_text" id="" cols="50" rows="3"><?php echo $getCopyright['copyright_text']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" name="btn" class="btn btn-success">Update</button>
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