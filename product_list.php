<?php
include_once 'layouts/header.php';


require_once 'vendor/autoload.php';

use Pondit\Product;

$producutObject = new Product;

// if(isset($_GET['id'])){
//     $list = $producutObject->getProductsByCategoryId($_GET['id']);
//     print_r($list);
// }


?>

<body>

    <div class="container-fluid">

        <?php
        include_once 'layouts/navbar.php'; ?>

        <div class="row mb-5">

            <div class="col-3 mt-5">
                <div class="bg-white shadow text-black pl-4">
                    <h5 class="title text-center pt-3 mt-1">Category List</h5>
                    <hr>

                    <?php


                    $producutObject = new Product;
                    // echo '<pre>';
                    $data = $producutObject->create();

                    $categories = $data['categories'];

                    if (isset($_SESSION['errors'])) {
                        foreach ($_SESSION['errors'] as $error) {
                            echo $error . '<br>';
                        }
                        unset($_SESSION['errors']);
                    }

                    ?>
                    <!--  -->

                    
                    <?php foreach ($categories as $category) { ?>
                        <a class="text-black" href="product_list.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a> <br>
                    <?php } ?>

                </div>

            </div>
            <div class="col-9">
                
                <div class="row my-2">
                
                    <?php if (isset($_GET['id'])) {
                        $list = $producutObject->getProductsByCategoryId($_GET['id']);
                        foreach ($list as  $lists) { ?>

                            <div class="col-md-4 col-sm-6 my-3">
                                <div class="card mt-4" style="width:100%;">
                                    <img class="card-img-top" src="assets/images/<?php echo $lists['picture'] ?>" height="150px" width="200px" alt="">
                                    <div class="badge-position">
                                        <h4><span class="badge badge-lg 
                                                                    bg-warning text-dark">-25% Save</span></h4>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title m-0 p-0">
                                            <?php echo "Model No : " . $lists['title'] ?> </h5><br>
                                        <p><?php echo "Price : " . $lists['price'] ?></p>

                                    </div>
                                    <button class="btn btn-primary"><a class="text-white" href="product_page.php?id=<?= $lists['id'] ?>">Details</a></button>
                                </div>
                            </div>

                        <?php }   ?>
                    <?php }   ?>

                </div>
            </div>


        </div>

    </div>
    <br><br><br><br><br><br><br><br><br>

    <?php include_once 'layouts/footer.php'; ?>