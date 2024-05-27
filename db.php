<?php 
	$serverName = 'localhost';
	$userName = 'root';
	$passWord = '';
	$dbName = 'quanlybanhang';
	// $conn = mysqli_connect( $serverName, $userName, $passWord, $dbName) or die ('Không thể kết nối database');
	try{
		$conn =  new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8;",$userName,$passWord);
	} catch (PDOExcreption $e){
		var_dump($e->getMessage());
		die;
	}
 ?>