<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Espace Admin</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        h2{
        padding : 20px;
        }
        #modal{
            margin-top : 10px;
        }
    </style>
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
        $sql = "SELECT * FROM hotels WHERE id_hotel LIKE '$id' ";
        $result = mysqli_query($connect, $sql);
    ?>
    <section id="content-wrapper">
        <div class="row">
        <div class="col-lg-12">
            <h2 class="content-title">Modifier Hotel :</h2>
        </div>
        </div>
    </section>
    <!-- edit form -->
    <?php while($row = mysqli_fetch_object($result)){ ?>
    <div class="container">
    <div class="row">
        <form action="" method="post">
        <div class="col-sm-7 mx-auto">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier votre hotel</div>
                <div class="panel-body">
                    <label>Id d'hotel</label>
                    <div class="form-group">
                        <input id="inp" type="text" readonly="readonly" value="<?php echo $row->id_hotel ?>">
                    </div>
                    <label>Nom d'hotel</label>
                    <div class="form-group">
                        <input id="inp" type="text" value="<?php echo $row->name_hotel ?>" name="nom">
                    </div>
                    <label>Ville d'hotel</label>
                    <div class="form-group">
                        <input id="inp" type="text" value="<?php echo $row->ville_hotel ?>" name="ville">
                    </div>
                    <label>Image d'hotel</label>
                    <div class="form-group">
                        <input id="inp" type="file" name="image">
                    </div>
                    <label>Description d'hotel</label>
                    <div class="form-group">
                        <input id="inp" type="text" value="<?php echo $row->desc_hotel ?>" name="desc">
                    </div>
                    <input type="submit" class="btn btn-primary" name="done" value="Modifier">
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    <?php } ?>
    <!-- end edit form -->
    <?php
    if(isset($_POST['done'])){
        $path = "assets/images/";
        $nom = $_POST['nom'];
        $ville = $_POST['ville'];
        $image = $_POST['image'];
        $desc = $_POST['desc'];
        $edit = "UPDATE hotels SET name_hotel='$nom', ville_hotel='$ville', image_hotel='$path$image', desc_hotel='$desc' WHERE id_hotel='$id'";
        $run = mysqli_query($connect, $edit);
        if($run){
            echo "<script type='text/javascript'>alert('Bien Modifier')</script>";
            header("Refresh:0");
        }else{
            echo "<script type='text/javascript'>alert('Erreur')</script>";
        }
    }
    ?>
    <div class="text-center">
        <a href="hotels.php" class="btn btn-info">Retour au liste des hotels</a>
    </div>
</div>

</body>
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script src="script.js"></script>
	<script src="server.js"></script>
</html>