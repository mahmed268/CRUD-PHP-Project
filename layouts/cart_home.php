<?php

use Pondit\Product;

require_once 'vendor/autoload.php';
include_once 'layouts/link.php';
?>


<!-- Our Home product section -->
<div class="row p-3 mt-4 text-center text-uppercase">
    <div class="col-12">
        <h4 class="text-warning">Our Product Catagory</h4>
        <hr>
    </div>
</div>

<?php



$productObject = new Product;
// echo '<pre>';
$data = $productObject->font_cart();
$products = $data['products'];
$totalProducts = $data['products_count'];





foreach ($products as $product) {

?>
    <div class="col-md-4 col-sm-6 my-3">
        <div class="card mt-4" style="width:100%;">
            <img class="card-img-top" src="assets/images/<?php echo $product['picture'] ?>" height="150px" width="200px" alt="">
            
            <div class="card-body text-center">
                <h5 class="card-title m-0 p-0">
                    <?php echo "Model No : " . $product['title'] ?> </h5><br>
                <p><?php echo "Price : " . $product['price'] ?></p>

            </div>
            <a  class="btn btn-primary" class="text-white" href="product_page.php?id=<?= $product['id'] ?>">Details</a>
            
        </div>

        
    </div>
    
<?php } ?>