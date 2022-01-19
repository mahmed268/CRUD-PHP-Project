<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        unset($_SESSION['errors']);
    }
    ?>


    <div class="container my-4">

        <h1 class="text-center">Create Category</h1>
        <div class="mb-2">
            <a class="btn btn-danger" href="../admin.php">Back</a>
            <a class="btn btn-primary" href="index.php">Show All Category</a>
           
        </div>
       
        <form action="store.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input class="form-control" name="title" type="text" required placeholder="Enter Title">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input class="form-control" name="description" type="text" required placeholder="Enter Description">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input class="form-control" type="file" name="picture" accept="image/*">
            </div>

            <div>
                <button class="btn btn-primary text-center" type="submit">Add</button>
            </div>


        </form>

    </div>


</body>

</html>