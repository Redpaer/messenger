<?php
session_start();
$db = mysqli_connect('localhost', '', '', '');
if (!$db){die('Ошибка соединения: ' . $db->connect_error);}
$db->set_charset("utf8");

$name = $_POST['name'];
$message = $_POST['message'];
$today = date("H:i"); 
$_SESSION['uid'] = $name;

$key = "5aa3c281e42ba7101f7227a7519d5e961c7bcf2b10a42914304bffc1afcebb1d2be98f53caa80d05";
$method = "AES-192-CBC";
$_SESSION['ukey'] = $key;
$message = openssl_encrypt($message, $method, $key);



if(($name != '') && ($message !='')){

	$result = $db->query("SELECT * FROM `messanger` WHERE 1 ");
	if($result == FALSE){
		$db->query("CREATE TABLE IF NOT EXISTS messanger ( `id` INT(10) NOT NULL AUTO_INCREMENT , `author` VARCHAR(255) NOT NULL , `text` LONGTEXT NOT NULL , `time` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
	}

	$db->query("INSERT INTO `messanger` (`author`,`text`,`time`) VALUES ('".$name."','".$message."','".$today."') ");
}


exit;

?>
