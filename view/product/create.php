<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Product;

    $productObject = new Product;
    // echo '<pre>';
    $data = $productObject->create();

    $categories = $data['categories'];

    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        unset($_SESSION['errors']);
    }

    ?>


    <div class="container my-4">
        <di class="row">
            <div class="col-8 offset-2">


                <h1 class="text-center">Create New Product</h1>
                <a class="btn btn-danger" href="../admin.php">Back</a>
                 <a class="btn btn-primary" href="index.php">Show Product</a>
            
                <form action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select One</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" required placeholder="Enter Title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input class="form-control"  type="text" name="description" placeholder="Enter Description">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input class="form-control"  type="text" name="price" placeholder="Enter Price">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input class="form-control" type="file" name="picture" accept="image/*"><br>

                    </div>

                    <button class="btn btn-primary" type="submit">Add</button>
                </form>

            </div>
        </di>
    </div>
</body>

</html>