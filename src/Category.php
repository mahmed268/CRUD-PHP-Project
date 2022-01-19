<?php
namespace Pondit;
use PDO;
use PDOException;

class Category 
{
    private $conn = '';
    public $title = '';
    public $description = '';
    public $picture = '';
    const PAGINATE_PER_PAGE = 3;

    public function __construct()
    {
        try {
            session_start();
            // do what you want……!
            $this->conn = new PDO("mysql:host=localhost;dbname=seip_b1","root", "");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Database connected';
        } catch(PDOException $e){
            // echo 'Failed to connect database';
            echo $e->getMessage();
        }
    }

    public function index()
    {
        $perPage = self::PAGINATE_PER_PAGE;
        if(isset($_GET['page'])){
            $pageNumber = $_GET['page'];
            $offset = ($pageNumber-1) * $perPage;
            $sql = "SELECT * FROM `categories` where is_deleted = 0 order by id asc limit $perPage OFFSET $offset"; 
            // echo $offset;
        }else{
            $sql = "SELECT * FROM `categories` where is_deleted = 0 order by id asc limit $perPage";
        }
        $stmt = $this->conn->query($sql);

        $countCategoriesSql = "SELECT COUNT(*) as total_category FROM `categories`";
        $countCategoriesStmt = $this->conn->query($countCategoriesSql);
        $categoriesCount = $countCategoriesStmt->fetchColumn();

        return [
            'categories' => $stmt->fetchAll(),
            'categories_count' => $categoriesCount
        ];

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
        if(!in_array($uploadImageType, $availableImageTypes)){
            $errors[] = 'Invalid image type';
        }

        //image size validation
        if($imageSize > 1048576){
            $errors[] = 'Invalid image size';
        }

        if(array_key_exists('title', $data) && !empty($data['title'])){
            $this->title = $data['title'];
        }else{
            $errors[] = 'Title required';
        }

        if(array_key_exists('description', $data) && !empty($data['description'])){
            $this->description = $data['description'];
        }else{
            $errors[] = 'Description required';
        }

        if(count($errors)){
            $_SESSION['errors'] = $errors;
            header('location: '.$_SERVER['HTTP_REFERER']);
        }else{
            $imageName = time().'_'. $originalName;
            $this->picture =  $imageName;
            move_uploaded_file($tempName, '../../assets/images/'.$imageName);
            return $this;
        }
    }

    public function store()
    {
        try{
            $query ="INSERT INTO categories(title, description, picture) VALUES(:title , :description, :picture)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':picture' => $this->picture,
            ));
            $_SESSION['message'] = 'Successfully Created !';
            header('Location:index.php');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM `categories` WHERE id='.$id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    public function update($id)
    {
        try{
            $query ="UPDATE categories SET title=:title, description=:description, picture=:student_image where id = ".$id;

            $stmt = $this->conn->prepare($query);

            $stmt->execute(array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':student_image' => $this->picture
            ));
            $_SESSION['message'] = 'Successfully Updated !';
            header('Location:index.php');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function destroy($id) //delete
    {
        try{
            $query ="UPDATE categories SET is_deleted=:deleted where id = ".$id;
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':deleted' => 1
            ));

            // $sql = 'SELECT * FROM `categories` WHERE id='.$id;
            // $stmt = $this->conn->query($sql);
            // $stuedent = $stmt->fetch();

            // $query ="delete from categories where id=".$id;
            // $stmt = $this->conn->query($query);
            // $stmt->execute();

            // unlink("../../assets/images/".$stuedent['picture']);
            $_SESSION['message'] = 'Successfully Deleted !';
            header('Location:index.php');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function trash()
    {
        $sql = 'SELECT * FROM `categories` where is_deleted = 1';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function restore($id)
    {
        try{
            $query ="UPDATE categories SET is_deleted=:deleted where id = ".$id;
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':deleted' => 0
            ));

            $_SESSION['message'] = 'Successfully Restored !';
            header('Location:trash.php');
        } catch (PDOException $e){  
            echo $e->getMessage();
        }
    }

    public function delete($id) //permanent delete
    {
        try{
            $sql = 'SELECT * FROM `categories` WHERE id='.$id;
            $stmt = $this->conn->query($sql);
            $stuedent = $stmt->fetch();

            $query ="delete from categories where id=".$id;
            $stmt = $this->conn->query($query);
            $stmt->execute();

            unlink("../../assets/images/".$stuedent['picture']);
            $_SESSION['message'] = 'Successfully Deleted !';
            header('Location:trash.php');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}