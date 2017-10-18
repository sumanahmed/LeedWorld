<?php include 'inc/header.php'; ?>
<?php
use App\classes\Page;
if(isset($_POST['btn'])){
    $updateabout = Page::updateAboutContent($_POST);
}

$about_content = Page::getAboutContent();
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update About Page Content
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <?php if($about_content) {
                                    while ($about = mysqli_fetch_assoc($about_content)){?>
                                <form class="form-horizontal" action="" method="POST" role="form">
                                    <?php if(isset($updateabout)) {echo $updateabout; } ?>
                                    <div class="form-group">
                                        <label for="about_content" class="col-sm-2">About Content</label>
                                        <div class="col-sm-10">
                                            <textarea name="about_content" id="about_content" cols="80" rows="20"><?php echo $about['about_content']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-10">
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