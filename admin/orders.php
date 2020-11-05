<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        h2{
        padding : 20px;
        }
    </style>
    <title>Espace Admin</title>
</head>
<body>
<div id="wrapper">

    <aside id="sidebar-wrapper">

    <ul class="sidebar-nav">
        <li>
        <a href="home.php"></i>Page d'Acceuil</a>
        </li>
        <li>
        <a href="hotels.php">Liste des Hotels</a>
        </li>
        <li class="active">
        <a href="orders.php">Liste des Orders</a>
        </li>
        <li>
        <a href="contact.php">Contact</a>   
        </li>
        <li>
        <a href="logout.php">Se Deconnecter</a>
        </li>
    </ul>
    </aside>

    <div id="navbar-wrapper">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
        </div>
        </div>
    </nav>
    </div>
    <?php
        $connect = mysqli_connect("localhost", "root", "", "mnghotel");
        $sql = "SELECT * FROM reservation";
        $result = mysqli_query($connect, $sql);
    // ?>
    <section id="content-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h2 class="content-title">Liste des Réservation :</h2>
            <!-- <p>Lorem ipsum...</p> -->
        </div>
        </div>
        <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th >#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Nationalité</th>
            <th>Numéro de téléphone</th>
            <th>Numéro de passport</th>
            <th>Date d'arrive</th>
            <th>Date de sortie</th>
            <th>Prix</th>
            <th>Status</th>
            <th>Actions</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_object($result)){ ?>
        <tbody>
            <tr>
                <td><?php echo $row->id_reservation ?></td>
                <td><?php echo $row->first_name ?></td>
                <td><?php echo $row->last_name ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->nation ?></td>
                <td><?php echo $row->phone_number ?></td>
                <td><?php echo $row->passport_number ?></td>
                <td><?php echo $row->check_in ?></td>
                <td><?php echo $row->check_out ?></td>
                <td><?php echo $row->price_room ?> Dhs</td>
                <!-- <td><a href="room.php?id=<?php //print $row->id_room ?>">Chambre Details</a></td> -->
                <td><?php echo $row->status_res ?></td>
                <td><a class="btn btn-info" href="edit_status.php?id=<?php echo $row->id_reservation ?>"><i class="fa fa-edit"></i></a></td>
                <!-- <td><a class="btn btn-danger" href="delete_order.php?id=<?php print $row->id_reservation ?>">Supprimer Order</a></td> -->
            </tr>
        </tbody>
        <?php } ?>
        </table>
    </section>
    </div>
</body>
<script>
    const $button  = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');

    $button.addEventListener('click', (e) => {
    e.preventDefault();
    $wrapper.classList.toggle('toggled');
    });
</script>
</html>