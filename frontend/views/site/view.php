<?php

$id=19443;

$db = mysqli_connect("localhost","root","","bwd_api"); //keep your database name
$sql = "SELECT top 1 photo FROM photo WHERE schedule_id = $id"; // pass your clientid here
$statement = $db->query($sql);
$result = mysqli_fetch_array($statement);
echo '<img src="data:image/jpeg;base64,'.base64_encode($result['photo'] ).'"/>';

?>