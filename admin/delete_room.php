<?php

$connect = mysqli_connect("localhost", "root", "", "mnghotel");


echo $id_delete = $_GET['id'];
echo $id_hotel = $_GET['id_hotel'];

$sql = "DELETE FROM rooms WHERE id_room = '$id_delete'";
$res = mysqli_query($connect, $sql);

// $url = "room_select.php?id=$id_hotel";


// header("location:room_select.php?id=").$id_delete;

header('Location: ' . $_SERVER['HTTP_REFERER']);


?>