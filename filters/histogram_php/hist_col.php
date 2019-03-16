<?php
	session_start();
	$cmd='python ../histogram_py/hist_col.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if((strcasecmp($cout,'success')==0))
	{
		//set session variables for use in display.php
		$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
		$tmpname=current($tmp);
		$_SESSION['title']='Plotting Histogram';
		$_SESSION['filter']='Histogram For Color Image';
		$_SESSION['outimg']='../../images/'.$tmpname.'_hist_col.'.$_SESSION['fext'];
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
			<div class="col-md-10"><h2>Image Processing</h2></div>
			<div class="col-md-2">
				<a href="../../filters.php" class="btn peach-gradient waves-effect" role="button"><i class="fas fa-arrow-left"></i></a>
				<a href="../../index.php" class="btn purple-gradient waves-effect" role="button"><i class="fas fa-home"></i></a>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-md-5 img-box" style='margin-left:40px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Color Image</h3>
				<?php echo '<img src=\'../../images/'.$_SESSION['fname'].'\' class=\'rounded img-fluid mx-auto d-block\'>'; ?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box">
				<h3 class="text-center" style='font-family:Tw cen mt'><?php echo $_SESSION['filter']; ?></h3>
				<?php echo '<img src=\''.$_SESSION['outimg'].'\' class=\'img-fluid mx-auto d-block\'>'; ?>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>