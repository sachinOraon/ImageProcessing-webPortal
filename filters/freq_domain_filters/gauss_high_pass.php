<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_ghp.'.$_SESSION['fext'];
	$outimg='../../images/'.$outfile;

	$cmd='python34 gauss_high_pass.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'" '.$_SESSION['inp_ghpcf'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Sharpening Frequency Domain';
		$_SESSION['filter']='Gaussian High Pass Filter [D<sub>0</sub> = '.$_SESSION['inp_ghpcf'].']';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>