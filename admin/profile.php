<?php include 'inc/header.php'; ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Profile
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal" action="" method="post" >
                                    <?php if(isset($update)) {echo $update; } ?>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3">Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" id="name" value="name" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_no" class="col-sm-3">Mobile No</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mobile_no" id="mobile_no" value="01620506565" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="email" id="email" value="sss@gmail.com" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-3">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="10" name="address" id="address" style="resize: vertical;">assadsa</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-3">City</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="city" id="city" value="city" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip" class="col-sm-3">Zip Code</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="zip" id="zip" value="1212" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3">Old Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="password" id="password" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password" class="col-sm-3">New Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="new_password" id="new_password" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" name="btn" class="btn btn-success">Update</button>
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