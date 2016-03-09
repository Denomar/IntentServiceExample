<?php

require_once 'user.php';

$serverName = "mysql.hostinger.com.ua";
$userName = "u374069841_admin";
$password = "123454321";
$dbName = "u374069841_users";
$tableName = "users";

$connection = new mysqli($serverName, $userName, $password, $dbName);

if ($connection->connect_error!=null){
	echo("Connection failed with err ".$connection->connect_error);
} 

$sql = "SELECT * FROM `$tableName`";
$result = $connection->query($sql);
$users_array = array();
if ($result->num_rows>0){
//	echo "<table> <tr> <th>ID</th><th>first_name</th><th>last_name</th><th>birthday</th><th>email</th></tr>";
	while ($row = $result -> fetch_assoc()){
		$loc_user = new User($row);
		$users_array[$row['id']] = array ( 
			'user_class' => $loc_user, 
			'json'=> $loc_user-> getJson()
			);
		/*echo "<tr><td>".$row['id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['birthday']."</td><td>".$row['email']."</td></tr>";*/
	}
	//echo "</table>";
	
	$required_id = $_GET['id'];
	//var_dump(json_decode($users_array[$required_id]['json']));
	echo $users_array[$required_id]['json'];
}
else {echo "Table is empty!";}


?>
