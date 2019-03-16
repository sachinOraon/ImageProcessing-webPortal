<!DOCTYPE html>
<html>
<head>
	<?php session_start(); echo '<title>'.$_SESSION['title'].'</title>'; ?>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/all.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
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
			<div class="col-md-10"><h2 style="text-align: center;margin-top: 10px;">Image Processing</h2></div>
			<div class="col-md-2">
			<a href="filters.php" class="btn peach-gradient waves-effect" role="button"><i class="fas fa-chevron-left"></i></a>
			<a href="index.php" class="btn purple-gradient waves-effect" role="button"><i class="fas fa-home"></i></a>
			</div>
		</div><br><br>
		<div class="row">
			
			<div class="col-md-5 img-box" style='margin-left:40px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Original</h3>
				<?php echo '<img src=\'images/'.$_SESSION['fname'].'\' class=\'rounded img-fluid mx-auto d-block\'>'; ?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box">
				<h3 class="text-center" style='font-family:Tw cen mt'><?php echo $_SESSION['filter']; ?></h3>
				<?php echo '<img src=\''.$_SESSION['outimg'].'\' class=\'rounded img-fluid mx-auto d-block\'>'; ?>
			</div>
		</div>
	</div>
</body>
</html>