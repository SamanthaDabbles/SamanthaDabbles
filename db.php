<?php 
// Connect to ini file
$current_cfg = parse_ini_file("dabbles.ini");
$con = mysqli_connect(
	$current_cfg['db_server'],
	$current_cfg['db_userID'],
	$current_cfg['db_password'],
	$current_cfg['db_database']);

if (mysqli_connect_errno()){ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}

?>
