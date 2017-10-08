<?php include 'inc/header.php'; ?>
<?php
use App\classes\Category;
if(isset($_POST['btn'])){
    $addcat = Category::addCategory($_POST);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Category
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal" action="" method="post" role="form">
                                    <?php if(isset($addcat)) {echo $addcat; } ?>
                                    <div class="form-group">
                                        <label for="category_name" class="col-sm-3">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="category_name" id="category_name" placeholder="Type category name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" name="btn" class="btn btn-success">Save</button>
                                        </div>
                                    </div>

                                </form>
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