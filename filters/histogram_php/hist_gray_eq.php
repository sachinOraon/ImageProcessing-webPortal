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
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/all.css" rel="stylesheet">
	<link href="../../css/display.css" rel="stylesheet">
</head>

<body style="background-color: #232325;">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.js"></script>
	
	<div class='container-fluid' style="margin-bottom:2%">
		<div class='row'>
			<div class='col'>
				<div class="animated fadeInLeft bg-dark" id="heading">
					<div class="row">
						<div class="col-md-11">
							<?php
								if(file_exists($_SESSION['gray_eq']) && !is_dir($_SESSION['gray_eq']))
									echo '<h2 style="text-shadow: 0 0 10px #00c9cb, 0 0 12px #00c9cb, 0 0 14px #00c9cb, 0 0 16px #00c9cb, 0 0 18px #00c9cb;">Output Generated</h2>';
								else echo '<h2 style="text-shadow: 0 0 10px #ff0000, 0 0 12px #ff0000, 0 0 14px #ff0000, 0 0 16px #ff0000, 0 0 18px #ff0000;">Failed To Process !</h2>';
							?>
						</div>
						<div class="col-md-1">
							<a href="../../filters.php" class="float-right btn btn-outline-info waves-effect"><i class="fas fa-chevron-circle-left fa-lg"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col' style="margin-left:3%">
				<div id="filter-box" class="animated fadeInLeft">
					<h4>Grayscale Image</h4>
					<?php
						if(file_exists($_SESSION['gray_img']) && !is_dir($_SESSION['gray_img']))
							echo '<img src="'.$_SESSION['gray_img'].'" class=\'img-fluid mx-auto d-block\'>';
						else echo '<img src="../../img/failed.png" class=\'img-fluid mx-auto d-block\'>';
					?>
				</div>
			</div>
			<div class="col" style="margin-right:3%; margin-left:1%">
				<div id="filter-box" class="animated fadeInRight">
					<h4>After Histogram Equalization</h4>
					<?php
						if(file_exists($_SESSION['gray_eq']) && !is_dir($_SESSION['gray_eq']))
							echo '<img src="'.$_SESSION['gray_eq'].'" class=\'img-fluid mx-auto d-block\'>';
						else echo '<img src="../../img/failed.png" class=\'img-fluid mx-auto d-block\'>';
					?>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col' style="margin-left:3%">
				<div id="filter-box" class="animated fadeInLeft">
					<h4>Histogram</h4>
					<?php
						if(file_exists($_SESSION['hist_gray']) && !is_dir($_SESSION['hist_gray']))
							echo '<img src="'.$_SESSION['hist_gray'].'" class=\'img-fluid mx-auto d-block\'>';
						else echo '<img src="../../img/failed.png" class=\'img-fluid mx-auto d-block\'>';
					?>
				</div>
			</div>
			<div class="col" style="margin-right:3%; margin-left:1%">
				<div id="filter-box" class="animated fadeInRight">
					<h4>Equalized Histogram</h4>
					<?php
						if(file_exists($_SESSION['hist_gray_eq']) && !is_dir($_SESSION['hist_gray_eq']))
							echo '<img src="'.$_SESSION['hist_gray_eq'].'" class=\'img-fluid mx-auto d-block\'>';
						else echo '<img src="../../img/failed.png" class=\'img-fluid mx-auto d-block\'>';
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>