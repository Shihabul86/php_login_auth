<?php  
class Database{
    public $connection;
    public $hostName="localhost";
    public $dbName="php_auth";
    public $dbUserName="root";
    public $dbPassWord="";

    public function __construct(){
        $this->connection = new PDO("mysql:host=$this->hostName;dbname=$this->dbName", $this->dbUserName , $this->dbPassWord);
        if($this->connection){
            //echo 'Connected';
        }else{
            echo 'error';
        }
    }
    //register
    public function insertUser($name,$email,$password){
        $query = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        $statement = $this->connection->prepare($query);
        $statement->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':password' => md5($password),
        )); 
    }
    //user login
    public function login($email,$password){
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;

    }
}


?>