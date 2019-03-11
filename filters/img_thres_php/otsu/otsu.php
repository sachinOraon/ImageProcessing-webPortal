<?php
	session_start();
	$cmd='python ../../img_thres_py/otsu/otsu.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);
	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Thresholding';
		$_SESSION['filter']='Otsu&rsquo;s Thresholding';
		$_SESSION['outimg']='images/'.$cout;
		
		//call display.php
		header('Location: ../../../display.php');
	}
?>