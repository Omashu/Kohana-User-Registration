<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hello!</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo URL::site('/')?>">Brand</a>
			</div>
			<ul class="nav navbar-nav">
				<li <?php echo (Request::current()->action() === "signup"? 'class="active"' : '') ?>><a href="<?php echo URL::site('auth/signup')?>">Регистрация</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">