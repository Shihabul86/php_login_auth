<?php
    session_start();
    include_once 'Database.php';
    $db = new Database();

    //login
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $db->login($email,$password);

        if (count($result) == 1) {
            session_start();
            foreach($result as $data){
                $_SESSION['email'] = $data['email'];
                $_SESSION['id'] = $data['id'];
                header('location:dashboard.php');
            }
        }else{
            echo 'Email or password does not match';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Login | <a href="register.php">Register</a></h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <input type="email" name="email" placeholder="Enter Your Email"><br><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>