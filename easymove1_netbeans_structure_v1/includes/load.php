<?php
//load.php

$connect = new PDO('mysql:host=den1.mysql6.gear.host;dbname=easymovedb', 'easymovedb', 'Vi3C?b~tp9ad');

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'color'   => $row["eventBackgroundColor"]
 );
}

echo json_encode($data);

?>
