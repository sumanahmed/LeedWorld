<?php include 'inc/header.php'; ?>
<?php
use App\classes\Page;
$about_content = Page::getAboutContent();
?>

    <section style="margin-top: 30px;min-height: 430px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php include 'inc/sidebar.php'; ?>
                </div>

                <div class="col-sm-9 padding-right">
                    <?php
                    if($about_content){
                        while ($about = mysqli_fetch_assoc($about_content)){
                        ?>
                        <div class="about-content"><!--product-details-->
                           <p><?php echo $about['about_content']; ?></p>
                        </div><!--/product-details-->
                    <?php } } ?>

                </div>
            </div>
        </div>
    </section>

<?php include 'inc/footer.php'; ?>