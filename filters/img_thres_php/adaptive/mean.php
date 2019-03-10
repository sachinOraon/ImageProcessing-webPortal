<?php
	session_start();
	$result=shell_exec('python ../../img_thres_py/adaptive/mean.py');
	if(strcasecmp($result,'success')==0)
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Thresholding';
		$_SESSION['filter']='Adaptive Mean Thresholding';
		$_SESSION['outimg']='images/abc_thres_mean.jpg';
		
		//call display.php
		header('Location: ../../../display.php');
	}
?>