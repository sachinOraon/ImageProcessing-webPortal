<?php
	session_start();
	if(!isset($_SESSION['fname'])) header('Location:../../index.php');
	$cmd='python ../histogram_py/hist_gray_eq.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if((strcasecmp($cout,'success')==0))
	{
		//set session variables for use in display.php
		$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
		$tmpname=current($tmp);
		$_SESSION['title']='Histogram Equalization';
		$_SESSION['hist_gray']='../../images/'.$tmpname.'_hist_gray.'.$_SESSION['fext'];
		$_SESSION['gray_img']='../../images/'.$tmpname.'_gray.'.$_SESSION['fext'];
		$_SESSION['gray_eq']='../../images/'.$tmpname.'_gray_eq.'.$_SESSION['fext'];
		$_SESSION['hist_gray_eq']='../../images/'.$tmpname.'_hist_gray_eq.'.$_SESSION['fext'];
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
			<div class="col-md-9"><h2>Image Processing</h2></div>
			<div class="col-md-3">
				<a href="../../index.php" class="btn purple-gradient float-right" role="button"><i class="fas fa-home"></i></a>
				<a href="../../filters.php" class="btn peach-gradient float-right" role="button"><i class="fas fa-arrow-left"></i></a>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-md-5 img-box" style='margin-left:40px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Grayscale Image</h3>
				<?php
					if(file_exists($_SESSION['gray_img']))
						echo '<img src="'.$_SESSION['gray_img'].'" class=\'rounded img-fluid mx-auto d-block\'>';
					else echo '<img src="../../img/failed.png" class=\'rounded img-fluid mx-auto d-block\'>';
				?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box">
				<h3 class="text-center" style='font-family:Tw cen mt'>After Histogram Equalization</h3>
				<?php
					if(file_exists($_SESSION['gray_eq']))
						echo '<img src="'.$_SESSION['gray_eq'].'" class=\'rounded img-fluid mx-auto d-block\'>';
					else echo '<img src="../../img/failed.png" class=\'rounded img-fluid mx-auto d-block\'>';
				?>
			</div>
			<div class="col-md-2"></div>
		</div> <!-- ROW 1 ENDS -->
		<div class="row">
			<div class="col-md-5 img-box" style='margin-left:40px; margin-top:30px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Histogram</h3>
				<?php
					if(file_exists($_SESSION['hist_gray']))
						echo '<img src="'.$_SESSION['hist_gray'].'" class=\'rounded img-fluid mx-auto d-block\'>';
					else echo '<img src="../../img/failed.png" class=\'rounded img-fluid mx-auto d-block\'>';
				?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 img-box" style='margin-top:30px'>
				<h3 class="text-center" style='font-family:Tw cen mt'>Equalized Histogram</h3>
				<?php
					if(file_exists($_SESSION['hist_gray_eq']))
						echo '<img src="'.$_SESSION['hist_gray_eq'].'" class=\'rounded img-fluid mx-auto d-block\'>';
					else echo '<img src="../../img/failed.png" class=\'rounded img-fluid mx-auto d-block\'>';
				?>
			</div>
			<div class="col-md-2"></div>
		</div> <!-- ROW 2 ENDS -->
	</div> <!-- CONTAINER DIV ENDS -->
</body>
</html>