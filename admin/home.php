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
        <li class="active">
        <a href="home.php"></i>Page d'Acceuil</a>
        </li>
        <li>
        <a href="hotels.php">Liste des Hotels</a>
        </li>
        <li>
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
        $sql = "SELECT * FROM admin_unity";
        $result = mysqli_query($connect, $sql);
    // ?>
    <section id="content-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h2 class="content-title">Bonjour Mr : <?php echo $_SESSION['email']; ?></h2>
            <!-- <p>Lorem ipsum...</p> -->
        </div>
        </div>
        <?php while($row = mysqli_fetch_object($result)){ ?>
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th width=10%>#</th>
            <th width=10%>Email</th>
            <th width=10%>Phone</th>
            <th width=10%>Adresse</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row->id_admin ?></td>
                <td><?php echo $row->email_admin ?></td>
                <td><?php echo $row->phone_admin ?></td>
                <td><?php echo $row->adress_admin ?></td>
            </tr>
        </tbody>
        </table>
        <?php } ?>
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