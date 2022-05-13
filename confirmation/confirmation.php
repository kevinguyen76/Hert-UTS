<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirmation.css">
    <title>Hertz-UTS</title>
</head>

<body>
    <header>
        <div class="title">
            <h1>Hertz-UTS</h1>
        </div>
        <div class="back_btn_wrapper">
            <a href="../index.php" id="homeBtn" class="back_home_btn">
                Go Back Home
            </a>
        </div>
    </header>

    <div>
        <div class="content_wrapper">
            <div class="content">
                <?php
                echo "<h1>Thank you " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " for renting at Hertz-UTS!</h1>";
                ?>
            </div>
        </div>
</body>