<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <script src='cart.js' defer></script>
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

    <div id="cars-cart" class=cars_wrapper>
        <div class="view-car-cart">

            <?php

            // loop over $_SESSION['retrieverData'] and display the cars
            // if $_SESSION['retrieverData'] is empty, display "No cars in cart"
            if (isset($_SESSION['retrieverData'])) {
                if ($_SESSION['retrieverData'] != null) {
                    foreach ($_SESSION['retrieverData'] as $key => $value) {
                        echo "<div id='" . $value['id'] . "' class='cars_cart_card'>";
                        echo "<div class='card_img_wrapper'>";
                        echo "<img class='card_img' src='../" . $value['image'] . "' alt='320i'>";
                        echo "</div>";
                        echo "<div class='card_content'>";
                        echo "<div class='vehicle_content'>";
                        echo "<h4>Reserved Car :</h4>";
                        echo "<p>" . $value['brand'] . " " . $value['model'] . "</p>";
                        echo "</div>";
                        echo "<div class='price_content'>";
                        echo "<h4>Price Per Day :</h4>";
                        echo "<p> $" . $value['pricePerDay'] . "</p>";
                        echo "</div>";
                        echo "<div class='reservation_content'>";
                        echo "<h4>Rental Days :</h4>";

                        echo "<form action'' method='post'>";
                        echo "<input type='hidden' name='id' value='" . $value['id'] . "'>";
                        echo "<input  id='" . $value['id'] . "' class='rentalPeriod' type='number' name='rentalPeriod' value='" . $value['rentalPeriod'] . "' min='1' max='14' placeholder='Rental Days'>";
                        echo "<button id='updateRentalPeriodBtn' type='submit'>Update</button>";
                        echo "</form>";

                        echo "</div>";

                        echo "<div class='remove_btn_wrapper'>";
                        echo "<form action='?remove_id=" . $value['id'] . "' method='post'>";
                        echo "<input id='removeCarId' class='remove_car_btn' type='submit' name='removeCar' value='Remove Car'>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo '<div class="no_cars_cart">';
                    echo '<h1>No car has been reserved!</h1>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no_cars_cart">';
                echo '<h1>No car has been reserved!</h1>';
                echo '</div>';
            }
            ?>
        </div>
        <div>
            <div id="checkoutBtn" class="checkout_btn_wrapper">
                <input id="checkoutButton" type='button' class="checkout_btn" name="checkout" value="Checkout">
            </div>
        </div>
    </div>
</body>

</html>

<?php

// If removed button is clicked then alert the user that the remove_id is being removed from the cart
// and then fine the car from $_SESSION[retrieverData] and remove it from the cart
if (isset($_GET['remove_id'])) {
    foreach ($_SESSION['retrieverData'] as $key => $value) {
        if ($value['id'] == $_GET['remove_id']) {
            // alert the user that the car is being removed
            echo "<script>alert('" . $value['brand'] . " " . $value['model'] . " is being removed from the cart');</script>";
            unset($_SESSION['retrieverData'][$key]);

            // update array key
            $_SESSION['retrieverData'] = array_values($_SESSION['retrieverData']);
        }
    }
    // window location to refresh the page
    echo "<script>window.location.href = './cart.php'</script>";
}

if (isset($_POST['id'])) {
    foreach ($_SESSION['retrieverData'] as $key => $value) {
        if ($value['id'] == $_POST['id']) {
            $_SESSION['retrieverData'][$key]['rentalPeriod'] = $_POST['rentalPeriod'];
            // reload the page
            echo "<script>window.location.href = './cart.php'</script>";
        }
    }
}

// if $_SESSION['retrieverData'] is empty, checkout button is is hidden
if (isset($_SESSION['retrieverData']) || !isset($_SESSION['retrieverData'])) {
    if (empty($_SESSION['retrieverData'])) {
        echo "<script>document.getElementById('checkoutBtn').style.display = 'none';</script>";
    }
}
?>