<?php include 'inc/header.php'; ?>
<?php
    if(!isset($_SESSION['id'])){
        header("Location:login.php");
    }
?>
    <div class="container section-padding">
        <div class="row">
            <?php include 'inc/member-menu.php'; ?>
            <div class="col-sm-9 col-md-9">
                <div class="well">
                    <h1>Welcome <strong><?php echo $_SESSION['name'];?></strong></h1>
                    This is your Dashbaord Area.
                </div>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>