<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_cont_str_lin.'.$_SESSION['fext'];
	$outimg='../../images/'.$outfile;

	$cmd='python34 cont_stretch_lin.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'"';
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Simple Intensity Transformation';
		$_SESSION['filter']='Contrast Stretching [Linear]';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>