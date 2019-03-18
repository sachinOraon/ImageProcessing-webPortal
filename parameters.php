<?php
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
?>