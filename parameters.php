<?php
	session_start();
	//function for displaying alert box
	function alert($msg) { echo "<script type='text/javascript'>alert('$msg');</script>"; }

	//for Image Smoothing -> Averaging
	if(isset($_POST['blur_avg']))
	{
		$_SESSION['inp_kWavg']=$_POST['inp_kWavg'];
		$_SESSION['inp_kHavg']=$_POST['inp_kHavg'];
		header('Location:filters/blur_php/blur_avg.php');
	}

	//for Image Smoothing -> Gaussian Blurring
	if(isset($_POST['blur_gaus']))
	{
		$_SESSION['inp_kWgaus']=$_POST['inp_kWgaus'];
		$_SESSION['inp_kHgaus']=$_POST['inp_kHgaus'];
		header('Location:filters/blur_php/blur_gauss.php');
	}

	//for Simple Intensity Trans -> Range Compression
	if(isset($_POST['range_comp']))
	{
		$_SESSION['inp_varC']=$_POST['inp_varC'];
		header("Location: filters/simple_int_trans/range_comp.php");
	}

	//for gamma transformation
	if(isset($_POST['gamma_trans']))
	{
		$_SESSION['inp_varG']=$_POST['inp_varG'];
		header("Location: filters/simple_int_trans/gamma.php");
	}

	//for smoothing ideal low pass
	if(isset($_POST['ideal_low_pass']))
	{
		$_SESSION['inp_cf']=$_POST['inp_cfreq'];
		header("Location: filters/spatial_filter/ideal_low_pass.php");
	}
?>