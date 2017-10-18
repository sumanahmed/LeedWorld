<?php include 'inc/header.php'; ?>
<?php
use App\classes\Contact;
$contact = Contact::getcontactInfo();
if(isset($_POST['update'])){
    $update_contact = Contact::updateContactInfo($_POST);
}
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Update Contact Information
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                if($contact){
                                ?>
                                <form class="form-horizontal" action="" method="POST" role="form">
                                    <?php if(isset($update_contact)) {echo $update_contact; } ?>
                                    <div class="form-group">
                                        <label for="company_name" class="col-sm-3">Company Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="company_name" id="company_name" value="<?php echo $contact['company_name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-3">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" id="address" cols="30" rows="4"><?php echo $contact['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-3">Mobile</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mobile" id="mobile" value="<?php echo $contact['mobile']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="email" id="email" value="<?php echo $contact['email']; ?>" />
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