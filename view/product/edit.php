<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Product;

    $productObject = new Product;
    $product = $productObject->show($_GET['id']);


    $data = $productObject->create();

    $categories = $data['categories'];


    // session_start();
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        unset($_SESSION['errors']);
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Edit Product</h1>

        <div class="row">
            <div class="col-6 offset-3">

                <a class="btn btn-primary mb-3" href="">Back</a>
                <a class="btn btn-primary mb-3" href="index.php">Product List</a>

                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <select class="form-control" name="category_id">
                            <option value="">Select One</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>" <?php echo $category['id'] == $product['category_id'] ? 'selected' : '' ?>><?= $category['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div>
                        <input class="form-control" type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                    </div>

                    <div>
                        <input class="form-control" name="title" value="<?php echo $product['title'] ?>" required placeholder="Enter Product Name"><br>
                    </div>
                    <div>
                        <input class="form-control" name="description" value="<?php echo $product['description'] ?>" placeholder="Enter  description"><br>
                    </div>

                    <div>
                        <input class="form-control" name="price" value="<?php echo $product['price'] ?>" placeholder="Enter price"><br>
                    </div>

                    <div>
                        <input class="form-control" type="file" name="picture" accept="image/*"><br>
                    </div>

                    <button class="btn btn-info" type="submit">Update</button>
                </form>
            </div>
        </div>



    </div>




</body>

</html>