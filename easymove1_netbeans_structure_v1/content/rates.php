<?php
$connect = new PDO('mysql:host=den1.mysql6.gear.host;dbname=easymovedb', 'easymovedb', 'Vi3C?b~tp9ad');

$query = "SELECT * FROM prices ORDER BY id DESC limit 1";

$statement = $connect->prepare($query);

$statement->execute();

$result= $statement->fetch();
//print_r($result);

$twoWorkerPrice = $result[2];
$threeWorkerPrice =$result[3];


?>

<h1>Estimation for moving</h1>
        <p>
           We offer several choices for you to have the information of the price of your moving:<br />
            1 – By phone : call us at 450-668-5203 and an agent will evaluate with you the cost of moving, if necessary, we will visit your place.<br />
            2- For more precise estimation, please fill out the form with required information, and we will get back to you as soon as possible.
        </p>
        <P>
            two workers price is: <?php echo $twoWorkerPrice ?> 
        </P>
         <P>
            three workers price is: <?php echo $threeWorkerPrice ?> 
        </P>
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <h2>form to be added</h2>
                
                </div>
                <div class="col-sm-6">
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Information additionel</label>
                    </div>
                </div>
                
            </div>
        </form>
        
