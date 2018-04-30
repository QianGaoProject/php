<?php
$error = ''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = Database::getConnection();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password from users where username=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if($stmt->fetch()) //fetching the contents of the row
        {
          $_SESSION['login_user'] = $username; // Initializing Session
          ?>
                <script type="text/javascript">
                window.location.href = 'index.php?content=manager';
                </script>
          <?php // Redirecting To Profile Page
        }
else {
       $error = "Username or Password is invalid";
     }
    }
}
    ?>
            
       
    

    <div class="row">     
        <div class="col-6 col-md-4">           
            <form class="form-signin" action="" method="post">

                <h1 class="h3 mb-3 font-weight-normal">ouvrez une session pour Admin</h1>
                <label for="username" class="sr-only">Nom d'Usager</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php
                if (isset($_POST['username'])) {
                    echo htmlentities($_POST['username']);
                }
                ?>" placeholder="nom d'usager" required autofocus><br/>
               
                <label for="password" class="sr-only">Mot de Pass</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php
                if (isset($_POST['password'])) {
                    echo htmlentities($_POST['password']);
                }
                ?>" placeholder="mot de pass" required><br/>
                <span style="color: red"><?php echo $error; ?></span>
            <input type="submit" name="submit" value="Soumettre" /><br/><br/>
            <a class=”cancel” href=index.php>Cancel, return to Home Page</a> 
            <br/>
            <br/>
            <form>
                </div>

                </div>




