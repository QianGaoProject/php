<?php

class Estimation{
private  $name;  //string
private  $phone;  //string
private  $email;  //string
private  $moveDate;  //Date
private  $fromCity;  //string
private  $toCity; //string

public function __construct($name, $phone, $email, $moveDate, $fromCity, $toCity) {
    $this->name = $name;
    $this->phone = $phone;
    $this->email = $email;
    $this->moveDate = $moveDate;
    $this->fromCity = $fromCity;
    $this->toCity = $toCity;
}

function getName() {
    return $this->name;
}

function getPhone() {
    return $this->phone;
}

function getEmail() {
    return $this->email;
}

function getMoveDate() {
    return $this->moveDate;
}

function getFromCity() {
    return $this->fromCity;
}

function getToCity() {
    return $this->toCity;
}

public function addEstimationSmall (){
    //get the database connection
    $connection = Database::getConnection();
    //prepare data
    $name = $connection->real_escape_string($this->name);
    $email = $connection->real_escape_string($this->email);
    $fromCity = $connection->real_escape_string($this->fromCity);
    $toCity = $connection->real_escape_string($this->toCity);
    $phone = $connection->real_escape_string($this->phone);
        
    //set up the querry
        // prepare and bind
    $stmt = $connection->prepare(
            "INSERT INTO estimations (name, phone, email, moveDate, fromCity, toCity) values (?,?,?,?,?,?)"
            );
    if($stmt){
        $stmt->bind_param("ssssss", $name, $phone, $email, $moveDate, $fromCity, $toCity);
            $result = $stmt->execute();
            if($result){
                $message ="you have sent us an estimation request, we will get back to you asap.";
            } else{
                $message ="estimation request did not send";
            }
    }
       
    
} 


}
