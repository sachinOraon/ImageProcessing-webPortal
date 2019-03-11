<?php
	session_start();
	$cmd='python ../img_grad_py/sobx.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Gradient';
		$_SESSION['filter']='After Sobel X';
		$_SESSION['outimg']='images/'.$cout;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>