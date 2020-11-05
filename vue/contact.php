<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	<title>Contact</title>

	
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

</head>

<body class="home">

	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php">I Found</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Nos Hotels</a></li>
					<!-- <li><a href="">Nos Chambres</a></li> -->
					<li class="active"><a href="" id="con_id">Contactez-nous</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
	<div id="contact">
	<header id="head" class="secondary"></header>
	<!-- container -->
	<div class="container" style="padding-bottom: 40px;">

		<ol class="breadcrumb">
			<li><a href="">Accueil</a></li>
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			<?php
			$connect = mysqli_connect("localhost", "root", "", "mnghotel");
			if(isset($_POST['submit'])){
				$nom = $_POST['name'];
				$email = $_POST['email'];
				$tele = $_POST['phone'];
				$desc = $_POST['desc'];
				$sql = "INSERT INTO contact (name_contact, email_contact, phone_contact, desc_contact) VALUES ('$nom', '$email', '$tele', '$desc')";
				if(mysqli_query($connect, $sql)){
					echo "<script type='text/javascript'> alert('Message Envoyée')</script>";
				}else{
					echo "<script type='text/javascript'> alert('il ya un probleme')</script>";
				}
			}
			?>
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Nous contacter</h1>
				</header>
				
				<p>
					Nous aimerions recevoir de vos nouvelles. Intéressé à travailler ensemble? Remplissez le formulaire ci-dessous avec quelques informations sur votre projet et je vous répondrai dans les plus brefs délais. Veuillez prévoir quelques jours pour que je réponde.
				</p>
				<br>
					<form id="form" action="" method="POST">
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Nom" name="name">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Email" name="email">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Téléphone" name="phone">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Tapez votre message ici..." class="form-control" name="desc" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" name="submit" type="submit" value="Envoyer">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Adresse :</h4>
					<address>
						YouCode, Safi, 00000, Maroc
					</address>
					<h4>Téléphone:</h4>
					<address>
						(212) 000-0000
					</address>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	</div>

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+212 60 0000000<br>
								<a href="mailto:#">naoufelbenmensour@gmail.com</a><br>
								<br>
								YouCode, Safi, rue ...
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Suivez-moi</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Informations sur Application</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">

					<center>
						<div class="widget-body">
							<p>
								Copyright &copy; 2020, Benmansour
							</p>
					</div>
					</center>
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script src="script.js"></script>
</body>
</html>
