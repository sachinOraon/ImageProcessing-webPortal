<?php
	session_start();
	$result=shell_exec('python ../../img_thres_py/simple/bin.py');
	if(strcasecmp($result,'success')==0)
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Thresholding';
		$_SESSION['filter']='Threshold Binary [value = 127, max = 255]';
		$_SESSION['outimg']='images/abc_thres_bin.jpg';
		
		//call display.php
		header('Location: ../../../display.php');
	}
?>