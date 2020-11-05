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
        #email{
            margin-bottom :20px;
        }
        #password{
            margin-bottom : 20px;
        }
        .it{
            margin : 100px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="it"></div>
                <div class="account-wall">
                    <img class="profile-img" src="assets/images/login.png" alt="">
                    <form class="form-signin" action="" method="post">
                    <input name="email" type="text" id="email" class="form-control" placeholder="Entrer Votre Email" required autofocus>
                    <input name="password" type="password" id="password" class="form-control" placeholder=" Entrer Votre Mot de Passe" required>
                    <center>
                    <input type="submit" name="login" value="Se Connecter" class="btn btn-primary">
                    </center>
                    </form>
                </div>
                <?php
                    $connect = mysqli_connect("localhost", "root", "", "mnghotel");
                    if(isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $sql = "SELECT * FROM admin_unity WHERE email_admin = '$email' AND pass_admin = '$password'";
                        $query = mysqli_query($connect, $sql);
                        $row = mysqli_num_rows($query);
                        if($row == 1){
                            $_SESSION['email'] = $email;
                            $message = "Connexion autorisée";
                            echo ("<script type='text/javascript'>alert('$message');</script>");
                            header('location:home.php');
                        }else{
                            echo "Error";
                            header('location:index.php');
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>