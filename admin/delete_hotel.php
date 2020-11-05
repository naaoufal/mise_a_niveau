<?php

$connect = mysqli_connect("localhost", "root", "", "mnghotel");


echo $id_delete = $_GET['id'];

$sql = "DELETE FROM hotels WHERE id_hotel = '$id_delete'";
$res = mysqli_query($connect, $sql);

header('location:hotels.php');



?>