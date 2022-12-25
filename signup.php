<?php

//include('connectdb.php');


$name = $_POST['name'];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($name);
echo "Welcome $name";

header("Location: Booking.php?welcome");



