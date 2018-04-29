<?php
// define variables and set to empty values
$insertId=0;
$page="estimation.php";
$nameErr = $emailErr = $phoneErr = $moveDateErr = "";
$name = $email = $phone = $moveDate = $fromCity = $toCity = "";
$workers = 0;
$addrAct = "";
$floorAct = 1;
$elevatorAct = 0;
$stairsAct = 0;
$cityAct = "";
$provAct = "QC";
$zipAct = "";
$zipActErr = $cityActErr = $addrActErr = "";
$addrDest = "";
$floorDest = 1;
$elevatorDest = 0;
$stairsDest = 0;
$cityDest = "";
$provDest = "QC";
$zipDest = "";
$zipDestErr = $cityDestErr = $addrDestErr = "";
$addrInt = "";
$floorInt = 1;
$elevatorInt = 0;
$stairsInt = 0;
$cityInt = "";
$provInt = "QC";
$zipInt = "";
$zipIntErr = "";
$boxes = $beds = $sofas = $tables = $desks = $chairs = $wds = 0;
$message = "";
$messageB = "";
$stmt = "";
$todayB = new DateTime();
$todayC =$todayB ->format('Y-m-d');
$todayD = '"'.$todayC.'"';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitsmall'])) {

    //getUserInfo();
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]{2,48}$/", $name)) {
            $nameErr = "moins de 50 characters et espace";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // 
        if (!preg_match("/^[0-9]{7,12}$/", $phone)) {
            $phoneErr = "9 a 12 numéros";
        }
    }

    if (empty($_POST["moveDate"])) {
        $moveDateErr = "moving date is required";
    } else {
        $moveDate = test_input($_POST["moveDate"]);
        $moveDateCompare = new DateTime($moveDate);
        $today = new DateTime();
        if ($moveDateCompare < $today) {
            $moveDateErr = "Vous devez fournir une date ulterieure";
        }
    }

    $fromCity = test_input($_POST["fromCity"]);
    $toCity = test_input($_POST["toCity"]);

    //insertUserEstimationRequest();
// check all required field are not empty and no errors
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($moveDate) && empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($moveDateErr)) {

        $connection = Database::getConnection();
        $stmt = $connection->prepare(
                "INSERT INTO estimations (name, phone, email, moveDate, fromCity, toCity) values (?,?,?,?,?,?)"
        );
        if ($stmt) {
            $stmt->bind_param("ssssss", $name, $phone, $email, $moveDate, $fromCity, $toCity);
            $result = $stmt->execute();
            if ($result) {
                $messageB = "Vous Avez réussi de nous envoyer une demande de l'estimation. Vous allez nous entendre sous peu.";
                $page="sucess.php";
                $insertId=$connection->insert_id;
                //make a session variable to carry to sucess page
                 $_SESSION['insertId']=$insertId;
                //header("location:$page"); this does not work, error says index line 23 already has output
                ?>
                <script type="text/javascript">
                window.location.href = 'index.php?content=sucess';
                </script>
                <?php
            } else {
                $messageB = "Il y a une erreur, l'estimation n'est pas envoyée.";
                $page="submitError.php";
               // header("location:$page");
                 ?>
                <script type="text/javascript">
                window.location.href = 'index.php?content=submitError';
                </script>
                <?php
            }
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitbig'])) {
    //getUserInfo();
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]{2,48}$/", $name)) {
            $nameErr = "moins de 50 characteres et espace";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "le format de couriel n'est pas valid";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // 
        if (!preg_match("/^[0-9]{7,12}$/", $phone)) {
            $phoneErr = "7 a 12 numéros";
        }
    }

    if (empty($_POST["moveDate"])) {
        $moveDateErr = "moving date is required";
    } else {
        $moveDate = test_input($_POST["moveDate"]);
        $moveDateCompare = new DateTime($moveDate);
        $today = new DateTime();
        if ($moveDateCompare < $today) {
            $moveDateErr = "Vous devez founir une date ultérieure";
        }
    }

    $fromCity = test_input($_POST["fromCity"]);
    $toCity = test_input($_POST["toCity"]);


    // getActualAddress();
    if (empty($_POST["workers"])) {
        $workers = 2;
    } else {
        $workers = (int) ($_POST["workers"]);
    }

    if (empty($_POST["addrAct"])) {
        $addrActErr = "Veuillez fournir actual addresse";
    } else {
        $addrAct = test_input($_POST["addrAct"]);
    }
    if (empty($_POST["floorAct"])) {
        $floorAct = 1;
    } else {
        $floorAct = (int) ($_POST["floorAct"]);
    }
    $elevatorAct = empty($_POST['elevatorAct']) ? 0 : 1;
    $stairsAct = empty($_POST['stairsAct']) ? 0 : 1;

    if (empty($_POST["cityAct"])) {
        $cityActErr = "Veuillez fournir ville actuelle";
    } else {
        $cityAct = test_input($_POST["cityAct"]);
    }

    $provAct = test_input($_POST['provAct']);

    if (empty($_POST["zipAct"])) {
        $zipActErr = "veuillez fournir code postale";
    } else {
        $zipAct = strtolower(test_input($_POST["zipAct"]));

        if (!preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i", $zipAct)) {
            $zipActErr = "code postale invalid !";
        }
    }
    // getDesitnationAddress();
    if (empty($_POST["addrDest"])) {
        $addrDestErr = "Veuillez fournir addresse de destination";
    } else {
        $addrDest = test_input($_POST["addrDest"]);
    }
    if (empty($_POST["floorDest"])) {
        $floorDest = 1;
    } else {
        $floorDest = (int) ($_POST["floorDest"]);
    }
    $elevatorDest = empty($_POST['elevatorDest']) ? 0 : 1;
    $stairsDest = empty($_POST['stairsDest']) ? 0 : 1;

    if (empty($_POST["cityDest"])) {
        $cityDestErr = "Veuillez fournir la ville de destination";
    } else {
        $cityDest = test_input($_POST["cityDest"]);
    }

    $provDest = test_input($_POST['provDest']);

    if (empty($_POST["zipDest"])) {
        $zipDestErr = "veuillez fournir code postale";
    } else {
        $zipDest = strtolower(test_input($_POST["zipDest"]));

        if (!preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i", $zipDest)) {
            $zipDestErr = "code postale invalid !";
        }
    }

    // getTransitionAddress();
    // this section can be empty, user may not have temparory address
    if (empty($_POST['addrInt'])) {
        $addrInt = "";
    } else {
        $addrInt = test_input($_POST["addrInt"]);
    }

    if (empty($_POST["floorInt"])) {
        $floorInt = 1;
    } else {
        $floorInt = (int) ($_POST["floorInt"]);
    }
    $elevatorInt = empty($_POST['elevatorInt']) ? 0 : 1;
    $stairsInt = empty($_POST['stairsInt']) ? 0 : 1;

    if (empty($_POST['cityInt'])) {
        $cityInt = "";
    } else {
        $cityInt = test_input($_POST["cityInt"]);
    }

    $provInt = test_input($_POST['provInt']);

    $zipInt = strtolower(test_input($_POST["zipInt"]));
    if (!empty($_POST['zipInt'])) {
        if (!preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i", $zipAct)) {
            $zipIntErr = "code postale invalid !";
        }
    }
    // getArticleDetails();
    // if empty, will be zero, otherwise convert to int
    if (empty($_POST["boxes"])) {
        $boxes = 0;
    } else {
        $boxes = (int) ($_POST["boxes"]);
    }
    if (empty($_POST["beds"])) {
        $beds = 0;
    } else {
        $beds = (int) ($_POST["beds"]);
    }
    if (empty($_POST["sofas"])) {
        $sofas = 0;
    } else {
        $sofas = (int) ($_POST["sofas"]);
    }
    if (empty($_POST["tables"])) {
        $tables = 0;
    } else {
        $tables = (int) ($_POST["tables"]);
    }
    if (empty($_POST["desks"])) {
        $desks = 0;
    } else {
        $desks = (int) ($_POST["desks"]);
    }
    if (empty($_POST["wds"])) {
        $wds = 0;
    } else {
        $wds = (int) ($_POST["wds"]);
    }
    if (empty($_POST["message"])) {
        $message = "";
    } else {
        $message = test_input($_POST["wds"]);

        echo'before if';
    }


    //insertWholeForm();
    // check all required field are not empty and no errors
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($moveDate) && empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($moveDateErr) && !empty($addrAct) && !empty($cityAct) && !empty($zipAct) && empty($zipActErr) && empty($addrActErr) && empty($cityActErr) && !empty($addrDest) && !empty($cityDest) && !empty($zipDest) && empty($zipDestErr) && empty($addrDestErr) && empty($cityDestErr)
    ) {
       // echo' if passed';
        $connection = Database::getConnection();
        $stmt = $connection->prepare(
                "INSERT INTO estimations (name, phone, email, moveDate, fromCity, toCity,"
                . "workers, addrAct, floorAct, stairsAct, elevatorAct, cityAct, provAct, zipAct,"
                . "addrDest, floorDest, stairsDest, elevatorDest, cityDest, provDest, zipDest,"
                . "addrInt, floorInt, stairsInt, elevatorInt, cityInt, provInt, zipInt,"
                . "boxes, beds, sofas, tables,desks,chairs, wds, message) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,"
                . "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
        );

        if (false === $stmt) {

            die('prepare() failed: ' . htmlspecialchars($connection->error));
        }
        if ($stmt) {
           // echo ' stmt passed';
            $stmt->bind_param("ssssssisiiissssiiissssiiisssiiiiiiis", $name, $phone, $email, $moveDate, $fromCity, $toCity, $workers, $addrAct, $floorAct, $stairsAct, $elevatorAct, $cityAct, $provAct, $zipAct, $addrDest, $floorDest, $stairsDest, $elevatorDest, $cityDest, $provDest, $zipDest, $addInt, $floorInt, $stairsInt, $elevatorInt, $cityInt, $provInt, $zipInt, $boxes, $beds, $sofas, $tables, $desks, $chairs, $wds, $message);
            $result = $stmt->execute();
            if ($result) {
                $messageB = "Vous Avez réussi de nous envoyer une demande de l'estimation. Vous allez nous entendre sous peu.";
                 $insertId=$connection->insert_id;
                 $page="sucess.php";
                // header("location:$page");this does not work, error says index line 23 already has output
                 //make a session variable to carry to sucess page
                 $_SESSION['insertId']=$insertId;
               
                ?>
                <script type="text/javascript">
                window.location.href = 'index.php?content=sucess';
                </script>
                <?php
            
            } else {
                $messageB = "Il y a une erreur, demande de l'estimation n'est pas envoyée.";
                $page="submitError.php";
                // header("location:$page"); does not work
                ?>
                <script type="text/javascript">
                window.location.href = 'index.php?content=submitError';
                </script>
                <?php
            }
        }
    }
    
}

?>


<h1>Estimation pour déménagement</h1>
<!--<h4> <?php echo $messageB; ?></h4>
<h4><?php echo $insertId; ?></h4>
<h4><?php echo $page; ?></h4>
 this message, maybe need to create a page and redirect
these below for testing purpose, should be removed after
<p>your input</p>
<h4><?php echo $name; ?></h4>
<h4><?php echo $addrAct; ?></h4>
<h4><?php echo $floorAct; ?></h4>
<h4><?php echo $stairsAct; ?></h4>
<h4><?php echo $elevatorAct; ?></h4>
<h4><?php echo $cityAct; ?></h4>
<h4><?php echo $provAct; ?></h4>
<h4><?php echo $zipAct; ?></h4>
<p>error message</p>
<p>stmt</p>
<h4><?php var_dump($stmt); ?></h4>-->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>  
<p>
    Nous vous offrons plusieurs choix pour vous informer du coût de votre déménagement :<br />
    1 – Par téléphone : appelez-nous au 450-668-5203 et un agent évaluera avec vous le coût de votre déménagement, quitte à vous rendre visite si nécessaire;<br />
    2 – Pour plus de précision et de certitude, remplissez le formulaire. Nous pourrons alors vous contacter avec un devis dès plus précis possible selon l’information recu de votre part.
</p>

<div data-ng-app="regApp">
    <form id="formEstimation" action="" method="POST" data-ng-controller="regCtrl" name="regForm">
    <div class="row">
        <div class="col-sm-6">
            <h2 style="margin-top: 10px;margin-bottom: 20px;">Vos coordonnées</h2>
            <div id="formMainBoxes" class="form-group">

                <div>
                    <label for="name">Nom<span class="required">*</span>:</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Entrer un nom" data-ng-pattern="namePattern"
                            data-ng-model="name" value="<?php
if (isset($_POST['name'])) {
    echo htmlentities($_POST['name']);
}
?>"><br />
                    <span style="color: red"><?php echo $nameErr; ?></span>
                     <span class="error" data-ng-show="regForm.name.$error.pattern">characters et espaces, longeur moins de 50</span>
                </div>

                <div>   
                    <label for="phone">Téléphone<span class="required">*</span>:</label>
                    <input  class="form-control" type="text" name="phone" id="phone" placeholder="Entrer un numero de télephone" data-ng-pattern="phonePattern"
                            data-ng-model="phone" value="<?php
                    if (isset($_POST['phone'])) {
                        echo htmlentities($_POST['phone']);
                    }
                    ?>"><br />
                    <br/>
                    <span class="error" data-ng-show="regForm.phone.$error.pattern">7 - 12 numéros</span>
                    <span style="color: red"><?php echo $phoneErr; ?></span>  
                </div> 

                <div>
                    <label for="email">Courriel<span class="required">*</span>:</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrer un email" name="email" data-ng-pattern="emailPattern" data-ng-model="email"
                           value="<?php
                           if (isset($_POST['email'])) {
                               echo htmlentities($_POST['email']);
                           }
                           ?>"><br />
                     <span class="error" data-ng-show="regForm.email.$error.pattern">Please match pattern ex: abc@domain.com</span>
                    <span style="color: red"><?php echo $emailErr; ?></span>  
                </div>

                <div>    
                    <label for="moveDate">Date<span class="required">*</span>:</label>
                    <input  class="form-control" type="date" name="moveDate" id="moveDate"  min=<?php echo $todayD;?> value="<?php
                            if (isset($_POST['moveDate'])) {
                                echo htmlentities($_POST['moveDate']);
                            }
                            ?>"><br />
                    <span style="color: red"><?php echo $moveDateErr; ?></span>  

                </div>


                <div>
                    <label for="fromCity">Ville de depart:</label>
                    <input class="form-control" type="text" name="fromCity" id="fromCity" value="<?php
                            if (isset($_POST['fromCity'])) {
                                echo htmlentities($_POST['fromCity']);
                            }
                            ?>"><br />
                </div>

                <div>
                    <label for="toCity">Ville de destination:</label>
                    <input class="form-control" type="text" name="toCity" id="toCity" value="<?php
                            if (isset($_POST['toCity'])) {
                                echo htmlentities($_POST['toCity']);
                            }
                            ?>"><br />
                </div>
                <div>
                    <p><span class="required">*</span> - les champs obligatoires</p>
                </div>
                <div>
                    <input type="submit" class="btn btn-default" name="submitsmall" value="Envoyer">
                </div>
            </div><br />
        </div>

        <div class="col-sm-6" style="max-width: 590px">
            <div class="checkbox form-control" style="background: lightgreen;">
                <label style="font-weight: bold"><input style="width: 14px; height: 14px; "  type="checkbox" value="" 
                                                        name="addInfo" id="addInfo"> Information supplémentaire</label>
            </div>

            <div id="formAddBoxes" class="form-group">
                <div>
                    <label for="workers" style="display: inline-block">Nombre de déménageurs: </label>
                    <input style="display: inline-block; width: 60px;" class="form-control" type="number" min="1" max="6" value="<?php
                            if (isset($_POST['workers'])) {
                                echo htmlentities($_POST['workers']);
                            }
                            ?>"
                           name="workers" id="workers">
                </div>

                <h3 class="form-control" >Des adresses</h3>

                <div class="addrBox">
                    <h5 style="font-weight: bold; font-size: large">1. Adresse actuelle</h5>


                    <div style="margin-bottom: 10px">
                        <label class="firstLabelAdd"  style="display: inline-block" for="addrAct">Adresse: </label>
                        <input style="display: inline; width: 330px" class="form-control" type="text" name="addrAct" id="addrAct" value="<?php
                            if (isset($_POST['addrAct'])) {
                                echo htmlentities($_POST['addrAct']);
                            }
                            ?>"><span style="color: red"><?php echo $addrActErr; ?></span><br />
                    </div>

                    <div>
                        <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                            <label class="firstLabelAdd" for="floorAct">Étage:</label>
                            <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                   name="floorAct" id="floorAct" value="<?php
                                   if (isset($_POST['floorAct'])) {
                                       echo htmlentities($_POST['floorAct']);
                                   }
                            ?>">
                        </div>
                        <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                            <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                               class="checkbox" type="checkbox" value="stairsAct" name="stairsAct" id="stairsAct" value="PHP"<?php echo (isset($_POST['stairsAct'])) ? 'checked="checked"' : ''; ?>/></label>
                            <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                                        class="checkbox" type="checkbox" name="elevatorAct" id="elevatorAct" value="PHP"<?php echo (isset($_POST['elevatorAct'])) ? 'checked="checked"' : ''; ?> /></label>
                        </div>
                    </div>
                    <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label class="firstLabelAdd"  style="display: inline-block" for="cityAct">Ville: </label>
                            <input style="display: inline; width: 150px" class="form-control" type="text" name="cityAct" id="cityAct" value="<?php
                                   if (isset($_POST['cityAct'])) {
                                       echo htmlentities($_POST['cityAct']);
                                   }
                            ?>"><span style="color: red"><?php echo $cityActErr; ?></span><br />
                        </div>

                        <div class="dropdown" style="display: inline-block">
                            <select id="provAct" name="provAct" class="form-control" >
                                <option value="QC"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'QC') ? 'selected="selected"' : ''; ?> >QC</option>
                                <option value="ON"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'ON') ? 'selected="selected"' : ''; ?>>ON</option>
                                <option value="AB"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'AB') ? 'selected="selected"' : ''; ?>>AB</option>
                                <option value="BC"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'BC') ? 'selected="selected"' : ''; ?>>BC</option>
                                <option value="MB"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'MB') ? 'selected="selected"' : ''; ?>>MB</option>
                                <option value="NB"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'NB') ? 'selected="selected"' : ''; ?>>NB</option>
                                <option value="NS"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'NS') ? 'selected="selected"' : ''; ?>>NS</option>
                                <option value="PE"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'PE') ? 'selected="selected"' : ''; ?>>PE</option>
                                <option value="SK"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'SK') ? 'selected="selected"' : ''; ?>>SK</option>
                                <option value="NL"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'NL') ? 'selected="selected"' : ''; ?>>NL</option>
                                <option value="NT"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'NT') ? 'selected="selected"' : ''; ?>>NT</option>
                                <option value="NU"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'NU') ? 'selected="selected"' : ''; ?>>NU</option>
                                <option value="YT"<?php echo (isset($_POST['provAct']) && $_POST['provAct'] == 'YT') ? 'selected="selected"' : ''; ?>>YT</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 5px; display: inline-block">
                        <label style="display: inline-block" for="zipAct"></label>
                        <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipAct" id="zipAct" data-ng-pattern="zipPattern" data-ng-model="zip" value="<?php
                               if (isset($_POST['zipAct'])) {
                                   echo htmlentities($_POST['zipAct']);
                               }
                            ?>"><span class="error" data-ng-show="regForm.zip.$error.pattern">format par exemple: H8T3G6</span>
                        <span style="color: red"><?php echo $zipActErr; ?></span><br />

                    </div>

                </div>  
                <!--end of actual address-->

                <!--Destination Addresse-->
                <div class="addrBox">
                    <h5 style="font-weight: bold; font-size: large">2. Destination</h5>
                    <div style="margin-bottom: 10px">
                        <label class="firstLabelAdd"  style="display: inline-block" for="addrDest">Adresse: </label>
                        <input style="display: inline; width: 330px" class="form-control" type="text" name="addrDest" id="addrDest" value="<?php
                               if (isset($_POST['addrDest'])) {
                                   echo htmlentities($_POST['addrDest']);
                               }
                            ?>"><span style="color: red"><?php echo $addrDestErr; ?></span><br />
                    </div>

                    <div>
                        <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                            <label class="firstLabelAdd" for="floorDest">Étage:</label>
                            <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                   name="floorDest" id="floorDest" value="<?php
                            if (isset($_POST['floorDest'])) {
                                echo htmlentities($_POST['floorDest']);
                            }
                            ?>">
                        </div>
                        <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                            <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                               class="checkbox" type="checkbox" value="PHP"<?php echo (isset($_POST['stairsDest'])) ? 'checked="checked"' : ''; ?> name="stairsDest" id="stairsDest"></label>
                            <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                                        class="checkbox" type="checkbox" value="PHP"<?php echo (isset($_POST['elevatorDest'])) ? 'checked="checked"' : ''; ?> name="elevatorDest" id="elevatorDest"></label>
                        </div>
                    </div>
                    <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label class="firstLabelAdd"  style="display: inline-block" for="cityDest">Ville: </label>
                            <input style="display: inline; width: 150px" class="form-control" type="text" name="cityDest" id="cityDest" value="<?php
                            if (isset($_POST['cityDest'])) {
                                echo htmlentities($_POST['cityDest']);
                            }
                            ?>"><span style="color: red"><?php echo $cityDestErr; ?></span><br />
                        </div>

                        <div class="dropdown" style="display: inline-block">
                            <select id="provDest" name="provDest" class="form-control">
                                <option value="QC"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'QC') ? 'selected="selected"' : ''; ?> >QC</option>
                                <option value="ON"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'ON') ? 'selected="selected"' : ''; ?>>ON</option>
                                <option value="AB"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'AB') ? 'selected="selected"' : ''; ?>>AB</option>
                                <option value="BC"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'BC') ? 'selected="selected"' : ''; ?>>BC</option>
                                <option value="MB"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'MB') ? 'selected="selected"' : ''; ?>>MB</option>
                                <option value="NB"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'NB') ? 'selected="selected"' : ''; ?>>NB</option>
                                <option value="NS"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'NS') ? 'selected="selected"' : ''; ?>>NS</option>
                                <option value="PE"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'PE') ? 'selected="selected"' : ''; ?>>PE</option>
                                <option value="SK"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'SK') ? 'selected="selected"' : ''; ?>>SK</option>
                                <option value="NL"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'NL') ? 'selected="selected"' : ''; ?>>NL</option>
                                <option value="NT"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'NT') ? 'selected="selected"' : ''; ?>>NT</option>
                                <option value="NU"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'NU') ? 'selected="selected"' : ''; ?>>NU</option>
                                <option value="YT"<?php echo (isset($_POST['provDest']) && $_POST['provDest'] == 'YT') ? 'selected="selected"' : ''; ?>>YT</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 5px; display: inline-block">
                        <label style="display: inline-block" for="zipDest"></label>
                        <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipDest" id="zipDest" 
                               value="<?php
                               if (isset($_POST['zipDest'])) {
                                   echo htmlentities($_POST['zipDest']);
                               }
                            ?>"><span style="color: red"><?php echo $zipDestErr; ?></span><br />
                    </div>

                </div>  
                <!--end of destination address-->


                <!--Intermediate Addresse-->
                <div class="addrBox"  >
                    <h5 style="font-weight: bold; font-size: large">3.Adresse intermédiaire</h5>
                    <div style="margin-bottom: 10px">
                        <label class="firstLabelAdd"  style="display: inline-block" for="addrInt">Adresse: </label>
                        <input style="display: inline; width: 330px" class="form-control" type="text" name="addrInt" id="addrInt" value="<?php
                               if (isset($_POST['addrInt'])) {
                                   echo htmlentities($_POST['addrInt']);
                               }
                            ?>"><br />
                    </div>

                    <div>
                        <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                            <label class="firstLabelAdd" for="floorInt">Étage:</label>
                            <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                   name="floorInt" id="floorInt" value="<?php
                               if (isset($_POST['floorInt'])) {
                                   echo htmlentities($_POST['floorInt']);
                               }
                            ?>">
                        </div>
                        <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                            <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                               class="checkbox" type="checkbox" value="PHP"<?php echo (isset($_POST['stairsInt'])) ? 'checked="checked"' : ''; ?> name="stairsInt" id="stairsInt"></label>
                            <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                                        class="checkbox" type="checkbox" value="PHP"<?php echo (isset($_POST['elevatorInt'])) ? 'checked="checked"' : ''; ?> name="elevatorInt" id="elevatorInt"></label>
                        </div>
                    </div>
                    <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label class="firstLabelAdd"  style="display: inline-block" for="cityInt">Ville: </label>
                            <input style="display: inline; width: 150px" class="form-control" type="text" name="cityInt" id="cityInt" value="<?php
                               if (isset($_POST['cityInt'])) {
                                   echo htmlentities($_POST['cityInt']);
                               }
                            ?>"><br />
                        </div>

                        <div class="dropdown" style="display: inline-block">
                            <select id="provInt" name="provInt" class="form-control">
                                <option value="QC"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'QC') ? 'selected="selected"' : ''; ?> >QC</option>
                                <option value="ON"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'ON') ? 'selected="selected"' : ''; ?>>ON</option>
                                <option value="AB"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'AB') ? 'selected="selected"' : ''; ?>>AB</option>
                                <option value="BC"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'BC') ? 'selected="selected"' : ''; ?>>BC</option>
                                <option value="MB"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'MB') ? 'selected="selected"' : ''; ?>>MB</option>
                                <option value="NB"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'NB') ? 'selected="selected"' : ''; ?>>NB</option>
                                <option value="NS"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'NS') ? 'selected="selected"' : ''; ?>>NS</option>
                                <option value="PE"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'PE') ? 'selected="selected"' : ''; ?>>PE</option>
                                <option value="SK"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'SK') ? 'selected="selected"' : ''; ?>>SK</option>
                                <option value="NL"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'NL') ? 'selected="selected"' : ''; ?>>NL</option>
                                <option value="NT"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'NT') ? 'selected="selected"' : ''; ?>>NT</option>
                                <option value="NU"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'NU') ? 'selected="selected"' : ''; ?>>NU</option>
                                <option value="YT"<?php echo (isset($_POST['provInt']) && $_POST['provInt'] == 'YT') ? 'selected="selected"' : ''; ?>>YT</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 5px; display: inline-block">
                        <label style="display: inline-block" for="zipInt"></label>
                        <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipInt" id="zipInt" value="<?php
                                   if (isset($_POST['zipInt'])) {
                                       echo htmlentities($_POST['zipInt']);
                                   }
                                   ?>"><span style="color: red"><?php echo $zipIntErr; ?></span><br />
                    </div>

                </div>  
                <!--end of intermediate address-->
                <h3 class="form-control" >Description des objets à déplacer</h3>
                <div style="border-style: dotted; border-color: lightgray; border-radius: 5px; padding: 5px; margin: 5px 2px 2px 2px; background: #eee"  >
                    <div style="display: inline-block;">
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="boxes" style="display: inline-block; width: 60px">Boites:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="boxes" id="boxes" value="<?php
                                   if (isset($_POST['boxes'])) {
                                       echo htmlentities($_POST['boxes']);
                                   }
                                   ?>">
                        </div>
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="beds" style="display: inline-block; width: 60px">&nbsp;Lits:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="beds" id="beds" value="<?php
                               if (isset($_POST['beds'])) {
                                   echo htmlentities($_POST['beds']);
                               }
                                   ?>">
                        </div>
                    </div>    
                    <div style="display: inline-block; margin: 5px 0">
                        <label for="sofas" style="display: inline-block; width: 60px">Canapés:</label>
                        <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                               name="sofas" id="sofas" value="<?php
                                   if (isset($_POST['sofas'])) {
                                       echo htmlentities($_POST['sofas']);
                                   }
                                   ?>">
                    </div>

                    <div style="display: inline-block; margin: 5px 0">
                        <label for="tables" style="display: inline-block; width: 60px">Tables:</label>
                        <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                               name="tables" id="tables" value="<?php
                               if (isset($_POST['tables'])) {
                                   echo htmlentities($_POST['tables']);
                               }
                               ?>">
                    </div>
                    <div style="display: inline-block; min-width: 280px">
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="desks" style="display: inline-block; width: 60px">Bureaux:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="desks" id="desks" value="<?php
                        if (isset($_POST['desks'])) {
                            echo htmlentities($_POST['desks']);
                        }
                        ?>">
                        </div>
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="chairs" style="display: inline-block; width: 60px">Chaises:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="chairs" id="chairs" value="<?php
                        if (isset($_POST['chairs'])) {
                            echo htmlentities($_POST['chairs']);
                        }
                        ?>">
                        </div>
                    </div>
                    <br/>
                    <div style="display: inline-block; margin: 5px 0">
                        <label for="wds" style="display: inline-block">Électroménagers:&nbsp;</label>
                        <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                               name="wds" id="wds" value="<?php
                        if (isset($_POST['wds'])) {
                            echo htmlentities($_POST['wds']);
                        }
                        ?>">
                    </div>
                </div>
                <!--                    end of description-->

                <div style="margin: 10px 0; display: inline-block">
                    <textarea id="message" name="message" class="form-control" cols="73" rows="4" style="display: inline-block" placeholder="Message" >
<?php
if (isset($_POST['message'])) {
    echo htmlentities($_POST['message']);
}
?>
                    </textarea>
                </div>
                <div>
                    <label style="margin-bottom: 10px" class="btn btn-default btn-file">
                        Ajouter des photos ... <input class="form-control" type="file" style="display: none;">
                    </label>
                </div>
                <div>
                    <input type="submit" class="btn btn-default" name="submitbig" value="Envoyer">
                </div>



            </div>

        </div>

    </div>
</form>
</div>

<script>
    var app = angular.module('regApp', []);
    app.controller('regCtrl', function ($scope) {
        $scope.namePattern = /^[a-zA-Z ]{2,48}$/;
        $scope.phonePattern = /^[0-9]{7,12}$/;
        $scope.emailPattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
        $scope.zipPattern = /^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/;
        
    });
    
</script>
<script>
    $(document).ready(function () {
    $("#addInfo").prop("checked", false);
});
</script>
<script>
     
$(function() {
    $('#addInfo').click(function() {
        var cb = $('#addInfo').is(':checked');
        $('#workers, #addrAct, #floorAct,#elevatorAct,#stairsAct,#cityAct,#provAct,#zipAct,\n\
        #addrDest, #floorDest, #elevatorDest,#stairsDest,#cityDest,#provDest,#zipDest,\n\
        #addrInt, #floorInt,#elevatorInt,#stairsInt,#cityInt,#provInt, #zipInt,\n\
        #boxes, #beds, #sofas, #tables, #desks, #chairs, #wds, #message').prop('disabled', !(cb));
         
    });
});
</script>



