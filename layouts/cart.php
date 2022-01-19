<?php

use Pondit\Product;

include 'vendor/autoload.php';

include_once 'layouts/link.php';
?>


<!-- Our product section start -->
<div class="row p-3 mt-4 text-center text-uppercase">
    <div class="col-12">
        <h4 class="text-warning">Our Product Catagory</h4>
        <hr>
    </div>
</div>

<?php
$productObject = new Product;
// echo '<pre>';
$data = $productObject->index();
$products = $data['products'];
$totalProducts = $data['products_count'];
for ($i = 0; $i < 12; $i++) {

?>
    <div class="col-md-4 col-sm-6">
        <div class="card mt-4" style="width:100%;">
            <img class="card-img-top" src=<?php echo $productList['image'] ?> alt="Card image cap">
            <div class="badge-position">
                <h4><span class="badge badge-lg bg-warning text-dark">-25% Save</span></h4>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title m-0 p-0">
                    <?php echo $productList['title'] ?> </h5>
                <p class="card-text text-color"><?php echo $productList['price'] ?></p>
            </div>
            <div class="m-2">
                <div class="row">
                    <div class="col-5">
                        <a href="product_page.html" class="btn text-white bg-purple"><?php echo $productList['description'] ?></a>
                    </div>
                    <div class="col-6 text-right">
                        <button href="#" class="text-color btn"><span class="material-icons">
                                favorite_border
                            </span></button>
                        <button href="#" class="btn text-color"><span class="material-icons">
                                more_horiz
                            </span></button>
                        <a class="btn btn-primary" href="product_page.php" role="button">Details</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
<?php

}
?>