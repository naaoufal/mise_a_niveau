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
        <li class="active">
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
        $id = $_GET['id'];
        $sql = "SELECT * FROM rooms WHERE id_hotel = '$id'";
        $result = mysqli_query($connect, $sql);
    // ?>
    <section id="content-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h2 class="content-title">Liste des Chambres :</h2>
            <!-- add new room -->
            <div class="text-right">
                <a href="" id="modal" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Ajouter Nouvel hotel</a>
            </div>
            <!-- end  -->
            <!-- <p>Lorem ipsum...</p> -->
        </div>
        </div>
        <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th >#</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Actions</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_object($result)){ ?>
        <tbody>
            <tr>
                <td><?php echo $row->id_room ?></td>
                <td><?php echo $row->name_room ?></td>
                <td><img src="<?php echo $row->image_room ?>" width="100px" height="80px" alt=""></td>
                <td><?php echo $row->price_room ?></td>
                <td><?php echo $row->desc_room ?></td>
                <td><a class="btn btn-info" href="edit_room.php?id=<?php echo $row->id_room ?>"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" href="delete_room.php?id=<?php print $row->id_room ?>&id_hotel=<?php print $row->id_hotel ?>"><i class="fa fa-times"></i></a></td>
            </tr>
        </tbody>
        <?php } ?>
        </table>
    </section>
    </div>
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Ajouter Nouvelle Chambre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            if(isset($_POST['submit'])){
                $var = "assets/images/";
                $nom = $_POST['nom'];
                $desc = $_POST['desc'];
                $image = $_POST['image'];
                $prix = $_POST['prix'];

                $sql1 = "INSERT INTO rooms (name_room, image_room, desc_room, price_room, id_hotel) VALUES ('$nom', '$var$image', '$desc', '$prix', '$id')";
                $result = mysqli_query($connect, $sql1);
                if($result){
                    header("Refresh:0");
                    // header("Location: ".$_SERVER['PHP_SELF']);
                    echo "<script type='text/javascript'> alert('Bien Ajouter')</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Erruer')</script>";
                }

            }
            ?>
            <form action="" method="post">
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="form34">Le Nom de Chambre :</label>
                <input type="text" name="nom" id="form34" class="form-control validate">
                </div>

                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="form29">Prix de chambre :</label>
                <input type="text" name="prix" id="form29" class="form-control validate">
                </div>

                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="form32">Image Pour chambre :</label>
                <input type="file" name="image" id="form32" class="form-control validate">
                </div>

                <div class="md-form">
                <label data-error="wrong" data-success="right" for="form8">Votre Description :</label>
                <textarea type="text" name="desc" id="form8" class="md-textarea form-control" rows="4"></textarea>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit" name="submit" value="Ajouter" class="btn btn-primary">
            </div>
            </form>
            </div>
        </div>
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
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</html>