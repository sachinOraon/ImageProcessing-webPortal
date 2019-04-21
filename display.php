<!DOCTYPE html>
<html>
<head>
	<?php session_start(); if(!isset($_SESSION['fname'])) header('Location:index.php'); echo '<title>'.$_SESSION['title'].'</title>'; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/all.css" rel="stylesheet">
	<link href="css/display.css" rel="stylesheet">
</head>

<body style="background-color: #232325;">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.js"></script>
	
	<div class='container-fluid'>
		<div class='row'>
			<div class='col'>
				<div class="animated fadeInLeft bg-dark" id="heading">
					<div class="row">
						<div class="col-md-11">
							<h2 style="text-shadow: 0 0 10px #00c9cb, 0 0 12px #00c9cb, 0 0 14px #00c9cb, 0 0 16px #00c9cb, 0 0 18px #00c9cb;"><i class="fas fa-chevron-left"></i> Output Generated <i class="fas fa-chevron-right"></i></h2>
						</div>
						<div class="col-md-1">
							<a href="filters.php" class="float-right btn btn-outline-info waves-effect"><i class="fas fa-chevron-circle-left fa-lg"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col' style="margin-left:3%">
				<div id="filter-box" class="animated fadeInLeft">
					<?php
						if(isset($_SESSION['col1_title']))
						{
							echo '<h4>'.$_SESSION['col1_title'].'</h4>';
							if(file_exists($_SESSION['col1_img']))
								echo '<img src="'.$_SESSION['col1_img'].'" class=\'img-fluid mx-auto d-block\'>';
							else echo '<img src="img/failed.png" class=\'img-fluid mx-auto d-block\'>';
						}
						else
						{
							echo '<h4>Original Image</h4>';
							if(file_exists('images/'.$_SESSION['fname']))
								echo '<img src="images/'.$_SESSION['fname'].'" class=\'img-fluid mx-auto d-block\'>';
							else echo '<img src="img/failed.png" class=\'img-fluid mx-auto d-block\'>';
						}
					?>
				</div>
			</div>
			<div class="col" style="margin-right:3%; margin-left:1%">
				<div id="filter-box" class="animated fadeInRight">
					<h4><?php echo $_SESSION['filter']; ?></h4>
					<?php
						if(file_exists($_SESSION['outimg']))
							echo '<img src="'.$_SESSION['outimg'].'" class=\'img-fluid mx-auto d-block\'>';
						else echo '<img src="img/failed.png" class=\'img-fluid mx-auto d-block\'>';
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>