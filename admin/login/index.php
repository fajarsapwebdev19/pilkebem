<?php
	session_start();
	require '../../koneksi/koneksi.php';

	$query = mysqli_query($koneksi, "SELECT * FROM identitas_kampus");
	$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - PILKEBEM <?= date('Y')?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="pemilihan ketua bem stmik pgri tangerang" />
	<meta name="keywords" content="Login Admin Pilkebem STMIK PGRI Tangerang, Login pilkebem stmik pgri tangerang, login pilkebem stmik pgri tangerang, pilkebem stmik pgri tangerang, PILKEBEM Admin STMIK PGRI TANGERANG">
	<meta name="author" content="fajarsaputra_dev19" />
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../assets/logo/<?= $data['logo']?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/css/main.css">
<!--===============================================================================================-->
<style>
  .container-login100{
    background: #1fdf5f;
  background: -webkit-linear-gradient(-135deg, #1fdf5f, #4158d0);
  background: -o-linear-gradient(-135deg, #1fdf5f, #4158d0);
  background: -moz-linear-gradient(-135deg, #1fdf5f, #4158d0);
  background: linear-gradient(-135deg, #1fdf5f, #4158d0);
  }

	.text-alert{
		font-size: 12px;
	}

	.bg-primary:hover{
		background-color: #4158d0;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				<img src="../../assets/logo/<?= $data['logo'] ?>" alt="IMG" width="300">
				</div>

				<form action="proses_login.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						<img src="../../assets/logo/<?= $data['logo']?>" alt="IMG" width="120">
						<p>Login Admin</p>
						E-PILKEBEM <?= date('Y') ?>
					</span>

					<?php 
						if(isset($_SESSION['val']) && $_SESSION['val'] !='')
						{
							echo $_SESSION['val'];
							unset($_SESSION['val']);
						}
					?>

					<div class="wrap-input100 validate-input" data-validate = "Username required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="login" type="submit" class="login100-form-btn bg-primary">
							Login
						</button>
					</div>

					<div class="text-center p-t-20">
						<p class="txt2">
							&copy; <?= $data['nama_kampus'] ?> <?= date('Y') ?>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})

		window.setTimeout(function(){
			$("#auto-close").fadeTo(500,0).slideUp(500, function(){
				$(this).remove();
			});
		}, 5000);

		
	</script>
<!--===============================================================================================-->
	<script src="../../assets/login/js/main.js"></script>

</body>
</html>