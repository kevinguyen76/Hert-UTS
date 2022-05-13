<?php
session_start();

$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

// Save the data to the session
if (!isset($_SESSION['retrieverData'])) {
    $_SESSION['retrieverData'] = array();
    array_push($_SESSION['retrieverData'], $data);
} else {
    $found = false;
    foreach ($_SESSION['retrieverData'] as $key => $value) {
        if ($value['id'] == $data['id']) {
            $found = true;
        }
    }
    if (!$found) {
        array_push($_SESSION['retrieverData'], $data);
    } else {
        echo "<script>alert('This car has already been added to the cart');</script>";
    }
}
