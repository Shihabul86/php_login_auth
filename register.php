<?php  
    include_once 'Database.php';
    $db = new Database();
    //insert user
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db->insertUser($name,$email,$password);
        echo 'success';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h1>Register | <a href="index.php">Login</a></h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <input type="text" name="name" placeholder="Enter Your Name"><br><br>
        <input type="email" name="email" placeholder="Enter Your Email"><br><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br><br>
        <button type="submit" name="submit">Add User</button>
    </form>
</body>
</html>