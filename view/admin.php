<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid my-4">

        <div class="row">
            <h1 class="text-center p-3 text-success">Admin Dashboard</h1>
            <div class="col-6">
                <h1 class="text-center">Category</h1>
                <hr>
                <a class="btn btn-primary m-1" href="category/create.php">Add Category</a>
                <a class="btn btn-success m-1" href="category/index.php">Display Category</a>
                <a class="btn btn-danger m-1" href="category/trash.php">Category Trash </a>


            </div>
            <div class="col-6">
                <h1 class="text-center">Product</h1>
                <hr>
                <a class="btn btn-primary m-1" href="product/create.php">Add Product</a>
                <a class="btn btn-success m-1" href="product/index.php">Display Product</a>
                <a class="btn btn-danger m-1" href="product/trash.php">Product Trash </a>

            </div>
        </div>
    </div>

</body>

</html>