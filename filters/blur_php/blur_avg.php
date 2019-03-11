<?php
	session_start();
	$cmd='python ../blur_py/blur_avg.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Smoothing';
		$_SESSION['filter']='After Averaging';
		$_SESSION['outimg']='images/'.$cout;

		//call display.php
		header('Location: ../../display.php');
	}
?>