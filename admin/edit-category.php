<?php include 'inc/header.php'; ?>
<?php
use App\classes\Category;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
}
if(isset($_POST['btn'])){
    $update = Category::updateCategory($id, $_POST);
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Category
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                $getCat = Category::getCategoryById($id);
                                if($getCat){
                                ?>
                                <form class="form-horizontal" action="" method="post" role="form">
                                    <?php if(isset($update)) {echo $update; } ?>
                                    <div class="form-group">
                                        <label for="category_name" class="col-sm-3">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="category_name" id="category_name" value="<?php echo $getCat['category_name']; ?>" >
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