<?php 

$db = mysqli_connect('localhost', '', '','');
if (!$db){die('Ошибка соединения: ' . $db->connect_error);}
$db->set_charset("utf8");

$id_mess = $_POST['id_mess'];

$del = $db->query("DELETE FROM `messanger` WHERE `id` = '".$id_mess."' ");



exit;
?>