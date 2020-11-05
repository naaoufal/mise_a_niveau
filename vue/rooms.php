<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	<title>Hotel Manage</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- some styles -->
<style>
    .thin{
        padding : 60px;
    }
</style>

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
					<!-- <li class="active"><a href="rooms">Nos Chambres</a></li> -->
					<li><a href="contact.php">Contactez-nous</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
	<div id="home">

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Liste des chambres</h2>
		<p class="text-muted">
		</p>
	</div>
    <!-- /Intro-->


    <?php
    $connect = mysqli_connect("localhost", "root", "", "mnghotel");
	$id = $_GET['id'];
	// $id = $_SESSION['id'];
    $sql = "SELECT * FROM rooms WHERE id_hotel LIKE '$id'";
    $result = mysqli_query($connect, $sql);
    ?>

<!-- show room card -->
<div class="container">
<form action="">
<div class="row">
    <?php while($row = mysqli_fetch_object($result)){ ?>
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">
                    <img src="<?php echo $row->image_room ?>" alt="">
                </div>
                <div class="product-desc">
                    <span class="product-price">
                        <?php echo $row->price_room ?> Dhs
                    </span>
                    	<a href="showroom.php?id=<?php print $row->id_room ?>"><?php echo $row->name_room ?></a>

                    <div class="small m-t-xs">
                        <?php echo $row->desc_room ?>
						<!-- <input readonly="readonly" value="<?php //echo $id; ?>"> -->
                    </div>
                    <br>
                    <div class="m-t text-righ">

                        <a href="reservation.php?id=<?php print $row->id_room ?>&id1=<?php print $row->id_hotel ?>" class="btn btn-xs btn-outline btn-primary">Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</form>
</div>
<!-- end show room card -->
    
<!-- container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


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
	<script src="server.js"></script>
</body>
</html>