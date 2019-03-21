<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$outfile=$tmpname.'_homo_fil.'.$_SESSION['fext'];
	$outimg='../../images/'.$outfile;

	$cmd='python34 homo.py "../../images/'.$_SESSION['fname'].'" "'.$outimg.'" '.$_SESSION['inp_varcfh'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Frequency Domain Filter';
		$_SESSION['filter']='After Homomorphic Filtering [D<sub>0</sub> = '.$_SESSION['inp_varcfh'].']';
		$_SESSION['outimg']='images/'.$outfile;
		
		//call display.php
		header('Location: ../../display.php');
	}
?>