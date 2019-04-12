<?php
	session_start();
	$tmp = explode('.'.$_SESSION['fext'], $_SESSION['fname'], -1);
	$tmpname=current($tmp);
	$_SESSION['outfileA']='../../images/'.$tmpname.'_prewA.'.$_SESSION['fext'];
	$_SESSION['outfileM']='../../images/'.$tmpname.'_prewM.'.$_SESSION['fext'];
	$_SESSION['outfileG']='../../images/'.$tmpname.'_prewG.'.$_SESSION['fext'];

	$cmd='python34 ../img_grad_py/prewitt_grad.py "../../images/'.$_SESSION['fname'].'" "'.$_SESSION['outfileM'].'" "'.$_SESSION['outfileA'].'" "'.$_SESSION['outfileG'].'"';
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		$_SESSION['title']='Image Gradient';
		$_SESSION['filter']='After Matrix Prewitt Filter';
		$_SESSION['col1_title']='Grayscale Image';
		$_SESSION['col1_img']='images/'.$tmpname.'_prewG.'.$_SESSION['fext'];;
		$_SESSION['outimg']='images/'.$tmpname.'_prewM.'.$_SESSION['fext'];
		header('Location: ../../display.php');
	}
?>