<?php

//header('Content-type','application/json');

require_once ('studentDB.php');
require_once ('mysqli_connect.php');
//$json_data=json_decode('{"first_name":"Qian"}');
//var_dump($json_data);
/*
class Address {

    public $street = "";
    public $city = "";
    public $state = "";

    function __construct($street, $city, $state) {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
    }

}

class Student {

    public $first_name = "";
    public $last_name = "";
    public $age = 0;
    public $enrolled = false;
    public $married = null;
    public $address;
    public $phone;

    function __construct($first_name, $last_name, $age, $enrolled, $married, $street, $city, $state, $ph_home, $ph_mobile) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->enrolled = $enrolled;
        $this->married = $married;
        $this->address = new Address($street, $city, $state);
        $this->phone = array("home" => $ph_home, "mobiled" => $ph_mobile);
    }

}


  $student1 = new Student("Qian", "Gao", 35, true, null, "123 Main St", "Seattle", "WA", "4125551212", "4125552121");
  echo "<br/><br/>";
  $student1_data = json_encode($student1);
  var_dump($student1_data);
  var_dump($student1);
 */


if (mysqli_connect_error()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_query = "SELECT * FROM students WHERE student_id IN (1,2)";
$student_array = array();
if ($result = $dbc->query($sql_query)) {
    while ($obj = $result->fetch_object()) {
        printf("%s %s %s %s %s %s %s %s %s %s %s %s %s <br/>", $obj->first_name, $obj->last_name, $obj->email,
                $obj->street, $obj->city, $obj->state, $obj->zip,$obj->phone, $obj->birth_date, $obj->sex, 
                $obj->date_entered, $obj->lunch_cost, $obj->student_id);
    
        $temp_student=new StudentDB($obj->first_name, $obj->last_name, $obj->email,
                $obj->street, $obj->city, $obj->state, $obj->zip, $obj->phone,  $obj->birth_date, $obj->sex, 
                $obj->date_entered, $obj->lunch_cost, $obj->student_id);
        $student_array[]=$temp_student;
    }
    echo '<br/><br/>';
    echo '{"students":[';
    foreach($student_array as $student_data){
       $data= json_encode($student_data);
       echo $data;
       echo ',<br/>';
    }
    echo ']}';
    $result->close();
    $dbc->close();
    
}