<!DOCTYPE html>
<html>
<head>
	<?php session_start(); echo '<title>'.$_SESSION['title'].'</title>'; ?>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/mdb.min.css" rel="stylesheet">
	<link href="../../css/all.css" rel="stylesheet">
	<style>
		.img-box
		{
			box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			padding:10px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row img-box" style="margin:10px;">
			<div class="col-md-10"><h2 class="text-center">Image Processing</h2></div>
			<div class="col-md-2">
				<a href="../../filters.php" class="btn peach-gradient waves-effect" role="button"><i class="fas fa-arrow-left"></i></a>
				<a href="../../index.php" class="btn purple-gradient waves-effect" role="button"><i class="fas fa-home"></i></a>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-md-5 img-box" style='margin-left:40px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Original Image</h3>
				<?php echo '<img src="../../images/'.$_SESSION['fname'].'" class=\'rounded img-fluid mx-auto d-block\'>'; ?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box">
				<h3 class="text-center" style='font-family:Tw cen mt'>Grayscale Image</h3>
				<?php echo '<img src="'.$_SESSION['outfileG'].'" class=\'mx-auto d-block img-fluid\'>'; ?>
			</div>
			<div class="col-md-2"></div>
		</div> <!-- ROW 1 ENDS -->
		<div class="row">
			<div class="col-md-5 img-box" style='margin-left:40px; margin-top:30px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>After Alpa Prewitt Filter</h3>
				<?php echo '<img src="'.$_SESSION['outfileA'].'" class=\'mx-auto d-block img-fluid\'>'; ?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box" style='margin-top:30px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>After Matrix Prewitt Filter</h3>
				<?php echo '<img src="'.$_SESSION['outfileM'].'" class=\'mx-auto d-block img-fluid\'>'; ?>
			</div>
			<div class="col-md-2"></div>
		</div> <!-- ROW 2 ENDS -->
	</div> <!-- CONTAINER DIV ENDS -->
</body>
</html>