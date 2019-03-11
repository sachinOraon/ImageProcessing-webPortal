<?php
	session_start();
	$result=shell_exec('python ../histogram_py/hist_gray.py');
	if(strcasecmp($result,'success')==0)
	{
		//set session variables for use in display.php
		$_SESSION['title']='Plotting Histogram';
		$_SESSION['filter']='Histogram For Grayscale Image';
		$_SESSION['outimg']='../../images/abc_hist_gray.jpg';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php echo '<title>'.$_SESSION['title'].'</title>'; ?>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
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
			<div class="col-md-10"><h2>Image Processing</h2></div>
			<div class="col-md-2">
			<a href="../../filters.php" class="btn btn-primary peach-gradient" role="button">Back</a>
			<a href="../../index.php" class="btn btn-success purple-gradient" role="button">Home</a>
			</div>
		</div><br><br>
		<div class="row">
			
			<div class="col-md-5 img-box" style='margin-left:40px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Grayscale Image</h3>
				<img src='../../images/abc_gray.jpg' class='rounded img-fluid mx-auto d-block'>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box">
				<h3 class="text-center" style='font-family:Tw cen mt'><?php echo $_SESSION['filter']; ?></h3>
				<?php echo '<img src=\''.$_SESSION['outimg'].'\' class=\'mx-auto d-block img-fluid\'>'; ?>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>