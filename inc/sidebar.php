<?php
use App\classes\Category;
?>
<div class="left-sidebar">
    <h2>Search Products</h2>
    <div class="search-bar"><!--search products-->
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Product Search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search fa-fw"></i> </button>
                </div>
            </div>
        </form>
    </div>
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php
        $categories = Category::getAllCategory();
        if($categories){
            while ($cat = mysqli_fetch_assoc($categories)){
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="productbycat.php?id=<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></a></h4>
            </div>
        </div>
        <?php } } ?>

    </div><!--/category-products-->

</div>