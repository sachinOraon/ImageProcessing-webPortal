<?php
	session_start();
	$cmd='python ../morph_trans_py/close.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);
	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Morphological Transformation';
		$_SESSION['filter']='After Closing';
		$_SESSION['outimg']='images/'.$cout;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>