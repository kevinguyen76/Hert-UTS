<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <script src="./main.js" defer></script>
    <title>Hertz-UTS</title>
</head>

<body>
    <header>
        <div class="title">
            <h1>Hertz-UTS</h1>
        </div>
        <div class="res_cart_wrapper">
            <a href="rentalCart/cart.php" class="reservation_cart_btn">
                View Reservation Cart
            </a>
        </div>
    </header>

    <div id="car-info" class="cars_container">
    </div>
</body>

</html>