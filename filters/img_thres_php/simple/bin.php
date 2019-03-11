<?php
	session_start();
	$cmd='python ../../img_thres_py/simple/bin.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);
	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Thresholding';
		$_SESSION['filter']='Threshold Binary [value = 127, max = 255]';
		$_SESSION['outimg']='images/'.$cout;
		
		//call display.php
		header('Location: ../../../display.php');
	}
?>