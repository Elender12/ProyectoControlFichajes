<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db = 'fingerprintassistancecontrol';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	//query to get data from the table
	$sql = "SELECT * FROM `charts` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
    while ($data = mysqli_fetch_assoc($result)) {
        $userData['allData'][] = $data;
	}
    print json_encode($userData);
?>







