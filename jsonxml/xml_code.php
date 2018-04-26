<?php

require_once 'StudentDB.php';
/*
$dale_cooper=array("Dale","Cooper","123 Main St","Seattle","Washington");

$xml=new SimpleXMLElement("<student />");
foreach ($dale_cooper as $info){
    $xml->addChild("data",$info);
}
$dom= dom_import_simplexml($xml)->ownerDocument;
$dom->formatOUtput=true;
echo $dom->saveXML();
*/
//connect to database
require_once 'mysqli_connect.php';
if (mysqli_connect_error()) {
    printf("Could not connect the database: %s",mysqli_connect_error());
    exit();
}
$sql_query = "SELECT * FROM students WHERE student_id IN (1,2)";
$student_array=array();
if($result=$dbc->query($sql_query)){
    while($obj=$result->fetch_object()){
        $temp_student=new StudentDB($obj->first_name, $obj->last_name, $obj->email,
                $obj->street, $obj->city, $obj->state, $obj->zip, $obj->phone,  $obj->birth_date, $obj->sex, 
                $obj->date_entered, $obj->lunch_cost, $obj->student_id);
        
        $student_array[]=$temp_student;
    }
    
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    echo '<students>';
    foreach ($student_array as $student){
      foreach ($student as $key=>$value){
        echo '<'.$key.'>'.$value.'</'.$key.'>';
      }
    }
    echo '</students>';
    
    $result->close();
    $dbc->close();
}

