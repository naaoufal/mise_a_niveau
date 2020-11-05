<?php

$connect = mysqli_connect("localhost", "root", "", "mnghotel");


echo $id_delete = $_GET['id'];

$sql = "DELETE FROM reservation WHERE id_reservation = '$id_delete'";
$res = mysqli_query($connect, $sql);

header('location:orders.php');



?>