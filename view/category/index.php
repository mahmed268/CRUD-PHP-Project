<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Category;

    $studentObject = new Category;
    // echo '<pre>';
    $data = $studentObject->index();
    $categories = $data['categories'];
    $totalCategories = $data['categories_count'];

    ?>

    

    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <div class="container my-4">
        <h1 class="text-center">Category List</h1>

    <a class="btn btn-primary" href="create.php">Add New</a>

    <a class="btn btn-danger" href="trash.php">Trash</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SL#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl = 0;
                foreach ($categories as $category) {
                ?>
                    <tr>
                        <td><?php echo ++$sl ?></td>
                        <td><?php echo $category['title'] ?></td>
                        <td><?php echo $category['description'] ?></td>
                        <td><a class="btn btn-success m-1" href="show.php?id=<?php echo $category['id'] ?>">Show</a>
                             <a class="btn btn-primary m-1" href="edit.php?id=<?php echo $category['id'] ?>">Edit</a>
                             <a onclick="return confirm('Are you sure want to delete?')" href="destroy.php?id=<?php echo $category['id'] ?>" class="btn btn-danger m-1">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
        $totalPages = ceil($totalCategories / Category::PAGINATE_PER_PAGE);
        for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
        <?php
        }
        ?>

    </div>

    




</body>

</html>