<?php
    $connect = mysqli_connect("localhost", "root", "", "mnghotel");
		if(isset($_POST['submit'])){
			$nom = $_POST['fname'];
			$prenom = $_POST['lname'];
			$email = $_POST['email'];
			$nation = $_POST['nation'];
			$tele = $_POST['phone'];
			$passport = $_POST['passport'];
			$arrive = $_POST['arrive'];
			$sortie = $_POST['sortie'];
			$hotel_id = $_POST['hotel_id'];
			$room_id = $_POST['room_id'];
			$price = $_POST['price_room'];
			$stat = $_POST['stat'];

			$sql = "INSERT INTO reservation (first_name, last_name, email, nation, phone_number, passport_number, check_in, check_out, id_hotel, id_room, price_room, status_res) VALUES ('$nom', '$prenom', '$email', '$nation', '$tele', '$passport', '$arrive', '$sortie', '$hotel_id', '$room_id', '$price', '$stat')";
			if(mysqli_query($connect, $sql)){
                echo "<script type='text/javascript'> alert('Résérvation Confirmée')</script>";
                header('location:confirmation.php');
			}else{
				echo "<script type='text/javascript'> alert('il ya un probleme')</script>";
            }
        }
	?>