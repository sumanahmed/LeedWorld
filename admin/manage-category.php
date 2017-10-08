<?php include 'inc/header.php'; ?>
<?php
use App\classes\Category;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $delcat = Category::deleteCategoryById($id);
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Categories
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php if(isset($delcat)){echo $delcat; } ?>
                                <table class="table table-striped table-bordered table-responsive">
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $allcat = Category::getAllCategory();
                                    if($allcat){
                                        $i=1;
                                        while ($value = mysqli_fetch_assoc($allcat)){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value['category_name']; ?></td>
                                        <td>
                                            <a class="btn btn-info btn-xs" title="Edit Category" href="edit-category.php?id=<?php echo $value['category_id']; ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a class="btn btn-danger btn-xs" title="Delete Category" href="?id=<?php echo $value['category_id']; ?>" onclick="return confirm('Are you sure to delete this row!!');">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </table>
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