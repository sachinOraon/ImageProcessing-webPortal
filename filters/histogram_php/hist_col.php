<?php
	session_start();
	if(!isset($_SESSION['fname'])) header('Location:../../index.php');
	$cmd='python ../histogram_py/hist_col.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if((strcasecmp($cout,'success')==0))
	{
		//set session variables for use in display.php
		$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
		$tmpname=current($tmp);
		$_SESSION['title']='Plotting Histogram';
		$_SESSION['filter']='Histogram For Color Image';
		$_SESSION['outimg']='images/'.$tmpname.'_hist_col.'.$_SESSION['fext'];
		header('Location: ../../display.php');
	}
?>
