<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_range_comp.'.$_SESSION['fext']; 
	$outimg='../../images/'.$tmpname.'_range_comp.'.$_SESSION['fext'];

	$cmd='python range_comp.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'" '.$_SESSION['inp_varC'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Simple Intensity Transformation';
		$_SESSION['filter']='After Range Compression [c = '.$_SESSION['inp_varC'].']';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>