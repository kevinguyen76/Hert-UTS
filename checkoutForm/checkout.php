<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <script src='checkout.js' defer></script>
    <title>Hertz-UTS</title>
</head>

<body>
    <header>
        <div class="title">
            <h1>Hertz-UTS</h1>
        </div>
        <div class="back_btn_wrapper">
            <a href="../rentalCart/cart.php" id="viewCartBtn" class="back_home_btn">
                View Cart
            </a>
            <a href="../index.php" id="homeBtn" class="back_home_btn">
                Go Back Home
            </a>
        </div>
    </header>

    <div class="checkout_form_wrapper">
        <div class="total_rental_price">
            <?php

            // claculate total price
            $totalPrice = 0;
            $_SESSION['totalPrice'] = $totalPrice;

            // for each car in $_SESSION['retrieverData'] calculate total pricePerDay * rentalPeriod
            foreach ($_SESSION['retrieverData'] as $car) {
                $totalPrice += $car['pricePerDay'] * $car['rentalPeriod'];
            }

            // display total price
            echo "<h1>Total Price: $" . $totalPrice . "</h1>";
            ?>
        </div>

        <div class="form_wrapper">
            <div class="form_inputs">
                <form action="" method="post">
                    <table>
                        <tr class="first-row">
                            <!-- first name -->
                            <td>
                                <label for="first_name">First Name</label>
                            </td>

                            <!-- Last Name -->
                            <td>
                                <label for="last_name" id="label_ln">Last Name</label>
                            </td>
                        <tr class="first_row_input">
                            <!-- First name Input -->
                            <td>
                                <input type="text" name="first_name" id="first_name" required>
                            </td>

                            <!-- last name  input-->
                            <td>
                                <input type="text" name="last_name" id="last_name" required>
                            </td>
                        </tr>
                        <tr>
                            <!-- email -->
                            <td>
                                <label for="email">Email</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- email input -->
                            <td colspan="2">
                                <input type="email" name="email" id="email" required>
                            </td>
                        </tr>
                        <tr>
                            <!-- address -->
                            <td>
                                <label for="address">Address</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- address input -->
                            <td colspan="2">
                                <input type="text" name="address" id="address" required>
                            </td>
                        </tr>
                        <tr>
                            <!-- city -->
                            <td>
                                <label for="city">City</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- city input -->
                            <td colspan="2">
                                <input type="text" name="city" id="city" required>
                            </td>
                        </tr>
                        <tr>
                            <!-- postcode -->
                            <td>
                                <label for="postcode">Postcode</label>
                            </td>
                            <!-- state -->
                            <td>
                                <label for="state">State</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- postcode input -->
                            <td>
                                <input type="text" name="postcode" id="postcode" required>
                            </td>
                            <!-- state select -->
                            <td>
                                <select name="state" id="state" required>
                                    <option value="">Select State</option>
                                    <option value="NSW">New South Wales</option>
                                    <option value="QLD">Queensland</option>
                                    <option value="VIC">Victoria</option>
                                    <option value="TAS">Tasmania</option>
                                    <option value="WA">Western Australia</option>
                                    <option value="SA">South Australia</option>
                                    <option value="NT">Northern Territory</option>
                                    <option value="ACT">Australian Capital Territory</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!-- phone number -->
                            <td>
                                <label for="phone_number">Phone Number</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- phone number input -->
                            <td colspan="2">
                                <input type="text" name="phone_number" id="phone_number" required>
                            </td>
                        </tr>
                        <tr>
                            <!-- payment method -->
                            <td>
                                <label for="payment_method">Payment Method</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- payment method select -->
                            <td colspan="2">
                                <select name="payment_method" id="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="Debit Card">Debit Card</option>
                                    <option value="Master Card">Master Card</option>
                                    <option value="PayPal">PayPal</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="button_wrapper">
                        <button type="submit" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

// submit form is clicked go to confirmation page
if (isset($_POST['submit'])) {
    // get data from form
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $phoneNumber = $_POST['phone_number'];
    $paymentMethod = $_POST['payment_method'];

    // store data in session
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['postcode'] = $postcode;
    $_SESSION['state'] = $state;
    $_SESSION['phoneNumber'] = $phoneNumber;
    $_SESSION['paymentMethod'] = $paymentMethod;

    // unseend data in session
    unset($_SESSION['retrieverData']);

    // redirect to confirmation page in confirmation folder with the same name as the file
    echo "<script>window.location.href='../confirmation/confirmation.php'</script>";
}
?>