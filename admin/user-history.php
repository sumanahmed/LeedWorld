<?php include 'inc/header.php'; ?>
<?php
use App\classes\Login;
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $delete = Login::deleteUser($id);
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Users Information
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="" method="POST">
                                <?php if(isset($delete)){echo $delete; } ?>
                                <table class="table table-striped table-bordered table-responsive">
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>User Role</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $user = Login::getAllUser();
                                    if($user){$i=1;
                                        while ($value = mysqli_fetch_assoc($user)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['email']; ?></td>
                                                <td><?php echo $value['mobile_no']; ?></td>
                                                <td><?php echo $value['role']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-xs" title="Update User Role" href="edit-user.php?editid=<?php echo $value['id']; ?>">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>
                                                    <a class="btn btn-danger btn-xs" title="Delete User" href="?delid=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure to delete this row!!');">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                </table>
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