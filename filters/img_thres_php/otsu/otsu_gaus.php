<?php
	session_start();
	$result=shell_exec('python ../../img_thres_py/otsu/otsu_gaus.py');
	if(strcasecmp($result,'success')==0)
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Thresholding';
		$_SESSION['filter']='Otsu&rsquo;s Thresholding After Gaussian Filtering';
		$_SESSION['outimg']='images/abc_thres_otg.jpg';
		
		//call display.php
		header('Location: ../../../display.php');
	}
?>