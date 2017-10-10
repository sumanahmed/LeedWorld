<?php include 'inc/header.php'; ?>
<?php
if (isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}
?>

    <div class="container section-padding">
        <div class="row">
            <?php include 'inc/member-menu.php'; ?>
            <div class="col-sm-9 col-md-9">
                <div class="well">
                    <img src="assets/images/users/binary-mlm.jpg" alt="" style="width: 650px; height: 400px;">
                </div>
            </div>

        </div>
    </div>


<?php include 'inc/footer.php'; ?>