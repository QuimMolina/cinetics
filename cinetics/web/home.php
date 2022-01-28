<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title>Portal del treballador</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="icon" href="./img/icon.jpg" />
        <script src="../js/script.js"></script>
    </head>
    <body>
    <div class="container">
    <div class="card">
        <h1 class="card_title">Welcome!</h1>
        <?php echo "<h1>".$_SESSION['user']."</h1>";?>
        <div class="card_info">
            <p>Wanna <a href="./logout.php">Log out?</a></p>
        </div>

    </div>
    <?php
    require '../web/pececillo.php'
    ?>


</body>
</html>