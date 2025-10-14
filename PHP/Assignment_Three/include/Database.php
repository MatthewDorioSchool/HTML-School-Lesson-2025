<?php
    require_once 'config.php';
    class Database{
        private $pdo;
        public $error = null;
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;        
        }
        private function validateImage(array $fileData){
            if(empty($fileData['name'])){
                $this->error = "Please select a profile image";
                return false;
            }
            $fileName = $fileData['name'];
            $fileTmpName = $fileData['tmp_name'];
            $fileSize = $fileData['size'];
            $fileError = $fileData['error'];

            if($fileError !== 0){
                $this->error = "There was an issue uploading your file";
                return false;
            }
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if(!in_array($fileExt, $allowed)){
                $this->error = "Must be jpg, jpeg, png or gif";
                return false;
            }
            $maxSize = 2 * 1024 * 1024;
            if ($fileSize > $maxSize){
                $this->error = "File must be less than 2MB";
                return false;
            }
            $newFileName = uniqid('', true) . "." . $fileExt;
            $fileDestination = 'uploads/' . $newFileName;

            if(!move_uploaded_file($fileTmpName, $fileDestination)){
                $this->error = "File upload failed";
                return false;
            }
            return $fileDestination;
        }
        public function create($username, $bio, array $fileData){
            $imagePath = $this->validateImage($fileData);
            if($imagePath === false){
                return false;
            }
            try{
                $sql = "INSERT INTO users (username, bio, image_path) VALUES (:username, :bio, :image_path)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':bio', $bio);
                $stmt->bindParam(':image_path', $imagePath);
                return $stmt->execute();
            }catch(PDOException $e){
                $this->error = "Database Error: " . $e->getMessage();
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
                return false;
            }
        }
        public function read(){
            try{
                $sql = "SELECT * FROM users ORDER BY id DESC";
                $stmt = $this->pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                $this->error = "Database read error: " . $e->getMessage();
                return false;
            }
        }
    }
    $db = new Database($pdo);
?>