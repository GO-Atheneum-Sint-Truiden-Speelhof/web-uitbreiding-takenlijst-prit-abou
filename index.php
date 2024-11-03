<!doctype html>
<html lang=nl>

<head>
	<meta charset=utf-8>
	<meta name="robots" content="all">
	<link rel="stylesheet" type="text/css" href="opmaak/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="opmaak/opmaak.css">
	<link rel="shortcut icon" type="image/gof" href="plaatjes/favicon.gif">
	<title>CCO fotowedstrijd</title>
	<script src="scripts/jquery.js"></script>
	<script src="scripts/bootstrap.js"></script>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="index.php">
				<img src="plaatjes/camera.gif" alt="logo">
			</a>
			<div class="collapse navbar-collapse" id="menubalk">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="wedstrijd.php" class="nav-link">Wedstrijd</a>
					</li>
					<li class="nav-item">
						<a href="winnen.php" class="nav-link">Prijzen</a>
					</li>
					<li class="nav-item">
						<a href="laureaat.php" class="nav-link">Laureaat vorig jaar</a>
					</li>
					<li class="nav-item">
						<a href="deelnemen.php" class="nav-link">Deelnemen</a>
					</li>
				</ul>
			</div>
			<button class="navbar-toggler" type="button"
					data-toggle="collapse"
					data-target="#menubalk"
					aria-controls="menubalk" 
					aria-expanded="false" 
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
		<div class="jumbotron">
			<h1 class="display-4">CCO fotowedstrijd</h1>
		</div>
		<div class="row">
			<div class="col tegel">
				<h4>Meer over de wedstrijd</h4>
				<p><a href="wedstrijd.php"><img src="plaatjes/wedstrijd.jpg" alt="Meer over de wedstrijd" class="img-fluid rounded"></a></p>
			</div>
			<div class="col tegel">
				<h4>Wat kan je winnen?</h4>
				<p><a href="winnen.php"><img src="plaatjes/winnen.jpg" alt="Wat kan je winnen?" class="img-fluid rounded"></a>
			</div>
		</div>
		<div class="row">
			<div class="col tegel">
				<h4>Laureaat vorig jaar</h4>
				<p><a href="laureaat.php"><img src="plaatjes/laureaat.jpg" alt="De laureaat van vorig jaar" class="img-fluid rounded"></a></p>
			</div>
			<div class="col tegel">
				<h4>Neem deel</h4>
				<p><a href="deelnemen.php"><img src="plaatjes/deelnemen.jpg" alt="Neem deel aan de wedstrijd" class="img-fluid rounded"></a>
			</div>
		</div>
		<div class="row footer">
			<p><small>Dit is vb12 bij de cursus Webontwikkeling.</small></p>
		</div>
	</div>
</body>

</html>