<?php

$connect = mysqli_connect("localhost", "root", "", "mnghotel");


echo $id_delete = $_GET['id'];

$sql = "DELETE FROM contact WHERE id_contact = '$id_delete'";
$res = mysqli_query($connect, $sql);

header('location:contact.php');



?>