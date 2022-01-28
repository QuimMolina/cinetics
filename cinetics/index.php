<?php
session_start();

require './web/database.php';

if (isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $sql ="SELECT username, passHash FROM 'users' where username=$username";

    $query = $conn->prepare("SELECT username, passHash FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result){
            if(password_verify($_POST['password'], $result['passHash'])){
                $_SESSION['user'] = $username;
                header('Location: ./web/home.php');
            } else {
                echo '<p>Las credenciales no son correctas</p>';
            }
    }

    $message = '';


}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title>Portal del treballador</title>
        <link rel="stylesheet" type="text/css" href="./css/main.css" />
        <link rel="icon" href="./img/icon.jpg" />
        <script src="./js/script.js"></script>
    </head>
    <body>
    <div class="container">
    <div class="card">
        <h1 class="card_title">Login to your account</h1>
        <form class="card_form" action="index.php" method="post">
            <div class="input">
                <input type="text" name="username" class="input_field" required />
                <label class="input_label">Email/Username</label>
            </div>
            <div class="input">
                <input type="password" name="password" class="input_field" required />
                <label class="input_label">Password</label>
                <span class="input_eye">

                    <svg viewBox="0 0 146 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M143 37C143 45.4902 136.139 53.9606 123.263 60.487C110.554 66.9283 92.7879 71 73 71C53.2121 71 35.446 66.9283 22.7375 60.487C9.86096 53.9606 3 45.4902 3 37C3 28.5098 9.86096 20.0394 22.7375 13.513C35.446 7.07167 53.2121 3 73 3C92.7879 3 110.554 7.07167 123.263 13.513C136.139 20.0394 143 28.5098 143 37Z" stroke-width="6" />
                        <circle cx="73" cy="37" r="34" stroke-width="6" />
                    </svg>
                </span>
            </div>
            <input  class="card_button" type="submit" value="Login">

        </form>
        <div class="card_info">
            <p>Not registered? <a href="./web/signup.php">Create an account</a></p>
        </div>
        <div class="card_info">
         <p>Forgot password? <a href="./web/forgot.php">Reset it!</a></p>
        </div>
    </div>
    <?php
    require './web/pececillo.php'
    ?>


</body>
</html>