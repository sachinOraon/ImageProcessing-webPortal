<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_gamma.'.$_SESSION['fext'];
	$outimg='../../images/'.$outfile;

	$cmd='python34 gamma.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'" '.$_SESSION['inp_varG'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Simple Intensity Transformation';
		$_SESSION['filter']='After Gamma Transformation [g = '.$_SESSION['inp_varG'].']';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>