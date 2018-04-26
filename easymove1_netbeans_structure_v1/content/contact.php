<?php


$link = mysqli_connect('den1.mysql6.gear.host', 'easymovedb', 'Vi3C?b~tp9ad', 'easymovedb');
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// TRI-STATE-FROM
function getForm($name = "", $phone = "", $email = "", $message = "") {

    $form = <<< ABC123DOREMI
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <form action="index.php?content=contact" >
                    <div>
                    <label for="name">Nom:</label>
                        <input required class="form-control" type="text" placeholder="Entrer un Nom"   name="name" id="name" value="$name"><br />
                    </div>

                    <div>   
                        <label for="phone">Téléphone:</label>
                        <input required class="form-control" type="text" placeholder="Entrer un Téléphone"  name="phone" id="phone" value="$phone"><br />
                    </div> 

                    <div>
                        <label for="email">Courriel:</label>
                        <input required type="email" class="form-control" id="email" placeholder="Entrer un email" name="email" value="$email"><br />
                    </div>

                    <div>    
                        <label for="message">Message:</label>
                        <textarea required class="form-control" rows="5" id="message" placeholder="Entrer un message"  name="message" >$message</textarea>
                    </div>
                    <br/>
              <input  type="submit" name ="submit" class="btn btn-default" value="soumettre">
            <label name="contact" value="contact" ></label>
            </form>
ABC123DOREMI;
    return $form;
}

if (isset($_GET['submit'])) {
    // receiving a submision
    // extract values submitted
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $message = $_GET['message'];


    // flag
    $errorList = array();
    // verify
    if (strlen($name) < 2 || strlen($name) > 150) {
        array_push($errorList, "Error: name must be between 2 and 150 characters long");
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE || strlen($email) > 255) {
        array_push($errorList, "Error: email is invalid.");
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
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
            die("<b>SQL query error: " . mysqli_error($link) . "</b>");
        }

        echo "<p>Hi $name, you are successful sent message to us ! y/o</p>";
    } else {
        // STATE 3: FAILED SUBMISSION
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo '<li class="errorItem">' . $error . "</li>\n";
        }
        echo "</ul>\n";
        echo getForm($name, $phone, $email, $message);
    }
} else {
    // STATE 1: FIRST SHOW
    echo getForm();
}