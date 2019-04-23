<?php
	session_start();
	$cmd='python ../blur_py/blur_gauss.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'].' '.$_SESSION['inp_kWgaus'].' '.$_SESSION['inp_kHgaus'];
	$cout=shell_exec($cmd);
	if(!empty($cout))
	{
		if(!(strcasecmp($cout,'failed')==0))
		{
			//set session variables for use in display.php
			$_SESSION['title']='Image Smoothing';
			$_SESSION['filter']='After Gaussian Blurring';
			$_SESSION['outimg']='images/'.$cout;
			
			//call display.php
			header('Location: ../../display.php');
		}
	}
	else header('Location: ../../disp_fail.php');
?>