<?php
	session_start();
	$cmd='python ../canny_py/canny.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Canny Edge Detection';
		$_SESSION['filter']='Canny Edge Detection';
		$_SESSION['outimg']='images/'.$cout;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>