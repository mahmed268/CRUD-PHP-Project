<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Category;

    $studentObject = new Category;
    // echo '<pre>';
    $students = $studentObject->trash();

    ?>

    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <div class="container my-4">

    <h1 class="text-center">Trash List</h1>
    <a class="btn btn-primary" href="index.php">Category List</a>

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
                foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo ++$sl ?></td>
                        <td><?php echo $student['first_name'] ?></td>
                        <td><?php echo $student['last_name'] ?></td>
                        <td>
                            <a class="btn btn-success m-1" href="restore.php?id=<?php echo $student['id'] ?>" onclick="return confirm('Are you sure want to restore?')">Restore</a>

                             <a onclick="return confirm('Are you sure want to delete permanently?')" href="delete.php?id=<?php echo $student['id'] ?>" class="btn btn-danger m-1">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</body>

</html>