<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Product;

    $productObject = new Product;

    $products = $productObject->trash();

    ?>


    

    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>


    <div class="container my-4">
<h1 class="text-center">Trash List</h1>
    <a class="btn btn-primary" href="index.php">Product List</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col" >Product Price</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                $sl = 0;
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?php echo ++$sl ?></td>
                        <td><?php echo $product['title'] ?></td>
                        <td><?php echo $product['description'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td>
                        <a class="btn btn-success" href="restore.php?id=<?php echo $product['id'] ?>" onclick="return confirm('Are you sure want to restore?')">Restore</a>

                         <a onclick="return confirm('Are you sure want to delete permanently?')" href="delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
            </tbody>
        </table>
    </div>

  
</body>

</html>