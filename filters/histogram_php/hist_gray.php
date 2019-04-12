<?php
	session_start();
	if(!isset($_SESSION['fname'])) header('Location:../../index.php');
	$cmd='python ../histogram_py/hist_gray.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
		$tmpname=current($tmp);
		$_SESSION['title']='Plotting Histogram';
		$_SESSION['filter']='Histogram For Grayscale Image';
		$_SESSION['col1_title']='Grayscale Image';
		$_SESSION['outimg']='images/'.$tmpname.'_hist_gray.'.$_SESSION['fext'];
		$_SESSION['col1_img']='images/'.$tmpname.'_gray.'.$_SESSION['fext'];
		header('Location: ../../display.php');
	}
?>
