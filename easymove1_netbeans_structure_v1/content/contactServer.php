<?php

$link = mysqli_connect('den1.mysql6.gear.host', 'easymovedb', 'Vi3C?b~tp9ad', 'easymovedb');
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


// receiving a submision
// extract values submitted
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];


// flag
$errorList = array();
// verify
if (strlen($name) < 2 || strlen($name) > 150) {
    array_push($errorList, "Error: name must be between 2 and 150 characters long");
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE || strlen($email) > 255) {
    array_push($errorList, "Error: email is invalid.");
}
if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
    array_push($errorList, "Error: phone is invalid");
}
if (strlen($message) < 2 || strlen($message) > 1000) {
    array_push($errorList, "Error: message must be between 2 and 1000 characters long");
}
//
if (!$errorList) {
    // STATE 2: SUCCESSFUL SUBMISSION
    $query = "INSERT INTO messages VALUES (NULL,NULL, '$name', '$email','$phone','$message')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo "<br/><button onclick='history.go(-1);'>Back </button><br/><br/>";
        die("<b>SQL query error: " . mysqli_error($link) . "</b>");
    }

    echo "<p>Hi $name, you are successful sent message to us ! y/o</p>";
} else {
    // STATE 3: FAILED SUBMISSION
    echo "<br/><button onclick='history.go(-1);'>Back </button><br/><br/>";
    echo "<ul>\n";
    foreach ($errorList as $error) {
        echo '<li class="errorItem">' . $error . "</li>\n";
    }
    echo "</ul>\n";
}

