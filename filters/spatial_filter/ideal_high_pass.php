<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_ihp.'.$_SESSION['fext'];
	$outimg='../../images/'.$outfile;

	$cmd='python34 ideal_high_pass.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'" '.$_SESSION['inp_ihpcf'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Smoothing Frequency Domain';
		$_SESSION['filter']='Ideal High Pass Filter [D<sub>0</sub> = '.$_SESSION['inp_ihpcf'].']';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>