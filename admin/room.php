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
        $id = $_GET['id'];
        $sql = "SELECT * FROM rooms WHERE id_room = '$id' ";
        $result = mysqli_query($connect, $sql);
    // ?>
    <section id="content-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h2 class="content-title">d'Information Sur chambre :</h2>
            <!-- <p>Lorem ipsum...</p> -->
        </div>
        </div>
        <?php while($row = mysqli_fetch_object($result)){ ?>
        <table class="table">
            <tr>
                <th >Chambre ID :</th>
                <td><?php echo $row->id_room ?></td>
            </tr>
            <tr>
                <th>Nom du chambre :</th>
                <td><?php echo $row->name_room ?></td>
            </tr>
            <tr>
                <th>Image du chambre :</th>
                <td><img src="<?php echo $row->image_room ?>" alt=""></td>
            </tr>
            <tr>
                <th>Prix du chambre :</th>
                <td><?php echo $row->price_room ?> Dhs</td>
            </tr>
            <tr>
                <th>Description du chambre :</th>
                <td><?php echo $row->desc_room ?></td>
            </tr>
        </tbody>
        </table>
        <?php } ?>
        <center>
            <a class="btn btn-info" href="orders.php">Retour Au liste des Orders</a>
        </center>
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