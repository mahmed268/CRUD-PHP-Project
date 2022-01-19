<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Category;


    $categoryObject = new Category;
    $category = $categoryObject->show($_GET['id']);


    // session_start();
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        unset($_SESSION['errors']);
    }
    ?>



    <div class="container">
        <h1 class="text-center">Edit Category</h1>
        <a class="btn btn-primary" href="index.php">Show All Category</a>

        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="" class="form-label">Title</label>
                <input class="form-control" type="hidden" name="category_id" value="<?php echo $category['id'] ?>">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Title</label>
                <input class="form-control" name="name" value="<?php echo $category['title'] ?>" required placeholder="Enter title">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">description</label>
                <input class="form-control" name="description" value="<?php echo $category['description'] ?>" placeholder="Enter description">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Title</label>
                <input class="form-control" type="file" name="picture" accept="image/*">
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>



    </div>

</body>

</html>