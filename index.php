<?php
//no cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//load router
require_once("src/Router.php");
$router = new Router();
extract($router->getData());

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Metadata -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="JkmAS"/>
	<!-- Title -->
	<title>GitHub App</title>
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Font -->
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css' />
</head>
<body>
	<div class="container">
		<header>
			<h1>
				<a href="?page=searching">
					GitHub App
				</a>
			</h1>
			<ul class="nav nav-pills">
				<li role="presentation"><a href="?page=searching">Searching</a></li>
				<li role="presentation"><a href="?page=querylist">Query List</a></li>
				<li role="presentation"><a href="?page=admin">Admin</a></li>
			</ul>
			<?php if(isset($message) && !empty($message)):?>
				<div class="alert alert-info" role="alert">
					<?=  htmlspecialchars($message,ENT_QUOTES); ?>
				</div>
			<?php endif;?>
			<?php if(isset($view)):?>
				<div class="row">
					<div class="col-md-12">
						<?php require_once "src/views/".$view;?>
					</div>
				</div>
			<?php endif;?>
		</header>
	</div>
</body>
</html>
