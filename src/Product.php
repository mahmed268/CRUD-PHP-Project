<?php

namespace Pondit;

use PDO;
use PDOException;

class Product
{
    private $conn = '';
    public $categoryId = '';
    public $title = '';
    public $description = '';
    public $price = '' ;
    public $picture = '';
    const PAGINATE_PER_PAGE = 10;
    const FONT_PER_PAGE = 1000000000000;

    public function __construct()
    {
        try {
            //session_start();
            // do what you want……!
            $this->conn = new PDO("mysql:host=localhost;dbname=seip_b1", "root", "");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Database connected';
        } catch (PDOException $e) {
            // echo 'Failed to connect database';
            echo $e->getMessage();
        }
    }

    public function index()
    {
        $perPage = self::PAGINATE_PER_PAGE;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
            $offset = ($pageNumber - 1) * $perPage;
            $sql = "SELECT * FROM `products` where is_deleted = 0 order by id asc limit $perPage OFFSET $offset";
            // echo $offset;
        } else {
            $sql = "SELECT * FROM `products` where is_deleted = 0 order by id asc limit $perPage";
        }
        $stmt = $this->conn->query($sql);

        $countProductSql = "SELECT COUNT(*) as total_product FROM `products`";
        $countProductStmt = $this->conn->query($countProductSql);
        $productCount = $countProductStmt->fetchColumn();

        return [
            'products' => $stmt->fetchAll(),
            'products_count' => $productCount
        ];
    }
    public function font_cart()
    {
        $perPage = self::FONT_PER_PAGE;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
            $offset = ($pageNumber - 1) * $perPage;
            $sql = "SELECT * FROM `products` where is_deleted = 0 order by id asc limit $perPage OFFSET $offset";
            // echo $offset;
        } else {
            $sql = "SELECT * FROM `products` where is_deleted = 0 order by id asc limit $perPage";
        }
        $stmt = $this->conn->query($sql);

        $countProductSql = "SELECT COUNT(*) as total_product FROM `products`";
        $countProductStmt = $this->conn->query($countProductSql);
        $productCount = $countProductStmt->fetchColumn();

        return [
            'products' => $stmt->fetchAll(),
            'products_count' => $productCount
        ];
    }

    public function create()
    {
        $sql = "SELECT title, id FROM `categories`";
        $stmt = $this->conn->query($sql);
        $categories = $stmt->fetchAll();
        return ['categories' => $categories];
    }

    public function setData(array $data = [])
    {
        $errors = [];

        $tempName = $_FILES['picture']['tmp_name'];
        $originalName = $_FILES['picture']['name'];
        $imageSize = $_FILES['picture']['size'];

        // image type validation
        $explodedArray = explode('.', $originalName);
        $uploadImageType = end($explodedArray);
        $availableImageTypes = ['png', 'jpg', 'jpeg', 'gif'];
        if (!in_array($uploadImageType, $availableImageTypes)) {
            $errors[] = 'Invalid image type';
        }

        //image size validation
        if ($imageSize > 1048576) {
            $errors[] = 'Invalid image size';
        }

        

        if (array_key_exists('title', $data) && !empty($data['title'])) {
            $this->title = $data['title'];
        } else {
            $errors[] = 'Product Name required';
        }

        if (array_key_exists('category_id', $data) && !empty($data['category_id'])) {
            $this->categoryId = $data['category_id'];
        } else {
            $errors[] = 'category id  required';
        }

        if (array_key_exists('description', $data) && !empty($data['description'])) {
            $this->description = $data['description'];
        } else {
            $errors[] = 'Description required';
        }
        if (array_key_exists('price', $data) && !empty($data['price'])) {
            $this->price = $data['price'];
        } else {
            $errors[] = 'Price required';
        }

        if (count($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: ' . $_SERVER['HTTP_REFERER']);

        } else {
            $imageName = time() . '_' . $originalName;
            $this->picture =  $imageName;
            move_uploaded_file($tempName, '../../assets/images/' . $imageName);
            return $this;
        }
    }

    public function store() //Insert
    {

        try {
            $query = "INSERT INTO products(category_id, title, description, price, picture) VALUES(:category_id, :title, :description, :price, :picture)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':category_id' => $this->categoryId,
                ':title' => $this->title,
                ':description' => $this->description,
                ':price' => $this->price,
                ':picture' => $this->picture,
            ));
            $_SESSION['message'] = 'Successfully Created !';
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function show($id) //Display Data
    {
        $sql = 'SELECT * FROM `products` WHERE id=' . $id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    public function update($id)
    {
        try {
            $query = "UPDATE products SET title=:title, description=:description, price=:price , picture=:product_image where id = " . $id;

            $stmt = $this->conn->prepare($query);

            $stmt->execute(array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':price'=>$this->price,
                ':product_image' => $this->picture
            ));
            $_SESSION['message'] = 'Successfully Updated !';
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function destroy($id) //delete
    {
        try {
            $query = "UPDATE products SET is_deleted=:deleted where id = " . $id;
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':deleted' => 1
            ));


            $_SESSION['message'] = 'Successfully Deleted !';
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function trash()
    {
        $sql = 'SELECT * FROM `products` where is_deleted = 1';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function restore($id)
    {
        try {
            $query = "UPDATE products SET is_deleted=:deleted where id = " . $id;
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':deleted' => 0
            ));

            $_SESSION['message'] = 'Successfully Restored !';
            header('Location:trash.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) //Permanent delete
    {
        try {
            $sql = 'SELECT * FROM `products` WHERE id=' . $id;
            $stmt = $this->conn->query($sql);
            $stuedent = $stmt->fetch();

            $query = "delete from products where id=" . $id;
            $stmt = $this->conn->query($query);
            $stmt->execute();

            unlink("../../assets/images/" . $stuedent['picture']);
            $_SESSION['message'] = 'Successfully Deleted !';
            header('Location:trash.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function getProductsByCategoryId($id){
        $sql = 'SELECT * FROM `products` WHERE category_id=' . $id;
        $stmt = $this->conn->query($sql);

    //    echo "<pre>";
    //    print_r($stmt->fetchAll());
    //   die();
        return $stmt->fetchAll();
        
    }
}
