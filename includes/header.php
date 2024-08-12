<?php
//start session
@session_start();

//number of items in the shopping cart
$count=0;

//retrieve the cart content
if ( isset ( $_SESSION['cart'] ) ){
	$cart = $_SESSION['cart'];

	if  ( $cart ) {
		$items = explode(',', $cart);
		$count = count($items);
	}
}

//check to see if a user is logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<style>
		/* Main navigation bar styles */
		.navbar-custom {
			background-color: #222;
			border-color: #080808;
			color: #ddd;
			margin-bottom: 0;
			padding: 10px 0;
		}

		.navbar-custom .navbar-brand {
			color: #fff;
		}

		.navbar-custom .navbar-nav > li > a {
			color: #ddd;
			padding: 15px 20px;
			transition: background-color 0.3s ease, color 0.3s ease;
		}

		.navbar-custom .navbar-nav > li > a:hover {
			color: #fff;
			background-color: #555;
		}

		.navbar-custom .navbar-right {
			margin-right: 0;
		}

		/* Responsive styles */
		@media (max-width: 768px) {
			.navbar-custom .navbar-nav > li > a {
				padding: 10px 15px;
			}
		}

		/* Button hover effects */
		.navbar-custom .btn-success {
			background-color: #28a745;
			border-color: #28a745;
			transition: background-color 0.3s ease, border-color 0.3s ease;
		}

		.navbar-custom .btn-success:hover,
		.navbar-custom .btn-success:focus,
		.navbar-custom .btn-success:active {
			background-color: #218838;
			border-color: #1e7e34;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-custom navbar-inverse" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand"><i class="fa fa-clock-o fa-lg"></i> ReviewHub</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">HOME</a></li>
					<li><a href="movies.php">MOVIES</a></li>
					<li><a href="webseries.php">WEBSERIES</a></li>
					<li><a href="reviews.php">REVIEWS</a></li>
					<?php if ($role == 1): ?>
						<li><a href="addmovie.php">ADD MOVIE</a></li>
					<?php endif; ?>
					<?php if (!empty($login)): ?>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, <?php echo $name; ?>!</a></li>
					<?php else: ?>
						<li><a href="registration.php">REGISTER</a></li>
						<li><a href="login.php" class="btn btn-success navbar-btn">SIGN IN</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<!-- Main content here -->
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
