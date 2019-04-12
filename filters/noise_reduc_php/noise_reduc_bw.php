<?php
	session_start();
	$cmd='python ../noise_reduc_py/noise_reduc_bw.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
		$tmpname=current($tmp);

		$_SESSION['title']='Noise Reduction';
		$_SESSION['col1_title']='Grayscale Image';
		$_SESSION['col1_img']='images/'.$tmpname.'_noise_bw.'.$_SESSION['fext'];
		$_SESSION['filter']='After Noise Reduction';
		$_SESSION['outimg']='images/'.$cout;

		//call display.php
		header('Location: ../../display.php');
	}
?>