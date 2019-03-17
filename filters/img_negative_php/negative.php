<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_neg.'.$_SESSION['fext'];
	$outimg='../../images/'.$tmpname.'_neg.'.$_SESSION['fext'];

	$cmd='python ../img_negative_py/negative.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'"';
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Image Negative';
		$_SESSION['filter']='Image Negative';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>